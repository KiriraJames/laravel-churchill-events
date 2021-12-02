<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class EventsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $events = Event::with(['tickets'])->orderByDesc('event_date')->paginate(10);
        // return view('events.index', [
        //     'events' => $events
        // ]);
        return view('home', [
            'events' => $events
        ]);
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Event $event)
    {
        return view('events.info', [
            'event' => $event
        ]);
    }

    public function search(Request $request)
    {

        if($request->filled('event-name')){
            $events = Event::where('event_name', 'like', '%'.$request->input('event-name').'%')->paginate(10);
            return view('events.search', [
                'events' => $events,
                'search_tag' => $request->input('event-name')
            ]);
        } else if ($request->filled('event-date')) {
            $events = Event::where('event_date', $request->input('event-date'))->paginate(10);
            return view('events.search', [
                'events' => $events,
                'search_tag' => $request->input('event-date')
            ]);
        } else {
            return view('events.search', [ 
                'events' => collect(),
                'search_tag' => false 
            ]);
        }

    }

}
