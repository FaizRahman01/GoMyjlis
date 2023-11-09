@extends('components.template')

@section('title', 'event')

@section('event-active')active @endsection

@section('link-home'){{ URL::to('/') }}@endsection
@section('link-event'){{ URL::to('/events') }}@endsection
@section('link-login'){{ URL::to('/signin') }}@endsection

@section('link-account'){{ URL::to('/account') }}@endsection
@section('link-myevent'){{ URL::to('/myevent') }}@endsection
@section('link-manageuser'){{ URL::to('/admin/manage-user') }}@endsection
@section('link-notification'){{ URL::to('/notification') }}@endsection

@section('content')


        <div class="container">

            <!-- Header -->
            <div class="mb-4">
                <div class="col-md-10 col-lg-8 col-xl-7 py-5 mx-auto">
                    {{-- carousel here --}}
                    <div class="container">
                        <div class="row mb-4">
                            <h4 class="font-weight-bold col-md-6 col-8 d-flex align-items-center">{{ $event->title }}</h4>
                            <div class="col-md-6 col-4 d-flex justify-content-end">
                                <form action="{{ URL::to('/events/join') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="event_id" value="{{ $event->id }}" autocomplete="off">
                                    <button type="submit"
                                        class="btn btn-outline-dark link-underline link-underline-opacity-0 d-flex align-items-center">
                                        Count Me In</button>
                                </form>
                            </div>
                        </div>

                        <div class="text-muted mb-4">
                            {!! nl2br($event->description) !!}
                        </div>
                    </div>
                </div>
                <hr class="m-0">
            </div>
            <!-- Header -->

            <!-- Info -->
            <div class="card mb-4">
                <div class="card-body">

                    <div class="row mb-2">
                        <div class="col-md-3 text-muted">Organiser:</div>
                        <div class="col-md-9">
                            {{ $event->username }}
                        </div>
                    </div>

                    <div class="row mb-2">
                        <div class="col-md-3 text-muted">Date Start:</div>
                        <div class="col-md-9">
                            <p>{{ $event->start_date }}</p>
                        </div>
                    </div>

                    <div class="row mb-2">
                        <div class="col-md-3 text-muted">Date End:</div>
                        <div class="col-md-9">
                            <p>{{ $event->end_date }}</p>
                        </div>
                    </div>

                    <div class="row mb-2">
                        <div class="col-md-3 text-muted">State:</div>
                        <div class="col-md-9">
                            <p>{{ $event->state }}</p>
                        </div>
                    </div>

                    <div class="row mb-2">
                        <div class="col-md-3 text-muted">Address:</div>
                        <div class="col-md-9">
                            {{ $event->address }}
                        </div>
                    </div>

                </div>
                <div class="card-footer text-center p-0">
                    <div class="row">
                        <div class="d-flex col flex-column py-3">
                            <div class="font-weight-bold">Attendee</div>
                            <div class="text-muted small">{{ $ticket_count }}</div>
                        </div>
                        <div class="d-flex col flex-column py-3">
                            <div class="font-weight-bold">Visibility</div>
                            <div class="text-muted small">{{ $event->is_private == 0 ? 'Public' : 'Private' }}</div>
                        </div>
                        <div class="d-flex col flex-column py-3">
                            <div class="font-weight-bold">Event Mode</div>
                            <div class="text-muted small"> {{ $event->event_mode }}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

@endsection
