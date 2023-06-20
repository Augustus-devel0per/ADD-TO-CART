<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tickets;
use App\Models\User;

class TicketController extends Controller
{
    public function index(){
        return view('welcome');
    }

    public function viewTickets(){
        return view('ticket-layout');
    }


    // CRUD 
    public function addTicket(){
        return view('add-ticket');
    }

    public function createTicket(Request $request){

        $events = new Tickets();

        $randomNumber = random_int(100000, 999999);

        $events->title = $request->event_title;
        $events->description = $request->event_description;
        $events->ticket_number = $randomNumber;
        $events->date = $request->event_date;
        $events->location = $request->event_location;
        $events->amount = $request->event_amount;
        $events->status = $request->event_status;

        $image = $request->file('event_image');
        $imageName = time().'.'.$image->getClientOriginalName();
        $image->move(public_path('images'), $imageName);
        
        $events->ticket_image = $imageName;
        $events->save();

        // dd($request->all());
        return redirect()->route('ticket.add', ['user' => $request->user()])->with('created', 'Your event has been created succesfully!');
    }

    public function getTickets(){
        $tickets =  Tickets::orderBy('id','DESC')->get();
        return view('tickets', compact('tickets'));
    }

    public function getTicketById($id){
        $ticket = Tickets::where('id',$id)->first();
        return view('single-ticket', compact('ticket'));
    }
}
