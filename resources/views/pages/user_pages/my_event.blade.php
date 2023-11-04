@extends('components.template')

@section('title', 'My Event')

@section('myevent-active')active @endsection

@section('link-home'){{ URL::to('/') }}@endsection
@section('link-event'){{ URL::to('/events') }}@endsection
@section('link-login'){{ URL::to('/signin') }}@endsection
@section('link-account'){{ URL::to('/account') }}@endsection
@section('link-myevent'){{ URL::current() }}@endsection
@section('link-manageuser'){{ URL::to('/admin/manage-user') }}@endsection
@section('link-notification'){{ URL::to('/notification') }}@endsection
@section('link-contact'){{ URL::to('/contact') }}@endsection

@section('content')

    <section class="mt-4">
        <div class="container">


            <div class="justify-content-center row">
                <div class="col-lg-12">
                    <form action="#">
                        <div class="row d-flex justify-content-lg-center bg-primary-subtle bg-gradient p-3 mx-2 rounded">
                            <div class="col-lg-3">
                                <label for="exampleSelect1" class="form-label">State</label>
                                <select class="form-select" id="exampleSelect1">
                                    <option>All Place</option>
                                    <option>Kuala Lumpur</option>
                                    <option>Selangor</option>
                                    <option>Johor</option>
                                </select>
                            </div>
                            <div class="col-lg-3">
                                <label for="exampleSelect1" class="form-label">Category</label>
                                <select class="form-select" id="exampleSelect1">
                                    <option>All Type</option>
                                    <option>Online</option>
                                    <option>In Person</option>
                                </select>
                            </div>
                            <div class="col-lg-3 d-flex align-items-end pt-3">
                                <a class="btn btn-primary w-100" href="#">Filter</a>
                            </div>
                            <div class="col-lg-3 d-flex align-items-end pt-3">
                                <a class="btn btn-secondary w-100" href="{{ URL::to('/create-event') }}">Create New Event
                                    +</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>




            <div class="row">
                <div class="col-lg-12">
                    <div>

                        @foreach ($user_event as $mylist)
                            <div class="card mt-4">
                                <div class="p-4 card-body">
                                    <div class="align-items-center row">
                                        <div class="col-md-5 col-12">
                                            <div class="mt-3 mt-lg-0">
                                                <h5 class="fs-19 mb-0">
                                                    <a class="primary-link" href="/myevent/{{$mylist->event_id}}/info">{{$mylist->title}}</a>
                                                </h5>
                                                <p class="text-muted my-1">Attendee</p>
                                                <ul class="list-inline mb-0 text-muted mb-2">
                                                    <li class="list-inline-item"> {{$mylist->state}}</li>
                                                    <li class="list-inline-item"> {{$mylist->start_date}}</li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="col-md-7 col-12 d-flex justify-content-md-end">
                                            <a class="btn btn-danger" href="#">Leave</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach




                    </div>
                </div>
            </div>

            <div class="col-lg-12 justify-content-center text-center mt-5 mb-2">
                <a href="#" class="btn">More Event +</a>
            </div>

        </div>
    </section>
@endsection
