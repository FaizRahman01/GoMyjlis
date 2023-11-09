@extends('components.template')

@section('title', 'signup')

@section('login-active')active @endsection

@section('link-home'){{ URL::to('/') }}@endsection
@section('link-event'){{ URL::to('/events') }}@endsection
@section('link-login'){{ URL::to('/signin') }}@endsection


@section('content')

    <div class="card mx-4 mx-md-5 mt-5">
        <!-- Section: Design Block -->
        <section class="text-center">
            <div class="card-body py-5 px-md-5">

                <div class="row d-flex justify-content-center">
                    <div class="col-lg-8">
                        <h2 class="fw-bold mb-5">Sign Up</h2>
                        <form action="/signup" method="POST">
                            @csrf
                            <div class="form-floating mb-3 has-danger">
                                <input value="{{ old('username') }}" type="text" name="username"
                                    class="form-control @error('username')is-invalid @enderror" placeholder="jimmyneutron">
                                <label>Username</label>
                                <div class="invalid-feedback text-start"> @error('username'){{$message}}@enderror</div>
                            </div>
                            <div class="form-floating mb-3 has-danger">
                                <input value="{{ old('email') }}" type="email" name="email"
                                    class="form-control @error('email')is-invalid @enderror" placeholder="name@example.com">
                                <label>Email</label>
                                <div class="invalid-feedback text-start">@error('email'){{$message}}@enderror</div>
                            </div>
                            <div class="form-floating mb-3 has-danger">
                                <input type="password" name="password" class="form-control @error('password')is-invalid @enderror"
                                    placeholder="Password">
                                <label>Password</label>
                                <div class="invalid-feedback text-start">@error('password'){{$message}}@enderror</div>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="password" name="password_confirmation" class="form-control"
                                    placeholder="Password Confirmation">
                                <label>Confirm Password</label>
                            </div>

                            <!-- Submit button -->
                            <button type="submit" class="btn btn-primary btn-block mb-4">
                                Sign Up
                            </button>
                        </form>
                        <div class="text-center">
                            <p>or <a href="{{ URL::to('/signin') }}">login to your account</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Section: Design Block -->
    </div>

@endsection
