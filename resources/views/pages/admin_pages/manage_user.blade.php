@extends('components.template')

@section('title', 'Manage User')

@section('manageuser-active')active @endsection

@section('link-home'){{ URL::to('/') }}@endsection
@section('link-event'){{ URL::to('/events') }}@endsection
@section('link-login'){{ URL::to('/signin') }}@endsection
@section('link-account'){{ URL::to('/account') }}@endsection
@section('link-myevent'){{ URL::to('/myevent') }}@endsection
@section('link-manageuser'){{ URL::current() }}@endsection
@section('link-notification'){{ URL::to('/notification') }}@endsection
@section('link-contact'){{ URL::to('/contact') }}@endsection

@section('content')

    <div class="mx-4 mt-4 mb-3">
        
        <div class="row mb-4">
            <h4 class="fw-light col-md-6 col-5 d-flex align-items-center">Existing User</h4>
            <div class="col-md-6 col-7 d-flex justify-content-end">
                <form class="d-flex align-items-center">
                    <div class="input-group align-items-center">
                        <input aria-describedby="button-addon2" aria-label="Search" class="form-control" placeholder="Search"
                            type="text">
                        <button class="btn bg-white border" id="button-addon2" type="button">
                            <img src="{{ asset('assets/icons/search.svg') }}"alt="">
                        </button>
                    </div>
                </form>
            </div>
        </div>


        <div class="row">
            
            <div class="col-lg-3 col-md-4 col-sm-12 mb-3 position-relative">
                <div class="card">
                    <div class="p-2">
                        <a href="{{ URL::to('/admin/manage-user/1') }}" class="stretched-link">jack</a>
                        <div>
                            <small>Since: <span class="text-muted">Nov 02, 2017</span></small>
                        </div>
                        <div>
                            <small>Created Event: <span class="text-muted">3</span></small>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-4 col-sm-12 mb-3 position-relative">
                <div class="card">
                    <div class="p-2">
                        <a href="{{ URL::to('/admin/manage-user/1') }}" class="stretched-link">jack</a>
                        <div>
                            <small>Since: <span class="text-muted">Nov 02, 2017</span></small>
                        </div>
                        <div>
                            <small>Created Event: <span class="text-muted">3</span></small>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-4 col-sm-12 mb-3 position-relative">
                <div class="card">
                    <div class="p-2">
                        <a href="{{ URL::to('/admin/manage-user/1') }}" class="stretched-link">jack</a>
                        <div>
                            <small>Since: <span class="text-muted">Nov 02, 2017</span></small>
                        </div>
                        <div>
                            <small>Created Event: <span class="text-muted">3</span></small>
                        </div>
                    </div>
                </div>
            </div>


            <div class="col-lg-3 col-md-4 col-sm-12 mb-3 position-relative">
                <div class="card">
                    <div class="p-2">
                        <a href="{{ URL::to('/admin/manage-user/1') }}" class="stretched-link">jack</a>
                        <div>
                            <small>Since: <span class="text-muted">Nov 02, 2017</span></small>
                        </div>
                        <div>
                            <small>Created Event: <span class="text-muted">3</span></small>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-3 col-md-4 col-sm-12 mb-3 position-relative">
                <div class="card">
                    <div class="p-2">
                        <a href="{{ URL::to('/admin/manage-user/1') }}" class="stretched-link">jack</a>
                        <div>
                            <small>Since: <span class="text-muted">Nov 02, 2017</span></small>
                        </div>
                        <div>
                            <small>Created Event: <span class="text-muted">3</span></small>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-4 col-sm-12 mb-3 position-relative">
                <div class="card">
                    <div class="p-2">
                        <a href="{{ URL::to('/admin/manage-user/1') }}" class="stretched-link">jack</a>
                        <div>
                            <small>Since: <span class="text-muted">Nov 02, 2017</span></small>
                        </div>
                        <div>
                            <small>Created Event: <span class="text-muted">3</span></small>
                        </div>
                    </div>
                </div>
            </div>


        </div>

    </div>


    {{-- <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-6 col-lg-4 mx-lg-auto my-4 d-flex justify-content-center">
                <div class="card position-relative">

                    <img src="https://bootdey.com/img/Content/avatar/avatar1.png" class="card-img-top"
                        alt="Hollywood Sign on The Hill" />
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">
                            This is a longer card with supporting text below as a natural lead-in to
                            additional content. This content is a little bit longer.
                        </p>
                    </div>
                    <a href="{{ URL::to('/admin/manage-user/1') }}" class="stretched-link">
                    </a>
                </div>
            </div>
            <div class="col-sm-12 col-md-6 col-lg-4 mx-lg-auto my-4 d-flex justify-content-center">
                <div class="card">
                    <img src="https://bootdey.com/img/Content/avatar/avatar2.png" class="card-img-top"
                        alt="Hollywood Sign on The Hill" />
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">
                            This is a longer card with supporting text below as a natural lead-in to
                            additional content. This content is a little bit longer.
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-6 col-lg-4 mx-lg-auto my-4 d-flex justify-content-center">
                <div class="card">
                    <img src="https://bootdey.com/img/Content/avatar/avatar3.png" class="card-img-top"
                        alt="Hollywood Sign on The Hill" />
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">
                            This is a longer card with supporting text below as a natural lead-in to
                            additional content. This content is a little bit longer.
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-6 col-lg-4 mx-lg-auto my-4 d-flex justify-content-center">
                <div class="card">
                    <img src="https://bootdey.com/img/Content/avatar/avatar4.png" class="card-img-top"
                        alt="Hollywood Sign on The Hill" />
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">
                            This is a longer card with supporting text below as a natural lead-in to
                            additional content. This content is a little bit longer.
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-6 col-lg-4 mx-lg-auto my-4 d-flex justify-content-center">
                <div class="card">
                    <img src="https://bootdey.com/img/Content/avatar/avatar5.png" class="card-img-top"
                        alt="Hollywood Sign on The Hill" />
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">
                            This is a longer card with supporting text below as a natural lead-in to
                            additional content. This content is a little bit longer.
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-6 col-lg-4 mx-lg-auto my-4 d-flex justify-content-center">
                <div class="card">
                    <img src="https://bootdey.com/img/Content/avatar/avatar6.png" class="card-img-top"
                        alt="Hollywood Sign on The Hill" />
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">
                            This is a longer card with supporting text below as a natural lead-in to
                            additional content. This content is a little bit longer.
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-6 col-lg-4 mx-lg-auto my-4 d-flex justify-content-center">
                <div class="card">
                    <img src="https://bootdey.com/img/Content/avatar/avatar7.png" class="card-img-top"
                        alt="Hollywood Sign on The Hill" />
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">
                            This is a longer card with supporting text below as a natural lead-in to
                            additional content. This content is a little bit longer.
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-6 col-lg-4 mx-lg-auto my-4 d-flex justify-content-center">
                <div class="card">
                    <img src="https://bootdey.com/img/Content/avatar/avatar8.png" class="card-img-top"
                        alt="Hollywood Sign on The Hill" />
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">
                            This is a longer card with supporting text below as a natural lead-in to
                            additional content. This content is a little bit longer.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}

@endsection
