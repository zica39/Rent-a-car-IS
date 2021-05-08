<?php

namespace Database\Seeders;

use App\Models\Location;
use Illuminate\Database\Seeder;

class LocationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    static function run()
    {
        $locations = ['Podgorica Airport','Tivat Airport'];
        foreach ($locations as $location){
            Location::query()->create(['name'=>$location]);
        }
    }
}
