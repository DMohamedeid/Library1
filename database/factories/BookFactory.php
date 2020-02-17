<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Book;
use App\Category;
use App\User;
use Faker\Generator as Faker;

$factory->define(Book::class, function (Faker $faker) {
    return [
        'name'=>$faker->firstName,
        'author'=>$faker->name,
        'info'=>$faker->text,
//        'image'=>$faker->image('public/storage/Book/Images/' , 250 ,250 ,null ,false),
        'bookFile'=>'Simply Arduino.pdf',
        'category_id'=>function(){return Category::all()->random();},
        'user_id'=>function(){return Category::all()->random();},
    ];
});
