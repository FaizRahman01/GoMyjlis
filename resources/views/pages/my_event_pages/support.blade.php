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

@section('link-info'){{ URL::to('/myevent/' . $event_id . '/info') }}@endsection
@section('link-ticket'){{ URL::to('/myevent/' . $event_id . '/ticket') }}@endsection

@section('link-schedule'){{ URL::to('/myevent/' . $event_id . '/schedule') }}@endsection
@section('link-poll'){{ URL::to('/myevent/' . $event_id . '/poll') }}@endsection
@section('link-rating'){{ URL::to('/myevent/' . $event_id . '/rating') }}@endsection
@section('link-support'){{ URL::current() }}@endsection
@section('link-task'){{ URL::to('/myevent/' . $event_id . '/task') }}@endsection
@section('link-attendee'){{ URL::to('/myevent/' . $event_id . '/attendee') }}@endsection
@section('link-vendor'){{ URL::to('/myevent/' . $event_id . '/vendor') }}@endsection
@section('link-analytic'){{ URL::to('/myevent/' . $event_id . '/analytic') }}@endsection

@section('content')

    <div class="row mb-4">
        <h4 class="fw-light col-md-6 col-8 d-flex align-items-center">Support Ticket</h4>
        <div class="col-md-6 col-4 d-flex justify-content-end">
            <button type="button" class="btn btn-outline-dark" data-bs-toggle="modal" data-bs-target="#exampleModal">
                New Issue
            </button>
        </div>
    </div>

    <div class="mx-2">

        <h2>Issues</h2>

        <hr>

        <div class="row">
            <!-- BEGIN TICKET CONTENT -->
            <div class="col-md-12 mb-4">
                <ul class="list-group">

                    @foreach ($issue_list as $list)
                        <li class="list-group-item">
                            <strong>
                                <a href="/myevent/{{ $event_id }}/support/{{ $list->id }}">{{ $list->title }}</a>
                            </strong>
                            <span class="">#{{ $list->id }}</span>
                            <span class="btn @if ($list->is_close == 0) btn-success @else btn-danger @endif ms-3">
                                @if ($list->is_close == 0)
                                    OPEN
                                    @else
                                    CLOSE
                                @endif
                            </span>
                            <p class="info">Opened by {{ $list->username }} | &nbsp;&nbsp;&nbsp;<span class="text-muted">{{ $list->created_at }}</span></a>
                            </p>
                        </li>
                    @endforeach




                </ul>

            </div>
            <!-- END TICKET CONTENT -->
        </div>

    </div>


    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Create new issue ticket</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="/myevent/{{ $event_id }}/support" method="post">
                        @csrf
                        <div class="form-floating mb-3 has-danger">
                            <input type="text" name="issue_title" class="form-control @error('issue_title')is-invalid @enderror"
                                placeholder="Announcement">
                            <label>Your Question</label>
                            @error('issue_title')
                                <div class="invalid-feedback text-start">{{$message}}</div>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary btn-block mb-4 w-100">
                            Submit
                        </button>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

@endsection
