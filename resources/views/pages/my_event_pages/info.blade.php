@extends('components.my_event_template')

@section('title', 'info')

@section('myevent-active')active @endsection
@section('link-home'){{ URL::to('/') }}@endsection
@section('link-event'){{ URL::to('/events') }}@endsection
@section('link-login'){{ URL::to('/signin') }}@endsection
@section('link-account'){{ URL::to('/account') }}@endsection
@section('link-myevent'){{ URL::to('/myevent') }}@endsection



@section('link-info'){{ URL::current() }}@endsection
@section('link-ticket'){{ URL::to('/myevent/' . $event_id . '/ticket') }}@endsection

@section('link-schedule'){{ URL::to('/myevent/' . $event_id . '/schedule') }}@endsection
@section('link-poll'){{ URL::to('/myevent/' . $event_id . '/poll') }}@endsection
@section('link-rating'){{ URL::to('/myevent/' . $event_id . '/rating') }}@endsection
@section('link-support'){{ URL::to('/myevent/' . $event_id . '/support') }}@endsection
@section('link-task'){{ URL::to('/myevent/' . $event_id . '/task') }}@endsection
@section('link-attendee'){{ URL::to('/myevent/' . $event_id . '/attendee') }}@endsection
@section('link-vendor'){{ URL::to('/myevent/' . $event_id . '/vendor') }}@endsection
@section('link-analytic'){{ URL::to('/myevent/' . $event_id . '/analytic') }}@endsection

@section('content')



    <div class="mb-4">
        <div class="col-md-10 col-lg-8 col-xl-7 py-5 mx-auto">
            {{-- carousel here --}}
            <div class="container">
                <div class="row mb-4">
                    <h4 class="font-weight-bold col-md-6 col-8 d-flex align-items-center">{{ $event->title }}</h4>
                    @if ($event->is_organizer == 1 && $event->is_assistant == 0 || $event->is_organizer == 0 && $event->is_assistant == 1)
                        <div class="col-md-6 col-4 d-flex justify-content-end">
                            <button type="button" class="btn btn-outline-dark" data-bs-toggle="modal"
                                data-bs-target="#exampleModal">
                                Edit
                            </button>
                        </div>
                    @endif

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



    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Change Event Detail</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="px-2">
                        <form action="/myevent/edit" method="post">
                            {{ method_field('PUT') }}
                            @csrf
                            <input type="hidden" name="event_id" value="{{ $event->event_id }}" autocomplete="off">
                            <div class="form-floating mb-3 has-danger">
                                <input value="{{ $event->title }}" type="text" name="event_title"
                                    class="form-control @error('event_title') is-invalid @enderror"
                                    placeholder="Birthday Party">
                                <label>Event Title</label>
                                @error('event_title')
                                    <div class="invalid-feedback text-start">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-floating mb-3 has-danger">
                                <input value="{{ $event->start_date }}" type="date" name="start_date"
                                    class="form-control @error('start_date') is-invalid @enderror" placeholder="Start Date">
                                <label>Start Date</label>
                                @error('start_date"')
                                    <div class="invalid-feedback text-start">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-floating mb-3 has-danger">
                                <input value="{{ $event->end_date }}" type="date" name="end_date"
                                    class="form-control @error('end_date') is-invalid @enderror" placeholder="End Date">
                                <label>End Date</label>
                                @error('end_date')
                                    <div class="invalid-feedback text-start">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-floating mb-3">
                                <input value="{{ $event->address }}" type="text" name="address" class="form-control"
                                    placeholder="Address">
                                <label>Location Address</label>
                            </div>
                            <div class="input-group mb-3">
                                <span class="input-group-text py-3">Mode of Event</span>
                                <select name="event_mode" class="form-select" id="exampleSelect1">
                                    <option>In Person</option>
                                    <option>Online</option>
                                    <option>Hybrid</option>
                                </select>
                            </div>
                            <div class="input-group mb-3">
                                <span class="input-group-text py-3">Visible on</span>
                                <select name="visibility" class="form-select" id="exampleSelect1">
                                    <option>Public</option>
                                    <option>Private</option>
                                </select>
                            </div>
                            <div class="input-group mb-3">
                                <span class="input-group-text py-3">State</span>
                                <select name="state" class="form-select" id="exampleSelect1">
                                    @foreach ($state as $state_list)
                                        <option>{{ $state_list }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-floating mb-3">
                                <textarea value="{{ $event->description }}" name="event_description" class="form-control"
                                    placeholder="Event Description"></textarea>
                                <label>Event Description</label>
                            </div>

                            <!-- Submit button -->
                            <button type="submit" class="btn btn-primary btn-block mb-4">
                                Save
                            </button>

                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
