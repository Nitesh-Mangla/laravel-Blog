@extends('Admin.main')
@section('title');
<title>Dashboard</title>
@endsection
@section('css')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.13/css/jquery.dataTables.min.css">
<!-- <link rel="stylesheet" type="text/css" href="<?php echo  asset('css/_modal.scss')?>">    -->
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"> </script>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" >
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script >
    $(window).load(function(){
        $("#datatable_wrapper").css("width","100% ");
    });
    


</script>
<style>
.modal-backdrop {
    position: fixed;
    top: 0;
    left: 0;
    z-index: -1;
    width: 100vw;
    height: 100vh;
    background-color: #000;
}   
</style>
 
@endsection
@section('header')
@include('layouts.header' );
@endsection     

@section( 'pagename' )

     <table id="datatable" class="display" style="width:100%">
        <thead>
            <tr>
                <th>ID</th>
                <th>Blog Name</th>
                <th>Created At</th>
                <th>Updated At</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tfoot>
        <tr>
                <th>ID</th>
                <th>Blog Name</th>
                <th>Created At</th>
                <th>Updated At</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
        </tfoot>
    </table>
    
    

@endsection

@section( 'sidebar' )
    @include( 'layouts.sidebar' );
@endsection

@section('javscript')

@endsection

@section( 'footer' )
@include( 'layouts.footer' )
@endsection

@include( 'category.modal' );