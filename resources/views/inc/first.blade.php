<!doctype html>
<html class="no-js" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title> @yield('title')</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('assets/img/logo/logo.png')}}">

	<!-- CSS here -->
	<link rel="stylesheet" href="{{asset('assets') }}/css/bootstrap.min.css">
	<link rel="stylesheet" href="{{asset('assets') }}/css/owl.carousel.min.css">
	<link rel="stylesheet" href="{{asset('assets') }}/css/slicknav.css">
    <link rel="stylesheet" href="{{asset('assets') }}/css/flaticon.css">
    <link rel="stylesheet" href="{{asset('assets') }}/css/gijgo.css">
	<link rel="stylesheet" href="{{asset('assets') }}/css/animate.min.css">
	<link rel="stylesheet" href="{{asset('assets') }}/css/magnific-popup.css">
	<link rel="stylesheet" href="{{asset('assets') }}/css/fontawesome-all.min.css">
	<link rel="stylesheet" href="{{asset('assets') }}/css/themify-icons.css">
	<link rel="stylesheet" href="{{asset('assets') }}/css/slick.css">
	<link rel="stylesheet" href="{{asset('assets') }}/css/nice-select.css">
	<link rel="stylesheet" href="{{asset('assets') }}/css/style.css" >
    <link rel="stylesheet" href="{{asset('assets') }}/css/myStyle.css">

    @yield('style')
</head>
<body>
