<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TicketController extends Controller
{
    //
    public function showEventTicket($id)
    {
        $user_ticket = DB::table('events')
            ->join('tickets', 'tickets.event_id', '=', 'events.id')
            ->join('users', 'users.id', '=', 'tickets.user_id')
            ->where('events.id', '=', $id)
            ->where('tickets.is_approve', '=', 1)
            ->where('users.id', '=', auth()->id())
            ->select('events.*', 'tickets.*', 'users.username', 'users.email')
            ->get();

        if ($user_ticket->isEmpty()) {
            return redirect('/myevent');
        } else {
            return view('pages.my_event_pages.ticket', ['user_ticket' => $user_ticket]);
        }
    }

    public function showEventAttendee()
    {
        return view('pages.my_event_pages.attendee');
    }
}
