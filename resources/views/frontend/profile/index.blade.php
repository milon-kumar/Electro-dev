@extends('frontend.master')

@section('content')
    <h1>Welcome to Mr / Ms {{auth()->user()->name}}</h1>
    <a href="{{route('frontend.home')}}">Go to home</a>
@endsection
