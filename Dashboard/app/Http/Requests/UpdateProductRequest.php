<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name_en'=>['required','string','max:255'],
            'name_ar'=>['required','string','max:255'],
            'price'=>['required','numeric','between:1,999999.99'],
            'quantity'=>['required','integer','between:1,999'],
            'code'=>['required','integer','between:1,999999','unique:products,code,'.$this->product->id], //.$id
            'status'=>['required','in:0,1'],
            'brand_id'=>['nullable','integer','exists:brands,id'],
            'subcategory_id'=>['required','integer','exists:subcategories,id'],
            'details_en'=>['required','string'],
            'details_ar'=>['required','string'],
            'image'=>['nullable','max:1000','mimes:jpg,png,jpeg']
        ];
    }
}
