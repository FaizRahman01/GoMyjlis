@extends('components.template')

@section('title', 'event')

@section('event-active')active @endsection

@section('link-home'){{ URL::to('/') }}@endsection
@section('link-event'){{ URL::current() }}@endsection
@section('link-login'){{ URL::to('/signin') }}@endsection

@section('link-account'){{ URL::to('/account') }}@endsection
@section('link-myevent'){{ URL::to('/myevent') }}@endsection
@section('link-manageuser'){{ URL::to('/admin/manage-user') }}@endsection
@section('link-notification'){{ URL::to('/notification') }}@endsection

@section('content')

    <div class="container mt-4">
        <div class="justify-content-center row">
            <div class="col-lg-12">
                <form action="#" class="">
                    <div class="row d-flex justify-content-lg-center bg-primary-subtle bg-gradient p-3 mx-2 rounded">
                        <div class="col-lg-4">
                            <label for="exampleSelect1" class="form-label">State</label>
                            <select class="form-select" id="exampleSelect1">
                                <option>All Place</option>
                                <option>Kuala Lumpur</option>
                                <option>Selangor</option>
                                <option>Johor</option>
                            </select>
                        </div>
                        <div class="col-lg-4">
                            <label for="exampleSelect1" class="form-label">Category</label>
                            <select class="form-select" id="exampleSelect1">
                                <option>All Type</option>
                                <option>Online</option>
                                <option>In Person</option>
                            </select>
                        </div>
                        <div class="col-lg-4 d-flex align-items-end pt-3">
                            <a class="btn btn-primary w-100" href="#">Filter</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <div class="container">
        <div class="row">
            <div class="col-lg-12 px-4">

                @foreach ($all_events as $events)
                    <div class="row mt-3 border border-light border-4 px-4 py-3 rounded-4 bg-primary-subtle">
                        <div>
                            <div class="row">
                                <div class="col-7 d-flex align-items-center">
                                    <div class="row">
                                        <p class="col-auto text-success-emphasis">
                                            <img src="{{ asset('assets/icons/map.svg') }}"alt="">
                                            {{ $events->state }}
                                        </p>
                                        <p class="col-auto text-warning-emphasis"><img
                                                src="{{ asset('assets/icons/calendar.svg') }}" alt="">
                                            {{ $events->start_date }}</p>
                                    </div>
                                </div>
                                <div class="col-5 d-flex justify-content-end">
                                    <div class="d-flex align-items-center">
                                        <form action="{{ URL::to('/events/join') }}" method="POST">
                                            @csrf
                                            <input type="hidden" name="event_id" value="{{ $events->id }}" autocomplete="off">
                                            <button type="submit"
                                                class="btn btn-outline-dark link-underline link-underline-opacity-0 d-flex align-items-center">
                                                Count Me In</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <h2>
                                <a href="{{ URL::to('/events/' . $events->id . '') }}"
                                    class="link-underline link-underline link-underline-opacity-0 d-flex align-items-center">
                                    {{ $events->title }}
                                </a>
                            </h2>
                        </div>
                    </div>
                @endforeach



            </div>

            <div class="d-flex justify-content-center my-3">
                <ul class="pagination">
                    <li class="page-item disabled">
                        <a class="page-link" href="">&laquo;</a>
                    </li>
                    <li class="page-item active">
                        <a class="page-link" href="">1</a>
                    </li>
                    <li class="page-item">
                        <a class="page-link" href="">2</a>
                    </li>
                    <li class="page-item">
                        <a class="page-link" href="">3</a>
                    </li>
                    <li class="page-item">
                        <a class="page-link" href="">4</a>
                    </li>
                    <li class="page-item">
                        <a class="page-link" href="">5</a>
                    </li>
                    <li class="page-item">
                        <a class="page-link" href="">&raquo;</a>
                    </li>
                </ul>
            </div>

        </div>
    </div>

@endsection
