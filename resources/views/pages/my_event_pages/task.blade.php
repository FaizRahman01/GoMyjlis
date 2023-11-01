@extends('components.my_event_template')

@section('title', 'Task')

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
@section('link-task'){{ URL::current() }}@endsection
@section('link-attendee'){{ URL::to('/myevent/2/attendee') }}@endsection
@section('link-vendor'){{ URL::to('/myevent/2/vendor') }}@endsection
@section('link-analytic'){{ URL::to('/myevent/2/analytic') }}@endsection

@section('content')

    <div class="row mb-4">
        <h4 class="fw-light col-md-6 col-8 d-flex align-items-center">Task</h4>
        <div class="col-md-6 col-4 d-flex justify-content-end">
            <a href="" class="btn btn-outline-dark">
                Add Task
            </a>
        </div>
    </div>




    <div class="row">
        <div class="col-xl-4">
            <div class="card mb-3">

                <div class="card-header bg-dark">
                    <h5 class="card-title text-white mt-2" id="exampleModalLabel">Upcoming</h5>
                </div>

                <div class="list-group m-2">
                    <a href="#" class="list-group-item list-group-item-action flex-column align-items-start">
                        <div class="d-flex w-100 justify-content-between">
                            <h5 class="mb-1">List group item heading</h5>
                            <small class="text-muted">3 days ago</small>
                        </div>
                        <p class="mb-1">Donec id elit non mi porta gravida at eget metus. Maecenas sed diam eget risus
                            varius
                            blandit.</p>
                        <small class="text-muted">Abu</small>
                    </a>
                </div>

            </div>
        </div>



        <div class="col-xl-4">
            <div class="card mb-3">

                <div class="card-header bg-dark">
                    <h5 class="card-title text-white mt-2" id="exampleModalLabel">In Progress</h5>
                </div>

                <div class="list-group m-2">
                    <a href="#" class="list-group-item list-group-item-action flex-column align-items-start">
                        <div class="d-flex w-100 justify-content-between">
                            <h5 class="mb-1">List group item heading</h5>
                            <small class="text-muted">3 days ago</small>
                        </div>
                        <p class="mb-1">Donec id elit non mi porta gravida at eget metus. Maecenas sed diam eget risus
                            varius
                            blandit.</p>
                        <small class="text-muted">Abu</small>
                    </a>
                </div>

            </div>
        </div>


        <div class="col-xl-4">
            <div class="card mb-3">

                <div class="card-header bg-dark">
                    <h5 class="card-title text-white mt-2" id="exampleModalLabel">Completed</h5>
                </div>

                <div class="list-group m-2">
                    <a href="#" class="list-group-item list-group-item-action flex-column align-items-start">
                        <div class="d-flex w-100 justify-content-between">
                            <h5 class="mb-1">List group item heading</h5>
                            <small class="text-muted">3 days ago</small>
                        </div>
                        <p class="mb-1">Donec id elit non mi porta gravida at eget metus. Maecenas sed diam eget risus
                            varius
                            blandit.</p>
                        <small class="text-muted">Abu</small>
                    </a>
                </div>

                <div class="list-group m-2">
                    <a href="#" class="list-group-item list-group-item-action flex-column align-items-start">
                        <div class="d-flex w-100 justify-content-between">
                            <h5 class="mb-1">List group item heading</h5>
                            <small class="text-muted">3 days ago</small>
                        </div>
                        <p class="mb-1">Donec id elit non mi porta gravida at eget metus. Maecenas sed diam eget risus
                            varius
                            blandit.</p>
                        <small class="text-muted">Abu</small>
                    </a>
                </div>

            </div>
        </div>
    </div>


@endsection
