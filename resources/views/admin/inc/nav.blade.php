<nav class="navbar navbar-expand-sm navbar-dark bg-primary">
    <a class="navbar-brand" href="#">Egy Courses</a>
    <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#collapsibleNavId" aria-controls="collapsibleNavId"
        aria-expanded="false" aria-label="Toggle navigation"></button>
    <div class="collapse navbar-collapse" id="collapsibleNavId">
        <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
            {{-- <li class="nav-item ">
                <a class="nav-link" href="{{ route('admin.index') }}">Home <span class="sr-only">(current)</span></a>
            </li> --}}
            <li class="nav-item active">
                <a class="nav-link" href="{{ route('admin.cats') }}">Categories</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="dropdownId" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="{{ asset('assets/img/user.svg') }}" alt="user profile">  {{ Str::limit(Auth('admin')->user()->name, 8, '...') }}</a>
                <div class="dropdown-menu" aria-labelledby="dropdownId">
                    <a class="dropdown-item" href="{{ route('admin.add') }}">New Admin</a>
                    <a class="dropdown-item" href="{{ route('admin.settings') }}">Settings</a>
                    <a class="dropdown-item" href="{{ route('admin.logout') }}">Log out</a>
                </div>
            </li>
        </ul>
    </div>
</nav>
