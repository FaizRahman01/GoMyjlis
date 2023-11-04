<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use function Laravel\Prompts\table;

class EventController extends Controller
{
    //
    public function showEventForm()
    {
        $state = [
            'Johor', 'Kedah', 'Kelantan', 'Kuala Lumpur', 'Melaka',
            'Negeri Sembilan', 'Pahang', 'Penang', 'Perak',
            'Perlis', 'Putrajaya', 'Sabah', 'Sarawak', 'Selangor', 'Terengganu'
        ];
        return view('pages.user_pages.create_event', ['state' => $state]);
    }

    public function createNewEvent(Request $request)
    {
        $user_input = $request->validate([
            'event_title' => 'required|min:5|max:100',
            'event_description' => 'nullable',
            'start_date' => 'required',
            'end_date' => 'required',
            'address' => 'nullable',
            'state' => 'required',
            'event_mode' => 'required',
            'visibility' => 'required',
        ]);

        $visibility_value = $user_input['visibility'] == 'Public' ? 0 : 1;
        $event_input = [
            'title' => strip_tags($user_input['event_title']),
            'description' => strip_tags($user_input['event_description']),
            'start_date' => $user_input['start_date'],
            'end_date' => $user_input['end_date'],
            'address' => strip_tags($user_input['address']),
            'state' => $user_input['state'],
            'event_mode' => $user_input['event_mode'],
            'is_private' => $visibility_value,
            'updated_at' => Carbon::now(),
            'created_at' => Carbon::now()
        ];

        $event_data = DB::table('events')->insertGetId($event_input);

        $ticket_input = [
            'user_id' => auth()->id(),
            'event_id' => $event_data,
            'is_organizer' => 1,
            'is_approve' => 1,
            'updated_at' => Carbon::now(),
            'created_at' => Carbon::now()
        ];

        DB::table('tickets')->insert($ticket_input);

        return redirect('/myevent');
    }

    public function showUserEvent()
    {
        $user_event = DB::table('events')
            ->join('tickets', 'tickets.event_id', '=', 'events.id')
            ->join('users', 'users.id', '=', 'tickets.user_id')
            ->where('users.id', '=', auth()->id())
            ->select('events.*', 'tickets.*')
            ->get();
        return view('pages.user_pages.my_event', ['user_event' => $user_event]);
    }

    public function showAllEvent()
    {
        $events = DB::table('events')->where('is_private', '=', 0)->get();
        return view('pages.events', ['events' => $events]);
    }

    public function showSelectedEvent($id)
    {
        $event = DB::table('events')
            ->join('tickets', 'tickets.event_id', '=', 'events.id')
            ->join('users', 'users.id', '=', 'tickets.user_id')
            ->where('events.id', '=', $id)
            ->select('events.*', 'tickets.*', 'users.username')
            ->get();

        $ticket_count = DB::table('events')
            ->join('tickets', 'tickets.event_id', '=', 'events.id')
            ->where('tickets.event_id', '=', $id)
            ->where('tickets.is_organizer', '=', 0)
            ->where('tickets.is_assistant', '=', 0)
            ->select('tickets.*')
            ->get()->count();

        return view('pages.eventinfo', ['event' => $event, 'ticket_count' => $ticket_count]);
    }

    public function showEventInfo($id)
    {
        $event = DB::table('events')
            ->join('tickets', 'tickets.event_id', '=', 'events.id')
            ->join('users', 'users.id', '=', 'tickets.user_id')
            ->where('events.id', '=', $id)
            ->where('tickets.is_approve', '=', 1)
            ->where('users.id', '=', auth()->id())
            ->select('events.*', 'tickets.*', 'users.username')
            ->get();

        $ticket_count = DB::table('events')
            ->join('tickets', 'tickets.event_id', '=', 'events.id')
            ->where('tickets.event_id', '=', $id)
            ->where('tickets.is_organizer', '=', 0)
            ->where('tickets.is_assistant', '=', 0)
            ->where('tickets.is_approve', '=', 1)
            ->where('tickets.user_id', '=', auth()->id())
            ->select('tickets.*')
            ->get()->count();

        if ($event->isEmpty()) {
            return redirect('/myevent');
        } else {
            return view('pages.my_event_pages.info', ['event' => $event, 'ticket_count' => $ticket_count]);
        }
    }

    public function showEventSchedule()
    {
        return view('pages.my_event_pages.schedule');
    }
}
