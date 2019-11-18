
@extends('adminViews.index')

@section('title' , 'Manage Profile')

@section('content')


    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card-box">
                    <h4 class="m-t-0 header-title"> Edit {{$user->name}}'s Profile</h4>
                    <div class="row">
                        <div class="col-12">
                            <div class="p-2">
                                <form action="{{route('user.update' , $user->id)}}" class="form-horizontal" role="form" method="post" enctype="multipart/form-data">
                                    @csrf
                                    @method('PATCH')
                                    <div class="form-group row">
                                        <label class="col-sm-2  col-form-label" for="name"> Name  :</label>
                                        <div class="col-sm-10">
                                            <input type="text"  name="name"  id="name" class="form-control" value="{{old('name')??$user->name}}" placeholder="Please Enter Your Name" >
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2  col-form-label" for="username">User Name  :</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="username" id="username" class="form-control" value="{{old('username')??$user->username}}" placeholder="Please Enter Your User Name" >
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2  col-form-label" for="email">Email :</label>
                                        <div class="col-sm-10">
                                            <input type="email" id="email" name="email" class="form-control" value="{{old('email')??$user->email}}" placeholder="Please Enter Your E-Mail" >
                                        </div>
                                    </div>


                                    <div class="form-group row">
                                        <label class="col-sm-2  col-form-label" for="dateOfBirth">Date Of Birth :</label>
                                        <div class="col-sm-10">
                                            <input class="form-control" id="dateOfBirth" type="date" name="dateOfBirth" value="{{old('dateOfBirth')??$user->dateOfBirth}}">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-2  col-form-label">Gender</label>
                                        <div class="col-sm-10">
                                            <select name="gender" id="gender" class="form-control">
                                                <option disabled name="gender" value="{{$user->id}}" {{$user->gender == '' ? 'selected' : ''}}> Gender</option>
                                                <option value="Male" {{$user->gender == 'male' ? 'selected' : ''}}>Male</option>
                                                <option value="Female" {{$user->gender == 'Female' ? 'selected' : ''}}>Female</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-2  col-form-label" for="address">Address :</label>
                                        <div class="col-sm-10">
                                            <input type="text" id="address" name="address" class="form-control" value="{{old('address')??$user->address}}" placeholder="Please Enter Your Address" >
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-2  col-form-label" for="image">Image Profile</label>
                                        <div class="col-sm-10">
                                            <img src="{{asset('storage/User/Images/' . $user->image)}}" alt="user-image" class="rounded-circle rounded mx-auto d-block m-1">
                                            <input type="file" class="form-control" id="image" name="image" >
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-2  col-form-label" for="phone">Phone Number : </label>
                                        <div class="col-sm-10">
                                            <input type="number" id="phone" name="phone" class="form-control" value="{{old('phone')??$user->phone}}" placeholder="Please Enter Your Phone Number" >
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-2  col-form-label" for="info">About You</label>
                                        <div class="col-sm-10">
                                            <textarea class="form-control" rows="5" id="info" name="info">{{old('info')??$user->info}}</textarea>
                                        </div>

                                    </div>
                                    <div class="card">
                                        <button type="submit" class="btn btn-primary">Update</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- end row -->
                </div> <!-- end card-box -->
            </div><!-- end col -->
        </div>
    </div>
@stop
