@extends('layouts.master')

@section('title')
    <title>E-Shopper</title>
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('home/home.css') }}">
@endsection

@section('content')
	@include('auth.components.cartContent')
@endsection

@section('js')
	<script src="{{asset('home/cart/cart.js')}}"></script>
@endsection
