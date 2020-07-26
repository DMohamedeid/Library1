
@extends('adminViews.index')

@section('title' , 'Book')

@section('content')
    <div class="panel panel-default">
        <div class="row mt-2">
            <div class="col-md-6 col-xl-4">
                <div class="card">
                    <div class="card-header text-center">{{$book->name}}</div>
                           <img class="card-img-top img-fluid" src="{{asset('/storage/Book/Images/' . $book->image)}}" alt="Card image cap" style="width: 450px ; height: 450px ">
                        <div class="card-body">
                            <label class="col-form-label"> Description:  {{$book->info ?? 'There is No Description'}}</label><br>
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#pdf-Modal">
                                <i class="fa fa-book-open"> Read </i>
                            </button>
                            <a href="{{asset('/storage/Book/PDF/' . $book->bookFile)}}" class="btn btn-bordred-dark float-right">Download</a>
                        </div>
                    </div>
                </div>
            <div class="col-md-6 col-xl-8">
                <div class="col-md-6 col-xl-12">
                    @hasRole(['superadmin' , 'admin' , 'author'])
                        @if (auth()->user()->id == $book->user_id || auth()->user()->hasAnyRoles(['superadmin' , 'admin']))
                    <a href="{{route('book.edit' , $book->id)}}" class="btn btn-primary float-right"> <i class="fas fa-edit"></i> Edit</a>
                        @endif
                        @endhasRole
<!-- button for edit using modal -->

{{--                    <!-- Button trigger modal -->--}}
{{--                    <button type="button" class="btn btn-primary float-right"--}}
{{--                            data-toggle="modal"--}}
{{--                            data-target="#editbook"--}}
{{--                            data-name="{{$book->name}}"--}}
{{--                            data-author="{{$book->author}}"--}}
{{--                            data-info="{{$book->info}}"--}}
{{--                            data-category="{{$book->category}}"--}}
{{--                            data-image="{{ $book->image}}"--}}
{{--                            data-book="{{ $book->bookFile}}"--}}
{{--                            data-bookid="{{$book->id}}">--}}
{{--                        <i class="fas fa-edit"></i>  Edit--}}
{{--                    </button>--}}


<!-- Display the information of the Book -->
                </div>
                <div class="mt-4 mb-4">
                    <span class="font-24 font-weight-bolder " style="color: black ;"  > Book Name </span>
                    <span class=" ml-2 font-17">  {{$book->name}}</span>
                </div>
                <hr>
                <div class="mb-4">
                    <span class="font-24 font-weight-bolder " style="color: black ;"  > Author  </span>
                    <span class=" ml-2 font-17">  {{$book->author}}</span>
                </div>
                <hr>
                <div class="mb-4">
                    <span class="font-24 font-weight-bolder " style="color: black ;"  > Description  </span>
                    <p class="card-text ml-2 font-17">  {{$book->info ?? 'There is No Description'}}</p>
                </div>
                <hr>
                <div class="mb-4">
                    <span class="font-24 font-weight-bolder " style="color: black ;"> Category  </span>
                    <span class=" ml-2 font-17">  {{implode($book->category()->get()->pluck('name')->toArray())}}</span>
                </div>
                <hr>
                <div class="mb-4">
                    <span class="font-24 font-weight-bolder " style="color: black ;"> The Uploader   </span>
                    <span class=" ml-2 font-17">  {{implode($book->user()->get()->pluck('name')->toArray())}}</span>
                </div>
                <hr>
                <div class="mb-4">
                    <span class="font-24 font-weight-bolder " style="color: black ;"> Uploaded at  </span>
                    <span class=" ml-2 font-17">  {{$book->created_at}}</span>
                </div>
            </div>
            @hasRole(['superadmin' , 'admin' , 'author'])
            @if (auth()->user()->id == $book->user_id)
            <div class="col-md-6 col-xl-12">
                    <button type="button" class="btn btn-danger float-right" data-toggle="modal" data-target="#deletebook" data-bookid="{{$book->id}}">
                        <i class="fas fa-trash-alt"> Delete</i>
                    </button>
                </div>
            @endif
            @endhasRole


            <!-- Modal for Delete Book -->
            <div class="modal fade" id="deletebook" tabindex="-1" role="dialog" aria-labelledby="deletebook" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content text-center">
                        <div class="modal-header">
                            <h5 class="modal-tite" id="exampleModalLabel"> Delete Confirmation</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form action="{{route('book.destroy', $book->id)}}" method="post" >
                            <div class="modal-body">
                                @method('DELETE')
                                @csrf
                                <input type="hidden" name="book" id="bid" value="">
                                <h4> Are You Sure You Want To Delete This Book ??</h4>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-danger">Yes</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            {{--    End Delete Book Model--}}
        </div>
        <hr>
        @include('Comment.index')
    </div>

    <!-- PDF Modal -->
    <div class="modal fade" id="pdf-Modal" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Book</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <embed  src="{{asset('/storage/Book/PDF/Read/' . $book->bookRead)}}" width="1110px" height="1000px" />
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>


    {{--                     Edit Model--}}
    {{--                    <div class="modal fade" id="editbook" tabindex="-1" role="dialog" aria-labelledby="editbook" aria-hidden="true">--}}
    {{--                        <div class="modal-dialog" role="document">--}}
    {{--                            <div class="modal-content">--}}
    {{--                                <div class="modal-header">--}}
    {{--                                    <h5 class="modal-title" id="exampleModalLabel"> Edit The Category</h5>--}}
    {{--                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">--}}
    {{--                                        <span aria-hidden="true">&times;</span>--}}
    {{--                                    </button>--}}
    {{--                                </div>--}}
    {{--                                <form action="{{route('book.update', $book->id)}}" method="post" >--}}
    {{--                                    <div class="modal-body">--}}
    {{--                                        @method('PATCH')--}}
    {{--                                        @csrf--}}
    {{--                                        <input type="hidden" name="bookid" id="book_id" value="">--}}
    {{--                                        @include('Book.form')--}}
    {{--                                    </div>--}}
    {{--                                    <div class="modal-footer">--}}
    {{--                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>--}}
    {{--                                        <button type="submit" class="btn btn-primary">Save Changes</button>--}}
    {{--                                    </div>--}}
    {{--                                </form>--}}
    {{--                            </div>--}}
    {{--                        </div>--}}
    {{--                    </div>--}}

    {{--                    End Of Edit model--}}
@stop
