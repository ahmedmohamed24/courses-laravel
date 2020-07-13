
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
                                    <li>ahmed@gmail.com</li>
                                    <li>01010 1010 1010</li>
                                </ul>
                            </div>
                            <div class="header-info-right">
                                @if (Auth('instructor')->check())
                                    <span>{{ Auth('instructor')->user()->name }}</span>
                                    <a href="{{ route('instructor') }}"></a>
                                @elseif(Auth('student')->check())
                                    <span>{{ Auth('student')->user()->name }}</span>
                                    <a class="btn btn-dark" href="{{ route('student.logout') }}">Logout</a>
                                @elseif(Auth('admin')->check())
                                    <span>{{ Auth('admin')->user()->name }}</span>
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
                    <a href="{{ route('home') }}"><img src="{{ asset('assets/img/logo/logo.png') }}" alt="Logo Egy courses"></a>
                </div>
                <div class="container">
                    <div class="menu-wrapper">
                        <!-- Logo -->
                        <div class="logo logo2 d-block d-lg-none">
                            <a href="{{ route('home') }}"><img src="{{ asset('assets/img/logo/logo.png') }}" alt="Logo Egy courses"></a>
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

