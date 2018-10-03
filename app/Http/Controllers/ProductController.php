<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
        return view('admin.productsList', compact(['products']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
//        $categories = Category::all();
//        return view('admin.productForm', compact(['categories']));
        return view('admin.productForm');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'product_name' => 'required',
            'product_cat_id' => 'required',
            'product_des' => 'required',
            'file' => 'required',
            'product_price' => 'required',
            'product_quantity' => 'required',
        ]);

        $product = new Product();
        $product->product_name = $request->product_name;
        $product->product_des = $request->product_des;
        $product->product_cat = $request->product_cat_id;

        $product_image = $request->file('file');
        $product_image_new_name = uniqid() . $product_image->getClientOriginalName();
        $product_image->move('img/uploads', $product_image_new_name);
        $product->product_image = $product_image_new_name;

        $product->product_price = $request->product_price;
        $product->product_reduce = isset($request->product_reduce) ? $request->product_reduce : 0;
        $product->product_quantity = $request->product_quantity;
        $product->product_dateCreate = $request->product_dateCreate;
        $product->product_dateUpdate = isset($request->product_dateUpdate) ? $request->product_dateUpdate: null;

        $product->save();

        return redirect()->route('products.index');


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::findOrFail($id);
        $categories = Category::all();
        return view('admin.editProduct', compact(['categories','product']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'product_name' => 'required',
            'product_cat_id' => 'required',
            'product_des' => 'required',
//            'file' => 'required',
            'product_price' => 'required',
            'product_quantity' => 'required',
        ]);

        $product = Product::findOrFail($id);
        $product->product_name = $request->product_name;
        $product->product_des = $request->product_des;
        $product->product_cat = $request->product_cat_id;

        $product->product_price = $request->product_price;
        $product->product_reduce = isset($request->product_reduce) ? $request->product_reduce : 0;
        $product->product_quantity = $request->product_quantity;
//        $product->product_dateCreate = $request->product_dateCreate;
        $product->product_dateUpdate = isset($request->product_dateUpdate) ? $request->product_dateUpdate: null;

        if($request->hasFile('file')) {
            $product_image = $request->file('file');
            $product_image_new_name = uniqid() . $product_image->getClientOriginalName();
            $product_image->move('img/uploads/', $product_image_new_name);
            $product->product_image = $product_image_new_name;
        }

        $product->save();


        return redirect('/products');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        if(file_exists('img/uploads/' . $product->product_image)) {
//            var_dump($product->product_image);exit();
            unlink('img/uploads/' . $product->product_image);
        }
        $product->delete();
        return redirect('/products');
    }
}
