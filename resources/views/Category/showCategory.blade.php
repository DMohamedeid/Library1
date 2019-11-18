
@extends('adminViews.index')

@section('title' , 'Category')

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
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6 col-xl-3 bg-white">
                <div class="card-header text-center bg-white font-24">
                    Categories
                </div>
                <table class="table table-hover text-center">
                    <tbody>
                    @foreach($categories as $cat )
                        <tr>
                            <th><a href="{{route('category.show', $cat->id)}}">{{$cat->name}}</a></th>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <div class="col-md-6 col-xl-9">
                    <div class="row justify-content-center">
                        <div class="card-header bg-white font-24 text-center" style="width: 500px">
                            {{$category->name}} Books
                            <div class="float-right font-21 btn card">
                                Number of Books
                                <span class="badge badge-warning float-right">{{$count}}</span>
                            </div>
                        </div>
                    </div>
                @include('Book.Books')
            </div>
        </div>
    </div>
@stop

