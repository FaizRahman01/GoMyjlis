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
                    @yield('dd-item')
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
                    @yield('dd-item')
                </div>
            </div>
        </div>
    </div>


    <div class="col-lg-9 col-12 mx-1">
        @yield('content')
    </div>
</div>
