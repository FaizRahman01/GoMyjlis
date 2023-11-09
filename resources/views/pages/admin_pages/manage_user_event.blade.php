@extends('components.template')
@inject('carbon', 'Carbon\Carbon')

@section('title', 'Manage User')

@section('myevent-active')active @endsection

@section('link-home'){{ URL::to('/') }}@endsection
@section('link-event'){{ URL::to('/events') }}@endsection
@section('link-login'){{ URL::to('/signin') }}@endsection
@section('link-account'){{ URL::to('/account') }}@endsection
@section('link-myevent'){{ URL::to('/myevent') }}@endsection
@section('link-manageuser'){{ URL::to('/admin/manage-user') }}@endsection



@section('content')

    <div class="mx-4 mt-4 mb-3">

        <div class="row mb-4">
            <h4 class="fw-light col-md-6 col-8 d-flex align-items-center">Created User Event</h4>
            <div class="col-md-6 col-4 d-flex justify-content-end">
                <form action="/admin/manage-user/{{$user}}" method="post">
                    {{ method_field('DELETE') }}
                    @csrf
                    <button type="submit" class="btn btn-outline-danger">
                        Remove User
                    </button>
                </form>
            </div>
        </div>

        <div class="row d-flex justify-content-center">

            @foreach ($user_detail as $user)
                <div class="col-12">
                    <div>
                        <h3>
                            <img class="img-thumbnail" width="120" height="120"
                                src="http://cdn.onlinewebfonts.com/svg/img_124200.png">
                            {{ $user->username }}
                        </h3>
                    </div>
                    <div>
                        <div>
                            <small>Email: <span class="text-muted">{{ $user->email }}</span></small>
                        </div>
                        <div>
                            <small>Date Created: <span class="text-muted">{{ date('d-m-Y', strtotime($user->created_at)) }}
                                </span></small>
                        </div>
                    </div>
                </div>
            @endforeach


            <div class="row my-4">

                @foreach ($event_list as $list)
                    <div class="col-lg-3 col-md-4 col-sm-12 mb-3 position-relative">
                        <div class="card">
                            <div class="p-2">
                                <a href="{{ URL::to('/admin/manage-event/'.$list->id.'') }}" class="stretched-link">{{$list->title}}</a>
                                <div>
                                    <small>Created since: <span class="text-muted">{{ $carbon::parse($list->created_at)->diffForHumans() }}</span></small>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach



            </div>

        </div>

    </div>


@endsection
