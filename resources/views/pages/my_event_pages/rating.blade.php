@extends('components.my_event_template')

@section('title', 'Rating')

@section('myevent-active')active @endsection
@section('link-home'){{ URL::to('/') }}@endsection
@section('link-event'){{ URL::to('/events') }}@endsection
@section('link-login'){{ URL::to('/signin') }}@endsection
@section('link-account'){{ URL::to('/account') }}@endsection
@section('link-myevent'){{ URL::to('/myevent') }}@endsection
@section('link-notification'){{ URL::to('/notification') }}@endsection
@section('link-contact'){{ URL::to('/contact') }}@endsection

@section('link-info'){{ URL::to('/myevent/2/info') }}@endsection
@section('link-ticket'){{ URL::to('/myevent/2/ticket') }}@endsection

@section('link-schedule'){{ URL::to('/myevent/2/schedule') }}@endsection
@section('link-poll'){{ URL::to('/myevent/2/poll') }}@endsection
@section('link-rating'){{ URL::current() }}@endsection
@section('link-support'){{ URL::to('/myevent/2/support') }}@endsection
@section('link-task'){{ URL::to('/myevent/2/task') }}@endsection
@section('link-attendee'){{ URL::to('/myevent/2/attendee') }}@endsection
@section('link-vendor'){{ URL::to('/myevent/2/vendor') }}@endsection
@section('link-analytic'){{ URL::to('/myevent/2/analytic') }}@endsection

@section('content')

    <div class="row mb-4">
        <h4 class="fw-light col-md-6 col-8 d-flex align-items-center">Rate The Event</h4>
        <div class="col-md-6 col-4 d-flex justify-content-end">
            <a href="" class="btn btn-outline-dark">
                Update
            </a>
        </div>
    </div>

    <div class="mx-0 mx-sm-auto">
        <div class="card">
            <div class="card-body d-flex justify-content-center">


                <form class="px-2" action="">
                    <h5>Content and Presentation</h5>
                    <div class="btn-group mb-3" role="group" aria-label="Basic radio toggle button group">
                        <input type="radio" class="btn-check" value="" name="btnradio" id="btnradio1">
                        <label class="btn btn-outline-dark" for="btnradio1">Dissapointed</label>
                        <input type="radio" class="btn-check" value="" name="btnradio" id="btnradio2">
                        <label class="btn btn-outline-dark" for="btnradio2">Reasonable</label>
                        <input type="radio" class="btn-check" value="" name="btnradio" id="btnradio3">
                        <label class="btn btn-outline-dark" for="btnradio3">Satisfied</label>
                    </div>

                    <h5>Entertainment</h5>
                    <div class="btn-group mb-3" role="group" aria-label="Basic radio toggle button group">
                        <input type="radio" class="btn-check" value="" name="btnradio" id="btnradio1">
                        <label class="btn btn-outline-dark" for="btnradio1">Dissapointed</label>
                        <input type="radio" class="btn-check" value="" name="btnradio" id="btnradio2">
                        <label class="btn btn-outline-dark" for="btnradio2">Reasonable</label>
                        <input type="radio" class="btn-check" value="" name="btnradio" id="btnradio3">
                        <label class="btn btn-outline-dark" for="btnradio3">Satisfied</label>
                    </div>

                    <h5>Engagement and Interaction</h5>
                    <div class="btn-group mb-3" role="group" aria-label="Basic radio toggle button group">
                        <input type="radio" class="btn-check" value="" name="btnradio" id="btnradio1">
                        <label class="btn btn-outline-dark" for="btnradio1">Dissapointed</label>
                        <input type="radio" class="btn-check" value="" name="btnradio" id="btnradio2">
                        <label class="btn btn-outline-dark" for="btnradio2">Reasonable</label>
                        <input type="radio" class="btn-check" value="" name="btnradio" id="btnradio3">
                        <label class="btn btn-outline-dark" for="btnradio3">Satisfied</label>
                    </div>

                    <h5>Food and Beverages</h5>
                    <div class="btn-group mb-3" role="group" aria-label="Basic radio toggle button group">
                        <input type="radio" class="btn-check" value="" name="btnradio" id="btnradio1">
                        <label class="btn btn-outline-dark" for="btnradio1">Dissapointed</label>
                        <input type="radio" class="btn-check" value="" name="btnradio" id="btnradio2">
                        <label class="btn btn-outline-dark" for="btnradio2">Reasonable</label>
                        <input type="radio" class="btn-check" value="" name="btnradio" id="btnradio3">
                        <label class="btn btn-outline-dark" for="btnradio3">Satisfied</label>
                    </div>

                    <h5>Overall Experiences</h5>
                    <div class="btn-group mb-3" role="group" aria-label="Basic radio toggle button group">
                        <input type="radio" class="btn-check" value="" name="btnradio" id="btnradio1">
                        <label class="btn btn-outline-dark" for="btnradio1">Dissapointed</label>
                        <input type="radio" class="btn-check" value="" name="btnradio" id="btnradio2">
                        <label class="btn btn-outline-dark" for="btnradio2">Reasonable</label>
                        <input type="radio" class="btn-check" value="" name="btnradio" id="btnradio3">
                        <label class="btn btn-outline-dark" for="btnradio3">Satisfied</label>
                    </div>

                </form>
            </div>
            <div class="card-footer text-end">
                <button type="button" class="btn btn-dark">Submit</button>
            </div>
        </div>
    </div>

@endsection
