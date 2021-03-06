<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\AddCategoryRequest;
use App\Http\Requests\CategoryIndexRequest;
use App\Http\Requests\CategoryUpdateRequest;
use App\Http\Resources\CategoryResource;
use App\Models\Category;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class CategoryController extends Controller
{
    /**
     * Create a new category controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('jwt')->except('index', 'show');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @param CategoryIndexRequest $request
     * @return AnonymousResourceCollection
     */
    public function index(CategoryIndexRequest $request)
    {
        return CategoryResource::collection(Category::getCategoriesList($request->input('p_id')));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param AddCategoryRequest $request
     * @return CategoryResource
     */
    public function store(AddCategoryRequest $request)
    {
        return new CategoryResource(Category::create($request->validated()));
    }

    /**
     * Display the specified resource.
     *
     * @param Category $category
     * @return CategoryResource
     */
    public function show(Category $category)
    {
        return new CategoryResource($category);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param CategoryUpdateRequest $request
     * @param Category $category
     * @return CategoryResource
     */
    public function update(CategoryUpdateRequest $request, Category $category)
    {
        $category->update($request->validated());

        return new CategoryResource($category);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Category $category
     * @return JsonResponse
     * @throws Exception
     */
    public function destroy(Category $category)
    {
        return $category->delete()
            ? response()->json(['id' => $category->id], 200)
            : response()->json(['message' => 'Something wrong.'], 422);
    }
}
