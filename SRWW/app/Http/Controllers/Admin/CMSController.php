<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use App\Models\VacationHouse;
use App\Models\Foto;
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

        \Illuminate\Support\Facades\Log::debug('updateHouse files check', [
            'has_gallery_photos' => $request->hasFile('gallery_photos'),
            'gallery_photos_file' => $request->file('gallery_photos'),
            'all_files' => $request->allFiles(),
            'all_data' => $request->except(['gallery_photos', 'image']),
        ]);

        $request->validate([
            'name' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'guests' => 'required|integer|min:1',
            'bedrooms' => 'required|integer|min:1',
            'short_description' => 'required|string',
            'long_description' => 'required|string',
            'amenities' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:20480',
            'pdf' => 'nullable|mimes:pdf|max:10240',
            'gallery_photos' => 'nullable|array',
            'gallery_photos.*' => 'image|mimes:jpeg,png,jpg,webp|max:20480'
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

        // Handle PDF Upload
        if ($request->hasFile('pdf')) {
            // Delete old PDF if exists
            if ($house->pdf_path) {
                Storage::disk('public')->delete($house->pdf_path);
            }
            $house->pdf_path = $request->file('pdf')->store('house-pdfs', 'public');
        }

        $house->save();

        // Handle Gallery Photos Upload
        if ($request->hasFile('gallery_photos')) {
            $maxOrder = $house->fotos()->max('sort_order') ?? 0;
            
            foreach ($request->file('gallery_photos') as $index => $photo) {
                $path = $photo->store('gallery', 'public');
                Foto::create([
                    'vacation_house_id' => $house->id,
                    'url' => $path,
                    'sort_order' => $maxOrder + $index + 1
                ]);
            }
        }

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
        \Illuminate\Support\Facades\Log::debug('storeHouse files check', [
            'has_gallery_photos' => $request->hasFile('gallery_photos'),
            'gallery_photos_file' => $request->file('gallery_photos'),
            'all_files' => $request->allFiles(),
            'all_data' => $request->except(['gallery_photos', 'image']),
        ]);

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'guests' => 'required|integer|min:1',
            'bedrooms' => 'required|integer|min:1',
            'short_description' => 'required|string',
            'long_description' => 'required|string',
            'amenities' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:20480',
            'pdf' => 'nullable|mimes:pdf|max:10240',
            'gallery_photos' => 'nullable|array',
            'gallery_photos.*' => 'image|mimes:jpeg,png,jpg,webp|max:20480'
        ]);

        if ($request->hasFile('image')) {
            $validated['image_path'] = $request->file('image')->store('houses', 'public');
        }

        if ($request->hasFile('pdf')) {
            $validated['pdf_path'] = $request->file('pdf')->store('house-pdfs', 'public');
        }

        $houseData = \Illuminate\Support\Arr::except($validated, ['gallery_photos', 'image']);
        $houseData['tag'] = 'Vakantiehuis';
        $houseData['icon'] = '🏡';
        $houseData['class_theme'] = 'img-forest';

        $house = \App\Models\VacationHouse::create($houseData);

        // Handle Gallery Photos Upload
        if ($request->hasFile('gallery_photos')) {
            foreach ($request->file('gallery_photos') as $index => $photo) {
                $path = $photo->store('gallery', 'public');
                Foto::create([
                    'vacation_house_id' => $house->id,
                    'url' => $path,
                    'sort_order' => $index + 1
                ]);
            }
        }

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

    // Delete the PDF of a specific house
    public function deleteHousePdf(Request $request)
    {
        $house = VacationHouse::findOrFail($request->input('house_id'));

        if ($house->pdf_path) {
            Storage::disk('public')->delete($house->pdf_path);
            $house->pdf_path = null;
            $house->save();
        }

        return redirect()->route('admin.cms.index')->with('success', 'PDF van het huisje succesvol verwijderd!');
    }

    // Delete an entire house (including its photo from storage)
    public function deleteHouse(Request $request)
    {
        $house = VacationHouse::findOrFail($request->input('house_id'));

        // Also remove the image file from disk if it exists
        if ($house->image_path) {
            Storage::disk('public')->delete($house->image_path);
        }

        // Also remove the PDF file from disk if it exists
        if ($house->pdf_path) {
            Storage::disk('public')->delete($house->pdf_path);
        }

        // Delete all gallery photos
        foreach ($house->fotos as $foto) {
            Storage::disk('public')->delete($foto->url);
            $foto->delete();
        }

        $house->delete();

        return redirect()->route('admin.cms.index')->with('success', 'Vakantiehuisje succesvol verwijderd!');
    }

    // Delete a single gallery photo
    public function deleteGalleryPhoto(Request $request)
    {
        $foto = Foto::findOrFail($request->input('foto_id'));
        
        if ($foto->url) {
            Storage::disk('public')->delete($foto->url);
        }

        $foto->delete();

        return redirect()->back()->with('success', 'Galerij foto succesvol verwijderd!');
    }
}
