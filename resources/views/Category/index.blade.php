
@extends('adminViews.index')

@section('title' , 'Categories')

@section('content')
<div class="container-fluid m-2" xmlns="http://www.w3.org/1999/html">
    @hasRole(['superadmin' , 'admin' , 'author'])
    <div class="float-right">
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addCategory">
            Add New Category
        </button>
    </div>
    @endhasRole
    <div class="row justify-content-center">
        <div class="col-lg-8 ">
            <div class="card-box">
                <div class="card-header bg-white font-24">
                    Category
                    <div class="float-right font-21 btn card"> All Categories {{$count}}</div>
                </div>
                <div class="table-responsive">
                    <table class="table table-hover mb-0">
                        <thead>
                        <tr bgcolor="#f0f8ff">
                            <th>Id</th>
                            <th class="text-center">Category Name</th>
                            <th class="text-center">No. Books</th>
                            @hasRole(['superadmin' , 'admin'])
                            <th class="text-center">Modify</th>
                            @endhasRole

                        </tr>
                        </thead>
                        <tbody>
                        @foreach($categories as $category)
                        <tr>
                            <th scope="row">{{$category->id}}</th>
                            <td class="text-center"><a href="{{route('category.show', $category->id)}}">{{$category->name}}</a></td>
                            <td class="text-center">{{$category->books()->count()}}</td>
                            @hasRole(['superadmin' , 'admin'])
                            <td class="text-center">
                                <button type="button" class="btn btn-primary btn btn-sm mr-2" data-toggle="modal" data-target="#edit" data-myname='{{$category->name}}' data-catid="{{$category->id}}">
                                    <i class="fas fa-edit"></i>  Edit
                                </button>
                                /
                                <button type="button" class="btn btn-danger btn btn-sm ml-2" data-toggle="modal" data-target="#delete" data-catid="{{$category->id}}">
                                    <i class="fas fa-trash-alt"> Delete</i>
                                </button>
                            </td>
                                @endhasRole
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            {{$categories->links()}}
        </div>
    </div>
    <!-- Modal for Add Category -->
    <div class="modal fade" id="addCategory" tabindex="-1" role="dialog" aria-labelledby="addCategory" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"> Adding New Category</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{route('category.store')}}" method="post" >
                    <div class="modal-body">
                        @csrf
                        <div class="form-group">
                            <input type="text" name="name" id="name" class="form-control" placeholder="Enter Category Name">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

{{--    End Add Category Model--}}

{{-- Edit Model--}}
    <div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"> Edit The Category</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{route('category.update', 'test')}}" method="post" >
                    <div class="modal-body">
                        @method('PATCH')
                        @csrf
                        <input type="hidden" name="category" id="cat_id" value="">
                        <div class="form-group">
                            <input type="text" name="name" id="name" class="form-control" placeholder="Enter Category Name">
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

<!-- Modal for Delete Category -->
    <div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="delete" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content text-center">
                <div class="modal-header">
                    <h5 class="modal-tite" id="exampleModalLabel"> Delete Confirmation</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{route('category.destroy', 'test')}}" method="post" >
                    <div class="modal-body">
                        @method('DELETE')
                        @csrf
                        <input type="hidden" name="category" id="ctid" value="">
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

    {{--    End Delete Category Model--}}
</div>
@stop

