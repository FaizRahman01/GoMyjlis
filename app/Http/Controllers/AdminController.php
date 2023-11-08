<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    //
    public function showAllUsers()
    {
        $user_list = DB::table('users')
            ->join('tickets', 'tickets.user_id', '=', 'users.id')
            ->select('username', 'users.created_at', DB::raw('count(tickets.is_organizer) as organize_count'))
            ->groupBy('users.username', 'users.created_at')
            ->get();

        return view('pages.admin_pages.manage_user', ['user_list' => $user_list]);
    }

    public function showAllUserEvents($user)
    {
        $user_detail = DB::table('users')
            ->select('username', 'email', 'created_at')
            ->where('username', $user)
            ->get();

        $user_id = DB::table('users')
            ->select('id')
            ->where('username', $user)
            ->get()->first();

        $user_num = json_decode($user_id->id, true);

        $event_list = DB::table('events')
            ->join('tickets', 'tickets.event_id', '=', 'events.id')
            ->select('events.id', 'title', 'events.created_at')
            ->where('tickets.user_id', $user_num)
            ->where('is_organizer', 1)
            ->get();

        return view('pages.admin_pages.manage_user_event', ['user_detail' => $user_detail, 'event_list' => $event_list, 'user' => $user]);
    }

    public function showEventOverview($event_id)
    {
        $event_organizer = DB::table('users')
            ->join('tickets', 'tickets.user_id', '=', 'users.id')
            ->select('username', 'is_organizer', 'is_assistant')
            ->where('event_id', $event_id)
            ->where('is_organizer', 1)
            ->where('is_assistant', 0)
            ->get()->first();

        $event_assistant = DB::table('users')
            ->join('tickets', 'tickets.user_id', '=', 'users.id')
            ->select('username', 'is_organizer', 'is_assistant')
            ->where('event_id', $event_id)
            ->where('is_organizer', 0)
            ->where('is_assistant', 1)
            ->get();

        $attendee_count = DB::table('tickets')
            ->where('event_id', $event_id)
            ->where('is_organizer', 0)
            ->where('is_assistant', 0)
            ->where('is_approve', 1)
            ->get()->count();

        $attendee_list = DB::table('users')
            ->join('tickets', 'tickets.user_id', '=', 'users.id')
            ->select('tickets.id', 'username', 'is_organizer', 'is_assistant', 'tickets.updated_at')
            ->where('tickets.event_id', $event_id)
            ->where('is_organizer', 0)
            ->where('is_assistant', 0)
            ->where('is_approve', 1)
            ->get();

        $event_team = [$event_organizer, $event_assistant];
        $attendee_detail = [$attendee_count, $attendee_list];

        return view('pages.admin_pages.manage_event', ['event_team' => $event_team, 'attendee_detail' => $attendee_detail, 'event_id' => $event_id]);
    }

    public function kickEventAttendee($event_id, $ticket_id)
    {
        DB::table('tickets')
            ->where('id', $ticket_id)
            ->delete();

        return redirect('/admin/manage-event/' . $event_id . '');
    }

    public function deleteUserEvent($id)
    {
        DB::table('events')
            ->where('id', $id)
            ->delete();

        return redirect('/admin/manage-user');
    }

    public function deleteUserAccount($id)
    {
        DB::table('users')
            ->where('username', $id)
            ->delete();

        return redirect('/admin/manage-user');
    }
}
