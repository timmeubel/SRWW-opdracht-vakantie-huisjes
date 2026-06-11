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
            'name' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'guests' => 'required|integer|min:1',
            'bedrooms' => 'required|integer|min:1',
            'short_description' => 'required|string',
            'long_description' => 'required|string',
            'amenities' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048'
        ]);

        $house->name = $request->name;
        $house->location = $request->location;
        $house->guests = $request->guests;
        $house->bedrooms = $request->bedrooms;
        $house->short_description = $request->short_description;
        $house->long_description = $request->long_description;
        $house->amenities = $request->amenities;

        // Handle Image Upload
        if ($request->hasFile('image')) {
            $house->image_path = $request->file('image')->store('houses', 'public');
        }

        $house->save();
        return redirect()->back()->with('success', 'Vakantiehuisje succesvol bijgewerkt!');
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

    // Delete the photo of a specific house
    public function deleteHouseImage(Request $request)
    {
        $house = VacationHouse::findOrFail($request->input('house_id'));

        if ($house->image_path) {
            Storage::disk('public')->delete($house->image_path);
            $house->image_path = null;
            $house->save();
        }

        return redirect()->route('admin.cms.index')->with('success', 'Foto van het huisje succesvol verwijderd!');
    }

    // Delete an entire house (including its photo from storage)
    public function deleteHouse(Request $request)
    {
        $house = VacationHouse::findOrFail($request->input('house_id'));

        // Also remove the image file from disk if it exists
        if ($house->image_path) {
            Storage::disk('public')->delete($house->image_path);
        }

        $house->delete();

        return redirect()->route('admin.cms.index')->with('success', 'Vakantiehuisje succesvol verwijderd!');
    }
}
