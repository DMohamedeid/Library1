
@extends('adminViews.index')

@section('title' , 'edit Roles')

@section('content')

    <div class="card-group m-5">
        <table class="table table-striped border">
            <thead>
            <tr>
                <th scope="col">Manage {{$user->name}}</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <th>
                    <form action="{{route('users.update' , $user->id)}}" method="post">
                        @csrf
                        @method('PATCH')
                        <div class="table-bordered margin">
                            @foreach($roles as $role)
                                <div class="form-radio">
                                    <input type="radio" name="role[]" value="{{$role->id}}" {{$user->hasAnyRole($role->name) ? 'checked' : ' '}}>
                                    <label>{{$role->name}}</label>
                                </div>
                            @endforeach
                        </div>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </form>
                </th>
            </tr>
            </tbody>
        </table>
    </div>
@stop

