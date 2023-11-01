@extends('components.template')

@section('title', 'Manage User')

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

    <div class="mx-4 mt-4 mb-3">

        <div class="row mb-4">
            <h4 class="fw-light col-md-6 col-8 d-flex align-items-center">Created User Event</h4>
            <div class="col-md-6 col-4 d-flex justify-content-end">
                <a href="" class="btn btn-outline-danger">
                    Remove Account
                </a>
            </div>
        </div>

        <div class="row d-flex justify-content-center">
            <div class="col-12">
                <div>
                    <h3>
                        <img class="img-thumbnail" width="120" height="120"
                            src="http://cdn.onlinewebfonts.com/svg/img_124200.png">
                        Jack Lee
                    </h3>
                </div>
                <div>
                    <div>
                        <small>Username: <span class="text-muted">jack</span></small>
                    </div>
                    <div>
                        <small>Email: <span class="text-muted">jack11@email.com</span></small>
                    </div>
                    <div>
                        <small>Date Created: <span class="text-muted">Nov 02, 2017</span></small>
                    </div>
                </div>
            </div>

            <div class="row my-4">

                <div class="col-lg-3 col-md-4 col-sm-12 mb-3 position-relative">
                    <div class="card">
                        <div class="p-2">
                            <a href="{{ URL::to('/admin/manage-event/1') }}" class="stretched-link">Birthday Party</a>
                            <div>
                                <small>Attendee: <span class="text-muted">3</span></small>
                            </div>
                            <div>
                                <small>Date Created: <span class="text-muted">Nov 02, 2017</span></small>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-4 col-sm-12 mb-3 position-relative">
                    <div class="card">
                        <div class="p-2">
                            <a href="{{ URL::to('/admin/manage-event/1') }}" class="stretched-link">Birthday Party</a>
                            <div>
                                <small>Attendee: <span class="text-muted">3</span></small>
                            </div>
                            <div>
                                <small>Date Created: <span class="text-muted">Nov 02, 2017</span></small>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-4 col-sm-12 mb-3 position-relative">
                    <div class="card">
                        <div class="p-2">
                            <a href="{{ URL::to('/admin/manage-event/1') }}" class="stretched-link">Birthday Party</a>
                            <div>
                                <small>Attendee: <span class="text-muted">3</span></small>
                            </div>
                            <div>
                                <small>Date Created: <span class="text-muted">Nov 02, 2017</span></small>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="col-lg-3 col-md-4 col-sm-12 mb-3 position-relative">
                    <div class="card">
                        <div class="p-2">
                            <a href="{{ URL::to('/admin/manage-event/1') }}" class="stretched-link">Birthday Party</a>
                            <div>
                                <small>Attendee: <span class="text-muted">3</span></small>
                            </div>
                            <div>
                                <small>Date Created: <span class="text-muted">Nov 02, 2017</span></small>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-4 col-sm-12 mb-3 position-relative">
                    <div class="card">
                        <div class="p-2">
                            <a href="{{ URL::to('/admin/manage-event/1') }}" class="stretched-link">Birthday Party</a>
                            <div>
                                <small>Attendee: <span class="text-muted">3</span></small>
                            </div>
                            <div>
                                <small>Date Created: <span class="text-muted">Nov 02, 2017</span></small>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-4 col-sm-12 mb-3 position-relative">
                    <div class="card">
                        <div class="p-2">
                            <a href="{{ URL::to('/admin/manage-event/1') }}" class="stretched-link">Birthday Party</a>
                            <div>
                                <small>Attendee: <span class="text-muted">3</span></small>
                            </div>
                            <div>
                                <small>Date Created: <span class="text-muted">Nov 02, 2017</span></small>
                            </div>
                        </div>
                    </div>
                </div>


            </div>

        </div>

    </div>


@endsection
