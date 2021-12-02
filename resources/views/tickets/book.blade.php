@extends('layouts.app')

@section('content')

    @if($event)

        <div class = "p-2 mt-2 bg-light border">
            <h3>{{ $event->event_name }}</h3>
            <p>Available Tickets:</p>
            <p>VIP: {{ $event->max_vip_attendees - $event->tickets()->where('ticket_type', "VIP")->count() }}</p>
            <p>Regular: {{ $event->max_regular_attendees - $event->tickets()->where('ticket_type', "Regular")->count() }}</p>
        </div>
        
        @if($above_limit)
            <div class="pt-3 mt-2">
                <h3>Sorry, you cannot book more than 5 tickets for one show</h3>
            </div>

        @else
            <div class="pt-3 mt-2">
                <form action="{{ route('ticket.save', $event) }}" method="post">
                    @csrf
                    <div>
                        <p>What type of ticket do you want?</p>
                        <input type="radio" id="VIP" name="ticket_type" value="VIP">
                        <label for="VIP">VIP        - Price: Kshs {{ $event->vip_ticket_price }}/- </label><br>
                        <input type="radio" id="Regular" name="ticket_type" value="Regular">
                        <label for="Regular">Regular        - Price: Kshs {{ $event->regular_ticket_price }}/- </label><br>
                        <button class="btn btn-primary" type="submit">Book Ticket</button>
                    </div>

                    <div>
                        @error('ticket_type')
                            <div class="text-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                </form>
            </div>
        @endif

    @else
        <p>something went wrong</p>
    @endif

@endsection