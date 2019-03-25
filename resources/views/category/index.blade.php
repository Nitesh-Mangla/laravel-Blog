@extends('Admin.main')

@section('title');
<title>Categories</title>
@endsection
@section('header')
@include('layouts.header');
@endsection

@section('pagename')
 <ul class="nav navbar-nav" style="display:inline;position:relative">
    <li style="float:left"><a href="">View All Categories</a></li>
    <li style="float:left"><a href="<?php echo route('create') ?>">&nbsp &nbsp &nbspCreate New Categories</a></li>
</ul>
@endsection 

@section( 'sidebar' );
    @include( 'layouts.sidebar' );
@endsection

@section( 'footer' )
@include( 'layouts.footer' )
@endsection