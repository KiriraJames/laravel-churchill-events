@extends('layouts.app')

@section('content')

    <h1> {{ auth()->user()->name }} </h1>

    @if($ticket)
        <x-ticket :ticket='$ticket' :long=True />
    @else
        <p>something went wrong</p>
    @endif

@endsection