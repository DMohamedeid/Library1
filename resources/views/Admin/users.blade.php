
@extends('adminViews.index')

@section('title' , 'Users')

@section('content')

    <div class="card-body">
        <div class="card-header bg-white font-24 text-center">
            Users
            <div class="float-right font-21 btn card"> All Users {{$count}}</div>
        </div>
        <div class="table-responsive">
            <table class="table table-centered mb-0 " id="btn-editable" >
                <thead>
                <tr class="thead-dark">
                    <th scope="col">ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">UsernameName</th>
                    <th scope="col">Email</th>
                    <th scope="col">Role</th>
                    @hasRole(['superadmin' , 'admin'])
                    <th class="tabledit-toolbar-column text-center">Action</th></tr>
                @endhasRole
                </thead>

                <tbody>

                @foreach($users as $user)
                    <tr>
                        <th scope="row">{{$user->id}}</th>
                        <td><a href="{{route('user.show' , $user->id)}}"> {{$user->name}} </a></td>
                        <td>{{$user->username}}</td>
                        <td>{{$user->email}}</td>
                        <td>{{implode(' : ' , $user->roles()->get()->pluck('name')->toArray())}}</td>

                        @hasRole(['superadmin' , 'admin'])
                        <td>
                            @if ($user->hasAnyRoles(['admin' , 'author' , 'user']))

                                <form action="{{route('users.edit' , $user->id)}}" method="get" class="float-left">
                                @csrf
                                <button type="submit" class="btn btn-primary"> <i class="fas fa-user-cog fa-2x"  ></i> </button>
                            </form>
                            <form action="{{route('users.destroy' , $user->id)}}" method="post" class="float-right">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure You Want To Delete This User?')"><i class="fa fa-trash"> </i> Delete </button>
                            </form>
                            @endif
                        </td>
                        @endhasRole
                    </tr>
                @endforeach
                </tbody>
            </table>
            {{$users->links()}}
        </div> <!-- end .table-responsive-->
    </div>
@endsection

