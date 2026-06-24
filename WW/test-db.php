<?php
require 'vendor/autoload.php';
$app = require_once 'bootstrap/app.php';
$app->make('Illuminate\Contracts\Console\Kernel')->bootstrap();

try {
    echo "Attempting to create a Foto record...\n";
    $foto = App\Models\Foto::create([
        'vacation_house_id' => 1,
        'url' => 'gallery/test.jpg',
        'sort_order' => 1
    ]);
    echo "SUCCESS! Created Foto with ID: " . $foto->id . "\n";
    
    // Clean up
    $foto->delete();
    echo "Deleted test Foto.\n";
} catch (\Exception $e) {
    echo "ERROR: " . $e->getMessage() . "\n";
}
