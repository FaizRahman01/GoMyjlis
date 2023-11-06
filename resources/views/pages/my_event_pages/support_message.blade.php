@extends('components.my_event_template')
@inject('carbon', 'Carbon\Carbon')

@section('title', 'Support')

@section('myevent-active')active @endsection
@section('link-home'){{ URL::to('/') }}@endsection
@section('link-event'){{ URL::to('/events') }}@endsection
@section('link-login'){{ URL::to('/signin') }}@endsection
@section('link-account'){{ URL::to('/account') }}@endsection
@section('link-myevent'){{ URL::to('/myevent') }}@endsection
@section('link-notification'){{ URL::to('/notification') }}@endsection
@section('link-contact'){{ URL::to('/contact') }}@endsection

@section('link-info'){{ URL::to('/myevent/1/info') }}@endsection
@section('link-ticket'){{ URL::to('/myevent/1/ticket') }}@endsection

@section('link-schedule'){{ URL::to('/myevent/1/schedule') }}@endsection
@section('link-poll'){{ URL::to('/myevent/1/poll') }}@endsection
@section('link-rating'){{ URL::to('/myevent/1/rating') }}@endsection
@section('link-support'){{ URL::to('/myevent/1/support') }}@endsection
@section('link-task'){{ URL::to('/myevent/1/task') }}@endsection
@section('link-attendee'){{ URL::to('/myevent/1/attendee') }}@endsection
@section('link-vendor'){{ URL::to('/myevent/1/vendor') }}@endsection
@section('link-analytic'){{ URL::to('/myevent/1/analytic') }}@endsection

@section('content')

    <div class="row mb-4">
        <h4 class="fw-light col-md-6 col-8 d-flex align-items-center">Support Ticket</h4>
        @if ($support_status->is_close == 0)
            <div class="col-md-6 col-4 d-flex justify-content-end">
                <form action="/myevent/{{ $event_id }}/support/{{ $support_id }}" method="post">
                    {{ method_field('PUT') }}
                    @csrf
                    <button type="submit" class="btn btn-outline-danger">
                        Close Ticket
                    </button>
                </form>
            </div>
        @endif

    </div>

    <div class="mx-2">

        <h2>{{$support_status->title}}</h2>

        <hr>
        <div class="overflow-auto mx-4" style="max-height: 40vh;">


            @foreach ($message_list as $list)
                <div class="mb-2">
                    <div class="d-flex justify-content-between">
                        <p class="small mb-1 text-muted">{{ $list->username }}</p>
                        <p class="small mb-1 text-muted">{{ $carbon::parse($list->created_at)->diffForHumans() }}</p>
                    </div>
                    <div class="d-flex flex-row justify-content-start">
                        <div>
                            <p class="small p-2 ms-3 mb-3 rounded-3" style="background-color: #f5f6f7;">
                                {{ $list->message }}</p>
                        </div>
                    </div>
                </div>
            @endforeach




        </div>

        @if ($support_status->is_close == 0)
        <div class="mb-5">
            <form action="/myevent/{{ $event_id }}/support/{{ $support_id }}" method="post">
                @csrf
                <div class="input-group">
                    <input type="text" name="user-message" placeholder="Press Enter" class="form-control primary">
                    <span class="input-group-btn">
                        <button class="btn btn-secondary" type="submit">Send</button>
                    </span>
                </div>
            </form>

        </div>
        @endif

    </div>


@endsection
