@extends('layouts.app')

@section('content')

    @if($event)
        <div class = "p-2 mt-2 bg-light border">
            <div>
                <h1>{{ $event->event_name }}</h1>
            </div>

            <div>
                <p>{{ $event->event_description }}</p>
            </div>

            <div>
                <p>Date: {{ $event->event_date }}</p>
                <p>Time: {{ $event->event_start_time }}</p>
                <p>VIP: {{ $event->vip_ticket_price }}</p>
                <p>Regular: {{ $event->regular_ticket_price }}</p>
                <p>Attending: {{ $event->tickets->count() }} going</p>
                <hr/>
            </div>

            <div>
                <p>Available Tickets:</p>
                <p>VIP: {{ $event->max_vip_attendees - $event->tickets()->where('ticket_type', "VIP")->count() }}</p>
                <p>Regular: {{ $event->max_regular_attendees - $event->tickets()->where('ticket_type', "Regular")->count() }}</p>
            </div>

            @if (auth()->user() && $event->tickets->contains('user_id', auth()->user()->id) )
                <!-- check if user has already booked -->
                <span>
                <p>You have <span class="text-success">{{ $event->tickets->where('user_id', auth()->user()->id)->count() }} tickets</span> to this event</p>
                <a href="{{ route('ticket.event.info', $event ) }}"><button class="btn btn-primary">View Tickets</button></a>
            </span>
            @endif
            
            <span>
                <a href="{{ route('ticket.book', $event) }}" class="text-white text-decoration-none"><button class="btn btn-success">Book a ticket</a></button>
            </span>
            
        </div>

    @else
        <p class="text-danger">Something went wrong</p>
    @endif

@endsection