@extends('components.template')

@section('title', 'Account')

@section('content')
    @section('account-active')active @endsection

@section('link-home'){{ URL::to('/') }}@endsection
@section('link-event'){{ URL::to('/events') }}@endsection
@section('link-login'){{ URL::to('/signin') }}@endsection
@section('link-account'){{ URL::current() }}@endsection
@section('link-myevent'){{ URL::to('/myevent') }}@endsection
@section('link-notification'){{ URL::to('/notification') }}@endsection
@section('link-contact'){{ URL::to('/contact') }}@endsection
@section('link-manageuser'){{ URL::to('/admin/manage-user') }}@endsection

    <div class="mx-4 mt-4">
        <ul class="nav nav-tabs d-flex justify-content-center" id="myTab" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile-tab-pane"
                    type="button" role="tab" aria-controls="profile-tab-pane" aria-selected="true">Profile</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact-tab-pane"
                    type="button" role="tab" aria-controls="contact-tab-pane" aria-selected="false">Change Password</button>
            </li>
        </ul>
        <div class="tab-content" id="myTabContent">

            <div class="tab-pane fade show active" id="profile-tab-pane" role="tabpanel" aria-labelledby="profile-tab" tabindex="0">


                <section class="h-100 h-custom bg-dark-subtle bg-gradient">
                    <div class="container py-5 h-100">
                        <div class="row d-flex justify-content-center align-items-center h-100">
                            <div class="col-lg-8 col-xl-6">
                                <div class="card rounded-3">

                                    <div class="card-body p-4 p-md-5">
                                        <h4 class="fw-light mb-5">Change your profile detail</h4>
                                        <form action="/account/profile" method="POST">
                                            @method('put')
                                            @csrf
                                            <div class="form-floating mb-3 has-danger">
                                                <input value="{{ (old('username')) ? old('username') : auth()->user()->username }}" type="text" name="username"
                                                    class="form-control @error('username')is-invalid @enderror" placeholder="jimmyneutron">
                                                <label>Username</label>
                                                <div class="invalid-feedback text-start"> @error('username'){{$message}}@enderror</div>
                                            </div>
                                            <div class="form-floating mb-3 has-danger">
                                                <input value="{{ (old('email')) ? old('email') : auth()->user()->email  }}" type="email" name="email"
                                                    class="form-control @error('email')is-invalid @enderror" placeholder="name@example.com">
                                                <label>Email</label>
                                                <div class="invalid-feedback text-start">@error('email'){{$message}}@enderror</div>
                                            </div>


                                            <button type="submit" class="btn btn-primary btn-block mb-4 w-100">
                                                Save
                                            </button>
                                        </form>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>


            </div>


            <div class="tab-pane fade" id="contact-tab-pane" role="tabpanel" aria-labelledby="contact-tab" tabindex="0">


                <section class="h-100 h-custom bg-dark-subtle bg-gradient">
                    <div class="container py-5 h-100">
                        <div class="row d-flex justify-content-center align-items-center h-100">
                            <div class="col-lg-8 col-xl-6">
                                <div class="card rounded-3">

                                    <div class="card-body p-4 p-md-5">
                                        <h4 class="fw-light mb-5">Update your password</h4>
                                        <form action="/account/password" method="POST">
                                            @method('put')
                                            @csrf

                                            <div class="form-floating mb-3 has-danger">
                                                <input type="password" name="old_password" class="form-control @error('old_password')is-invalid @enderror"
                                                    placeholder="Password">
                                                <label>Old Password</label>
                                                <div class="invalid-feedback text-start">@error('old_password'){{$message}}@enderror</div>
                                                @if(session()->has('error'))
                                                <p class="text-danger small" >{{session('error')}}</p>
                                                @endif
                                            </div>

                                            <div class="form-floating mb-3 has-danger">
                                                <input type="password" name="new_password" class="form-control @error('new_password')is-invalid @enderror"
                                                    placeholder="Password">
                                                <label>New Password</label>
                                                <div class="invalid-feedback text-start">@error('new_password'){{$message}}@enderror</div>
                                            </div>
                                            <div class="form-floating mb-3 has-danger">
                                                <input type="password" name="password_confirmation" class="form-control @error('password_confirmation')is-invalid @enderror"
                                                    placeholder="Password">
                                                <label>Confirm Password</label>
                                                <div class="invalid-feedback text-start">@error('password_confirmation'){{$message}}@enderror</div>
                                            </div>


                                            <button type="submit" class="btn btn-primary btn-block mb-4 w-100">
                                                Save
                                            </button>
                                        </form>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>



            </div>
        </div>

    </div>

    
@endsection
