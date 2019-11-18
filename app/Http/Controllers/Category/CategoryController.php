<?php

namespace App\Http\Controllers\Category;

use App\Book;
use App\Category;
use App\Role;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{

    public function __construct()
    {
        $this->middleware(['Role' ,'auth'])->except('index' , 'show');
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::paginate(10);
        $count = Category::count();


        return view('Category.index' , compact('categories' , 'count'));
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
           'name'=>'sometimes|max:200|unique:categories',
        ]);

        Category::create($request->all());
        return back()->with('msg' , 'The Category has Been Created Successfully !');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        $books = $category->books()->paginate(10);
        $bookss =$category->books;
        $count =count($bookss);
        return view('Category.showCategory', compact( 'books' , 'count' , 'category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $category =Category::findOrFail($request->category);


        $this->validate($request , [
            'name'=>'sometimes|max:200|unique:categories,name,' . $category->id,
            ]);

        $category->name = $request->name;
        $category->save();

        return back()->with('msg' , 'The Category has Been Updated Successfully !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $category = Category::findOrFail($request->category);

        $category->delete();

        return back()->with('msg' , 'The Category has Been Deleted Successfully !');

    }
}
