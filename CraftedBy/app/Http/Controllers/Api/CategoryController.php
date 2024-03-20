<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Resources\CategoryResource;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = CategoryResource::collection(Category::all());
        return response()->json([
           'categories'=>$categories,
            'status'=>true
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCategoryRequest $request)
    {
        $arrayRequest = $request->all();
        $category = new Category();
        $category->name = $arrayRequest['name'];

        $category->save();

        return response()->json([
            'category'=>$category
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $category = CategoryResource::make(Category::find($id));
        return response()->json([
            'category'=>$category,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */

    public function update(StoreCategoryRequest $request, $id)
    {
        $category = Category::find($id);
        $arrayRequest = $request->all();
        $category->name = $arrayRequest['name'];
        $category->save();
        return response()->json([
            'category' => $category
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)  // in api.php call method destroy
    {
        $category = Category::find($id);
        $category->delete();
    }
}
