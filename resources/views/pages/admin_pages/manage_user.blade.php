@extends('components.template')
@inject('carbon', 'Carbon\Carbon')

@section('title', 'Manage User')

@section('manageuser-active')active @endsection

@section('link-home'){{ URL::to('/') }}@endsection
@section('link-event'){{ URL::to('/events') }}@endsection
@section('link-login'){{ URL::to('/signin') }}@endsection
@section('link-account'){{ URL::to('/account') }}@endsection
@section('link-myevent'){{ URL::to('/myevent') }}@endsection
@section('link-manageuser'){{ URL::current() }}@endsection



@section('content')

    <div class="mx-4 mt-4 mb-3">

        <div class="row mb-4">
            <h4 class="fw-light col-md-6 col-5 d-flex align-items-center">Existing User</h4>
        </div>


        <div class="row">

            @foreach ($user_list as $list)
                <div class="col-lg-3 col-md-4 col-sm-12 mb-3 position-relative">
                    <div class="card">
                        <div class="p-2">
                            <a href="{{ URL::to('/admin/manage-user/'.$list->username.'') }}" class="stretched-link">{{$list->username}}</a>
                            <div>
                                <small>Since: <span class="text-muted">{{ $carbon::parse($list->created_at)->diffForHumans() }}</span></small>
                            </div>
                            <div>
                                
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach



        </div>

    </div>
@endsection
