<?php

namespace Database\Factories;

use App\Models\Reservation;
use Illuminate\Database\Eloquent\Factories\Factory;

class ReservationFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Reservation::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id'=> $this->faker->numberBetween(1,10),
            'car_id'=> $this->faker->numberBetween(1,10),
            'pick_up_location'=> $this->faker->numberBetween(1,2),
            'return_location'=> $this->faker->numberBetween(1,2),
            'pick_up_date'=> $this->faker->date(),
            'return_date'=> $this->faker->date(),
            'total_price'=> $this->faker->numberBetween(5,1000),
            'pick_up_time'=>$this->faker->time(),
            'return_time'=>$this->faker->time()
        ];
    }
}
