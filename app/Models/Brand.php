<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use HasFactory;

    protected $fillable = [
        'brand_name_en',
        'brand_name_vn',
        'brand_name_cn',
        'brand_slug_en',
        'brand_slug_vn',
        'brand_slug_cn',
        'brand_image',
    ];
}
