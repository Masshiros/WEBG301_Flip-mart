<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $fillable = [
        'category_name_en',
        'category_name_vn',
        'category_name_cn',
        'brand_name_vn',
        'brand_name_cn',
        'brand_slug_en',
        'brand_slug_vn',
        'brand_slug_cn',
        'brand_image',
    ];
}