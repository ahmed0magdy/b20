<?php

namespace App\Http\Controllers\Api;

use App\Models\Brand;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreBrandRequest;
use App\Http\Services\Media;
use App\Traits\ApiResponses;

class BrandController extends Controller
{
    use ApiResponses;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $brands = Brand::all(); 
        return $this->data(compact('brands'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBrandRequest $request)
    {
        $data = $request->except('image');
        if($request->hasFile('image')){
            $data ['image'] = Media::upload($request->image,'images\brands');
        }
        if(Brand::create($data)){
            return $this->success('Brand Created Successfully',201);
        }else{
            return $this->error(['data'=>'Failed'],'Something Went Wrong',500);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Brand $brand)
    {
        return $this->data(compact('brand'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreBrandRequest $request, Brand $brand)
    {
        $data = $request->except('image');
        if($request->hasFile('image')){
            $data ['image'] = Media::upload($request->image,'images\brands');
        }
        if($brand->update($data)){
            return $this->success('Brand Updated Successfully',200);
        }else{
            return $this->error(['data'=>'Failed'],'Something Went Wrong',500);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Brand $brand)
    {
        $brand->delete();
        return $this->success('Brand Deleted Successfully',200);
    }
}
