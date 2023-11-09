@extends('components.my_event_template')

@section('title', 'Schedule')

@section('myevent-active')active @endsection
@section('link-home'){{ URL::to('/') }}@endsection
@section('link-event'){{ URL::to('/events') }}@endsection
@section('link-login'){{ URL::to('/signin') }}@endsection
@section('link-account'){{ URL::to('/account') }}@endsection
@section('link-myevent'){{ URL::to('/myevent') }}@endsection



@section('link-info'){{ URL::to('/myevent/' . $event_id . '/info') }}@endsection
@section('link-ticket'){{ URL::to('/myevent/' . $event_id . '/ticket') }}@endsection

@section('link-schedule'){{ URL::current() }}@endsection
@section('link-poll'){{ URL::to('/myevent/' . $event_id . '/poll') }}@endsection
@section('link-rating'){{ URL::to('/myevent/' . $event_id . '/rating') }}@endsection
@section('link-support'){{ URL::to('/myevent/' . $event_id . '/support') }}@endsection
@section('link-task'){{ URL::to('/myevent/' . $event_id . '/task') }}@endsection
@section('link-attendee'){{ URL::to('/myevent/' . $event_id . '/attendee') }}@endsection
@section('link-vendor'){{ URL::to('/myevent/' . $event_id . '/vendor') }}@endsection
@section('link-analytic'){{ URL::to('/myevent/' . $event_id . '/analytic') }}@endsection

@section('content')

    <div class="container position-relative z-index-1 pb-5">
        <div class="row">

            <div class="row mb-4">
                <h4 class="fw-light col-md-6 col-8 d-flex align-items-center">Schedule and Agenda</h4>
                @if ($event->is_organizer == 1 && $event->is_assistant == 0 || $event->is_organizer == 0 && $event->is_assistant == 1)
                <div class="col-md-6 col-4 d-flex justify-content-end">
                    <button type="button" class="btn btn-outline-dark" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        Edit
                    </button>
                </div>
                @endif
            </div>

            <ul class="pt-4 list-unstyled mb-0">

                @foreach ($activity_list as $list)
                    <li class="d-flex flex-column flex-md-row py-4">
                        <span class="flex-shrink-0 width-13x me-md-4 d-block mb-3 mb-md-0 small text-muted">
                            {{ date('d-m-Y', strtotime($list->timeline)) }} |
                            {{ date('H:i', strtotime($list->timeline)) }}
                        </span>
                        <div class="flex-grow-1 ps-4 border-start border-3">

                            <p class="mb-0">
                                {{ $list->activity }}
                            </p>
                        </div>
                    </li>
                @endforeach



            </ul>


        </div>
    </div>


    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Manage Schedule</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="/myevent/{{ $event_id }}/activity" method="post">
                        @csrf
                        <div class="form-floating mb-3 has-danger">
                            <input type="text" name="event_activity" class="form-control @error('event_activity')is-invalid @enderror"
                                placeholder="Announcement">
                            <label>Activity</label>
                            @error('event_activity')
                            <div class="invalid-feedback text-start">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="form-floating mb-3 has-danger">
                            <input type="datetime-local" name="time_date_start" class="form-control @error('time_date_start')is-invalid @enderror"
                                placeholder="Start Date">
                            <label>Time and Date</label>
                            @error('time_date_start')
                            <div class="invalid-feedback text-start">{{$message}}</div>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary btn-block mb-4 w-100">
                            Add
                        </button>
                    </form>


                    <div class="mx-2">
                        <div class="row">
                            <div class="col-xl-12 mb-3 mb-lg-5">
                                <div class="card">
                                    <div class="d-flex card-header justify-content-between">
                                        <h5 class="me-3 mb-0">Activity List</h5>
                                    </div>
                                    <div class="card-body">

                                        @foreach ($activity_list as $list)
                                            <div class="row mb-2">
                                                <div class="col-6">
                                                    <h6 class="mb-0">{{ $list->activity }}</h6>
                                                    <p class="mb-0 text-muted">{{ date('d-m-Y', strtotime($list->timeline)) }}</p>
                                                </div>
                                                <div class="col-6 d-flex justify-content-end">
                                                    <form action="/myevent/{{$event_id}}/remove-activity" method="post">
                                                        {{ method_field('DELETE') }}
                                                        @csrf
                                                        <input type="hidden" name="activity_id" value="{{$list->id}}"
                                                            autocomplete="off">
                                                        <button type="submit"
                                                            class="mx-1 btn btn-outline-danger link-underline link-underline-opacity-0">
                                                            Delete
                                                        </button>
                                                    </form>
                                                </div>
                                            </div>
                                            <hr />
                                        @endforeach

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>





@endsection
