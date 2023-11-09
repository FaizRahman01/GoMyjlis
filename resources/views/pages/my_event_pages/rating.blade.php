@extends('components.my_event_template')

@section('title', 'Rating')

@section('myevent-active')active @endsection
@section('link-home'){{ URL::to('/') }}@endsection
@section('link-event'){{ URL::to('/events') }}@endsection
@section('link-login'){{ URL::to('/signin') }}@endsection
@section('link-account'){{ URL::to('/account') }}@endsection
@section('link-myevent'){{ URL::to('/myevent') }}@endsection
@section('link-notification'){{ URL::to('/notification') }}@endsection


@section('link-info'){{ URL::to('/myevent/' . $event_id . '/info') }}@endsection
@section('link-ticket'){{ URL::to('/myevent/' . $event_id . '/ticket') }}@endsection

@section('link-schedule'){{ URL::to('/myevent/' . $event_id . '/schedule') }}@endsection
@section('link-poll'){{ URL::to('/myevent/' . $event_id . '/poll') }}@endsection
@section('link-rating'){{ URL::current() }}@endsection
@section('link-support'){{ URL::to('/myevent/' . $event_id . '/support') }}@endsection
@section('link-task'){{ URL::to('/myevent/' . $event_id . '/task') }}@endsection
@section('link-attendee'){{ URL::to('/myevent/' . $event_id . '/attendee') }}@endsection
@section('link-vendor'){{ URL::to('/myevent/' . $event_id . '/vendor') }}@endsection
@section('link-analytic'){{ URL::to('/myevent/' . $event_id . '/analytic') }}@endsection

@section('content')

    <div class="row mb-4">
        <h4 class="fw-light col-md-6 col-8 d-flex align-items-center">Rate The Event</h4>
    </div>

    <div class="mx-0 mx-sm-auto">
        @if ($event->is_organizer == 0 && $event->is_assistant == 0)
            <div class="card">
                <div class="card-body d-flex justify-content-center">

                    @if ($rating_result->isEmpty())
                        <form class="px-2" action="/myevent/{{ $event_id }}/rating" method="post">

                            @csrf
                            <h5>Content and Presentation</h5>
                            <input type="hidden" name="content_category" value="content" autocomplete="off">
                            <div class="btn-group mb-3" role="group" aria-label="Basic radio toggle button group">
                                <input type="radio" class="btn-check" value="Dissapointed" name="content-option"
                                    id="btn-content1">
                                <label class="btn btn-outline-dark" for="btn-content1">Dissapointed</label>
                                <input type="radio" class="btn-check" value="Reasonable" name="content-option"
                                    id="btn-content2">
                                <label class="btn btn-outline-dark" for="btn-content2">Reasonable</label>
                                <input type="radio" class="btn-check" value="Satisfied" name="content-option"
                                    id="btn-content3">
                                <label class="btn btn-outline-dark" for="btn-content3">Satisfied</label>
                            </div>

                            <h5>Entertainment</h5>
                            <input type="hidden" name="entertain_category" value="entertain" autocomplete="off">
                            <div class="btn-group mb-3" role="group" aria-label="Basic radio toggle button group">
                                <input type="radio" class="btn-check" value="Dissapointed" name="entertain-option"
                                    id="btn-entertain1">
                                <label class="btn btn-outline-dark" for="btn-entertain1">Dissapointed</label>
                                <input type="radio" class="btn-check" value="Reasonable" name="entertain-option"
                                    id="btn-entertain2">
                                <label class="btn btn-outline-dark" for="btn-entertain2">Reasonable</label>
                                <input type="radio" class="btn-check" value="Satisfied" name="entertain-option"
                                    id="btn-entertain3">
                                <label class="btn btn-outline-dark" for="btn-entertain3">Satisfied</label>
                            </div>

                            <h5>Engagement and Interaction</h5>
                            <input type="hidden" name="engagement_category" value="engagement" autocomplete="off">
                            <div class="btn-group mb-3" role="group" aria-label="Basic radio toggle button group">
                                <input type="radio" class="btn-check" value="Dissapointed" name="engagement-option"
                                    id="btn-engagement1">
                                <label class="btn btn-outline-dark" for="btn-engagement1">Dissapointed</label>
                                <input type="radio" class="btn-check" value="Reasonable" name="engagement-option"
                                    id="btn-engagement2">
                                <label class="btn btn-outline-dark" for="btn-engagement2">Reasonable</label>
                                <input type="radio" class="btn-check" value="Satisfied" name="engagement-option"
                                    id="btn-engagement3">
                                <label class="btn btn-outline-dark" for="btn-engagement3">Satisfied</label>
                            </div>

                            <h5>Food and Beverages</h5>
                            <input type="hidden" name="food_category" value="food" autocomplete="off">
                            <div class="btn-group mb-3" role="group" aria-label="Basic radio toggle button group">
                                <input type="radio" class="btn-check" value="Dissapointed" name="food-option"
                                    id="btnfood1">
                                <label class="btn btn-outline-dark" for="btnfood1">Dissapointed</label>
                                <input type="radio" class="btn-check" value="Reasonable" name="food-option"
                                    id="btnfood2">
                                <label class="btn btn-outline-dark" for="btnfood2">Reasonable</label>
                                <input type="radio" class="btn-check" value="Satisfied" name="food-option"
                                    id="btnfood3">
                                <label class="btn btn-outline-dark" for="btnfood3">Satisfied</label>
                            </div>

                            <h5>Overall Experiences</h5>
                            <input type="hidden" name="overall_category" value="overall" autocomplete="off">
                            <div class="btn-group mb-3" role="group" aria-label="Basic radio toggle button group">
                                <input type="radio" class="btn-check" value="Dissapointed" name="overall-option"
                                    id="btn-overall1">
                                <label class="btn btn-outline-dark" for="btn-overall1">Dissapointed</label>
                                <input type="radio" class="btn-check" value="Reasonable" name="overall-option"
                                    id="btn-overall2">
                                <label class="btn btn-outline-dark" for="btn-overall2">Reasonable</label>
                                <input type="radio" class="btn-check" value="Satisfied" name="overall-option"
                                    id="btn-overall3">
                                <label class="btn btn-outline-dark" for="btn-overall3">Satisfied</label>
                            </div>


                            <div>
                                <button type="submit" class="btn btn-dark w-100">Submit</button>
                            </div>


                        </form>
                    @endif
                </div>
                @if ($rating_result->isNotEmpty())

                    <div class="card-footer">
                        <div>
                            @foreach ($rating_result as $result)
                                @if ($result->category == 'content')
                                    <h5 class="fw-light">Content and Presentation : <span
                                            class="text-muted small">{{ $result->rate_value }}</span></h5>
                                @endif
                                @if ($result->category == 'entertain')
                                    <h5 class="fw-light">Entertainment : <span
                                            class="text-muted small">{{ $result->rate_value }}</span></h5>
                                @endif
                                @if ($result->category == 'engagement')
                                    <h5 class="fw-light">Engagement and Interaction : <span
                                            class="text-muted small">{{ $result->rate_value }}</span></h5>
                                @endif
                                @if ($result->category == 'food')
                                    <h5 class="fw-light">Food and Beverages : <span
                                            class="text-muted small">{{ $result->rate_value }}</span></h5>
                                @endif
                                @if ($result->category == 'overall')
                                    <h5 class="fw-light">Overall Experiences : <span
                                            class="text-muted small">{{ $result->rate_value }}</span></h5>
                                @endif
                            @endforeach
                        </div>
                    </div>
                @endif
            </div>
        @endif
    </div>

@endsection
