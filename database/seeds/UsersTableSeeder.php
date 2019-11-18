<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Role;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        User::truncate();

        $firstUser = User::create([
           'name'=> 'Mohamed',
           'username'=>'Memoeid',
           'email'=>'Mohamed@mohamed.com',
           'password'=>bcrypt('123456789'),
        ]);

        $secondUser = User::create([
            'name'=> 'Mohamed1',
            'username'=>'Memoeid1',
            'email'=>'Mohamed1@mohamed.com',
            'password'=>bcrypt('123456789'),
        ]);

        $thiredUser = User::create([
            'name'=> 'Mohamed2',
            'username'=>'Memoeid2',
            'email'=>'Mohamed2@mohamed.com',
            'password'=>bcrypt('123456789'),
        ]);

        $fourthUser = User::create([
            'name'=> 'Mohamed3',
            'username'=>'Memoeid3',
            'email'=>'Mohamed3@mohamed.com',
            'password'=>bcrypt('123456789'),
        ]);

        $superadminRole=Role::where('name' , 'superadmin')->first();
        $adminRole=Role::where('name' , 'admin')->first();
        $authorRole=Role::where('name' , 'author')->first();
        $userRole=Role::where('name' , 'user')->first();

        $firstUser->roles()->attach($superadminRole);
        $secondUser->roles()->attach($adminRole);
        $thiredUser->roles()->attach($authorRole);
        $fourthUser->roles()->attach($userRole);



        factory(User::class , 50)->create();
    }
}
