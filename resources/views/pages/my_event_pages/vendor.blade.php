@extends('components.my_event_template')
@inject('carbon', 'Carbon\Carbon')

@section('title', 'Vendor')

@section('myevent-active')active @endsection
@section('link-home'){{ URL::to('/') }}@endsection
@section('link-event'){{ URL::to('/events') }}@endsection
@section('link-login'){{ URL::to('/signin') }}@endsection
@section('link-account'){{ URL::to('/account') }}@endsection
@section('link-myevent'){{ URL::to('/myevent') }}@endsection



@section('link-info'){{ URL::to('/myevent/' . $event_id . '/info') }}@endsection
@section('link-ticket'){{ URL::to('/myevent/' . $event_id . '/ticket') }}@endsection

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
        <a class="dropdown-item text-dark" href="{{ URL::current() }}">Vendor</a>
        <a class="dropdown-item text-dark" href="{{ URL::to('/myevent/' . $event_id . '/analytic') }}">Analytics</a>
    @endif
@endsection

@section('content')

    <div class="row mb-4">
        <h4 class="fw-light col-md-6 col-8 d-flex align-items-center">Vendor</h4>
        <div class="col-md-6 col-4 d-flex justify-content-end">
            <button type="button" class="btn btn-outline-dark" data-bs-toggle="modal" data-bs-target="#exampleModal">
                Add Vendor +
            </button>
        </div>
    </div>


    <div class="card mb-3">
        @if ($vendor_list->isNotEmpty())
            @foreach ($vendor_list as $list)
                <div class="list-group m-2">
                    <a href="/myevent/{{ $event_id }}/vendor/{{ $list->id }}"
                        class="list-group-item list-group-item-action flex-column align-items-start">
                        <div class="d-flex w-100 justify-content-between">
                            <h5 class="mb-1">{{ $list->name }}</h5>
                            <small class="text-muted">Last updated
                                {{ $carbon::parse($list->updated_at)->diffForHumans() }}</small>
                        </div>
                        <small class="text-muted">{{ $list->category }}</small>
                    </a>
                </div>
            @endforeach
        @else
            <div class="card">
                <div class="page-wrap d-flex flex-row align-items-center my-5">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-md-12 text-center">
                                <div class="mb-4 lead">You have not add any vendor.</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif


    </div>

    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Add Vendor For Event</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="/myevent/{{ $event_id }}/vendor" method="post">
                        @csrf
                        <div class="form-floating mb-3 has-danger">
                            <input type="text" name="vendor_name"
                                class="form-control @error('vendor_name')is-invalid @enderror " placeholder="Announcement">
                            <label>Vendor Name</label>
                            @error('vendor_name')
                                <div class="invalid-feedback text-start">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-floating mb-3 has-danger">
                            <input type="text" name="phone_number"
                                class="form-control @error('phone_number')is-invalid @enderror" placeholder="Announcement">
                            <label>Phone Number</label>
                            @error('phone_number')
                                <div class="invalid-feedback text-start">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-floating mb-3 has-danger">
                            <input type="text" name="address" class="form-control @error('address')is-invalid @enderror"
                                placeholder="Announcement">
                            <label>Location Address</label>
                            @error('address')
                                <div class="invalid-feedback text-start">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-floating mb-3 has-danger">
                            <input type="text" name="service_category"
                                class="form-control @error('service_category')is-invalid @enderror"
                                placeholder="Photography">
                            <label>Service Category</label>
                            @error('service_category')
                                <div class="invalid-feedback text-start">{{ $message }}</div>
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
