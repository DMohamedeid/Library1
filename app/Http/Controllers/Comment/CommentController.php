<?php

namespace App\Http\Controllers\Comment;

use App\Book;
use App\Category;
use App\Comment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Monolog\Handler\IFTTTHandler;

class CommentController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }

    public function store(Request $request , Book $book ) {
//        dd($request);
        $this->validate($request , [
            'comment'=>'required|max:500'
        ]);

        $comment = new Comment();

        $comment->user_id = auth()->user()->id;
        $comment->book_id = $book->id;
        $comment->comment = $request->input('comment');
        $comment->save();
        return back();
    }


    public function update(Request $request)
    {
        $comment =Comment::findOrFail($request->comment_id);


        $this->validate($request , [
            'comment'=>'sometimes',
        ]);

        $comment->comment = $request->comment;
        $comment->save();

        return back()->with('msg' , 'your Comment has Been Updated Successfully !');
    }

    public function destroy(Request $request)
    {

        $comment = Comment::findOrFail($request->comment_id);

        $comment->delete();

        return back()->with('msg' , 'The Comment has Been Deleted Successfully !');

    }
}
