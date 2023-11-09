@extends('components.template')

@section('title', 'contact')

@section('content')
@section('contact-active')active @endsection

@section('link-home'){{URL::to('/')}}@endsection
@section('link-event'){{URL::to('/events')}}@endsection
@section('link-login'){{URL::to('/signin')}}@endsection
@section('link-account'){{ URL::to('/account') }}@endsection
@section('link-myevent'){{ URL::to('/myevent') }}@endsection
@section('link-manageuser'){{ URL::to('/admin/manage-user') }}@endsection


<h1 class="text-center mt-4">contact</h1>
@endsection