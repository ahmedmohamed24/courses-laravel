@extends('admin/layout')


@section('title')
    Admin
@endsection

@section('content')
@foreach ($students as $student)
    {{ $student->pivot->status }}
@endforeach
@endsection
