@extends('components.my_event_template')

@section('title', 'Vendor')

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
@section('link-rating'){{ URL::to('/myevent/2/rating') }}@endsection
@section('link-support'){{ URL::to('/myevent/2/support') }}@endsection
@section('link-task'){{ URL::to('/myevent/2/task') }}@endsection
@section('link-attendee'){{ URL::to('/myevent/2/attendee') }}@endsection
@section('link-vendor'){{ URL::current() }}@endsection
@section('link-analytic'){{ URL::to('/myevent/2/analytic') }}@endsection

@section('content')

    <div class="row mb-4">
        <h4 class="fw-light col-md-6 col-8 d-flex align-items-center">Vendor</h4>
        <div class="col-md-6 col-4 d-flex justify-content-end">
            <a href="" class="btn btn-outline-dark">
                Add Vendor +
            </a>
        </div>
    </div>


    <div class="card mb-3">

        <div class="list-group m-2">
            <a href="#" class="list-group-item list-group-item-action flex-column align-items-start">
                <div class="d-flex w-100 justify-content-between">
                    <h5 class="mb-1">Food Catering</h5>
                    <small class="text-muted">3 days ago</small>
                </div>
                <small class="text-muted">Abu</small>
            </a>
        </div>



    </div>



@endsection
