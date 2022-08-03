<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Product;
use App\Models\Subcategory;
use App\Http\Services\Media;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use Illuminate\Support\Facades\App;

class ProductController extends Controller
{
    public function index(Request $request)
    {

        $products = Product::select('id','name_'.App::currentLocale(). ' AS name','details_' . App::currentLocale() . ' AS details')->get();
        if($request->expectsJson()){
            return response()->json(compact('products'));
        }
        return view('products.index',compact('products'));
    }

    public function create(Request $request)
    {
        $brands = Brand::select('id','name_en')->orderBy('name_en')->get();
        $subcategories = Subcategory::select('id','name_en')->orderBy('name_en')->get();
        if($request->expectsJson()){
            return response()->jsoN(compact('brands','subcategories'));
        }
        return view('products.create',compact('brands','subcategories'));
    }

    public function edit(Product $product,Request $request)
    {
        $brands = Brand::select('id','name_en')->orderBy('name_en')->get();
        $subcategories = Subcategory::select('id','name_en')->orderBy('name_en')->get();
        if($request->expectsJson()){
            return response()->jsoN(compact('brands','subcategories','product'));
        }
        return view('products.edit',compact('brands','subcategories','product'));
    }

    public function store(StoreProductRequest $request)
    {
        $newImageName = Media::upload($request->file('image'),'images\products');
        $data = $request->except('image','_token');
        $data['image'] =   $newImageName ;
        $status = Product::create($data);
        if($request->expectsJson()){
            return response()->jsoN(['success'=>true,'message'=>'successfull operation']);
        }
        return $this->redirectBack($status);
    }

    public function update(UpdateProductRequest $request,Product $product)
    {
        $data = $request->except('image','_token','_method');
        if($request->hasFile('image')){
            $newImageName = Media::upload($request->file('image'),'images\products');
            $data['image'] =   $newImageName;
            Media::delete(public_path("images\products\\{$product->image}"));
        }
        $status = $product->update($data);
        if($request->expectsJson()){
            return response()->jsoN(['success'=>'true','msg'=>'successfull operation']);
        }
        return $this->redirectBack($status);
    }

    public function destroy(Product $product,Request $request)
    {
        Media::delete(public_path("images\products\\{$product->image}"));
        $product->delete();
        if($request->expectsJson()){
            return response()->jsoN(['success'=>true,'message'=>'successfull operation']);
        }
        return redirect()->back()->with('success','Product Deleted Successfully');
    }
}

