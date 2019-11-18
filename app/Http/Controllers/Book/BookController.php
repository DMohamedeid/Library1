<?php

namespace App\Http\Controllers\Book;

use App\Book;
use App\Comment;
use Auth;
use App\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;
use Alert;


class BookController extends Controller
{
    public function __construct()
    {
        $this->middleware(['AuthorRole' , 'auth' ])->except('index' , 'show');
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $books = Book::orderBy('id' , 'desc')->paginate(10);

        $bookss =Book::all();
        $count = count($bookss);

        return view('Book.index' , compact('books' , 'count'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Book $book)
    {
        $categories = Category::all();
        return view('Book.uploadBook' , compact('categories' ,'book'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request , [
            'name'=>'required|max:200',
            'author'=>'required|max:200',
            'info'=>'sometimes',
            'image'=>'image',
            'bookFile'=>'required|file|mimes:pdf',
        ]);
        if ($request->hasFile('image')){
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(250 , 250)->save(public_path('/storage/Book/Images/' . $imageName));
        }else {

            $imageName = 'noimage.jpg';
        }

        if ($request->hasFile('bookFile')){
            $book = $request->file('bookFile');
            $bookName = time() . '.' . $book->getClientOriginalExtension();
            $request->file('bookFile')->storeAs('storage/Book/PDF' , $bookName);
        }

        $book = new Book();

        $book->name = $request->input('name');
        $book->author = $request->input('author');
        $book->info = $request->input('info');
        $book->image = $imageName;
        $book->bookFile = $bookName;
        $book->user_id = Auth::user()->id;
        $book->category_id = $request->input('category');

        $book->save();

        return redirect(route('book.index'))->with('msg' , 'The Book Has Updated Successfully !!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function show(Book $book)
    {
        return view('Book.showbook' , compact('book'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function edit(Book $book)
    {
        if (auth()->user()->id == $book->user_id || auth()->user()->hasAnyRoles(['superadmin' , 'admin'])) {
            return view('Book.edit', compact('book'));
        }
        return back()->with('error' , 'You Are Not The authorized User');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request , Book $book)
    {
            $this->validate($request, [
                'name' => 'required|max:200',
                'author' => 'required|max:200',
                'info' => 'sometimes',
                'image' => 'image',
                'book' => 'sometimes|file|mimes:pdf',
            ]);
        if ($request->hasFile('image')){
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(250 , 250)->save(public_path('/storage/Book/Images/' . $imageName));
            $book->image = $imageName;
        }

        if ($request->hasFile('bookFile')) {
            $bookFile = $request->file('bookFile');
            $bookName = time() . '.' . $bookFile->getClientOriginalExtension();
            $request->file('bookFile')->move('storage/Book/PDF/' , $bookName);
            $book->bookFile = $bookName ;
        }

        $book->name = $request->name;
        $book->author = $request->author;
        $book->info = $request->info;
        $book->update();

            return redirect(route('book.show', compact('book')))->with('msg', 'The Book Has updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function destroy(Book $book)
    {
        if (auth()->user()->id == $book->user_id) {
            $book->delete();

            return redirect(route('book.index'))->with('msg', 'The Book Has Deleted Successfully !!');
        }
        return back()->with('error' , 'You Are Not The authorized author');
    }
}
