<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable  = [
        'name_en',
        'name_ar',
        'price',
        'code',
        'status',
        'quantity',
        'image',
        'details_en',
        'details_ar',
        'brand_id',
        'subcategory_id'
    ];
}
