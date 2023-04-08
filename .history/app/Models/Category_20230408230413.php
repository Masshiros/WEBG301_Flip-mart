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
        'category_slug_en',
        'category_slug_vn',
        'category_slug_cn',
        'category_icon',
        
    ];
    public function subcategory()
    {
        return $this->hasMany(SubCategory::class,'');
    }
}