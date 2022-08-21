<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Detail_Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.content.index', [
            'products' => Product::with('detail_product')->get()->toArray() 
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.content.create', [
            'categories' => Category::get()->toArray()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
           //define validation rules
           $validator = Validator::make($request->all(), [
            'image'     => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'name'     => 'required',
            'category'  => 'required',
            'desc' => 'required|max:200',
            'price' => 'required|integer',
            'size_s' => 'required|integer',
            'size_m' => 'required|integer',
            'size_l' => 'required|integer',
            'size_xl' => 'required|integer',
        ]);

        //check if validation fails
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        //upload image
        $image = $request->file('image');
        $imageName = $image->hashName();
        $image->storeAs('public/product', $imageName);

        //create product
        $product = Product::create([
            'gambar'        => $imageName,
            'nama'          => $request->name,
            'category_id'   => $request->category,
            'deskripsi'     => $request->desc,
            'harga'         => $request->price  
        ]); 

        $product_id = $product->id;

        //create product 
        $detail_product = Detail_Product::insert([
            [
                'product_id' => $product_id,
                'stock' => $request->size_s,
                'size_id' => 1
            ],
            [
                'product_id' => $product_id,
                'stock' => $request->size_m,
                'size_id' => 2
            ],
            [
                'product_id' => $product_id,
                'stock' => $request->size_l,
                'size_id' => 3
            ],
            [
                'product_id' => $product_id,
                'stock' => $request->size_xl,
                'size_id' => 4
            ],
        ]);
        
        return redirect('/admin/product');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        $product_arr = Product::where('id', $product->id)->with('detail_product')->get()->toArray();
        return view('admin.content.show', [
            'product' => $product_arr[0]    
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $product_arr = Product::where('id', $product->id)->with('detail_product')->get()->toArray();
        return view('admin.content.edit', [
            'product' => $product_arr[0],      
            'categories' => Category::get()->toArray()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {   
        // dd($request->all());
        //define validation rules
        $validator = Validator::make($request->all(), [
            'image'     => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'name'     => 'required',
            'category'  => 'required',
            'desc' => 'required|max:200',
            'price' => 'required|integer',
            'size_s' => 'required|integer',
            'size_m' => 'required|integer',
            'size_l' => 'required|integer',
            'size_xl' => 'required|integer',
        ]);

        //check if validation fails
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }
        
        $dataUpdate = [
            'nama'          => $request->name,
            'category_id'   => $request->category,
            'deskripsi'     => $request->desc,
            'harga'         => $request->price  
        ];

        //upload image
        if($request->hasFile('image')){
            $image = $request->file('image');
            $imageName = $image->hashName();
            $image->storeAs('public/product', $imageName);
            $dataUpdate += ['gambar' => $imageName];
            Storage::delete('public/product/'.$product->gambar);
        }
        

        //create product
        $productUpdate = Product::where('id', $product->id)->update($dataUpdate); 

        $product_id = $product->id;

        //create product 
        $detail_product1 = Detail_Product::where('product_id', $product->id)
                                        ->where('size_id', 1)
                                        ->update(['stock' => $request->size_s]);
        $detail_product2 = Detail_Product::where('product_id', $product->id)
                                        ->where('size_id', 2)
                                        ->update(['stock' => $request->size_m]);
        $detail_product3 = Detail_Product::where('product_id', $product->id)
                                        ->where('size_id', 3)
                                        ->update(['stock' => $request->size_l]);
        $detail_product4 = Detail_Product::where('product_id', $product->id)
                                        ->where('size_id', 4)
                                        ->update(['stock' => $request->size_xl]);
        
        

        return redirect('/admin/product/'.$product->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //delete image
        Storage::delete('public/product/'.$product->gambar);

        //delete article
        $product->delete();

        Detail_Product::where('product_id', $product->id)
                ->delete();
        Detail_Product::where('product_id', $product->id)
                ->delete();
        Detail_Product::where('product_id', $product->id)
                ->delete();
        Detail_Product::where('product_id', $product->id)
                ->delete();


        //return response
        return redirect('/admin/product');
    }
}
