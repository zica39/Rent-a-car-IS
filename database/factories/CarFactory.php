<?php

namespace Database\Factories;

use App\Models\Car;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class CarFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Car::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'model' => $this->faker->company,
            'registration_number' => $this->faker->bankAccountNumber,
            'age' => $this->faker->year,
            'seats_number'=>$this->faker->numberBetween(1,10),
            'is_automatic'=>$this->faker->boolean,
            'fuel_type'=>$this->faker->lastName,
            'photos'=>'storage/photos/'.$this->faker->numberBetween(1,10).'.png',
            'price' => $this->faker->numberBetween(5,1000),
            'class_id' =>$this->faker->numberBetween(1,3)
        ];
    }
}
