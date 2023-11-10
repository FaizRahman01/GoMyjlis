@extends('components.my_event_template')

@section('title', 'Analytics')

@section('myevent-active')active @endsection
@section('link-home'){{ URL::to('/') }}@endsection
@section('link-event'){{ URL::to('/events') }}@endsection
@section('link-login'){{ URL::to('/signin') }}@endsection
@section('link-account'){{ URL::to('/account') }}@endsection
@section('link-myevent'){{ URL::to('/myevent') }}@endsection



@section('link-info'){{ URL::to('/myevent/' . $event_id . '/info') }}@endsection
@section('link-ticket'){{ URL::to('/myevent/' . $event_id . '/ticket') }}@endsection

@section('dd-item')
    <a class="dropdown-item text-dark" href="{{ URL::to('/myevent/' . $event_id . '/schedule') }}">Schedule</a>
    <a class="dropdown-item text-dark" href="{{ URL::to('/myevent/' . $event_id . '/poll') }}">Poll</a>
    @if ($event->is_organizer == 0 && $event->is_assistant == 0)
        <a class="dropdown-item text-dark" href="{{ URL::to('/myevent/' . $event_id . '/rating') }}">Give Rating</a>
    @endif
    <a class="dropdown-item text-dark" href="{{ URL::to('/myevent/' . $event_id . '/support') }}">Support Ticket</a>
    @if (
        ($event->is_organizer == 1 && $event->is_assistant == 0) ||
            ($event->is_organizer == 0 && $event->is_assistant == 1))
        <a class="dropdown-item text-dark" href="{{ URL::to('/myevent/' . $event_id . '/task') }}">Management Task</a>
        <a class="dropdown-item text-dark" href="{{ URL::to('/myevent/' . $event_id . '/attendee') }}">Attendee List</a>
        <a class="dropdown-item text-dark" href="{{ URL::to('/myevent/' . $event_id . '/vendor') }}">Vendor</a>
        <a class="dropdown-item text-dark" href="{{ URL::current() }}">Analytics</a>
    @endif
@endsection


@section('content')

    <div class="row mb-4">
        <h4 class="fw-light col-12 d-flex align-items-center">Event Analytics</h4>
    </div>

    <div class="mb-5 mx-5 d-flex justify-content-center">
        <div style="width: 300px; height: 300px" class="mb-5">
            <canvas id="myChart"></canvas>
        </div>
    </div>

    <div class="row mb-5 mx-2 d-flex justify-content-center">
        <div class="col-md-6">
            <div style="width: 300px; height: 300px" class="mb-5">
                <canvas id="contentChart"></canvas>
            </div>
        </div>
        <div class="col-md-6">
            <div style="width: 300px; height: 300px" class="mb-5">
                <canvas id="entertainChart"></canvas>
            </div>
        </div>


        <div class="col-md-6">
            <div style="width: 300px; height: 300px" class="mb-5">
                <canvas id="engagementChart"></canvas>
            </div>
        </div>
        <div class="col-md-6">
            <div style="width: 300px; height: 300px" class="mb-5">
                <canvas id="foodChart"></canvas>
            </div>
        </div>

        <div class="col-md-6">
            <div style="width: 300px; height: 300px" class="mb-5">
                <canvas id="overallChart"></canvas>
            </div>
        </div>

    </div>


@endsection

@section('js')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>
        const ctx = document.getElementById('myChart');
        let attend = {{ $checkin->is_attend ?? 0 }}
        let not_attend = {{ $not_checkin->is_attend ?? 0 }}
        new Chart(ctx, {
            type: 'pie',
            data: {
                labels: ['Attend', 'Not Attend'],
                datasets: [{
                    label: 'Attendee Checkin',
                    data: [attend, not_attend],
                    borderWidth: 1
                }]
            },
            options: {
                plugins: {
                    title: {
                        display: true,
                        text: 'Attendee Check In',
                        align: 'start',
                        font: {
                            weight: 'normal',
                            size: 20
                        }
                    }
                },
                responsive: true,
                maintainAspectRatio: false,
            }
        });


        const ctx2 = document.getElementById('contentChart');
        let satisfied_content = {{ $content_rating->satisfied ?? 0 }};
        let reasonable_content = {{ $content_rating->reasonable ?? 0 }};
        let dissapointed_content = {{ $content_rating->dissapointed ?? 0 }};
        new Chart(ctx2, {
            type: 'doughnut',
            data: {
                labels: ['Dissapointed', 'Reasonable', 'Satisfied'],
                datasets: [{
                    label: 'Attendee Feedback',
                    data: [dissapointed_content, reasonable_content, satisfied_content],
                    borderWidth: 1
                }]
            },
            options: {
                plugins: {
                    title: {
                        display: true,
                        text: 'Content and Presentation',
                        align: 'start',
                        font: {
                            weight: 'normal',
                            size: 20
                        }
                    }
                },
                responsive: true,
                maintainAspectRatio: false
            }
        });

        const ctx3 = document.getElementById('entertainChart');
        let satisfied_entertain = {{ $entertain_rating->satisfied ?? 0 }};
        let reasonable_entertain = {{ $entertain_rating->reasonable ?? 0 }};
        let dissapointed_entertain = {{ $entertain_rating->dissapointed ?? 0 }};
        new Chart(ctx3, {
            type: 'doughnut',
            data: {
                labels: ['Dissapointed', 'Reasonable', 'Satisfied'],
                datasets: [{
                    label: 'Attendee Feedback',
                    data: [dissapointed_entertain, reasonable_entertain, satisfied_entertain],
                    borderWidth: 1
                }]
            },
            options: {
                plugins: {
                    title: {
                        display: true,
                        text: 'Entertainment',
                        align: 'start',
                        font: {
                            weight: 'normal',
                            size: 20
                        }
                    }
                },
                responsive: true,
                maintainAspectRatio: false
            }
        });

        const ctx4 = document.getElementById('engagementChart');
        let satisfied_engagement = {{ $engagement_rating->satisfied ?? 0 }};
        let reasonable_engagement = {{ $engagement_rating->reasonable ?? 0 }};
        let dissapointed_engagement = {{ $engagement_rating->dissapointed ?? 0 }};
        new Chart(ctx4, {
            type: 'doughnut',
            data: {
                labels: ['Dissapointed', 'Reasonable', 'Satisfied'],
                datasets: [{
                    label: 'Attendee Feedback',
                    data: [dissapointed_engagement, reasonable_engagement, satisfied_engagement],
                    borderWidth: 1
                }]
            },
            options: {
                plugins: {
                    title: {
                        display: true,
                        text: 'Engagement and Interaction',
                        align: 'start',
                        font: {
                            weight: 'normal',
                            size: 20
                        }
                    }
                },
                responsive: true,
                maintainAspectRatio: false
            }
        });

        const ctx5 = document.getElementById('foodChart');
        let satisfied_food = {{ $food_rating->satisfied ?? 0 }};
        let reasonable_food = {{ $food_rating->reasonable ?? 0 }};
        let dissapointed_food = {{ $food_rating->dissapointed ?? 0 }};
        new Chart(ctx5, {
            type: 'doughnut',
            data: {
                labels: ['Dissapointed', 'Reasonable', 'Satisfied'],
                datasets: [{
                    label: 'Attendee Feedback',
                    data: [dissapointed_food, reasonable_food, satisfied_food],
                    borderWidth: 1
                }]
            },
            options: {
                plugins: {
                    title: {
                        display: true,
                        text: 'Food and Beverages',
                        align: 'start',
                        font: {
                            weight: 'normal',
                            size: 20
                        }
                    }
                },
                responsive: true,
                maintainAspectRatio: false
            }
        });

        const ctx6 = document.getElementById('overallChart');
        let satisfied_overall = {{ $overall_rating->satisfied ?? 0 }};
        let reasonable_overall = {{ $overall_rating->reasonable ?? 0 }};
        let dissapointed_overall = {{ $overall_rating->dissapointed ?? 0 }};
        new Chart(ctx6, {
            type: 'doughnut',
            data: {
                labels: ['Dissapointed', 'Reasonable', 'Satisfied'],
                datasets: [{
                    label: 'Attendee Feedback',
                    data: [dissapointed_overall, reasonable_overall, satisfied_overall],
                    borderWidth: 1
                }]
            },
            options: {
                plugins: {
                    title: {
                        display: true,
                        text: 'Overall Experiences',
                        align: 'start',
                        font: {
                            weight: 'normal',
                            size: 20
                        }
                    }
                },
                responsive: true,
                maintainAspectRatio: false
            }
        });
    </script>

@endsection
