
@section('style')
    <style>

    </style>
@endsection
<header>

    <!-- Header Start -->
    <div class="header-area">
        <div class="main-header ">
            <div class="header-top d-none d-lg-block">
                <!-- Left Social -->
                <div class="header-left-social">
                    <ul class="header-social">
                        <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                        <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                        <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                        <li> <a href="#"><i class="fab fa-google-plus-g"></i></a></li>
                    </ul>
                </div>
                <div class="container">
                    <div class="col-xl-12">
                        <div class="row d-flex justify-content-between align-items-center">
                            <div class="header-info-left">
                                <ul>
                                    <li>{{ $contacts['email'] }}</li>
                                    <li>{{ $contacts['phone'] }}</li>
                                </ul>
                            </div>
                            <div class="header-info-right">
                                @if (Auth('instructor')->check())
                                    <div class="nav-item dropdown">
                                        <a class="nav-link dropdown-toggle text-primary" href="#" id="dropdownId" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{Str::limit( Auth('instructor')->user()->name, 15, '...') }} <img src="{{ asset('assets/img/user.svg') }}" alt="user Icon"></a>
                                        <div class="dropdown-menu" aria-labelledby="dropdownId">
                                            <a class="dropdown-item" href="{{ route('instructor.dashboard') }}">Dashboard</a>
                                            <a class="dropdown-item" href="{{ route('instructor.logout') }}">Logout</a>
                                        </div>
                                    </div>
                                @elseif(Auth('student')->check())
                                    <div class="nav-item dropdown">
                                        <a class="nav-link dropdown-toggle text-primary" href="#" id="dropdownId" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{Str::limit( Auth('student')->user()->name , 15, '...') }} <img src="{{ asset('assets/img/user.svg') }}" alt="user Icon"></a>
                                        <div class="dropdown-menu" aria-labelledby="dropdownId">
                                            <a class="dropdown-item" href="{{ route('student.dashboard') }}">Dashboard</a>
                                            <a class="dropdown-item" href="{{ route('student.logout') }}">Logout</a>
                                        </div>
                                    </div>
                                @elseif(Auth('admin')->check())
                                    <div class="nav-item dropdown">
                                        <a class="nav-link dropdown-toggle text-primary" href="#" id="dropdownId" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{Str::limit( Auth('admin')->user()->name , 15, '...') }} <img src="{{ asset('assets/img/user.svg') }}" alt="user Icon"></a>
                                        <div class="dropdown-menu" aria-labelledby="dropdownId">
                                            <a class="dropdown-item" href="{{ route('admin.logout') }}">Logout</a>
                                        </div>
                                    </div>
                                @else
                                    <ul>
                                        <li><a href="{{ route('student.log') }}"><i class="ti-user"></i>Login</a></li>
                                        <li><a href="{{ route('student.register') }}"><i class="ti-lock"></i>Register</a></li>
                                    </ul>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="header-bottom header-sticky">
                <!-- Logo -->
                <div class="logo d-none d-lg-block">
                    <a href="{{ route('home') }}"><img src='{{ asset("assets/img/logo/".$logo['logo']) }}' alt="Logo Egy courses"></a>
                </div>
                <div class="container">
                    <div class="menu-wrapper">
                        <!-- Logo -->
                        <div class="logo logo2 d-block d-lg-none">
                            <a href="{{ route('home') }}"><img src='{{ asset("assets/img/logo/".$logo['logo']) }}' alt="Logo Egy courses"></a>
                        </div>
                        <!-- Main-menu -->
                        <div class="main-menu d-none d-lg-block">
                            <nav>
                                <ul id="navigation">
                                    <li><a href="{{ route('home') }}">Home</a></li>
                                    <li><a href="{{ route('cats') }}">Categories</a></li>
                                    <li><a href="{{ route('courses') }}">Courses</a></li>
                                    <li><a href="{{ route('instructors') }}">Instructors</a></li>
                                    <li><a href="{{ route('about') }}">About</a></li>
                                    <li><a href="{{ route('contact') }}">Contact</a></li>
                                    @if (Auth('instructor')->check())
                                        <li class="d-lg-none "><a class="" href="{{ route('instructor.dashboard') }}" >{{Str::limit( Auth('instructor')->user()->name, 15, '...') }} <img src="{{ asset('assets/img/user.svg') }}" class="ml-2"  alt="user Icon"></a></li>
                                        <li class="d-lg-none "><a class="" href="{{ route('instructor.logout') }}">Logout</a></li>
                                    @elseif(Auth('student')->check())
                                        <li class="d-lg-none "><a class="" href="{{ route('student.dashboard') }}" >{{Str::limit( Auth('student')->user()->name , 15, '...') }} <img src="{{ asset('assets/img/user.svg') }}"class="ml-2"  alt="user Icon"></a></li>
                                        <li class="d-lg-none "><a class="" href="{{ route('student.logout') }}">Logout</a></li>
                                    @elseif(Auth('admin')->check())
                                        <li class="d-lg-none "><a class="" href="{{ route('admin.index') }}" >{{Str::limit( Auth('admin')->user()->name , 15, '...') }} <img src="{{ asset('assets/img/user.svg') }}" class="ml-2" alt="user Icon"></a></li>
                                        <li class="d-lg-none "><a class="" href="{{ route('admin.logout') }}">Logout</a></li>
                                    @else
                                        <li class="d-lg-none "><a href="{{ route('student.log') }}"><i class="ti-user"></i> Login</a></li>
                                        <li class="d-lg-none "><a href="{{ route('student.register') }}"><i class="ti-lock"></i> Register</a></li>
                                    @endif
                                </ul>
                            </nav>
                        </div>
                        <!-- Header-btn -->
                        <div class="header-search d-none d-lg-block">
                            <form action="{{ route('course.search') }}" method="POST" class="form-box f-right ">
                                @csrf
                                <input type="text" name="search" placeholder="Search Courses">
                                <div class="search-icon">
                                   <button type="submit" id="btn-search"> <i class="fas fa-search special-tag"></i></button>
                                </div>
                            </form>
                        </div>
                    </div>



                    </div>
                    <!-- Mobile Menu -->
                    <div class="col-12">
                        <div class="mobile_menu d-block d-lg-none"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Header End -->
</header>

