@props(['event' => $event])

<div class = "p-2 mt-2 bg-light border">
    <a href="{{ route('event.info', $event) }}">
        <div class="d-flex p-1 border border-secondary border-top-0 border-left-0 border-right-0">
            <h4>{{ $event->event_name }}</h4>
        </div>
    </a>

    <div class="p-1">
        <!-- max_vip_attendees	max_regular_attendees	 	 -->
        <p>Date: {{ $event->event_date }}</p>
        <p>Time: {{ $event->event_start_time }}</p>
        <p>VIP: {{ $event->vip_ticket_price }}</p>
        <p>Regular: {{ $event->regular_ticket_price }}</p>
        <p>{{ $event->tickets->count() }} going</p>
    </div>

    <div class="p-1">
        @if ( auth()->user() && $event->tickets->contains('user_id', auth()->user()->id) )
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

</div>