@extends('components.my_event_template')

@section('title', 'Attendee')

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
@section('link-attendee'){{ URL::current() }}@endsection
@section('link-vendor'){{ URL::to('/myevent/2/vendor') }}@endsection
@section('link-analytic'){{ URL::to('/myevent/2/analytic') }}@endsection

@section('content')

    <div class="row mb-4">
        <h4 class="fw-light col-md-6 col-8 d-flex align-items-center">Manage Attendee</h4>
        <div class="col-md-6 col-4 d-flex justify-content-end">
            <a href="" class="btn btn-outline-dark link-underline">
                Invite +
            </a>
        </div>
    </div>

    <div class="mx-2">
        <div class="row">
            <div class="col-xl-12 mb-3 mb-lg-5">
                <div class="card">
                    <div class="d-flex card-header justify-content-between">
                        <h5 class="me-3 mb-0">Join Request</h5>
                        <a href="#!.html">View All</a>
                    </div>
                    <div class="card-body">
                        <ul class="list-group list-group-flush">
                            <!--List-item-->
                            <li class="list-group-item pt-0">
                                <div class="d-flex align-items-center">

                                    <div class="flex-grow-1">
                                        <h6 class="mb-0">Inara Britt</h6>
                                        <p class="mb-0 text-muted">4 Aug 2023</p>
                                    </div>
                                    <div class="flex-shrink-0 text-end">
                                        <span>
                                            <a href="" class="mx-1 btn btn-outline-danger link-underline link-underline-opacity-0">
                                                Decline
                                            </a>
                                            <a href="" class="mx-1 btn btn-outline-success link-underline link-underline-opacity-0">
                                                Accept
                                            </a>
                                        </span>
                                    </div>
                                </div>
                            </li>
                            <!--List-item-->
                            <li class="list-group-item">
                                <div class="d-flex align-items-center">

                                    <div class="flex-grow-1">
                                        <h6 class="mb-0">Eduard Franz</h6>
                                        <p class="mb-0 text-muted">15 Aug 2023</p>
                                    </div>
                                    <div class="flex-shrink-0 text-end">
                                        <span>
                                            <a href="" class="mx-1 btn btn-outline-danger link-underline link-underline-opacity-0">
                                                Decline
                                            </a>
                                            <a href="" class="mx-1 btn btn-outline-success link-underline link-underline-opacity-0">
                                                Accept
                                            </a>
                                        </span>
                                    </div>
                                </div>
                            </li>
                            <!--List-item-->
                            <li class="list-group-item">
                                <div class="d-flex align-items-center">

                                    <div class="flex-grow-1">
                                        <h6 class="mb-0">Gianluca Darby</h6>
                                        <p class="mb-0 text-muted">2 Aug 2023</p>
                                    </div>
                                    <div class="flex-shrink-0 text-end">
                                        <span>
                                            <a href="" class="mx-1 btn btn-outline-danger link-underline link-underline-opacity-0">
                                                Decline
                                            </a>
                                            <a href="" class="mx-1 btn btn-outline-success link-underline link-underline-opacity-0">
                                                Accept
                                            </a>
                                        </span>
                                    </div>
                                </div>
                            </li>
                            <!--List-item-->

                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="mx-2">
        <div class="row">
            <div class="col-xl-12 mb-3 mb-lg-5">
                <div class="card">
                    <div class="d-flex card-header justify-content-between">
                        <h5 class="me-3 mb-0">Event Attendee</h5>
                        <a href="#!.html">View All</a>
                    </div>
                    <div class="card-body">
                        <ul class="list-group list-group-flush">
                            <!--List-item-->
                            <li class="list-group-item pt-0">
                                <div class="d-flex align-items-center">

                                    <div class="flex-grow-1">
                                        <h6 class="mb-0">Inara Britt</h6>
                                        <p class="mb-0 text-muted">Attendee</p>
                                    </div>
                                    <div class="flex-shrink-0 text-end">
                                        <span>
                                            <a href="" class="btn btn-outline-dark link-underline link-underline-opacity-0">
                                                Manage
                                            </a>
                                        </span>
                                    </div>
                                </div>
                            </li>
                            <!--List-item-->
                            <li class="list-group-item">
                                <div class="d-flex align-items-center">

                                    <div class="flex-grow-1">
                                        <h6 class="mb-0">Eduard Franz</h6>
                                        <p class="mb-0 text-muted">Event Assistant</p>
                                    </div>
                                    <div class="flex-shrink-0 text-end">
                                        <span>
                                            <a href="" class="btn btn-outline-dark link-underline link-underline-opacity-0">
                                                Manage
                                            </a>
                                        </span>
                                    </div>
                                </div>
                            </li>
                            <!--List-item-->
                            <li class="list-group-item">
                                <div class="d-flex align-items-center">

                                    <div class="flex-grow-1">
                                        <h6 class="mb-0">Gianluca Darby</h6>
                                        <p class="mb-0 text-muted">Attendee</p>
                                    </div>
                                    <div class="flex-shrink-0 text-end">
                                        <span>
                                            <a href="" class="btn btn-outline-dark link-underline link-underline-opacity-0">
                                                Manage
                                            </a>
                                        </span>
                                    </div>
                                </div>
                            </li>
                            <!--List-item-->

                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>


    

@endsection
