@extends('admin.admin')

@section('content')

    <h2>Edit Event</h2>
    @if($event)
    <div>

        <div class="p-2">
            <form action="{{ route('admin.destroy', $event) }}" method="post">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger">Remove Event</button>
            </form>
        </div>

        <div>
            <form action="{{ route('admin.update', $event) }}" method="post">
                @csrf
                <label for="event_name">Event name:</label><br>
                <textarea id="event_name" name="event_name" rows="10" cols="30">{{ $event->event_name }}</textarea><br>
                @error('event_name')<div>{{ $message }}</div>@enderror
                <label for="event_description">Event Description:</label><br>
                <textarea name="event_description" id="event_description" rows="10" cols="30" >{{ $event->event_description }}</textarea><br>
                @error('event_description')<div>{{ $message }}</div>@enderror
                <label for="event_date">Event Date:</label><br>
                <input type="date" id="event_date" name="event_date" min="{{ date('Y/m/d') }}" value="{{ $event->event_date }}" ><br>
                @error('event_date')<div>{{ $message }}</div>@enderror

                <p>Event Time: ( Hour:Minute )</p>
                <div class="d-flex">

                    <label for="event_time_hour">Hour:</label>
                    <select id="event_time_hour" name="event_time_hour">
                        @for ($i = 0; $i <= 24; $i++)
                            <option value= @php echo $i; @endphp @php echo date('G', $event->event_time) == $i ? 'selected' : ''; @endphp>
                                @php echo $i; @endphp
                            </option>
                        @endfor
                    </select>

                    <label for="event_time_minutes">Minutes:</label>
                    <select id="event_time_minutes" name="event_time_minutes">
                        @for ($i = 0; $i <= 60; $i++)
                            <option value= @php echo $i; @endphp @php echo date('i', $event->event_time) == $i ? "selected" : ""; @endphp>
                                @php echo $i; @endphp
                            </option>
                        @endfor
                    </select>
                    @error('event_time')<div>{{ $message }}</div>@enderror
                    <br><br>

                </div>

                <label for="vip_ticket_price">VIP Ticket Price:</label><br>
                <input type="text" id="vip_ticket_price" name="vip_ticket_price" value="{{ $event->vip_ticket_price }}"><br>
                @error('vip_ticket_price')<div>{{ $message }}</div>@enderror
                <label for="regular_ticket_price">Regular Ticket Price:</label><br>
                <input type="text" id="regular_ticket_price" name="regular_ticket_price" value="{{ $event->regular_ticket_price }}"><br>
                @error('regular_ticket_price')<div>{{ $message }}</div>@enderror
                <label for="max_attendance_vip">Max Attendance VIP:</label><br>
                <input type="text" id="max_attendance_vip" name="max_attendance_vip" value="{{ $event->max_vip_attendees }}"><br>
                @error('max_attendance_vip')<div>{{ $message }}</div>@enderror
                <label for="max_attendance_regular">Max Attendance Regular:</label><br>
                <input type="text" id="max_attendance_regular" name="max_attendance_regular" value="{{ $event->max_regular_attendees }}"><br>
                @error('max_attendance_regular')<div>{{ $message }}</div>@enderror
                <p>Already Booked: {{ $event->tickets->count() }}</p>
                <p>VIP: {{ $event->tickets()->where('ticket_type', "VIP")->count() }}</p>
                <p>Regular: {{ $event->tickets()->where('ticket_type', "Regular")->count() }}</p>
                <button type="submit">Save Changes</button>
            </form>
        </div>

    </div>

@else
    <p>Something went wrong</p>
@endif

@endsection