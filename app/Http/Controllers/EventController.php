<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
        return view('pages.user_pages.my_event');
    }

    public function showAllEvent()
    {
        return view('pages.events');
    }

    public function showSelectedEvent()
    {
        return view('pages.eventinfo');
    }

    public function showEventInfo()
    {
        return view('pages.my_event_pages.info');
    }

    public function showEventSchedule()
    {
        return view('pages.my_event_pages.schedule');
    }
}
