@extends('components.my_event_template')

@section('title', 'Schedule')

@section('myevent-active')active @endsection
@section('link-home'){{ URL::to('/') }}@endsection
@section('link-event'){{ URL::to('/events') }}@endsection
@section('link-login'){{ URL::to('/signin') }}@endsection
@section('link-account'){{ URL::to('/account') }}@endsection
@section('link-myevent'){{ URL::to('/myevent') }}@endsection
@section('link-notification'){{ URL::to('/notification') }}@endsection
@section('link-contact'){{ URL::to('/contact') }}@endsection

@section('link-info'){{ URL::to('/myevent/'.$event_id.'/info') }}@endsection
@section('link-ticket'){{ URL::to('/myevent/'.$event_id.'/ticket') }}@endsection

@section('link-schedule'){{ URL::current() }}@endsection
@section('link-poll'){{ URL::to('/myevent/'.$event_id.'/poll') }}@endsection
@section('link-rating'){{ URL::to('/myevent/'.$event_id.'/rating') }}@endsection
@section('link-support'){{ URL::to('/myevent/'.$event_id.'/support') }}@endsection
@section('link-task'){{ URL::to('/myevent/'.$event_id.'/task') }}@endsection
@section('link-attendee'){{ URL::to('/myevent/'.$event_id.'/attendee') }}@endsection
@section('link-vendor'){{ URL::to('/myevent/'.$event_id.'/vendor') }}@endsection
@section('link-analytic'){{ URL::to('/myevent/'.$event_id.'/analytic') }}@endsection

@section('content')

    <div class="container position-relative z-index-1 pb-5">
        <div class="row">

            <div class="row mb-4">
                <h4 class="fw-light col-md-6 col-8 d-flex align-items-center">Schedule and Agenda</h4>
                <div class="col-md-6 col-4 d-flex justify-content-end">
                    <a href="" class="btn btn-outline-dark">
                        Edit
                    </a>
                </div>
            </div>

            <ul class="pt-4 list-unstyled mb-0">

                <li class="d-flex flex-column flex-md-row py-4">
                    <span class="flex-shrink-0 width-13x me-md-4 d-block mb-3 mb-md-0 small text-muted">
                        9:00 AM - 10:00 AM | Day 1
                    </span>
                    <div class="flex-grow-1 ps-4 border-start border-3">
                        <h4>Registration and Coffee</h4>
                        <p class="mb-0">
                            Excepteur sint occaecat cupidatat non proident, sunt in culpa qui
                            officia deserunt mollit anim id est laborum.
                        </p>
                    </div>
                </li>

                <li class="d-flex flex-column flex-md-row py-4">
                    <span class="flex-shrink-0 width-13x me-md-4 d-block mb-3 mb-md-0 small text-muted">
                        10:00 AM - 11:00 AM | Day 1
                    </span>
                    <div class="flex-grow-1 ps-4 border-start border-3">
                        <h4>Culpa qui officia deserunt</h4>
                        <p class="mb-0">
                            Excepteur sint occaecat cupidatat non proident, sunt in culpa qui
                            officia deserunt mollit anim id est laborum.
                        </p>
                    </div>
                </li>

                <li class="d-flex flex-column flex-md-row py-4">
                    <span class="flex-shrink-0 width-13x me-md-4 d-block mb-3 mb-md-0 small text-muted">
                        9:00 AM - 10:00 AM | Day 2
                    </span>
                    <div class="flex-grow-1 ps-4 border-start border-3">
                        <h4>Lorem ipsum dolor sit amet.</h4>
                        <p class="mb-0">
                            Excepteur sint occaecat cupidatat non proident, sunt in culpa qui
                            officia deserunt mollit anim id est laborum.
                        </p>
                    </div>
                </li>
                
                <li class="d-flex flex-column flex-md-row py-4">
                    <span class="flex-shrink-0 width-13x me-md-4 d-block mb-3 mb-md-0 small text-muted">
                        10:00 AM - 11:00 AM | Day 3
                    </span>
                    <div class="flex-grow-1 ps-4 border-start border-3">
                        <h4>dolor sit amet consectetur.</h4>
                        <p class="mb-0">
                            Excepteur sint occaecat cupidatat non proident, sunt in culpa qui
                            officia deserunt mollit anim id est laborum.
                        </p>
                    </div>
                </li>

            </ul>


        </div>
    </div>


@endsection
