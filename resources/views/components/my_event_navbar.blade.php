<div class="row mx-1 mt-4 d-flex justify-content-center">

    <div class="col-2 d-none d-lg-block">
        <div class="btn-group-vertical w-100">
            <a class="btn btn-primary border-light" href="@yield('link-info')">Info</a>
            <a class="btn btn-primary border-light" href="@yield('link-ticket')">Ticket</a>
            <div class="btn-group" role="group">
                <button id="btnGroupDrop4" type="button"
                    class="btn btn-primary dropdown-toggle border-left-1 border-light" data-bs-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false"></button>
                <div class="dropdown-menu" aria-labelledby="btnGroupDrop4">
                    <a class="dropdown-item text-dark" href="@yield('link-schedule')">Schedule</a>
                    <a class="dropdown-item text-dark" href="@yield('link-poll')">Poll</a>
                    <a class="dropdown-item text-dark" href="@yield('link-rating')">Give Rating</a>
                    <a class="dropdown-item text-dark" href="@yield('link-support')">Support Ticket</a>
                    <a class="dropdown-item text-dark" href="@yield('link-task')">Management Task</a>
                    <a class="dropdown-item text-dark" href="@yield('link-attendee')">Attendee List</a>
                    <a class="dropdown-item text-dark" href="@yield('link-vendor')">Vendor</a>
                    <a class="dropdown-item text-dark" href="@yield('link-analytic')">Analytics</a>
                </div>
            </div>
        </div>
    </div>

    <div class="col-12 d-lg-none mb-4">
        <div class="btn-group w-100">
            <a class="btn btn-primary border-light" href="@yield('link-info')">Info</a>
            <a class="btn btn-primary border-light" href="@yield('link-ticket')">Ticket</a>
            <div class="btn-group" role="group">
                <button id="btnGroupDrop4" type="button"
                    class="btn btn-primary dropdown-toggle border-left-1 border-light" data-bs-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false"></button>
                <div class="dropdown-menu" aria-labelledby="btnGroupDrop4">
                    <a class="dropdown-item text-dark" href="@yield('link-schedule')">Schedule</a>
                    <a class="dropdown-item text-dark" href="@yield('link-poll')">Poll</a>
                    <a class="dropdown-item text-dark" href="@yield('link-rating')">Give Rating</a>
                    <a class="dropdown-item text-dark" href="@yield('link-support')">Support Ticket</a>
                    <a class="dropdown-item text-dark" href="@yield('link-task')">Management Task</a>
                    <a class="dropdown-item text-dark" href="@yield('link-attendee')">Attendee List</a>
                    <a class="dropdown-item text-dark" href="@yield('link-vendor')">Vendor</a>
                    <a class="dropdown-item text-dark" href="@yield('link-analytic')">Analytics</a>
                </div>
            </div>
        </div>
    </div>


    <div class="col-lg-9 col-12 mx-1">
        @yield('content')
    </div>
</div>
