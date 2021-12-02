@extends('layouts.app')

@section('content')
    
    <x-eventsearchbar />
    
    @if($search_tag)

        <div class="mt-3 p-2">
            <h4>Search Results for "{{ $search_tag }}"</h4>
        </div>

        <div class="mt-3">
            @if($events->count())
            
                @foreach($events as $event)
                    <x-event :event='$event' />
                @endforeach

                <div class="p-2 mt-2">
                    {{ $events->links('pagination::bootstrap-4') }}
                </div>
            
            @else
                <p>There are no events for your search.</p>
            @endif
        </div>

    @endif

@endsection
