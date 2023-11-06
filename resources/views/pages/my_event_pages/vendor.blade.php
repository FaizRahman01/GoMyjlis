@extends('components.my_event_template')
@inject('carbon', 'Carbon\Carbon')

@section('title', 'Vendor')

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
@section('link-attendee'){{ URL::to('/myevent/' . $event_id . '/attendee') }}@endsection
@section('link-vendor'){{ URL::current() }}@endsection
@section('link-analytic'){{ URL::to('/myevent/' . $event_id . '/analytic') }}@endsection

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

        @foreach ($vendor_list as $list)

            <div class="list-group m-2">
                <a href="/myevent/{{ $event_id }}/vendor/{{$list->id}}" class="list-group-item list-group-item-action flex-column align-items-start">
                    <div class="d-flex w-100 justify-content-between">
                        <h5 class="mb-1">{{$list->name}}</h5>
                        <small class="text-muted">Last updated {{ $carbon::parse($list->updated_at)->diffForHumans() }}</small>
                    </div>
                    <small class="text-muted">{{$list->category}}</small>
                </a>
            </div>

        @endforeach

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
