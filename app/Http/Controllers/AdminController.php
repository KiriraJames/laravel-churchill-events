<?php

namespace App\Http\Controllers;

use App\Models\Event;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

use DateTime;

class AdminController extends Controller
{

    public function __construct()
    {
        $this->middleware(['admin']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $events = Event::with(['tickets'])->paginate(10);
        return view('admin.index', [
            'events' => $events
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        // $this->validate($request, [
        //     'event_name' => 'required',
        //     'event_description' => 'required',
        //     'event_date' => 'required',
        //     'event_time_hour' => 'required',
        //     'event_time_minutes' => 'required',
        //     'vip_ticket_price' => 'required',
        //     'regular_ticket_price' => 'required',
        //     'max_attendance_vip' => 'required',
        //     'max_attendees_regular' => 'required',
        // ]);

        
        $date = new DateTime($request->event_date);
        $date->setTime($request->event_time_hour, $request->event_time_minutes);

        $event = Event::create([
            'event_name' => $request->event_name,
            'event_description' => $request->event_description,
            'event_date' => $date->format('Y-m-d'),
            'event_start_time' => $date->format('H:i:s'),
            'vip_ticket_price' => $request->vip_ticket_price,
            'regular_ticket_price' => $request->regular_ticket_price,
            'max_vip_attendees' => $request->max_attendance_vip,
            'max_regular_attendees' => $request->max_attendance_regular,
            'slug_name' => Str::slug($request->event_name, "-")
        ]);

        return redirect()->route('admin');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Event $event)
    {
        return view('admin.edit', [
            'event' => $event
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Event $event, Request $request)
    {
        
        $date = new DateTime($request->event_date);
        $date->setTime($request->event_time_hour, $request->event_time_minutes);

        $event->event_name = $request->event_name;
        $event->event_description = $request->event_description;
        $event->event_date = $date->format('Y-m-d');
        $event->event_start_time = $date->format('H:i:s');
        $event->vip_ticket_price = $request->vip_ticket_price;
        $event->regular_ticket_price = $request->regular_ticket_price;
        $event->max_vip_attendees = $request->max_attendance_vip;
        $event->max_regular_attendees = $request->max_attendance_regular;
        $event->slug_name = Str::slug($request->event_name, "-");

        $event->save();
        
        return redirect()->route('admin.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Event $event)
    {
        $event->delete();

        return redirect()->route('admin');
    }
}
