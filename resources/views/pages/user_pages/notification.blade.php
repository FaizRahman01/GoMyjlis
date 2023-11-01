@extends('components.template')

@section('title', 'Notification')

@section('content')
@section('notification-active')active @endsection

@section('link-home'){{URL::to('/')}}@endsection
@section('link-event'){{URL::to('/events')}}@endsection
@section('link-login'){{URL::to('/signin')}}@endsection
@section('link-account'){{URL::to('/account')}}@endsection
@section('link-myevent'){{URL::to('/myevent')}}@endsection
@section('link-notification'){{URL::current()}}@endsection
@section('link-contact'){{URL::to('/contact')}}@endsection

<h1 class="text-center mt-4">Notification</h1>
@endsection