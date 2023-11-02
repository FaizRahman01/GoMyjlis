<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TicketController extends Controller
{
    //
    public function showEventTicket()
    {
        return view('pages.my_event_pages.ticket');
    }

    public function showEventAttendee()
    {
        return view('pages.my_event_pages.attendee');
    }
}
