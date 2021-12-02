@extends('layouts.app')

@section('content')

    @if($events->count())
    
        @foreach($events as $event)
            <x-event :event='$event' />
        @endforeach

        <div class="p-2">
            {{ $events->links('pagination::bootstrap-4') }}
        </div>

    @else
        <p>There are no events</p>
    @endif

@endsection