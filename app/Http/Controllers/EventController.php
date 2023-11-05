<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Exception;
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
            'event_title' => 'required|unique:events,title|min:5|max:100',
            'event_description' => 'nullable',
            'start_date' => 'required',
            'end_date' => 'required|after:start_date',
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
            ->where('tickets.is_approve', 1)
            ->select('events.*', 'tickets.*')
            ->get();
        return view('pages.user_pages.my_event', ['user_event' => $user_event]);
    }

    public function editUserEvent(Request $request)
    {
        $user_input = $request->validate([
            'event_title' => 'required|unique:events,title|min:5|max:100',
            'event_description' => 'nullable',
            'start_date' => 'required',
            'end_date' => 'required|after:start_date',
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
            'updated_at' => Carbon::now()
        ];

        DB::table('events')
        ->where('id', $request['event_id'])
        ->update($event_input);

        return redirect('/myevent/'.$request['event_id'].'/info');
    }

    public function deleteUserEvent(Request $request)
    {
        DB::table('events')->where('id', $request['event_id'])->delete();
        return redirect('/myevent');
    }

    public function showEventInfo($id)
    {
        $state = [
            'Johor', 'Kedah', 'Kelantan', 'Kuala Lumpur', 'Melaka',
            'Negeri Sembilan', 'Pahang', 'Penang', 'Perak',
            'Perlis', 'Putrajaya', 'Sabah', 'Sarawak', 'Selangor', 'Terengganu'
        ];
        $event_id = $id;
        $event = DB::table('events')
            ->join('tickets', 'tickets.event_id', '=', 'events.id')
            ->join('users', 'users.id', '=', 'tickets.user_id')
            ->where('events.id', '=', $event_id)
            ->where('user_id', auth()->id())
            ->where('is_approve', 1)
            ->select('events.*', 'tickets.*', 'users.username')
            ->get()->first();

        $ticket_count = DB::table('events')
            ->join('tickets', 'tickets.event_id', '=', 'events.id')
            ->where('tickets.event_id', '=', $event_id)
            ->where('tickets.is_organizer', '=', 0)
            ->where('tickets.is_assistant', '=', 0)
            ->where('tickets.is_approve', '=', 1)
            ->where('tickets.user_id', '=', auth()->id())
            ->select('tickets.*')
            ->get()->count();

        if ($event == null) {
            return redirect('/myevent');
        } else {
            return view('pages.my_event_pages.info', ['event' => $event, 'ticket_count' => $ticket_count, 'event_id' => $event_id, 'state' => $state]);
        }
    }


    public function showAllEvent()
    {
        $all_events = DB::table('events')
            ->where('is_private', 0)
            ->whereIn('id', function ($query) {
                $query->select('event_id')
                    ->where('user_id', '!=', auth()->id())
                    ->where('is_organizer', 1)
                    ->from('tickets')
                    ->groupBy('event_id');
            })
            ->get();

        return view('pages.events', ['all_events' => $all_events]);
    }

    public function showSelectedEvent($id)
    {
        $event_id = $id;
        $event = DB::table('events')
            ->join('tickets', 'tickets.event_id', '=', 'events.id')
            ->join('users', 'users.id', '=', 'tickets.user_id')
            ->where('events.id', '=', $event_id)
            ->select('events.*', 'tickets.*', 'users.username')
            ->get();

        $ticket_count = DB::table('events')
            ->join('tickets', 'tickets.event_id', '=', 'events.id')
            ->where('tickets.event_id', '=', $event_id)
            ->where('tickets.is_organizer', '=', 0)
            ->where('tickets.is_assistant', '=', 0)
            ->select('tickets.*')
            ->get()->count();

        return view('pages.eventinfo', ['event' => $event, 'ticket_count' => $ticket_count]);
    }

    public function joinSelectedEvent(Request $request)
    {

        try {
            $ticket_input = [
                'user_id' => auth()->id(),
                'event_id' => $request['event_id'],
                'updated_at' => Carbon::now(),
                'created_at' => Carbon::now()
            ];

            DB::table('tickets')->insert($ticket_input);

            return redirect('/myevent');

        } catch (Exception $e) {
            return redirect('/events');
        }
    }

    public function showEventSchedule($id)
    {
        $event_id = $id;
        $activity_list = DB::table('schedules')
        ->where('event_id', $event_id)
        ->get();

        return view('pages.my_event_pages.schedule', ['event_id' => $event_id, 'activity_list' => $activity_list]);
    }

    public function addEventActivity(Request $request, $id){

        $event_id = $id;
        $user_input = $request->validate([
            'event_activity' => 'required|min:5|max:100',
            'time_date_start' => 'required'
        ]);

        $schedule_activity = [
            'activity' => $user_input['event_activity'],
            'timeline' => $user_input['time_date_start'],
            'event_id' => $event_id,
            'updated_at' => Carbon::now(),
            'created_at' => Carbon::now()
        ];

        DB::table('schedules')->insert($schedule_activity);
        
        return redirect('/myevent/'.$event_id.'/schedule');
    }

    public function removeEventActivity(Request $request, $id){

        DB::table('schedules')
        ->where('id', $request['activity_id'])
        ->delete();

        return redirect('/myevent/'.$id.'/schedule');
    }
}
