
@extends('adminViews.index')

@section('title' , 'Search Results')

@section('content')
    <style>
        body {
            background: url("../../admin/images/big/bg.jpg") no-repeat center center fixed;
            -webkit-background-size: cover;
            -moz-background-size: cover;
            background-size: cover;
            -o-background-size: cover;
        }
    </style>
    <div class="card-header text-center bg-black m-1 font-24">
        <span class="badge badge-warning ">Search Result for ({{request()->input('search')}}) = ({{$books->count()}})</span>
        @include('Book.Books')
    </div>
@stop


