@extends('layouts.app')

@section('content')

    <x-eventsearchbar />
    
    <div class="mt-3">

        @if($events->count())
        
            @foreach($events as $event)
                <x-event :event='$event' />
            @endforeach

            <div class="p-2 mt-2">
                {{ $events->links('pagination::bootstrap-4') }}
            </div>
        
        @else
            <p>There are no events</p>
        @endif

    </div>

@endsection
