@extends('components.template')

@section('title', 'Create Event')

@section('myevent-active')active @endsection

@section('link-home'){{ URL::to('/') }}@endsection
@section('link-event'){{ URL::to('/events') }}@endsection
@section('link-login'){{ URL::to('/signin') }}@endsection
@section('link-account'){{ URL::to('/account') }}@endsection
@section('link-myevent'){{ URL::to('/myevent') }}@endsection
@section('link-manageuser'){{ URL::to('/admin/manage-user') }}@endsection
@section('link-notification'){{ URL::to('/notification') }}@endsection
@section('link-contact'){{ URL::to('/contact') }}@endsection

@section('content')

    <div class="card mx-4 mx-md-5 mt-5 mb-4">
        <!-- Section: Design Block -->
        <section class="text-center">
            <div class="card-body py-5 px-md-5">

                <div class="row d-flex justify-content-center">
                    <div class="col-lg-8">
                        <h2 class="fw-bold mb-5">Create Your Own Event</h2>
                        <form action="/create-event" method="POST">
                            @csrf
                            <div class="form-floating mb-3 has-danger">
                                <input value="" type="text" name="event_title" class="form-control is-invalid"
                                    placeholder="Birthday Party">
                                <label>Event Title</label>
                                <div class="invalid-feedback text-start"> Event Title too long</div>
                            </div>
                            <div class="form-floating mb-3 has-danger">
                                <input value="" type="date" name="start_date" class="form-control is-invalid"
                                    placeholder="Start Date">
                                <label>Start Date</label>
                                <div class="invalid-feedback text-start">Required</div>
                            </div>
                            <div class="form-floating mb-3 has-danger">
                                <input value="" type="date" name="end_date" class="form-control is-invalid"
                                    placeholder="End Date">
                                <label>End Date</label>
                                <div class="invalid-feedback text-start">Required</div>
                            </div>
                            <div class="form-floating mb-3 has-danger">
                                <input value="" type="text" name="address" class="form-control is-invalid"
                                    placeholder="Address">
                                <label>Location Address</label>
                                <div class="invalid-feedback text-start">Required</div>
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
                                        <option>{{$state_list}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-floating mb-3">
                                <textarea value="" name="event_description" class="form-control" placeholder="Event Description"></textarea>
                                <label>Event Description</label>
                            </div>

                            <!-- Submit button -->
                            <button type="submit" class="btn btn-primary btn-block mb-4">
                                Confirm
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </section>

    </div>

@endsection
