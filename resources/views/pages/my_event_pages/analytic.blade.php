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

@section('link-info'){{URL::to('/myevent/'.$event_id.'/info')}}@endsection
@section('link-ticket'){{URL::to('/myevent/'.$event_id.'/ticket')}}@endsection

@section('link-schedule'){{URL::to('/myevent/'.$event_id.'/schedule')}}@endsection
@section('link-poll'){{URL::to('/myevent/'.$event_id.'/poll')}}@endsection
@section('link-rating'){{URL::to('/myevent/'.$event_id.'/rating')}}@endsection
@section('link-support'){{URL::to('/myevent/'.$event_id.'/support')}}@endsection
@section('link-task'){{URL::to('/myevent/'.$event_id.'/task')}}@endsection
@section('link-attendee'){{URL::to('/myevent/'.$event_id.'/attendee')}}@endsection
@section('link-vendor'){{URL::to('/myevent/'.$event_id.'/vendor')}}@endsection
@section('link-analytic'){{ URL::current() }}@endsection


@section('content')

<div class="row mb-4">
    <h4 class="fw-light col-12 d-flex align-items-center">Analytics Data</h4>
</div>


@endsection