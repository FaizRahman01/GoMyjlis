@extends('components.template')

@section('title', 'Manage Event')

@section('manageuser-active')active @endsection

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
            <h4 class="fw-light col-md-6 col-8 d-flex align-items-center">Event Overview</h4>
            <div class="col-md-6 col-4 d-flex justify-content-end">
                <a href="" class="btn btn-outline-danger">
                    Remove Event
                </a>
            </div>
        </div>



        <div class="row row-gap-4">

            <div class="col-xl-6 col-md-12">
                <div class="card p-3">
                    <div class="row">
                        <div class="col-lg-4 col-md-4 col-12 d-flex justify-content-center">
                            <div class=""> <img src="https://bootdey.com/img/Content/avatar/avatar7.png"
                                    height="150" width="150" alt=""> </div>
                        </div>
                        <div class="col-lg-8 col-md-8 col-12 d-flex justify-content-center justify-content-md-start mt-3">
                            <div>
                                <h4 class="">Jack Lee</h4>
                                <span class="text-muted">Event Organizer</span>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-6 col-md-12">
                <div class="card p-3">
                    <div class="row">
                        <div class="col-lg-4 col-md-4 col-12 d-flex justify-content-center">
                            <div class=""> <img src="https://bootdey.com/img/Content/avatar/avatar2.png"
                                    height="150" width="150" alt=""> </div>
                        </div>
                        <div class="col-lg-8 col-md-8 col-12 d-flex justify-content-center justify-content-md-start mt-3">
                            <div>
                                <h4 class="">Michael Deo</h4>
                                <span class="text-muted">Event Assistant</span>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-6 col-md-12">
                <div class="card p-3">
                    <div class="row">
                        <div class="col-lg-4 col-md-4 col-12 d-flex justify-content-center">
                            <div class=""> <img src="https://bootdey.com/img/Content/avatar/avatar3.png"
                                    height="150" width="150" alt=""> </div>
                        </div>
                        <div class="col-lg-8 col-md-8 col-12 d-flex justify-content-center justify-content-md-start mt-3">
                            <div>
                                <h4 class="">Caitlyn</h4>
                                <span class="text-muted">Event Assistant</span>
                            </div>

                        </div>
                    </div>
                </div>
            </div>




        </div>






        <hr class="mb-4">
        <div class="row">
            <div class="col-lg-4 mb-4">
                <!-- Billing card 1-->
                <div class="card h-100 border-start-lg border-start-primary">
                    <div class="card-body">
                        <div class="small text-muted">Total of Attendee</div>
                        <div class="h3">10/50</div>
                    </div>
                </div>
            </div>
        </div>

        <div class="card card-header-actions mb-4">
            <div class="card-header">
                Attendee List
            </div>
            <div class="card-body p-0">

                <div class="d-flex align-items-center justify-content-between px-4 border-bottom border-1 py-2">
                    <div class="d-flex align-items-center">
                        <i class="fab fa-cc-visa fa-2x cc-color-visa"></i>
                        <div class="ms-4">
                            <div class="small">Zoro</div>
                            <div class="text-xs text-muted">Approved: 26 Aug 2023</div>
                        </div>
                    </div>
                    <div class="ms-4 small">
                        <div class="badge bg-light text-dark me-3">Attendee</div>
                        <a href="">Kick</a>
                    </div>
                </div>

                <div class="d-flex align-items-center justify-content-between px-4 border-bottom border-1 py-2">
                    <div class="d-flex align-items-center">
                        <i class="fab fa-cc-visa fa-2x cc-color-visa"></i>
                        <div class="ms-4">
                            <div class="small">Zoro</div>
                            <div class="text-xs text-muted">Approved: 26 Aug 2023</div>
                        </div>
                    </div>
                    <div class="ms-4 small">
                        <div class="badge bg-light text-dark me-3">Attendee</div>
                        <a href="">Kick</a>
                    </div>
                </div>
                
            </div>
        </div>




    </div>

@endsection
