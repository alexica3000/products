<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\AddProductRequest;
use App\Product;
use App\Category;

class ProductController extends Controller
{
	/**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth')->except('index', 'show', 'productCat', 'exportProducts');
	}
	
	/**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		$products = Product::with('categories')->get();

		return view('product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
		$categories = Category::all();
		// $subcategories = Category::whereNotNull('parent')->get();
		
		return view('product.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AddProductRequest $request)
    {
		$product = new Product;
		$product->title = $request->product;
		$product->description = $request->description;
		$product->price = $request->price;
		$product->save();
		$product->categories()->sync($request->category);
		
		return redirect()->route('product.index')->with('message', 'Product has been saved');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return view('product.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
		$categories = Category::all();

		return view('product.edit', compact('product', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AddProductRequest $request, Product $product)
    {
		$product->title = $request->product;
		$product->description = $request->description;
		$product->price = $request->price;
		$product->update();
		$product->categories()->sync($request->category);
		
		return redirect()->route('product.show', $product->id)->with('message', 'Product has been saved');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
		$product->delete();
		
		return redirect()->route('product.index')->with('message', 'Product has been deleted.');
	}
	
	/**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function productCat($id)
    {
		$products = Category::findOrFail($id)->products()->get();

		return view('product.index', compact('products'));
	}
	
	public function exportProducts()
	{
		$products = Product::all();

		return response()->json(['status' => true, 'products' => $products]);
	}
}
