<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Comment;
use App\User;
use App\Book;
use Faker\Generator as Faker;

$factory->define(Comment::class, function (Faker $faker) {
    return [
        'comment'=>$faker->text,
        'user_id'=>function (){return User::all()->random();},
        'book_id'=>function (){return Book::all()->random();},
    ];
});
