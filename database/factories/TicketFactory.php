<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class TicketFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $ticket_types=array('VIP, Regular');

        return [
            'ticket_name' => $this->faker->sentence(3),
            //'ticket_type'=> $ticket_types[ random_int(0, 1) ],
        ];
    }
}
