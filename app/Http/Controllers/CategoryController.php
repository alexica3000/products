<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Http\Requests\AddCategoryRequest;

class CategoryController extends Controller
{
	 /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth')->except('index', 'show', 'exportCategories');
    }
	
	/**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		$categories = Category::where('parent', null)->get();
		
		return view('category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
		if(isset($request->cat)){
			$cat = Category::findOrFail($request->cat);
		} else {
			$cat = null;
		}
		
		return view('category.create', compact('cat'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AddCategoryRequest $request)
    {
		$category = new Category;
		$category->title = $request->category;
		$category->parent = $request->cat;
		$category->save();
		
		return redirect()->route('home')->with('message', 'Category has been added.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
		$subcategories = Category::where('parent', $category->id)->get();
		
		return view('category.show', compact('category', 'subcategories'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
		return view('category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        $category->update([
			'title' => $request->category
		]);

		return redirect()->route('category.show', $category->id)->with('message', 'Category has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
		if($category->delete()){
			return redirect()->route('category.index')->with('message', 'Category has been deleted.');
		}
	}

	public function exportCategories()
	{
		$categories = Category::all();

		return response()->json(['status' => true, 'categories' => $categories]);
	}
}
