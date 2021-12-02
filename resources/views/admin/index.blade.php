@extends('admin.admin')

@section('content')

    <div class="row">
        
        <div class="col-4 pt-3 fixed-posi">
            <button class="btn btn-primary"><a href="{{ route('admin.add') }}" class="text-decoration-none text-white">Add a new Event</a></button>
        </div>

        <div class="col-8 container d-grid gap-1">
            @if($events->count())

                @foreach($events as $event)
                    <div class = "p-2 mt-2 bg-light border">
                        <a href="{{ route('admin.edit', $event) }}">{{ $event->event_name }}</a>
                        <p>{{ $event->event_description }}</p>
                        <p>Event_Date: {{ $event->event_date }}</p>
                        <p>Event_Time: {{ $event->event_start_time }}</p>
                    </div>
                @endforeach

                <div class="p-2">
                    {{ $events->links('pagination::bootstrap-4') }}
                </div>
                

            @else
                <p>There are no events</p>
            @endif
        </div>

    </div>

@endsection