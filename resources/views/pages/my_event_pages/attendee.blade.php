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

@section('link-info'){{ URL::to('/myevent/' . $event_id . '/info') }}@endsection
@section('link-ticket'){{ URL::to('/myevent/' . $event_id . '/ticket') }}@endsection

@section('link-schedule'){{ URL::to('/myevent/' . $event_id . '/schedule') }}@endsection
@section('link-poll'){{ URL::to('/myevent/' . $event_id . '/poll') }}@endsection
@section('link-rating'){{ URL::to('/myevent/' . $event_id . '/rating') }}@endsection
@section('link-support'){{ URL::to('/myevent/' . $event_id . '/support') }}@endsection
@section('link-task'){{ URL::to('/myevent/' . $event_id . '/task') }}@endsection
@section('link-attendee'){{ URL::current() }}@endsection
@section('link-vendor'){{ URL::to('/myevent/' . $event_id . '/vendor') }}@endsection
@section('link-analytic'){{ URL::to('/myevent/' . $event_id . '/analytic') }}@endsection

@section('content')

    <div class="row mb-4">
        <h4 class="fw-light col-md-6 col-8 d-flex align-items-center">Manage Attendee</h4>
        <div class="col-md-6 col-4 d-flex justify-content-end">
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

                        @foreach ($user_list as $list)
                            @if ($list->is_approve != 0 || $list->is_assistant != 0)
                                @continue
                            @endif
                            <div class="row mb-2">
                                <div class="col-6">
                                    <h6 class="mb-0">{{ $list->username }}</h6>
                                    <p class="mb-0 text-muted">{{ date('d-m-Y', strtotime($list->created_at)) }}</p>
                                </div>
                                <div class="col-6 d-flex justify-content-end">
                                    <form action="/myevent/{{ $list->event_id }}/decline" method="post">
                                        {{ method_field('DELETE') }}
                                        @csrf
                                        <input type="hidden" name="user_id" value="{{ $list->user_id }}"
                                            autocomplete="off">
                                        <button type="submit"
                                            class="mx-1 btn btn-outline-danger link-underline link-underline-opacity-0">
                                            Decline
                                        </button>
                                    </form>
                                    <form action="/myevent/{{ $list->event_id }}/accept" method="post">
                                        {{ method_field('PUT') }}
                                        @csrf
                                        <input type="hidden" name="user_id" value="{{ $list->user_id }}"
                                            autocomplete="off">
                                        <button type="submit"
                                            class="mx-1 btn btn-outline-success link-underline link-underline-opacity-0">
                                            Accept
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


    <div class="mx-2">
        <div class="row">
            <div class="col-xl-12 mb-3 mb-lg-5">
                <div class="card">
                    <div class="d-flex card-header justify-content-between">
                        <h5 class="me-3 mb-0">Event Attendee</h5>
                        <a href="#!.html">View All</a>
                    </div>
                    <div class="card-body">

                        @foreach ($user_list as $list)
                            @if ($list->is_approve != 1)
                                @continue
                            @endif
                            <div class="row mb-2 mx-2">
                                <div class="col-6">
                                    <h6 class="mb-0">
                                        {{ Str::ucfirst($list->username) }}
                                        @if ($list->is_attend == 1)
                                        <span class="badge bg-success bg-opacity-75 text-white">Check In ✔️</span>
                                        @endif
                                    </h6>
                                    <p class="mb-0 text-muted">
                                        @if ($list->is_organizer == 0 && $list->is_assistant == 1)
                                            Assistant
                                        @else
                                            Attendee
                                        @endif
                                    </p>
                                </div>
                                <div class="col-6 d-flex justify-content-end">
                                    <div class="row">
                                        <div class="btn-group" role="group"
                                            aria-label="Button group with nested dropdown">
                                            <button type="button" class="btn btn-primary">Manage</button>
                                            <div class="btn-group" role="group">
                                                <button id="btnGroupDrop1" type="button"
                                                    class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown"
                                                    aria-haspopup="true" aria-expanded="false"></button>
                                                <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                                                    @if ($list->is_organizer == 0 && $list->is_assistant == 1)
                                                        <form action="/myevent/{{ $list->event_id }}/demote"
                                                            method="post">
                                                            {{ method_field('PUT') }}
                                                            @csrf
                                                            <input type="hidden" name="user_id"
                                                                value="{{ $list->user_id }}" autocomplete="off">
                                                            <button type="submit" class="dropdown-item">Demote to
                                                                attendee</button>
                                                        </form>
                                                    @else
                                                        <form action="/myevent/{{ $list->event_id }}/hire" method="post">
                                                            {{ method_field('PUT') }}
                                                            @csrf
                                                            <input type="hidden" name="user_id"
                                                                value="{{ $list->user_id }}" autocomplete="off">
                                                            <button type="submit" class="dropdown-item">Hire as
                                                                assistant</button>
                                                        </form>
                                                    @endif
                                                    @if ($list->is_attend == 0)
                                                        <form action="/myevent/{{ $list->event_id }}/checkin"
                                                            method="post">
                                                            {{ method_field('PUT') }}
                                                            @csrf
                                                            <input type="hidden" name="user_id"
                                                                value="{{ $list->user_id }}" autocomplete="off">
                                                            <button type="submit" class="dropdown-item">Check In</button>
                                                        </form>
                                                    @endif
                                                    <form action="/myevent/{{ $list->event_id }}/kick" method="POST">
                                                        {{ method_field('DELETE') }}
                                                        @csrf
                                                        <input type="hidden" name="user_id" value="{{ $list->user_id }}"
                                                            autocomplete="off">
                                                        <button type="submit" class="dropdown-item">Kick</button>
                                                    </form>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                        

                                </div>
                            </div>
                            <hr />
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>




@endsection
