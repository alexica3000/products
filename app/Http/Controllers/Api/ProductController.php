<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\AddProductRequest;
use App\Http\Requests\ProductIndexRequest;
use App\Http\Requests\ProductUpdateRequest;
use App\Http\Resources\ProductResource;
use App\Models\Category;
use App\Models\Product;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Response;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param ProductIndexRequest $request
     * @return AnonymousResourceCollection
     */
    public function index(ProductIndexRequest $request)
    {
        $products = $request->input('category_id')
            ? $this->getProductsByCategoryId($request->input('category_id'))
            : Product::all();

        return ProductResource::collection($products);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param AddProductRequest $request
     * @return ProductResource
     */
    public function store(AddProductRequest $request)
    {
        return new ProductResource(Product::saveProduct($request->validated()));
    }

    /**
     * Display the specified resource.
     *
     * @param Product $product
     * @return ProductResource
     */
    public function show(Product $product)
    {
        return new ProductResource($product);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param ProductUpdateRequest $request
     * @param Product $product
     * @return ProductResource
     */
    public function update(ProductUpdateRequest $request, Product $product)
    {
        $product = Product::updateProduct($request->validated(), $product);

        return new ProductResource($product);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Product $product
     * @return JsonResponse
     * @throws Exception
     */
    public function destroy(Product $product)
    {
        return $product->delete()
            ? response()->json(['id' => $product->id], 200)
            : response()->json(['message' => 'Something wrong.'], 422);
    }

    private function getProductsByCategoryId(int $categoryId) {
        return Category::where('id', $categoryId)->first()->products()->get();
    }
}
