<?php

namespace Database\Seeders;

use App\Models\Accessory;
use App\Models\CarClass;
use Illuminate\Database\Seeder;

class AccessorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    static function run()
    {
        $accessories = ['Child seat', 'Air conditioning','Chauffeur services','Winter Equipment', 'Premium Sound System'];
        foreach ($accessories as $accessory){
            Accessory::query()->create(['name'=>$accessory]);
        }
    }
}
