@extends('components.my_event_template')

@section('title', 'Support')

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

@section('link-schedule'){{ URL::to('/myevent/'.$event_id.'/schedule') }}@endsection
@section('link-poll'){{ URL::to('/myevent/'.$event_id.'/poll') }}@endsection
@section('link-rating'){{ URL::to('/myevent/'.$event_id.'/rating') }}@endsection
@section('link-support'){{ URL::current() }}@endsection
@section('link-task'){{ URL::to('/myevent/'.$event_id.'/task') }}@endsection
@section('link-attendee'){{ URL::to('/myevent/'.$event_id.'/attendee') }}@endsection
@section('link-vendor'){{ URL::to('/myevent/'.$event_id.'/vendor') }}@endsection
@section('link-analytic'){{ URL::to('/myevent/'.$event_id.'/analytic') }}@endsection

@section('content')

    <div class="row mb-4">
        <h4 class="fw-light col-md-6 col-8 d-flex align-items-center">Support Ticket</h4>
        <div class="col-md-6 col-4 d-flex justify-content-end">
            <a href="" class="btn btn-outline-dark">
                New Issue
            </a>
        </div>
    </div>

    <div class="mx-2">

        <h2>Issues</h2>

        <hr>

        <div class="row">
            <!-- BEGIN TICKET CONTENT -->
            <div class="col-md-12 mb-4">
                <ul class="list-group">


                    <li class="list-group-item">
                        <strong>
                            <a href="">Add drag and drop config import closes</a>
                        </strong>
                        <span class="">#13697</span>
                        <span class="btn btn-warning ms-3">OPEN</span>
                        <p class="info">Opened by <a href="#">lgardner</a> 5 hours ago
                            <i class="fa fa-comments"></i> <a href="#">2 comments</a>
                        </p>
                    </li>

                    <li class="list-group-item">
                        <strong>
                            <a href="">Document that Helvetica Neue can cause problems on Windows</a>
                        </strong>
                        <span class="">#13698</span>
                        <span class="btn btn-danger ms-3">IMPORTANT</span>
                        <p class="info">Opened by <a href="#">jwilliams</a> 5 hours ago
                            <i class="fa fa-comments"></i> <a href="#">2 comments</a>
                        </p>
                    </li>

                    <li class="list-group-item">
                        <strong>
                            <a href="">Add drag and drop config import closes</a>
                        </strong>
                        <span class="">#13697</span>
                        <span class="btn btn-warning ms-3">OPEN</span>
                        <p class="info">Opened by <a href="#">lgardner</a> 5 hours ago
                            <i class="fa fa-comments"></i> <a href="#">2 comments</a>
                        </p>
                    </li>

                    <li class="list-group-item">
                        <strong>
                            <a href="">Document that Helvetica Neue can cause problems on Windows</a>
                        </strong>
                        <span class="">#13698</span>
                        <span class="btn btn-success ms-3">SUCCESS</span>
                        <p class="info">Opened by <a href="#">jwilliams</a> 5 hours ago
                            <i class="fa fa-comments"></i> <a href="#">2 comments</a>
                        </p>
                    </li>


                </ul>

            </div>
            <!-- END TICKET CONTENT -->
        </div>

    </div>

@endsection
