@props(['ticket' => $ticket, 'long' => $long])

<div class = "p-2 mt-4 bg-light border">
    <div>
        <div>
            @if($long)
                <p>Event: {{ $ticket->event->event_name }}</p>
                <p>Ticket Name:<br>{{ $ticket->ticket_name }}</p>
            @else
                <a href="{{ route('ticket.info', $ticket) }}">
                    <div class="mx-1">
                        <p>Event: {{ $ticket->event->event_name }}</p>
                        <p>Ticket name:<br>{{ $ticket->ticket_name }}</p>
                    </div>
                </a>
            @endif
            <hr/>
        </div>
        <div>
            @if($long)
                <p>Name: {{ $ticket->user->name }}</p>
                <p>Email: {{ $ticket->user->email }}</p>
            @endif
            <p>Ticket Type: {{ $ticket->ticket_type }}</p>
            <p>Date of Event: {{ $ticket->event->event_date }}</p>
            <p>Booked At: {{ $ticket->created_at }}</p>
        </div>
        @if($long)
            <div>
                <form action="{{ route('ticket.delete', $ticket) }}" method="post">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger" type="submit">Cancel Ticket</button>
                </form>
            </div>
        @endif
    </div>
</div>