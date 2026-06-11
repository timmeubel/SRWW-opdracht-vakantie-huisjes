<?php

namespace Database\Seeders;

use App\Models\VacationHouse;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class HouseSeeder extends Seeder
{
    public function run(): void
    {
        // House 1
        VacationHouse::create([
            'name' => 'Bosvilla De Zwijger',
            'location' => 'Veluwe',
            'guests' => 6,
            'bedrooms' => 3,
            'tag' => 'Bosvilla',
            'icon' => '🏡',
            'class_theme' => 'img-forest',
            'short_description' => 'Een prachtige, moderne bosvilla met een grote privétuin...',
            'long_description' => 'Bosvilla De Zwijger biedt de ultieme rustzoeker een oase...',
            'amenities' => 'Finse Sauna, Sfeervolle Open Haard, Grote Privétuin',
        ]);

        // House 2
        VacationHouse::create([
            'name' => 'Duinhuisje Zandvoort',
            'location' => 'Zandvoort',
            'guests' => 4,
            'bedrooms' => 2,
            'tag' => 'Duinhuis',
            'icon' => '🏖️',
            'class_theme' => 'img-beach',
            'short_description' => 'Stijlvol duinhuis op slechts 5 minuten lopen van het strand...',
            'long_description' => 'Dit stijlvolle, moderne duinhuisje ligt verscholen...',
            'amenities' => '5min van het Strand, Ruim Privéterras, Luxe Regendouche',
        ]);

        // (You would add houses 3, 4, 5, and 6 here right below)
    }
}
