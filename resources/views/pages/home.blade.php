@extends('components.template')

@section('title', 'home')

@section('content')
@section('home-active')active @endsection

@section('link-home'){{URL::current()}}@endsection
@section('link-event'){{URL::to('/events')}}@endsection
@section('link-login'){{URL::to('/signin')}}@endsection
@section('link-contact'){{URL::to('/contact')}}@endsection
@section('link-account'){{ URL::to('/account') }}@endsection
@section('link-myevent'){{ URL::to('/myevent') }}@endsection
@section('link-manageuser'){{ URL::to('/admin/manage-user') }}@endsection
@section('link-notification'){{ URL::to('/notification') }}@endsection

<h1 class="text-center mt-4">home</h1>
@endsection