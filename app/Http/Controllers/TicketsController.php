<?php

namespace App\Http\Controllers;

use App\Mail\EventBooked;

use App\Models\Ticket;
use App\Models\Event;
use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class TicketsController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $tickets = $request->user()->tickets()->with(['user', 'event'])->paginate(20);
        
        return view('tickets.mytickets', [
            'tickets' => $tickets,
            'paginated' => True
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Event $event, Request $request)
    {
        $tickets_already_registered = $event->tickets->where("user_id", $request->user()->id)->count();

        if($tickets_already_registered >= 5){
            
            return view('tickets.book', [
                'event' => $event,
                'above_limit' => True
            ]);

        } else {

            return view('tickets.book', [
                'event' => $event,
                'above_limit' => False
            ]);
        
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Event $event, Request $request)
    {
        $this->validate($request, [
            'ticket_type' => 'required'
        ]);
        
        $request->user()->tickets()->create([
            'event_id' => $event->id,
            'ticket_name' => $event->event_date."_".$event->event_name."_".$event->tickets->count(),
            'ticket_type' => $request->ticket_type
        ]);

        Mail::to($request->user())->send(new EventBooked($request->user(), $event));

        return redirect()->route('tickets');
 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Ticket $ticket)
    {
        return view('tickets.info', [
            'ticket' => $ticket
        ]);
    }


    public function show_multiple(Event $event, Request $request)
    {
        
        $tickets = $event->tickets->where("user_id", $request->user()->id);

        return view('tickets.search', [
            'tickets' => $tickets,
        ]);
    }

    public function search(Request $request)
    {
        
        $tickets = $event->tickets->where("user_id", $request->user()->id);

        return view('tickets.mytickets', [
            'tickets' => $tickets,
            'paginated' => False
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ticket $ticket)
    {
        $ticket->delete();

        return redirect()->route('tickets');
    }
}
