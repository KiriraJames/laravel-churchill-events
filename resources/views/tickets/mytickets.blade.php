@extends('layouts.app')

@section('content')

    <h1> Tickets for {{ auth()->user()->name }} </h1>

    @if($tickets->count())
        @foreach($tickets as $ticket)
            <x-ticket :ticket='$ticket' :long=False />
        @endforeach

        @if($paginated)
            <div class="p-2">
                    {{ $tickets->links('pagination::bootstrap-4') }}
            </div>
        @endif
    @else
        <p>There are no tickets</p>
    @endif

@endsection