<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'event_name',
        'event_description',
        'event_date',
        'event_start_time',
        'vip_ticket_price',
        'regular_ticket_price',
        'max_vip_attendees',
        'max_regular_attendees',
        'slug_name' 
    ];
    
    public function tickets()
    {
        return $this->hasMany(Ticket::class);
    }
}
