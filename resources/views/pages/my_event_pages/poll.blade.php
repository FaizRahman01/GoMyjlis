@extends('components.my_event_template')

@section('title', 'Poll')

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
@section('link-poll'){{ URL::current() }}@endsection
@section('link-rating'){{ URL::to('/myevent/2/rating') }}@endsection
@section('link-support'){{ URL::to('/myevent/2/support') }}@endsection
@section('link-task'){{ URL::to('/myevent/2/task') }}@endsection
@section('link-attendee'){{ URL::to('/myevent/2/attendee') }}@endsection
@section('link-vendor'){{ URL::to('/myevent/2/vendor') }}@endsection
@section('link-analytic'){{ URL::to('/myevent/2/analytic') }}@endsection

@section('content')

    <div class="row mb-4">
        <h4 class="fw-light col-md-6 col-8 d-flex align-items-center">Multiple Choice Poll</h4>
        <div class="col-md-6 col-4 d-flex justify-content-end">
            <a href="" class="btn btn-outline-dark">
                Create
            </a>
        </div>
    </div>


    <ul class="list-group mb-4">
        <li class="list-group-item active text-center bg-dark border-0" aria-current="true">Your favourite fast food ?</li>
        <li class="list-group-item">
            <div class="btn-group w-100" role="group" aria-label="Basic radio toggle button group">
                <input type="radio" class="btn-check" name="btnradio" id="btnradio1" value="kfc">
                <label class="btn btn-outline-dark" for="btnradio1">KFC</label>
            </div>
        </li>
        <li class="list-group-item">
            <div class="btn-group w-100" role="group" aria-label="Basic radio toggle button group">
                <input type="radio" class="btn-check" name="btnradio" id="btnradio2" value="mcd">
                <label class="btn btn-outline-dark" for="btnradio2">MCD</label>
            </div>
        </li>
        <li class="list-group-item">
            <div class="btn-group w-100" role="group" aria-label="Basic radio toggle button group">
                <input type="radio" class="btn-check" name="btnradio" id="btnradio3" value="bk">
                <label class="btn btn-outline-dark" for="btnradio3">BK</label>
            </div>
        </li>
    </ul>

    <ul class="list-group mb-4">
        <li class="list-group-item active text-center bg-dark border-0" aria-current="true">Country ?</li>
        <li class="list-group-item">
            <div class="btn-group w-100" role="group" aria-label="Basic radio toggle button group">
                <input type="radio" class="btn-check" name="btnradi" id="btnradi1" value="sg">
                <label class="btn btn-outline-dark" for="btnradi1">SG</label>
            </div>
        </li>
        <li class="list-group-item">
            <div class="btn-group w-100" role="group" aria-label="Basic radio toggle button group">
                <input type="radio" class="btn-check" name="btnradi" id="btnradi2" value="my">
                <label class="btn btn-outline-dark" for="btnradi2">MY</label>
            </div>
        </li>
        <li class="list-group-item">
            <div class="btn-group w-100" role="group" aria-label="Basic radio toggle button group">
                <input type="radio" class="btn-check" name="btnradi" id="btnradi3" value="id">
                <label class="btn btn-outline-dark" for="btnradi3">ID</label>
            </div>
        </li>
    </ul>




@endsection
