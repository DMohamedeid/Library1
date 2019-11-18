
@extends('adminViews.index')

@section('title' , 'Book')

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

    <div class="container-fluid m-2 p-2">
        <div class="row">
            <div class="col-md-6 col-xl-3 bg-white">
                <div class="card-header text-center bg-black m-1 font-24">
                    Categories
                </div>
                <table class="table table-hover text-center">
                    <tbody>
                    @foreach($categories as $category)
                        <tr>
                            <th>
                                <a href="{{route('category.show', $category->id)}}">{{$category->name}}</a>
                            </th>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <div class="col-md-6 col-xl-9">
                <div class="card-header text-center bg-black m-1 font-24">
                    Books
                    <span class="badge badge-warning float-right">Number Of Books <br> {{$count}}</span>
                </div>
                <div class="row">
                    <div class="row justify-content-center">
                       @include('Book.Books')
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop


