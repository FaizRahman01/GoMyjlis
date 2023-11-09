@extends('components.my_event_template')

@section('title', 'Poll')

@section('myevent-active')active @endsection
@section('link-home'){{ URL::to('/') }}@endsection
@section('link-event'){{ URL::to('/events') }}@endsection
@section('link-login'){{ URL::to('/signin') }}@endsection
@section('link-account'){{ URL::to('/account') }}@endsection
@section('link-myevent'){{ URL::to('/myevent') }}@endsection



@section('link-info'){{ URL::to('/myevent/' . $event_id . '/info') }}@endsection
@section('link-ticket'){{ URL::to('/myevent/' . $event_id . '/ticket') }}@endsection

@section('link-schedule'){{ URL::to('/myevent/' . $event_id . '/schedule') }}@endsection
@section('link-poll'){{ URL::current() }}@endsection
@section('link-rating'){{ URL::to('/myevent/' . $event_id . '/rating') }}@endsection
@section('link-support'){{ URL::to('/myevent/' . $event_id . '/support') }}@endsection
@section('link-task'){{ URL::to('/myevent/' . $event_id . '/task') }}@endsection
@section('link-attendee'){{ URL::to('/myevent/' . $event_id . '/attendee') }}@endsection
@section('link-vendor'){{ URL::to('/myevent/' . $event_id . '/vendor') }}@endsection
@section('link-analytic'){{ URL::to('/myevent/' . $event_id . '/analytic') }}@endsection

@section('content')

    <div class="row mb-4">
        <h4 class="fw-light col-md-6 col-8 d-flex align-items-center">Multiple Choice Poll</h4>
        @if (
            ($event->is_organizer == 1 && $event->is_assistant == 0) ||
                ($event->is_organizer == 0 && $event->is_assistant == 1))
            <div class="col-md-6 col-4 d-flex justify-content-end">
                <button type="button" class="btn btn-outline-dark" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    Create
                </button>
            </div>
        @endif
    </div>

    @foreach ($poll_question as $question)
        <ul class="list-group mb-4">
            <li class="list-group-item active text-center bg-dark border-0" aria-current="true">
                {{ $question->question }}
            </li>

            @if ($event->is_organizer == 0 && $event->is_assistant == 0)
                @if ($question->is_close == 0)
                    <li class="list-group-item">
                        <form action="/myevent/{{ $event_id }}/poll/{{ $question->id }}" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-8 ps-2">
                                    <select name="answer" class="form-select w-100" id="exampleSelect1">
                                        @foreach ($poll_list as $list)
                                            @if ($list->question == $question->question)
                                                <option>{{ $list->answer }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-4">
                                    <button type="submit" class="btn btn-primary btn-block mb-4 w-100">
                                        Confirm
                                    </button>
                                </div>
                            </div>
                        </form>
                    </li>
                @endif

                @foreach ($poll_answer as $answer)
                    @if ($answer->poll_id == $question->id)
                        <li class="list-group-item">
                            <p class="text-center">You choose: {{ $answer->result }}</p>
                        </li>
                    @endif
                @endforeach
            @endif
        </ul>
    @endforeach


    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Create new poll</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="" method="post">
                        @csrf
                        <div class="form-floating mb-3 has-danger">
                            <input type="text" name="question"
                                class="form-control @error('question')is-invalid @enderror" placeholder="Announcement">
                            <label>Your Question</label>
                            @error('question')
                                <div class="invalid-feedback text-start">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-floating mb-3 has-danger">
                            <input type="text" name="answer_1"
                                class="form-control @error('answer_1')is-invalid @enderror" placeholder="Announcement">
                            <label>Answer 1</label>
                            @error('answer_1')
                                <div class="invalid-feedback text-start">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-floating mb-3 has-danger">
                            <input type="text" name="answer_2"
                                class="form-control @error('answer_2')is-invalid @enderror" placeholder="Announcement">
                            <label>Answer 2</label>
                            @error('answer_2')
                                <div class="invalid-feedback text-start">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-floating mb-3 has-danger">
                            <input type="text" name="answer_3"
                                class="form-control @error('answer_3')is-invalid @enderror" placeholder="Announcement">
                            <label>Answer 3</label>
                            @error('answer_3')
                                <div class="invalid-feedback text-start">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-floating mb-3 has-danger">
                            <input type="text" name="answer_4"
                                class="form-control @error('answer_4')is-invalid @enderror" placeholder="Announcement">
                            <label>Answer 4</label>
                            @error('answer_4')
                                <div class="invalid-feedback text-start">{{ $message }}</div>
                            @enderror
                        </div>


                        <button type="submit" class="btn btn-primary btn-block mb-4 w-100">
                            Create
                        </button>
                    </form>

                    <div class="mx-2">
                        <div class="row">
                            <div class="col-xl-12 mb-3 mb-lg-5">
                                <div class="card">
                                    <div class="d-flex card-header justify-content-between">
                                        <h5 class="me-3 mb-0">Poll List</h5>
                                    </div>
                                    <div class="card-body">

                                        @foreach ($poll_question as $question)
                                            <div class="row mb-2">
                                                <div class="col-6">
                                                    <h6 class="mb-0">{{ $question->question }}</h6>
                                                    <div class="position-relative">
                                                        <a class="badge bg-info text-dark" data-bs-toggle="collapse"
                                                            href="#collapseExample{{ $question->id }}" role="button"
                                                            aria-expanded="false"
                                                            aria-controls="collapseExample{{ $question->id }}">
                                                            show answer ↴
                                                        </a>
                                                    </div>

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
                                                                <div class="dropdown-menu"
                                                                    aria-labelledby="btnGroupDrop1">

                                                                    @if ($question->is_close == 0)
                                                                        <form
                                                                            action="/myevent/{{ $event_id }}/poll/{{ $question->id }}"
                                                                            method="post">
                                                                            {{ method_field('PUT') }}
                                                                            @csrf
                                                                            <button type="submit"
                                                                                class="dropdown-item">Close</button>
                                                                        </form>
                                                                    @endif


                                                                    <form
                                                                        action="/myevent/{{ $event_id }}/poll/{{ $question->id }}"
                                                                        method="POST">
                                                                        {{ method_field('DELETE') }}
                                                                        @csrf
                                                                        <button type="submit"
                                                                            class="dropdown-item">Delete</button>
                                                                    </form>

                                                                </div>
                                                            </div>
                                                        </div>
                                                    </span>
                                                </div>
                                                <div class="col-12">
                                                    <div class="collapse mt-3" id="collapseExample{{ $question->id }}">
                                                        <div class="card card-body">
                                                            @foreach ($poll_manage as $manage)
                                                                @if ($manage->question == $question->question)
                                                                    <p class="mb-0">
                                                                        {{ $manage->answer }}: <span
                                                                            class="text-muted">{{ $manage->answer_total }}</span>
                                                                    </p>
                                                                @endif
                                                            @endforeach
                                                        </div>
                                                    </div>
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
