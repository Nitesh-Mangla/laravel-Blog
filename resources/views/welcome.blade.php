@extends('Admin.main')
@section('title');
<title>Dashboard</title>
@endsection

@section('header')
@include('layouts.header' );
@endsection

     

@section( 'sidebar' );
    @include( 'layouts.sidebar' );
@endsection

@section( 'footer' )
@include( 'layouts.footer' )
@endsection