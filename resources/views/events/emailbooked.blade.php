@component('mail::message')
# Churchill Events

Hey {{ $user->name }},<br>

You've booked a ticket to see {{ $event->event_name }}<br>
See you there!

@component('mail::button', ['url' => route('event.info', $event )])
Event details
@endcomponent

@component('mail::button', ['url' => route('tickets')])
Your Tickets
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
