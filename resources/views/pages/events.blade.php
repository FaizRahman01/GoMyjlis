@extends('components.template')

@section('title', 'event')

@section('event-active')active @endsection

@section('link-home'){{ URL::to('/') }}@endsection
@section('link-event'){{ URL::current() }}@endsection
@section('link-login'){{ URL::to('/signin') }}@endsection

@section('link-account'){{ URL::to('/account') }}@endsection
@section('link-myevent'){{ URL::to('/myevent') }}@endsection
@section('link-manageuser'){{ URL::to('/admin/manage-user') }}@endsection


@section('content')


    <div class="container mt-4">
        <div class="justify-content-center row">
            <div class="col-lg-12">
                <form action="/events" method="POST">
                    @csrf
                    <div class="row d-flex justify-content-lg-center bg-primary-subtle bg-gradient p-3 mx-2 rounded">
                        <div class="col-lg-4">
                            <label for="exampleSelect1" class="form-label">State</label>
                            <select class="form-select" id="exampleSelect1" name="state">
                                <option value="">All State</option>
                                @foreach ($state_list as $list)
                                    <option {{ $state == $list ? 'selected' : '' }}>{{ $list }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-lg-4">
                            <label for="exampleSelect1" class="form-label">Category</label>
                            <select class="form-select" id="exampleSelect1" name="mode">
                                <option value="">All Type</option>
                                <option {{ $mode == 'Online' ? 'selected' : '' }}>Online</option>
                                <option {{ $mode == 'In Person' ? 'selected' : '' }}>In Person</option>
                                <option {{ $mode == 'Hybrid' ? 'selected' : '' }}>Hybrid</option>
                            </select>
                        </div>
                        <div class="col-lg-4 d-flex align-items-end pt-3">
                            <button type="submit" class="btn btn-primary w-100">Filter</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-lg-12 px-4">

                @if ($all_events->isEmpty())
                    <div class="page-wrap d-flex flex-row align-items-center mt-5">
                        <div class="container">
                            <div class="row justify-content-center">
                                <div class="col-md-12 text-center">
                                    <span class="display-5 d-block mb-4">No Event Exist</span>
                                    <a href="{{ URL::to('/create-event') }}" class="btn btn-outline-primary">Create Now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
                @foreach ($all_events as $events)
                    @if (
                        ($state == $events->state && $mode == $events->event_mode) ||
                            (empty($state) && $mode == $events->event_mode) ||
                            ($state == $events->state && empty($mode)))
                        <div class="row mt-3 border border-light border-4 px-4 py-3 rounded-4 bg-secondary-subtle">
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
                                                <input type="hidden" name="event_id" value="{{ $events->id }}"
                                                    autocomplete="off">
                                                @if (optional(auth()->user())->is_admin != 1 || auth()->check() == false)
                                                    <button type="submit"
                                                        class="btn btn-outline-dark link-underline link-underline-opacity-0 d-flex align-items-center">
                                                        Count Me In</button>
                                                @endif
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
                    @elseif (empty($state) && empty($mode))
                        <div class="row mt-3 border border-light border-4 px-4 py-3 rounded-4 bg-secondary-subtle">
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
                                                <input type="hidden" name="event_id" value="{{ $events->id }}"
                                                    autocomplete="off">
                                                @if (optional(auth()->user())->is_admin != 1 || auth()->check() == false)
                                                    <button type="submit"
                                                        class="btn btn-outline-dark link-underline link-underline-opacity-0 d-flex align-items-center">
                                                        Count Me In</button>
                                                @endif
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
                    @endif
                @endforeach



            </div>

        </div>
    </div>

@endsection
