
@extends('adminViews.index')

@section('title' , 'Profile')

@section('content')

        <div class="box-body box-profile mt-2 p-2">
            @auth
                @if(auth()->user()->id == $user->id)
                    <a href="{{route('user.edit' , $user->id)}}" class="btn btn-blue float-right"> <i class="fas fa-edit"> Edit  Profile </i></a>
                @endif
            @endauth
                <img src="{{asset('/storage/User/Images/' . $user->image)}}" alt="user-image" class="rounded-circle rounded mx-auto d-block">
                <h3 class="profile-username text-center" style="color: black">{{$user->name}}</h3>
            <ul class="list-group list-group-unbordered">
                <li class="list-group-item">
                    <b class="font-17">E-Mail  :</b> <a class="pull-right ml-2"> {{$user->email}}</a>
                </li>
                <li class="list-group-item">
                    <b class="font-17">Address :     </b> <a class="pull-right"> {{$user->address}}</a>
                </li>
                <li class="list-group-item">
                    <b class="font-17">Date Of Birth : </b> <a class="pull-right"> {{$user->dateOfBirth}}</a>
                </li>
                <li class="list-group-item">
                    <b class="font-17">Nick Name : </b> <a class="pull-right">{{$user->username}}</a>
                </li>
                <li class="list-group-item">
                    <b class="font-17">Gender : </b> <a class="pull-right">{{$user->gender}}</a>
                </li>
                <li class="list-group-item">
                    <b class="font-17">Phone Number : </b> <a class="pull-right">{{$user->phone}}</a>
                </li>
                <li class="list-group-item">
                    <b class="font-17">About : </b> <a class="pull-right">{{$user->info}}</a>
                </li>

            </ul>
        </div>
    <hr>
        <div class="row justify-content-center">
            <div class="col-md-3 col-xl-9">
                <div class="row justify-content-center">
                    <div class="card-header bg-white font-24 text-center" style="width: 500px">
                        Uploaded Books
                    </div>
                </div>
                @include('Book.Books')
            </div>
        </div>
@stop
