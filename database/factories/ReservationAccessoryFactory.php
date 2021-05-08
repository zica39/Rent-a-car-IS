<?php

namespace Database\Factories;

use App\Models\ReservationAccessory;
use Illuminate\Database\Eloquent\Factories\Factory;

class ReservationAccessoryFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ReservationAccessory::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'reservation_id'=>$this->faker->numberBetween(1,10),
            'accessory_id'=>$this->faker->numberBetween(1,5)
        ];
    }
}
