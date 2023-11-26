@extends('components.template')

@section('title', 'home')

@section('content')
    @section('home-active')active @endsection

@section('link-home'){{ URL::current() }}@endsection
@section('link-event'){{ URL::to('/events') }}@endsection
@section('link-login'){{ URL::to('/signin') }}@endsection

@section('link-account'){{ URL::to('/account') }}@endsection
@section('link-myevent'){{ URL::to('/myevent') }}@endsection
@section('link-manageuser'){{ URL::to('/admin/manage-user') }}@endsection


    <section class="py-5 mb-md-5 mt-2 mx-3 bg-dark bg-gradient bg-opacity-50">
        <div class="container">
            <div class="row justify-content-center text-center text-white py-4">
                <div class="col-lg-8">
                    <h2 class="display-5 fw-bold">Get Started Today</h2>
                    <p class="lead">Effortlessly manage all your events like a pro.</p>
                    <div class="d-grid col-3 mx-auto">
                        <a class="btn bg-white text-primary" href="/signup">Sign up</a>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section class="py-5">
        <div class="container">
            <div class="row justify-content-center text-center mb-3">
                <div class="col-lg-8 col-xl-7">
                    <h2 class="display-5 fw-bold">Our Features</h2>
                    <p class="lead">Our Event Management System is the game-changer you’ve been dreaming about. Dive into
                        miraculous, seamless planning, and
                        let your events shine brighter than the sun.</p>
                </div>
            </div>
            <div class="row g-5">
                <div class="col-lg-4 col-sm-6 text-center">
                    <div class="text-muted">
                        <svg class="bi bi-emoji-wink" fill="currentColor" height="48" viewbox="0 0 16 16" width="48"
                            xmlns="http://www.w3.org/2000/svg">
                            <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"></path>
                            <path
                                d="M4.285 9.567a.5.5 0 0 1 .683.183A3.498 3.498 0 0 0 8 11.5a3.498 3.498 0 0 0 3.032-1.75.5.5 0 1 1 .866.5A4.498 4.498 0 0 1 8 12.5a4.498 4.498 0 0 1-3.898-2.25.5.5 0 0 1 .183-.683zM7 6.5C7 7.328 6.552 8 6 8s-1-.672-1-1.5S5.448 5 6 5s1 .672 1 1.5zm1.757-.437a.5.5 0 0 1 .68.194.934.934 0 0 0 .813.493c.339 0 .645-.19.813-.493a.5.5 0 1 1 .874.486A1.934 1.934 0 0 1 10.25 7.75c-.73 0-1.356-.412-1.687-1.007a.5.5 0 0 1 .194-.68z">
                            </path>
                        </svg>
                    </div>
                    <h5 class="mt-3">Easy-To-Use</h5>
                </div>
                <div class="col-lg-4 col-sm-6 text-center">
                    <div class="text-muted">
                        <svg class="bi bi-pencil-square" fill="currentColor" height="48" viewbox="0 0 16 16"
                            width="48" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z">
                            </path>
                            <path
                                d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"
                                fill-rule="evenodd"></path>
                        </svg>
                    </div>
                    <h5 class="mt-3">100% Customizable</h5>
                </div>
                <div class="col-lg-4 col-sm-6 text-center">
                    <div class="text-muted">
                        <svg class="bi bi-phone-vibrate" fill="currentColor" height="48" viewbox="0 0 16 16"
                            width="48" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M10 3a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H6a1 1 0 0 1-1-1V4a1 1 0 0 1 1-1h4zM6 2a2 2 0 0 0-2 2v8a2 2 0 0 0 2 2h4a2 2 0 0 0 2-2V4a2 2 0 0 0-2-2H6z">
                            </path>
                            <path
                                d="M8 12a1 1 0 1 0 0-2 1 1 0 0 0 0 2zM1.599 4.058a.5.5 0 0 1 .208.676A6.967 6.967 0 0 0 1 8c0 1.18.292 2.292.807 3.266a.5.5 0 0 1-.884.468A7.968 7.968 0 0 1 0 8c0-1.347.334-2.619.923-3.734a.5.5 0 0 1 .676-.208zm12.802 0a.5.5 0 0 1 .676.208A7.967 7.967 0 0 1 16 8a7.967 7.967 0 0 1-.923 3.734.5.5 0 0 1-.884-.468A6.967 6.967 0 0 0 15 8c0-1.18-.292-2.292-.807-3.266a.5.5 0 0 1 .208-.676zM3.057 5.534a.5.5 0 0 1 .284.648A4.986 4.986 0 0 0 3 8c0 .642.12 1.255.34 1.818a.5.5 0 1 1-.93.364A5.986 5.986 0 0 1 2 8c0-.769.145-1.505.41-2.182a.5.5 0 0 1 .647-.284zm9.886 0a.5.5 0 0 1 .648.284C13.855 6.495 14 7.231 14 8c0 .769-.145 1.505-.41 2.182a.5.5 0 0 1-.93-.364C12.88 9.255 13 8.642 13 8c0-.642-.12-1.255-.34-1.818a.5.5 0 0 1 .283-.648z">
                            </path>
                        </svg>
                    </div>
                    <h5 class="mt-3">Mobile First</h5>
                </div>
            </div>
        </div>
    </section>
@endsection
