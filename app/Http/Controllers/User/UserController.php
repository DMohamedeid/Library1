<?php

namespace App\Http\Controllers\User;

use App\User;
use Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;

class UserController extends Controller
{
    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        $books = $user->books()->paginate(20);
        return view('users.userProfile' , compact('user' , 'books'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        if (auth()->user()->id == $user->id) {
            return view('users.manageprofile', compact('user'));
        }
        abort(403);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $this->validate($request ,[
            'name'=> 'sometimes|max:200',
            'username'=> 'sometimes|max:200|unique:users,username,' . $user->id,
            'email'=> 'email|unique:users,email,'. $user->id,
            'dateOfBirth'=> 'max:200',
            'gender'=>'required',
            'address'=>'sometimes|max:200',
            'image'=>'sometimes|file|image|max:5000',
            'phone'=>'sometimes',
            'info'=>'sometimes',
        ]);

       if ($request->hasFile('image')){
           $image = $request->file('image');
           $imageName = time() . '.' . $image->getClientOriginalExtension();
           Image::make($image)->resize(250 , 250)->save(public_path('/storage/User/Images/' . $imageName));
           $user->image = $imageName;
       }

        $user->name = $request->name;
        $user->username = $request->username;
        $user->email = $request->email;
        $user->dateOfBirth = $request->dateOfBirth;
        $user->gender = $request->gender;
        $user->address = $request->address;
        $user->phone = $request->phone;
        $user->info = $request->info;
        $user->save();


        return redirect(route('user.show' , compact('user')))->with('msg' , 'The User Has updated Successfully');
    }
}
