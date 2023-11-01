@extends('components.my_event_template')

@section('title', 'Analytics')

@section('myevent-active')active @endsection
@section('link-home'){{ URL::to('/') }}@endsection
@section('link-event'){{ URL::to('/events') }}@endsection
@section('link-login'){{ URL::to('/signin') }}@endsection
@section('link-account'){{ URL::to('/account') }}@endsection
@section('link-myevent'){{ URL::to('/myevent') }}@endsection
@section('link-notification'){{ URL::to('/notification') }}@endsection
@section('link-contact'){{ URL::to('/contact') }}@endsection

@section('link-info'){{URL::to('/myevent/2/info')}}@endsection
@section('link-ticket'){{URL::to('/myevent/2/ticket')}}@endsection

@section('link-schedule'){{URL::to('/myevent/2/schedule')}}@endsection
@section('link-poll'){{URL::to('/myevent/2/poll')}}@endsection
@section('link-rating'){{URL::to('/myevent/2/rating')}}@endsection
@section('link-support'){{URL::to('/myevent/2/support')}}@endsection
@section('link-task'){{URL::to('/myevent/2/task')}}@endsection
@section('link-attendee'){{URL::to('/myevent/2/attendee')}}@endsection
@section('link-vendor'){{URL::to('/myevent/2/vendor')}}@endsection
@section('link-analytic'){{ URL::current() }}@endsection


@section('content')

<div class="row mb-4">
    <h4 class="fw-light col-12 d-flex align-items-center">Analytics Data</h4>
</div>


@endsection