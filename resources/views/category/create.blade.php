@extends('Admin.main')

@section('title');
<title>Categories</title>
@endsection
@section('header')
@include('layouts.header');
@endsection

@section('panel-body')
@if( Session::has( 'category' ) )
    <div class= "alert alert-success">
        <em>{!! session( 'category' ) !!}</em>
    </div>

@endif

@include( 'common.error' )
 <div class="panel-body">
    {!! Form::open(array(route('store'))) !!}
    {!! Form::label('Name', 'Name:') !!}
    {!! Form::text('name', null, array('class' => 'form-control')) !!}
    {!! Form::submit( 'Create Category' , array( 'name' => 'submit', 'class' => 'secondary-cart-btn' ))  !!}
    {!! Form::close() !!}
 </div>
@endsection 

@section( 'sidebar' );
    @include( 'layouts.sidebar' );
@endsection

@section( 'footer' )
@include( 'layouts.footer' )
@endsection