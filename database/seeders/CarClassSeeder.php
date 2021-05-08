<?php

namespace Database\Seeders;

use App\Models\CarClass;
use App\Models\Location;
use Illuminate\Database\Seeder;

class CarClassSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    static function run()
    {
        $classes = ['Sedan','Sports','Luxury'];
        foreach ($classes as $class){
            CarClass::query()->create(['name'=>$class]);
        }
    }
}
