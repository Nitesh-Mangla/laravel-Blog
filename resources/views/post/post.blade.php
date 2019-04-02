@extends('Admin.main')

@section('title')
    <title>Post Blogs</title>
@endsection



@section('header')
@include('layouts.header');
@endsection

@section('panel-body')

@if (count($errors) > 0)
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br> 
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
        </div>
@endif
<div class="panel-body">
    {!! Form::open(array('url' => 'create_post','files'=>true)) !!}
    @csrf
    @method('get')
    {!! Form::label('cat', 'Category') !!}
    {!! Form::select('cat', $category,array('class' => 'form-control')); !!}
<br/>
<br/>
    {!! Form::label('title', 'Title') !!}
    {!! Form::text('title', null, array('class' => 'form-control')) !!}
    <br/>
    {!! Form::label('pic', 'Blog Pic') !!}
    {!! Form::file('pic', null, array('class' => 'form-control')) !!}<br/><br/>
    {!! Form::label('author', 'Author Name') !!}
    {!! Form::text('author', null, array('class' => 'form-control')) !!}
    {!! Form::label('sort', 'Short Description') !!}
    {!! Form::textarea('short', null, array('class' => 'form-control')) !!}
    {!! Form::label('desc', 'Description') !!}
    {!! Form::textarea('desc', null, array('class' => 'form-control')) !!}
    <br/><br/>
    {!! Form::submit( 'Create Post' , array( 'name' => 'submit', 'class' => 'secondary-cart-btn btn btn-primary' ))  !!}
    {!! Form::close() !!}
 </div>
@endsection 

@section( 'sidebar' );
    @include( 'layouts.sidebar' );
@endsection

@section( 'footer' )
@include( 'layouts.footer' )
@endsection