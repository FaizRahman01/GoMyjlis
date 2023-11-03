@extends('components.template')

@section('title', 'Account')

@section('content')
@section('account-active')active @endsection

@section('link-home'){{URL::to('/')}}@endsection
@section('link-event'){{URL::to('/events')}}@endsection
@section('link-login'){{URL::to('/signin')}}@endsection
@section('link-account'){{URL::current()}}@endsection
@section('link-myevent'){{URL::to('/myevent')}}@endsection
@section('link-notification'){{URL::to('/notification')}}@endsection
@section('link-contact'){{URL::to('/contact')}}@endsection
@section('link-manageuser'){{ URL::to('/admin/manage-user') }}@endsection


<h1 class="text-center mt-4">Account</h1>
@endsection