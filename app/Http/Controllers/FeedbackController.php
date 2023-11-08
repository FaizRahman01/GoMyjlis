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

        $poll_list = DB::table('polls')
            ->join('poll_answers', 'poll_answers.poll_id', '=', 'polls.id')
            ->where('event_id', $event_id)
            ->get();

        $poll_question = DB::table('polls')
            ->where('event_id', $event_id)
            ->get();

        $ticket_id = DB::table('tickets')
            ->select('id')
            ->where('event_id', $event_id)
            ->where('user_id', auth()->id())
            ->get()->first();

        $ticket_num = json_decode($ticket_id->id, true);

        $poll_answer = DB::table('poll_results')
            ->where('ticket_id', $ticket_num)
            ->get();

        return view('pages.my_event_pages.poll', ['event_id' => $event_id, 'poll_list' => $poll_list, 'poll_question' => $poll_question, 'poll_answer' => $poll_answer]);
    }

    public function createEventPoll(Request $request, $id)
    {
        $event_id = $id;

        $user_input = $request->validate([
            'question' => 'required',
            'answer_1' => 'required',
            'answer_2' => 'required'
        ]);

        $poll_detail = [
            'question' => $user_input['question'],
            'event_id' => $event_id,
            'updated_at' => Carbon::now(),
            'created_at' => Carbon::now()
        ];

        $poll_id = DB::table('polls')->insertGetId($poll_detail);

        $poll_answer = [
            ['answer' => $user_input['answer_1'], 'poll_id' => $poll_id, 'updated_at' => Carbon::now(), 'created_at' => Carbon::now()],
            ['answer' => $user_input['answer_2'], 'poll_id' => $poll_id, 'updated_at' => Carbon::now(), 'created_at' => Carbon::now()],
            ['answer' => $request['answer_3'], 'poll_id' => $poll_id, 'updated_at' => Carbon::now(), 'created_at' => Carbon::now()],
            ['answer' => $request['answer_4'], 'poll_id' => $poll_id, 'updated_at' => Carbon::now(), 'created_at' => Carbon::now()],
        ];

        foreach ($poll_answer as $answers) {
            if (!empty($answers['answer']) && array_key_exists('answer', $answers)) {
                DB::table('poll_answers')->insert($answers);
            }
        }

        return redirect('/myevent/' . $event_id . '/poll');
    }

    public function answerEventPoll(Request $request, $event_id, $poll_id)
    {

        try {
            $ticket_id = DB::table('tickets')
                ->select('id')
                ->where('event_id', $event_id)
                ->where('user_id', auth()->id())
                ->get()->first();

            $ticket_num = json_decode($ticket_id->id, true);

            $poll_answer = [
                'result' => $request['answer'],
                'poll_id' => $poll_id,
                'ticket_id' => $ticket_num,
                'updated_at' => Carbon::now(),
                'created_at' => Carbon::now()
            ];

            DB::table('poll_results')->insert($poll_answer);

            return redirect('/myevent/' . $event_id . '/poll');
        } catch (Exception $e) {
            return redirect('/myevent/' . $event_id . '/poll');
        }
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
