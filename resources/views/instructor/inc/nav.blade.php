<nav class="navbar navbar-expand-sm navbar-dark bg-primary">
    <a class="navbar-brand" href="{{ route('home') }}">Egy Courses</a>
    <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#collapsibleNavId" aria-controls="collapsibleNavId"
        aria-expanded="false" aria-label="Toggle navigation"></button>
    <div class="collapse navbar-collapse" id="collapsibleNavId">
        <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
            <li class="nav-item">
                <a class="nav-link" href="{{ route('instructor.dashboard') }}">Dashboard</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="dropdownId" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{Str::limit( Auth('instructor')->user()->name, 15, '...') }} <img src="{{ asset('assets/img/user.svg') }}" alt="user Icon"></a>
                <div class="dropdown-menu" aria-labelledby="dropdownId">
                    <a class="dropdown-item" href="#">Settings</a>
                    <a class="dropdown-item" href="{{ route('instructor.logout') }}">Logout</a>
                </div>
            </li>
        </ul>
    </div>
</nav>
