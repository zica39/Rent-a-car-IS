<?php

namespace Database\Seeders;

use App\Models\Car;
use App\Models\Chat;
use App\Models\Country;
use App\Models\Reservation;
use App\Models\ReservationAccessory;
use App\Models\User;
use Database\Factories\UserFactory;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        LocationSeeder::run();
        CarClassSeeder::run();
        AccessorySeeder::run();
        Country::factory(10)->create();

        User::factory(10)->create();
        UserFactory::makeAdmin();

        Car::factory(10)->create();

        //Reservation::factory(10)->create();
        //ReservationAccessory::factory(5)->create();

        ChatSeeder::run();
    }
}
