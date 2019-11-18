
@extends('adminViews.index')

@section('title' , 'Upload New Book')

@section('content')

    <div class="container-fluid">
        <div class="row m-2 p-2">
            <div class="col-12">
                <div class="card-box">
                    <h4 class="m-t-0 header-title"> Upload A New Book </h4>
                    <div class="row">
                        <div class="col-12">
                            <div class="p-2">
                                <div class="panel-body">
                                    <form action="{{route('book.store')}}" method="post" enctype="multipart/form-data">
                                        @csrf
                                       @include('Book.form')
                                        <div class="form-group mt-4">
                                            <button type="submit" name="uplaod" class="btn btn-info btn-block">Upload Book</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
