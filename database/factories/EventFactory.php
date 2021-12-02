<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class EventFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'event_name' => $this->faker->sentence(10),
            'event_description' => $this->faker->sentence(20),
            'event_date' => $this->faker->date('Y_m_d'),
            'event_start_time' => $this->faker->time(),
            'vip_ticket_price' => $this->faker->randomNumber(4, true),
            'regular_ticket_price' => $this->faker->randomNumber(4, true),
            'max_vip_attendees' => $this->faker->randomNumber(2, true),
            'max_regular_attendees' => $this->faker->randomNumber(3, true),
        ];
    }
}
