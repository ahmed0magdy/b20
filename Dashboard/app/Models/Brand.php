<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Brand extends Model
{
    use HasFactory;

    protected $fillable = [
        'name_en','name_ar','status','image'
    ];

    protected function image(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => asset('images/products/'.$value),
        );
    }
}
