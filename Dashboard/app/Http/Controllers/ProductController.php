<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Http\Services\Media;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;

class ProductController extends Controller
{
    public function index()
    {
        $products = DB::table('products')->get();
        return view('products.index',compact('products'));
    }

    public function create()
    {
        $brands = DB::table('brands')->select('id','name_en')->orderBy('name_en')->get();
        $subcategories = DB::table('subcategories')->select('id','name_en')->orderBy('name_en')->get();
        return view('products.create',compact('brands','subcategories'));
    }

    public function edit(Product $product)
    {
        $brands = DB::table('brands')->select('id','name_en')->orderBy('name_en')->get();
        $subcategories = DB::table('subcategories')->select('id','name_en')->orderBy('name_en')->get();
        return view('products.edit',compact('brands','subcategories','product'));
    }

    public function store(StoreProductRequest $request)
    {
        $newImageName = Media::upload($request->file('image'),public_path('images\products'));
        $data = $request->except('image','_token');
        $data['image'] =   $newImageName ;
        return $this->redirectBack(DB::table('products')->insert($data));
    }

    public function update(UpdateProductRequest $request,Product $product)
    {
        $data = $request->except('image','_token','_method');
        if($request->hasFile('image')){
            $newImageName = Media::upload($request->file('image'),public_path('images\products'));
            $data['image'] =   $newImageName;
            Media::delete(public_path("images\products\\{$product->image}"));
        }
        return $this->redirectBack(DB::table('products')->where('id',$product->id)->update($data));
    }

    public function destroy(Product $product)
    {
        Media::delete(public_path("images\products\\{$product->image}"));
        DB::table('products')->where('id',$product->id)->delete();
        return redirect()->back()->with('success','Product Deleted Successfully');
    }
}

