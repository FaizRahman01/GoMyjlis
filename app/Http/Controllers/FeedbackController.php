<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FeedbackController extends Controller
{
    //
    public function showEventPoll($id)
    {
        $event_id = $id;
        return view('pages.my_event_pages.poll', ['event_id' => $event_id]);
    }

    public function showEventRating($id)
    {
        $event_id = $id;

        try {
            $ticket_id = DB::table('tickets')
                ->select('id')
                ->where('event_id', $event_id)
                ->where('user_id', auth()->id())
                ->get()->first();

            $ticket_num = json_decode($ticket_id->id, true);

            $rating_result = DB::table('ratings')
                ->join('rating_results', 'rating_results.rating_id', '=', 'ratings.id')
                ->where('ratings.ticket_id', $ticket_num)
                ->where('ratings.event_id', $event_id)
                ->get();

            return view('pages.my_event_pages.rating', ['event_id' => $event_id, 'rating_result' => $rating_result]);

        } catch (Exception $e) {
            return redirect('/myevent');
        }
    }

    public function createEventRating(Request $request, $id)
    {

        try {

            $event_id = $id;

            $ticket_id = DB::table('tickets')
                ->select('id')
                ->where('event_id', $event_id)
                ->where('user_id', auth()->id())
                ->get()->first();

            $ticket_num = json_decode($ticket_id->id, true);

            $rating_detail = [
                'ticket_id' => $ticket_num,
                'event_id' => $event_id,
                'updated_at' => Carbon::now(),
                'created_at' => Carbon::now()
            ];

            $rating_id = DB::table('ratings')->insertGetId($rating_detail);

            $user_rating = [
                ['category' => $request['content_category'], 'rate_value' => $request['content-option'], 'rating_id' => $rating_id, 'updated_at' => Carbon::now(), 'created_at' => Carbon::now()],
                ['category' => $request['entertain_category'], 'rate_value' => $request['entertain-option'], 'rating_id' => $rating_id, 'updated_at' => Carbon::now(), 'created_at' => Carbon::now()],
                ['category' => $request['engagement_category'], 'rate_value' => $request['engagement-option'], 'rating_id' => $rating_id, 'updated_at' => Carbon::now(), 'created_at' => Carbon::now()],
                ['category' => $request['food_category'], 'rate_value' => $request['food-option'], 'rating_id' => $rating_id, 'updated_at' => Carbon::now(), 'created_at' => Carbon::now()],
                ['category' => $request['overall_category'], 'rate_value' => $request['overall-option'], 'rating_id' => $rating_id, 'updated_at' => Carbon::now(), 'created_at' => Carbon::now()]
            ];

            foreach ($user_rating as $rating) {
                if (!empty($rating['rate_value']) && array_key_exists('rate_value', $rating)) {
                    DB::table('rating_results')->insert($rating);
                }
            }

            return redirect('/myevent/' . $event_id . '/rating');
        } catch (Exception $e) {
            return redirect('/myevent/' . $event_id . '/rating');
        }
    }
}
