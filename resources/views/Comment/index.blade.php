
    <div class="panel panel-default">
        <div class="card card-draggable ui-sortable-handle">
            <div class="card-header">
                <h4 class="card-title text-center font-22"> Comments </h4>
            </div>
            <div class="card-body bg-white">
                <form action="{{route('comment.store' , $book->id)}}" method="post">
                    @csrf
                    <div class="form-group">
                        <textarea class="form-control" name="comment" placeholder="Enter Your Comment Here"></textarea>
                    </div>
                    <div class="form-group">
                        <button type="submit" name="addcomment" class="btn btn-success">Add Comment</button>
                    </div>
                </form>
                <hr>
                <div class="card-text">
                    @if (count($book->comments) > 0)
                        @foreach($book->comments as $comment)
                            <div class="row">
                                <div class="col-md-12  col-md-offset-1">
                                    <div class="float-right">

                                         @if(Auth::user()->id == $comment->user_id)

                                        <div class="dropdown notification-list">
                                            <a class="nav-link dropdown-toggle nav-user mr-0 waves-effect" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">

                                                <span class="drop-arrow">
                                                    <i class="fas fa-caret-square-down"></i>
                                                </span>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-right">

                                                <!-- item-->
                                                <a href="#" class="dropdown-item notify-item">
                                                    <div class="d-inline" >
                                                        <!-- Edit comment -->
                                                        <button type="button" class="btn btn-primary btn-block" data-toggle="modal" data-target="#editcomment" data-mycomment='{{$comment->comment}}'
                                                                data-commentid="{{$comment->id}}">
                                                            <i class="fas fa-edit"></i>  Edit
                                                        </button>
                                                        <!-- End Edit comment -->

                                                        <!-- Delete  comment -->
                                                        <button type="button" class="btn btn-danger btn-block" data-toggle="modal" data-target="#deletecomment" data-commentid="{{$comment->id}}">
                                                            <i class="fas fa-trash-alt"> Delete</i>
                                                        </button>

                                                        <!-- End of Delete comment -->
                                                    </div>
                                                </a>


                                            </div>
                                        </div>

                                        @endif

                                        {{-- Edit Model--}}
                                        <div class="modal fade" id="editcomment" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel"> Edit The Category</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <form action="{{route('comment.update', 'test')}}" method="post" >
                                                        <div class="modal-body">
                                                            @method('PATCH')
                                                            @csrf
                                                            <input type="hidden" name="comment_id" id="comment_id" value="">
                                                            <div class="form-group">
                                                                <input type="text" name="comment" id="comment" class="form-control" placeholder="Enter Your Comment">
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                            <button type="submit" class="btn btn-primary">Save Changes</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>

                                        {{--    End Of Edit model--}}

                                    <!-- Modal for Delete Comment -->
                                        <div class="modal fade" id="deletecomment" tabindex="-1" role="dialog" aria-labelledby="delete" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content text-center">
                                                    <div class="modal-header">
                                                        <h5 class="modal-tite" id="exampleModalLabel"> Delete Confirmation</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <form action="{{route('comment.destroy', 'test')}}" method="post" >
                                                        <div class="modal-body">
                                                            @method('DELETE')
                                                            @csrf
                                                            <input type="hidden" name="comment_id" id="comment_id" value="">
                                                            <h4> Are You Sure You Want To Delete This Category ??</h4>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                            <button type="submit" class="btn btn-danger">Yes</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>

                                        {{--    End Delete Comment Model--}}

                                    </div>
                                    <img src="{{asset('/storage/User/Images/' . $comment->user->image)}}" alt="image" style="width: 50px; height: 50px; float: left;" class="rounded-circle">
                                    <h3 style="color: #0a6aa1"> {{$comment->user->name}}</h3>
                                    <p style="font-weight: bolder; font-size: 18px; color: black ">{{$comment->comment}}</p>
                                    <span class="text-muted">{{$comment->created_at}}</span>
                                </div>
                            </div>
                            <br>
                            <br>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </div>






