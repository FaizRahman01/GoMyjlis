@extends('components.template')
@inject('carbon', 'Carbon\Carbon')

@section('title', 'Manage Event')

@section('manageuser-active')active @endsection

@section('link-home'){{ URL::to('/') }}@endsection
@section('link-event'){{ URL::to('/events') }}@endsection
@section('link-login'){{ URL::to('/signin') }}@endsection
@section('link-account'){{ URL::to('/account') }}@endsection
@section('link-myevent'){{ URL::to('/myevent') }}@endsection
@section('link-manageuser'){{ URL::to('/admin/manage-user') }}@endsection



@section('content')

    <div class="mx-4 mt-4 mb-3">

        <div class="row mb-4">
            <h4 class="fw-light col-md-6 col-8 d-flex align-items-center">Event Overview</h4>
            <div class="col-md-6 col-4 d-flex justify-content-end">
                <form action="/admin/manage-event/{{ $event_id }}" method="post">
                    {{ method_field('DELETE') }}
                    @csrf
                    <button type="submit" class="btn btn-outline-danger">
                        Remove Event
                    </button>
                </form>
            </div>
        </div>



        <div class="row row-gap-4">

            <div class="col-xl-6 col-md-12">
                <div class="card p-3">
                    <div class="row">

                        <div class="col-lg-8 col-md-8 col-12 d-flex justify-content-center justify-content-md-start mt-3">
                            <div>
                                <h4 class="">{{ Str::ucfirst($event_team[0]?->username) ?? ''}}</h4>
                                <span class="text-muted">
                                    @if ($event_team[0]?->is_organizer == 1 && $event_team[0]?->is_assistant == 0)
                                        Organizer
                                    @endif
                                </span>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

            @foreach ($event_team[1] as $team)
                <div class="col-xl-6 col-md-12">
                    <div class="card p-3">
                        <div class="row">

                            <div
                                class="col-lg-8 col-md-8 col-12 d-flex justify-content-center justify-content-md-start mt-3">
                                <div>
                                    <h4 class="">{{ Str::ucfirst($team->username) }}</h4>
                                    <span class="text-muted">
                                        @if ($team->is_organizer == 0 && $team->is_assistant == 1)
                                            Assistant
                                        @endif
                                    </span>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            @endforeach



        </div>






        <hr class="mb-4">
        <div class="row">
            <div class="col-lg-4 mb-4">
                <!-- Billing card 1-->
                <div class="card h-100 border-start-lg border-start-primary">
                    <div class="card-body">
                        <div class="small text-muted">Total of Attendee</div>
                        <div class="h3">{{ $attendee_detail[0] }}</div>
                    </div>
                </div>
            </div>
        </div>

        <div class="card card-header-actions mb-4">
            <div class="card-header">
                Attendee List
            </div>
            <div class="card-body p-0">

                @foreach ($attendee_detail[1] as $attendee)
                    <div class="d-flex align-items-center justify-content-between px-4 border-bottom border-1 py-2">
                        <div class="d-flex align-items-center">
                            <i class="fab fa-cc-visa fa-2x cc-color-visa"></i>
                            <div class="ms-4">
                                <div>{{ Str::ucfirst($attendee->username) }}</div>
                                <div class="text-xs text-muted small">Approved:
                                    {{ $carbon::parse($attendee->updated_at)->diffForHumans() }}</div>
                            </div>
                        </div>
                        <div class="ms-4">
                            <form action="/admin/manage-event/{{ $event_id }}/{{ $attendee->id }}" method="post">
                                {{ method_field('DELETE') }}
                                @csrf
                                <span class="badge bg-light text-dark me-3">Attendee</span>
                                <button type="submit" class="btn btn-outline-danger">Kick</button>
                            </form>
                        </div>
                    </div>
                @endforeach


            </div>
        </div>




    </div>

@endsection
