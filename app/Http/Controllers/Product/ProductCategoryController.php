<?php

namespace App\Http\Controllers\Product;

use App\Category;
use App\Http\Controllers\ApiController;
use App\Product;
use Illuminate\Http\Request;

class ProductCategoryController extends ApiController
{
    public function __construct()
    {
        $this->middleware('auth:api')->except(['index']);
        $this->middleware('client.credentials')->only(['index']);
        $this->middleware('scope:manage-products')->except(['index']);
        $this->middleware('can:add-category,product')->except(['update']);
        $this->middleware('can:delete-category,product')->except(['destroy']);
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Product $product)
    {
        $categories = $product->categories;

        return $this->showAll($categories);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product, Category $category)
    {
        $product->categories()->syncWithoutDetaching([$category->id]);

        return $this->showAll($product->categories);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product, Category $category)
    {
        if (!$product->categories()->find($category->id)) {
            return $this->errorResponse('The specified category is not a category for this product', 404);
        }

        $product->categories()->detach($category->id);

        return $this->showAll($product->categories);
    }
}
