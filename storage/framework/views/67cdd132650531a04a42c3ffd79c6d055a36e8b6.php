
<?php $__env->startSection('style'); ?>
    <style>

    </style>
<?php $__env->stopSection(); ?>
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
                                    <li><?php echo e($contacts['email']); ?></li>
                                    <li><?php echo e($contacts['phone']); ?></li>
                                </ul>
                            </div>
                            <div class="header-info-right">
                                <?php if(Auth('instructor')->check()): ?>
                                    <div class="nav-item dropdown">
                                        <a class="nav-link dropdown-toggle text-primary" href="#" id="dropdownId" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo e(Str::limit( Auth('instructor')->user()->name, 15, '...')); ?> <img src="<?php echo e(asset('assets/img/user.svg')); ?>" alt="user Icon"></a>
                                        <div class="dropdown-menu" aria-labelledby="dropdownId">
                                            <a class="dropdown-item" href="<?php echo e(route('instructor.dashboard')); ?>">Dashboard</a>
                                            <a class="dropdown-item" href="<?php echo e(route('instructor.logout')); ?>">Logout</a>
                                        </div>
                                    </div>
                                <?php elseif(Auth('student')->check()): ?>
                                    <div class="nav-item dropdown">
                                        <a class="nav-link dropdown-toggle text-primary" href="#" id="dropdownId" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo e(Str::limit( Auth('student')->user()->name , 15, '...')); ?> <img src="<?php echo e(asset('assets/img/user.svg')); ?>" alt="user Icon"></a>
                                        <div class="dropdown-menu" aria-labelledby="dropdownId">
                                            <a class="dropdown-item" href="<?php echo e(route('student.dashboard')); ?>">Dashboard</a>
                                            <a class="dropdown-item" href="<?php echo e(route('student.logout')); ?>">Logout</a>
                                        </div>
                                    </div>
                                <?php elseif(Auth('admin')->check()): ?>
                                    <div class="nav-item dropdown">
                                        <a class="nav-link dropdown-toggle text-primary" href="#" id="dropdownId" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo e(Str::limit( Auth('admin')->user()->name , 15, '...')); ?> <img src="<?php echo e(asset('assets/img/user.svg')); ?>" alt="user Icon"></a>
                                        <div class="dropdown-menu" aria-labelledby="dropdownId">
                                            <a class="dropdown-item" href="<?php echo e(route('admin.logout')); ?>">Logout</a>
                                        </div>
                                    </div>
                                <?php else: ?>
                                    <ul>
                                        <li><a href="<?php echo e(route('student.log')); ?>"><i class="ti-user"></i>Login</a></li>
                                        <li><a href="<?php echo e(route('student.register')); ?>"><i class="ti-lock"></i>Register</a></li>
                                    </ul>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="header-bottom header-sticky">
                <!-- Logo -->
                <div class="logo d-none d-lg-block">
                    <a href="<?php echo e(route('home')); ?>"><img src='<?php echo e(asset("assets/img/logo/".$logo['logo'])); ?>' alt="Logo Egy courses"></a>
                </div>
                <div class="container">
                    <div class="menu-wrapper">
                        <!-- Logo -->
                        <div class="logo logo2 d-block d-lg-none">
                            <a href="<?php echo e(route('home')); ?>"><img src='<?php echo e(asset("assets/img/logo/".$logo['logo'])); ?>' alt="Logo Egy courses"></a>
                        </div>
                        <!-- Main-menu -->
                        <div class="main-menu d-none d-lg-block">
                            <nav>
                                <ul id="navigation">
                                    <li><a href="<?php echo e(route('home')); ?>">Home</a></li>
                                    <li><a href="<?php echo e(route('cats')); ?>">Categories</a></li>
                                    <li><a href="<?php echo e(route('courses')); ?>">Courses</a></li>
                                    <li><a href="<?php echo e(route('instructors')); ?>">Instructors</a></li>
                                    <li><a href="<?php echo e(route('about')); ?>">About</a></li>
                                    <li><a href="<?php echo e(route('contact')); ?>">Contact</a></li>
                                    <?php if(Auth('instructor')->check()): ?>
                                        <li class="d-lg-none "><a class="" href="<?php echo e(route('instructor.dashboard')); ?>" ><?php echo e(Str::limit( Auth('instructor')->user()->name, 15, '...')); ?> <img src="<?php echo e(asset('assets/img/user.svg')); ?>" alt="user Icon"></a></li>
                                        <li class="d-lg-none "><a class="" href="<?php echo e(route('instructor.logout')); ?>">Logout</a></li>
                                    <?php elseif(Auth('student')->check()): ?>
                                        <li class="d-lg-none "><a class="" href="<?php echo e(route('student.dashboard')); ?>" ><?php echo e(Str::limit( Auth('student')->user()->name , 15, '...')); ?> <img src="<?php echo e(asset('assets/img/user.svg')); ?>" alt="user Icon"></a></li>
                                        <li class="d-lg-none "><a class="" href="<?php echo e(route('student.logout')); ?>">Logout</a></li>
                                    <?php elseif(Auth('admin')->check()): ?>
                                        <li class="d-lg-none "><a class="" href="<?php echo e(route('admin.index')); ?>" ><?php echo e(Str::limit( Auth('admin')->user()->name , 15, '...')); ?> <img src="<?php echo e(asset('assets/img/user.svg')); ?>" alt="user Icon"></a></li>
                                        <li class="d-lg-none "><a class="" href="<?php echo e(route('admin.logout')); ?>">Logout</a></li>
                                    <?php else: ?>
                                        <li class="d-lg-none "><a href="<?php echo e(route('student.log')); ?>"><i class="ti-user"></i>Login</a></li>
                                        <li class="d-lg-none "><a href="<?php echo e(route('student.register')); ?>"><i class="ti-lock"></i>Register</a></li>
                                    <?php endif; ?>
                                </ul>
                            </nav>
                        </div>
                        <!-- Header-btn -->
                        <div class="header-search d-none d-lg-block">
                            <form action="<?php echo e(route('course.search')); ?>" method="POST" class="form-box f-right ">
                                <?php echo csrf_field(); ?>
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

<?php /**PATH /opt/lampp/htdocs/laravel-projects/courses-laravel/resources/views//inc/header.blade.php ENDPATH**/ ?>