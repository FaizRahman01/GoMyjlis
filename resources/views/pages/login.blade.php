@extends('components.template')

@section('title', 'signin')

@section('login-active')active @endsection

@section('link-home'){{ URL::to('/') }}@endsection
@section('link-event'){{ URL::to('/events') }}@endsection
@section('link-login'){{ URL::current() }}@endsection


@section('content')

    <div class="card mx-4 mx-md-5 mt-5">
        <!-- Section: Design Block -->
        <section class="text-center">
            <div class="card-body py-5 px-md-5">

                <div class="row d-flex justify-content-center">
                    <div class="col-lg-8">
                        <h2 class="fw-bold mb-5">Sign in</h2>
                        <form action="/signin" method="POST">
                            @csrf
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" name="login_user" placeholder="Email/Username">
                                <label for="floatingInput">Email/Username</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="password" class="form-control" name="login_password" placeholder="Password"
                                    autocomplete="off">
                                <label for="floatingPassword">Password</label>
                            </div>


                            <button type="submit" class="btn btn-primary btn-block mb-4">
                                Sign In
                            </button>
                        </form>
                        <div class="text-center">
                            <p>or <a href="{{ URL::to('/signup') }}">register new account</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Section: Design Block -->
    </div>

@endsection
