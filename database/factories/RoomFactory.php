<?php

namespace Database\Factories;

use App\Models\Hotel;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Room>
 */
class RoomFactory extends Factory
{

    /**
     * @return array|mixed[]
     */
    public function definition(): array
    {
        return [
            'hotel_id' => Hotel::inRandomOrder()->first()->id,
            'room_number'=>$this->faker->unique()->numberBetween(101,500),
            'room_type'=>$this->faker->randomElement(['single','double','suite']),
            'status'=>$this->faker->randomElement(['available','booked','unavailable']),
            'price'=>$this->faker->numberBetween(50,500),
        ];
    }
}
