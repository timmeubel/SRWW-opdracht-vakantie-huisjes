<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use App\Models\VacationHouse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CMSController extends Controller
{
    // Show Dashboard with all houses and settings
    public function index()
    {
        $houses = VacationHouse::all();
        $settings = Setting::pluck('value', 'key');  // Packages settings nicely for the view

        return view('admin.cms.index', compact('houses', 'settings'));
    }

    // Update a specific house
    public function updateHouse(Request $request, $id)
    {
        $house = VacationHouse::findOrFail($id);

        $request->validate([
            'name' => 'required|string',
            'description' => 'required|string',
            'images.*' => 'image|mimes:jpeg,png,jpg|max:2048'  // Validate each uploaded image
        ]);

        $house->name = $request->name;
        $house->description = $request->description;

        // Handle Image Uploads
        if ($request->hasFile('images')) {
            $uploadedImages = [];
            foreach ($request->file('images') as $image) {
                // Store in public/houses directory
                $path = $image->store('houses', 'public');
                $uploadedImages[] = $path;
            }
            // Merge new images with old ones, or replace them entirely depending on your preference
            $house->images = $uploadedImages;
        }

        $house->save();
        return redirect()->back()->with('success', 'House updated successfully!');
    }

    // Update Index Page Settings
    public function updateSettings(Request $request)
    {
        foreach ($request->except('_token') as $key => $value) {
            if ($request->hasFile($key)) {
                // If the setting is an image (like a logo or banner)
                $path = $request->file($key)->store('settings', 'public');
                Setting::updateOrCreate(['key' => $key], ['value' => $path]);
            } else {
                // If it's text
                Setting::updateOrCreate(['key' => $key], ['value' => $value]);
            }
        }

        return redirect()->back()->with('success', 'Homepage updated successfully!');
    }

    public function storeHouse(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'guests' => 'required|integer|min:1',
            'bedrooms' => 'required|integer|min:1',
            'short_description' => 'required|string',
            'long_description' => 'required|string',
            'amenities' => 'nullable|string',
        ]);

        if ($request->hasFile('image')) {
            $validated['image_path'] = $request->file('image')->store('houses', 'public');
        }

        $validated['tag'] = 'Vakantiehuis';
        $validated['icon'] = '🏡';
        $validated['class_theme'] = 'img-forest';

        \App\Models\VacationHouse::create($validated);

        return redirect()->back()->with('success', 'Nieuw vakantiehuisje succesvol toegevoegd!');
    }
}
