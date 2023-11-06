@extends('components.my_event_template')

@section('title', 'Task')

@section('myevent-active')active @endsection
@section('link-home'){{ URL::to('/') }}@endsection
@section('link-event'){{ URL::to('/events') }}@endsection
@section('link-login'){{ URL::to('/signin') }}@endsection
@section('link-account'){{ URL::to('/account') }}@endsection
@section('link-myevent'){{ URL::to('/myevent') }}@endsection
@section('link-notification'){{ URL::to('/notification') }}@endsection
@section('link-contact'){{ URL::to('/contact') }}@endsection

@section('link-info'){{ URL::to('/myevent/' . $event_id . '/info') }}@endsection
@section('link-ticket'){{ URL::to('/myevent/' . $event_id . '/ticket') }}@endsection

@section('link-schedule'){{ URL::to('/myevent/' . $event_id . '/schedule') }}@endsection
@section('link-poll'){{ URL::to('/myevent/' . $event_id . '/poll') }}@endsection
@section('link-rating'){{ URL::to('/myevent/' . $event_id . '/rating') }}@endsection
@section('link-support'){{ URL::to('/myevent/' . $event_id . '/support') }}@endsection
@section('link-task'){{ URL::current() }}@endsection
@section('link-attendee'){{ URL::to('/myevent/' . $event_id . '/attendee') }}@endsection
@section('link-vendor'){{ URL::to('/myevent/' . $event_id . '/vendor') }}@endsection
@section('link-analytic'){{ URL::to('/myevent/' . $event_id . '/analytic') }}@endsection

@section('content')

    <div class="row mb-4">
        <h4 class="fw-light col-md-6 col-8 d-flex align-items-center">Task</h4>
        <div class="col-md-6 col-4 d-flex justify-content-end">

            <button type="button" class="btn btn-outline-dark" data-bs-toggle="modal" data-bs-target="#exampleModal">
                Add Task
            </button>
        </div>
    </div>




    <div class="row">
        <div class="col-xl-4">
            <div class="card mb-3">

                <div class="card-header bg-dark">
                    <h5 class="card-title text-white mt-2" id="exampleModalLabel">Upcoming</h5>
                </div>

                @foreach ($task_list as $list)
                    @if ($list->is_start != 0 || $list->is_complete != 0)
                        @continue
                    @endif
                    <div class="list-group px-3 py-2">
                        <p class="align-items-start">
                        <div class="d-flex w-100 justify-content-between">
                            <h5 class="mb-1">{{ $list->title }}</h5>
                            <small class="text-muted">{{ $list->updated_at }}</small>
                        </div>
                        <p class="mb-1">{{ $list->description }}</p>
                        </p>
                    </div>
                @endforeach

            </div>
        </div>



        <div class="col-xl-4">
            <div class="card mb-3">

                <div class="card-header bg-dark">
                    <h5 class="card-title text-white mt-2" id="exampleModalLabel">In Progress</h5>
                </div>

                @foreach ($task_list as $list)
                    @if ($list->is_start != 1 || $list->is_complete != 0)
                        @continue
                    @endif
                    <div class="list-group px-3 py-2">
                        <p class="align-items-start">
                        <div class="d-flex w-100 justify-content-between">
                            <h5 class="mb-1">{{ $list->title }}</h5>
                            <small class="text-muted">{{ $list->updated_at }}</small>
                        </div>
                        <p class="mb-1">{{ $list->description }}</p>
                        </p>
                    </div>
                @endforeach

            </div>
        </div>


        <div class="col-xl-4">
            <div class="card mb-3">

                <div class="card-header bg-dark">
                    <h5 class="card-title text-white mt-2" id="exampleModalLabel">Completed</h5>
                </div>

                @foreach ($task_list as $list)
                    @if ($list->is_start != 1 || $list->is_complete != 1)
                        @continue
                    @endif
                    <div class="list-group px-3 py-2">
                        <p class="align-items-start">
                        <div class="d-flex w-100 justify-content-between">
                            <h5 class="mb-1">{{ $list->title }}</h5>
                            <small class="text-muted">{{ $list->updated_at }}</small>
                        </div>
                        <p class="mb-1">{{ $list->description }}</p>
                        </p>
                    </div>
                @endforeach

            </div>
        </div>
    </div>


    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Manage Task</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="/myevent/{{ $event_id }}/create-task" method="post">
                        @csrf
                        <div class="form-floating mb-3 has-danger">
                            <input type="text" name="task_title"
                                class="form-control @error('task_title')is-invalid @enderror " placeholder="Announcement">
                            <label>Task</label>
                            @error('task_title')
                                <div class="invalid-feedback text-start">{{ $message }}</div>
                            @enderror

                        </div>
                        <div class="form-floating mb-3 has-danger">
                            <textarea value="" name="task_description" class="form-control @error('task_description')is-invalid @enderror"
                                placeholder="Task Description"></textarea>
                            <label>Description</label>
                            @error('task_description')
                                <div class="invalid-feedback text-start">{{ $message }}</div>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary btn-block mb-4 w-100">
                            Add
                        </button>
                    </form>


                    <div class="mx-2">
                        <div class="row">
                            <div class="col-xl-12 mb-3 mb-lg-5">
                                <div class="card">
                                    <div class="d-flex card-header justify-content-between">
                                        <h5 class="me-3 mb-0">Task List</h5>
                                    </div>
                                    <div class="card-body">

                                        @foreach ($task_list as $list)
                                            <div class="row mb-2">
                                                <div class="col-6">
                                                    <h6 class="mb-0">{{ $list->title }}</h6>
                                                    <p class="mb-0 text-muted">{{ $list->created_at }}</p>
                                                </div>
                                                <div class="col-6 d-flex justify-content-end">
                                                    <span>
                                                        <div class="btn-group" role="group"
                                                            aria-label="Button group with nested dropdown">
                                                            <button type="button" class="btn btn-primary">Manage</button>
                                                            <div class="btn-group" role="group">
                                                                <button id="btnGroupDrop1" type="button"
                                                                    class="btn btn-primary dropdown-toggle"
                                                                    data-bs-toggle="dropdown" aria-haspopup="true"
                                                                    aria-expanded="false"></button>
                                                                <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                                                                    @if ($list->is_start == 0 && $list->is_complete == 0)
                                                                        <form action="/myevent/{{$event_id}}/inprogress-task" method="post">
                                                                        {{ method_field('PUT') }}
                                                                        @csrf
                                                                        <input type="hidden" name="task_id"
                                                                            value="{{ $list->id }}" autocomplete="off">
                                                                        <button type="submit" class="dropdown-item">In
                                                                            Progress</button>
                                                                        </form>
                                                                    @endif
                                                                    
                                                                    @if ($list->is_start == 1 && $list->is_complete == 0)
                                                                    <form action="/myevent/{{$event_id}}/completed-task" method="post">
                                                                        {{ method_field('PUT') }}
                                                                        @csrf
                                                                        <input type="hidden" name="task_id"
                                                                            value="{{ $list->id }}" autocomplete="off">
                                                                        <button type="submit"
                                                                            class="dropdown-item">Completed</button>
                                                                    </form>
                                                                    @endif

                                                                    <form action="/myevent/{{$event_id}}/remove-task" method="POST">
                                                                        {{ method_field('DELETE') }}
                                                                        @csrf
                                                                        <input type="hidden" name="task_id"
                                                                            value="{{ $list->id }}" autocomplete="off">
                                                                        <button type="submit"
                                                                            class="dropdown-item">Delete</button>
                                                                    </form>

                                                                </div>
                                                            </div>
                                                        </div>
                                                    </span>
                                                </div>
                                            </div>
                                            <hr />
                                        @endforeach

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>


@endsection
