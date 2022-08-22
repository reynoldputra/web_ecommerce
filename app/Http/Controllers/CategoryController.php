<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;


class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.content.category.index', [
            'categories' => Category::get()->toArray()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.content.category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validateData = Validator::make($request->all(), [
            'newCategory' => 'required'
        ]);

        if($validateData->fails()){
            return response()->json($validateData->errors(), 422);
        }

        $category = Category::create([
            "nama" => $request->newCategory,
        ]);

        return redirect("/admin/category");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        return view('admin.content.index', [
            'category_name' => $category->nama,
            'products' => Product::with('detail_product')->where('category_id', $category->id)->get()->toArray() 
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return view('admin.content.category.edit', [
            'category' => $category
        ]);
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
        $validateData = Validator::make($request->all(), [
            'newCategoryName' => 'required'
        ]);

        if($validateData->fails()){
            return response()->json($validateData->errors(), 422);
        }

        $category = Category::where('id', $category->id )->update([
            "nama" => $request->newCategoryName,
        ]);

        return redirect("/admin/category");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $products = Product::where('category_id', $category->id)->get()->toArray();
        // dd($products);
        if($products){
            return back()->with('error', 'There are still products that use the'. $category->nama . ' category, you have to empty the product');
        }

        $category->delete();

        return redirect("admin/category");
    }
}
