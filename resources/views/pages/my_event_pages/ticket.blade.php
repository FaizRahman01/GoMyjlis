@extends('components.my_event_template')

@section('title', 'Ticket')

@section('myevent-active')active @endsection
@section('link-home'){{ URL::to('/') }}@endsection
@section('link-event'){{ URL::to('/events') }}@endsection
@section('link-login'){{ URL::to('/signin') }}@endsection
@section('link-account'){{ URL::to('/account') }}@endsection
@section('link-myevent'){{ URL::to('/myevent') }}@endsection
@section('link-notification'){{ URL::to('/notification') }}@endsection
@section('link-contact'){{ URL::to('/contact') }}@endsection

@section('link-info'){{ URL::to('/myevent/2/info') }}@endsection
@section('link-ticket'){{ URL::current() }}@endsection

@section('link-schedule'){{ URL::to('/myevent/2/schedule') }}@endsection
@section('link-poll'){{ URL::to('/myevent/2/poll') }}@endsection
@section('link-rating'){{ URL::to('/myevent/2/rating') }}@endsection
@section('link-support'){{ URL::to('/myevent/2/support') }}@endsection
@section('link-task'){{ URL::to('/myevent/2/task') }}@endsection
@section('link-attendee'){{ URL::to('/myevent/2/attendee') }}@endsection
@section('link-vendor'){{ URL::to('/myevent/2/vendor') }}@endsection
@section('link-analytic'){{ URL::to('/myevent/2/analytic') }}@endsection

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
                            <img src="https://www.pngitem.com/pimgs/m/22-220721_circled-user-male-type-user-colorful-icon-png.png"
                                alt="" width="200" height="200">
                        </div>
                        <div class="col-lg-8 col-12  profile-info">
                            <div class="header-fullname">{{ $ticket->username }}</div>
                            <div class="header-information">
                                <p><strong>{{ $ticket->title }}</strong></p>
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
