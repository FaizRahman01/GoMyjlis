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
        return view('pages.my_event_pages.support', ['event_id' => $event_id]);
    }

    public function showEventTask($id)
    {
        $event_id = $id;
        $task_list = DB::table('tasks')->where('event_id', $event_id)->get();

        return view('pages.my_event_pages.task', ['event_id' => $event_id, 'task_list' => $task_list]);
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
        
        return redirect('/myevent/'.$event_id.'/task');
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

        return redirect('/myevent/'.$event_id.'/task');
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

        return redirect('/myevent/'.$event_id.'/task');
    }

    public function removeTask(Request $request, $id)
    {
        $event_id = $id;

        DB::table('tasks')
        ->where('id', $request['task_id'])
        ->where('event_id', $event_id)
        ->delete();

        return redirect('/myevent/'.$event_id.'/task');
    }

    public function showEventVendor($id)
    {
        $event_id = $id;
        return view('pages.my_event_pages.vendor', ['event_id' => $event_id]);
    }
}
