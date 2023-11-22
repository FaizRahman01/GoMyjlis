@extends('components.my_event_template')

@section('title', 'Ticket')

@section('myevent-active')active @endsection
@section('link-home'){{ URL::to('/') }}@endsection
@section('link-event'){{ URL::to('/events') }}@endsection
@section('link-login'){{ URL::to('/signin') }}@endsection
@section('link-account'){{ URL::to('/account') }}@endsection
@section('link-myevent'){{ URL::to('/myevent') }}@endsection



@section('link-info'){{ URL::to('/myevent/' . $event_id . '/info') }}@endsection
@section('link-ticket'){{ URL::current() }}@endsection

@section('dd-item')
    <a class="dropdown-item text-dark" href="{{ URL::to('/myevent/' . $event_id . '/schedule') }}">Schedule</a>
    <a class="dropdown-item text-dark" href="{{ URL::to('/myevent/' . $event_id . '/poll') }}">Poll</a>
    @if ($event->is_organizer == 0 && $event->is_assistant == 0)
        <a class="dropdown-item text-dark" href="{{ URL::to('/myevent/' . $event_id . '/rating') }}">Give Rating</a>
    @endif
    <a class="dropdown-item text-dark" href="{{ URL::to('/myevent/' . $event_id . '/support') }}">Support Ticket</a>
    @if (
        ($event->is_organizer == 1 && $event->is_assistant == 0) ||
            ($event->is_organizer == 0 && $event->is_assistant == 1))
        <a class="dropdown-item text-dark" href="{{ URL::to('/myevent/' . $event_id . '/task') }}">Management Task</a>
        <a class="dropdown-item text-dark" href="{{ URL::to('/myevent/' . $event_id . '/attendee') }}">Attendee List</a>
        <a class="dropdown-item text-dark" href="{{ URL::to('/myevent/' . $event_id . '/vendor') }}">Vendor</a>
        <a class="dropdown-item text-dark" href="{{ URL::to('/myevent/' . $event_id . '/analytic') }}">Analytics</a>
    @endif
@endsection

@section('content')

    <div class="row mb-4">
        <h4 class="fw-light col-auto d-flex align-items-center">Ticket Pass</h4>
    </div>


    @foreach ($user_ticket as $ticket)
        <div class="mx-0 mx-sm-auto">
            <div class="card">
                <div class="card-body">

                </div>
                <div class="card-footer">
                    <div class="row mx-2 py-3">
                        <div class="col-lg-4 col-12  text-center">
                            <img src="{{ asset('assets/img/user.png') }}" alt="" width="200" height="200">
                        </div>
                        <div class="col-lg-8 col-12  profile-info">
                            <div class="header-fullname">{{ '@' }}{{ $ticket->username }}</div>
                            <div class="header-information">
                                <p><strong>{{ $ticket->title }}</strong></p>
                                <p>Email: <span class="text-muted">{{ $ticket->email }}</span></p>
                                <p>Role:
                                    <span class="text-muted">
                                        @if ($ticket->is_organizer == 1 && $ticket->is_assistant == 0)
                                            Organizer
                                        @elseif ($ticket->is_organizer == 0 && $ticket->is_assistant == 1)
                                            Assistant
                                        @else
                                            Attendee
                                        @endif
                                    </span>
                                </p>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    @endforeach




@endsection
