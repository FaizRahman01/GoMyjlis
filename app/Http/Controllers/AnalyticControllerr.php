<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AnalyticControllerr extends Controller
{
    //
    public function showEventAnalytic($id)
    {
        $event_id = $id;

        $checkin = DB::table('tickets')
            ->select(DB::raw('count(is_attend) as is_attend'))
            ->where('event_id', $event_id)
            ->where('is_approve', 1)
            ->where('is_attend', 1)
            ->where('is_organizer', 0)
            ->where('is_assistant', 0)
            ->groupBy('is_attend')
            ->get()->first();

        $not_checkin = DB::table('tickets')
            ->select(DB::raw('count(is_attend) as is_attend'))
            ->where('event_id', $event_id)
            ->where('is_approve', 1)
            ->where('is_attend', 0)
            ->where('is_organizer', 0)
            ->where('is_assistant', 0)
            ->groupBy('is_attend')
            ->get()->first();

        $content_rating = DB::table('ratings')
            ->select(
                'category',
                DB::raw('count(case when rate_value = "Satisfied" then 1 else null end) as satisfied'),
                DB::raw('count(case when rate_value = "Reasonable" then 1 else null end) as reasonable'),
                DB::raw('count(case when rate_value = "Dissapointed" then 1 else null end) as dissapointed')
            )
            ->join('rating_results', 'rating_results.rating_id', '=', 'ratings.id')
            ->where('ratings.event_id', $event_id)
            ->where('category', "content")
            ->groupBy('category')
            ->get()->first();

        $entertain_rating = DB::table('ratings')
            ->select(
                'category',
                DB::raw('count(case when rate_value = "Satisfied" then 1 else null end) as satisfied'),
                DB::raw('count(case when rate_value = "Reasonable" then 1 else null end) as reasonable'),
                DB::raw('count(case when rate_value = "Dissapointed" then 1 else null end) as dissapointed')
            )
            ->join('rating_results', 'rating_results.rating_id', '=', 'ratings.id')
            ->where('ratings.event_id', $event_id)
            ->where('category', "entertain")
            ->groupBy('category')
            ->get()->first();

        $engagement_rating = DB::table('ratings')
            ->select(
                'category',
                DB::raw('count(case when rate_value = "Satisfied" then 1 else null end) as satisfied'),
                DB::raw('count(case when rate_value = "Reasonable" then 1 else null end) as reasonable'),
                DB::raw('count(case when rate_value = "Dissapointed" then 1 else null end) as dissapointed')
            )
            ->join('rating_results', 'rating_results.rating_id', '=', 'ratings.id')
            ->where('ratings.event_id', $event_id)
            ->where('category', "engagement")
            ->groupBy('category')
            ->get()->first();

        $food_rating = DB::table('ratings')
            ->select(
                'category',
                DB::raw('count(case when rate_value = "Satisfied" then 1 else null end) as satisfied'),
                DB::raw('count(case when rate_value = "Reasonable" then 1 else null end) as reasonable'),
                DB::raw('count(case when rate_value = "Dissapointed" then 1 else null end) as dissapointed')
            )
            ->join('rating_results', 'rating_results.rating_id', '=', 'ratings.id')
            ->where('ratings.event_id', $event_id)
            ->where('category', "food")
            ->groupBy('category')
            ->get()->first();

        $overall_rating = DB::table('ratings')
            ->select(
                'category',
                DB::raw('count(case when rate_value = "Satisfied" then 1 else null end) as satisfied'),
                DB::raw('count(case when rate_value = "Reasonable" then 1 else null end) as reasonable'),
                DB::raw('count(case when rate_value = "Dissapointed" then 1 else null end) as dissapointed')
            )
            ->join('rating_results', 'rating_results.rating_id', '=', 'ratings.id')
            ->where('ratings.event_id', $event_id)
            ->where('category', "overall")
            ->groupBy('category')
            ->get()->first();

        $poll_list = DB::table('polls')
            ->select(DB::raw('question as "Question"'), DB::raw('result as "Attendee Answer"'))
            ->join('poll_results', 'poll_results.poll_id', '=', 'polls.id')
            ->where('event_id', $event_id)
            ->get();

        $view_data = [
            'event_id' => $event_id,
            'checkin' => $checkin,
            'not_checkin' => $not_checkin,
            'content_rating' => $content_rating,
            'entertain_rating' => $entertain_rating,
            'engagement_rating' => $engagement_rating,
            'food_rating' => $food_rating,
            'overall_rating' => $overall_rating 
        ];

        return view('pages.my_event_pages.analytic', $view_data);
    }
}
