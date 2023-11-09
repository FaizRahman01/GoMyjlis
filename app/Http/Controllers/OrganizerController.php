<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrganizerController extends Controller
{
    //
    public function showEventSupport($id)
    {
        $event_id = $id;

        $issue_list = DB::table('supports')
            ->crossJoin('tickets', 'tickets.id', '=', 'supports.ticket_id')
            ->join('users', 'users.id', '=', 'tickets.user_id')
            ->select('supports.*', 'users.username')
            ->where('supports.event_id', $event_id)
            ->get();

        $event = DB::table('events')
            ->join('tickets', 'tickets.event_id', '=', 'events.id')
            ->join('users', 'users.id', '=', 'tickets.user_id')
            ->where('events.id', '=', $event_id)
            ->where('user_id', auth()->id())
            ->where('is_approve', 1)
            ->select('events.*', 'tickets.*', 'users.username')
            ->get()->first();

        if ($event == null) {
            return redirect('/myevent');
        } else {
            return view('pages.my_event_pages.support', ['event_id' => $event_id, 'issue_list' =>  $issue_list]);
        }
    }

    public function createSupportTicket(Request $request, $id)
    {
        $event_id = $id;
        $user_input = $request->validate([
            'issue_title' => 'required|min:5|max:100',
        ]);

        $ticket_id = DB::table('tickets')
            ->select('id')
            ->where('event_id', $event_id)
            ->where('user_id', auth()->id())
            ->get()->first();

        $ticket_num = json_decode($ticket_id->id, true);

        $issue_input = [
            'title' => $user_input['issue_title'],
            'ticket_id' => $ticket_num,
            'event_id' => $event_id,
            'updated_at' => Carbon::now(),
            'created_at' => Carbon::now()
        ];

        DB::table('supports')->insert($issue_input);

        return redirect('/myevent/' . $event_id . '/support');
    }

    public function showSupportChat($event_id, $support_id)
    {
        $support_status = DB::table('supports')
            ->select('title', 'is_close')
            ->where('id', $support_id)
            ->get()->first();

        $message_list = DB::table('support_messages')
            ->join('tickets', 'tickets.id', '=', 'support_messages.ticket_id')
            ->join('users', 'users.id', '=', 'tickets.user_id')
            ->select('support_messages.*', 'users.username')
            ->where('support_messages.support_id', $support_id)
            ->get();


        $event = DB::table('events')
            ->join('tickets', 'tickets.event_id', '=', 'events.id')
            ->join('users', 'users.id', '=', 'tickets.user_id')
            ->where('events.id', '=', $event_id)
            ->where('user_id', auth()->id())
            ->where('is_approve', 1)
            ->select('events.*', 'tickets.*', 'users.username')
            ->get()->first();

        if ($event == null) {
            return redirect('/myevent');
        } else {
            return view('pages.my_event_pages.support_message', ['event_id' => $event_id, 'support_id' => $support_id, 'message_list' => $message_list, 'support_status' => $support_status]);
        }
    }

    public function createSupportMessage(Request $request, $event_id, $support_id)
    {
        $user_input = $request->validate([
            'user-message' => 'required',
        ]);

        $ticket_id = DB::table('tickets')
            ->select('id')
            ->where('event_id', $event_id)
            ->where('user_id', auth()->id())
            ->get()->first();

        $ticket_num = json_decode($ticket_id->id, true);

        $message_input = [
            'message' => $user_input['user-message'],
            'ticket_id' => $ticket_num,
            'support_id' => $support_id,
            'updated_at' => Carbon::now(),
            'created_at' => Carbon::now()
        ];

        DB::table('support_messages')->insert($message_input);

        return redirect('/myevent/' . $event_id . '/support/' . $support_id . '');
    }


    public function closeSupportMessage($event_id, $support_id)
    {

        $close_message = [
            'is_close' => 1,
            'updated_at' => Carbon::now()
        ];

        DB::table('supports')
            ->where('id', $support_id)
            ->where('event_id', $event_id)
            ->update($close_message);

        return redirect('/myevent/' . $event_id . '/support/' . $support_id . '');
    }


    public function showEventTask($id)
    {
        $event_id = $id;
        $task_list = DB::table('tasks')->where('event_id', $event_id)->get();

        $event = DB::table('events')
            ->join('tickets', 'tickets.event_id', '=', 'events.id')
            ->join('users', 'users.id', '=', 'tickets.user_id')
            ->where('events.id', '=', $event_id)
            ->where('user_id', auth()->id())
            ->where('is_approve', 1)
            ->select('events.*', 'tickets.*', 'users.username')
            ->get()->first();

        if ($event == null) {
            return redirect('/myevent');
        } else {
            return view('pages.my_event_pages.task', ['event_id' => $event_id, 'task_list' => $task_list]);
        }
    }



    public function createEventTask(Request $request, $id)
    {
        $event_id = $id;
        $user_input = $request->validate([
            'task_title' => 'required|min:5|max:100',
            'task_description' => 'nullable'
        ]);

        $task_input = [
            'title' => $user_input['task_title'],
            'description' => $user_input['task_description'],
            'event_id' => $event_id,
            'updated_at' => Carbon::now(),
            'created_at' => Carbon::now()
        ];

        DB::table('tasks')->insert($task_input);

        return redirect('/myevent/' . $event_id . '/task');
    }

    public function setInProgressTask(Request $request, $id)
    {
        $event_id = $id;
        $inprogress_status = [
            'is_start' => 1,
            'updated_at' => Carbon::now()
        ];

        DB::table('tasks')
            ->where('id', $request['task_id'])
            ->where('event_id', $event_id)
            ->update($inprogress_status);

        return redirect('/myevent/' . $event_id . '/task');
    }

    public function setCompletedTask(Request $request, $id)
    {
        $event_id = $id;
        $inprogress_status = [
            'is_start' => 1,
            'is_complete' => 1,
            'updated_at' => Carbon::now()
        ];

        DB::table('tasks')
            ->where('id', $request['task_id'])
            ->where('event_id', $event_id)
            ->update($inprogress_status);

        return redirect('/myevent/' . $event_id . '/task');
    }

    public function removeTask(Request $request, $id)
    {
        $event_id = $id;

        DB::table('tasks')
            ->where('id', $request['task_id'])
            ->where('event_id', $event_id)
            ->delete();

        return redirect('/myevent/' . $event_id . '/task');
    }

    public function showEventVendor($id)
    {
        $event_id = $id;

        $vendor_list = DB::table('vendors')
            ->where('event_id', $event_id)
            ->get();

        $event = DB::table('events')
            ->join('tickets', 'tickets.event_id', '=', 'events.id')
            ->join('users', 'users.id', '=', 'tickets.user_id')
            ->where('events.id', '=', $event_id)
            ->where('user_id', auth()->id())
            ->where('is_approve', 1)
            ->select('events.*', 'tickets.*', 'users.username')
            ->get()->first();

        if ($event == null) {
            return redirect('/myevent');
        } else {
            return view('pages.my_event_pages.vendor', ['event_id' => $event_id, 'vendor_list' => $vendor_list]);
        }
    }

    public function createEventVendor(Request $request, $id)
    {

        $event_id = $id;
        $user_input = $request->validate([
            'vendor_name' => 'required|min:5|max:100',
            'phone_number' => 'required|regex:/(01)[0-9]{8}/',
            'address' => 'nullable',
            'service_category' => 'nullable|max:25'
        ], [
            'phone_number.regex' => 'Phone number need to begin with 01 and a total of 10 digit'
        ]);

        $vendor_input = [
            'name' => $user_input['vendor_name'],
            'contact_number' => $user_input['phone_number'],
            'address' => $user_input['address'],
            'category' => $user_input['service_category'],
            'event_id' => $event_id,
            'updated_at' => Carbon::now(),
            'created_at' => Carbon::now()
        ];

        DB::table('vendors')->insert($vendor_input);

        return redirect('/myevent/' . $event_id . '/vendor');
    }

    public function showVendorMessage($event_id, $vendor_id)
    {
        $vendor_detail = DB::table('vendors')
            ->where('id', $vendor_id)
            ->get()->first();

        $message_list = DB::table('vendor_updates')
            ->join('tickets', 'tickets.id', '=', 'vendor_updates.ticket_id')
            ->join('users', 'users.id', '=', 'tickets.user_id')
            ->select('vendor_updates.*', 'users.username')
            ->where('vendor_updates.vendor_id', $vendor_id)
            ->get();

        $event = DB::table('events')
            ->join('tickets', 'tickets.event_id', '=', 'events.id')
            ->join('users', 'users.id', '=', 'tickets.user_id')
            ->where('events.id', '=', $event_id)
            ->where('user_id', auth()->id())
            ->where('is_approve', 1)
            ->select('events.*', 'tickets.*', 'users.username')
            ->get()->first();

        if ($event == null) {
            return redirect('/myevent');
        } else {
            return view('pages.my_event_pages.vendor_status', ['event_id' => $event_id, 'vendor_id' => $vendor_id, 'message_list' => $message_list, 'vendor_detail' => $vendor_detail]);
        }
    }

    public function createVendorMessage(Request $request, $event_id, $vendor_id)
    {
        $user_input = $request->validate([
            'user-message' => 'required'
        ]);

        $ticket_id = DB::table('tickets')
            ->select('id')
            ->where('event_id', $event_id)
            ->where('user_id', auth()->id())
            ->get()->first();

        $ticket_num = json_decode($ticket_id->id, true);

        $message_input = [
            'message' => $user_input['user-message'],
            'ticket_id' => $ticket_num,
            'vendor_id' => $vendor_id,
            'updated_at' => Carbon::now(),
            'created_at' => Carbon::now()
        ];

        DB::table('vendor_updates')->insert($message_input);

        return redirect('/myevent/' . $event_id . '/vendor/' . $vendor_id . '');
    }
}
