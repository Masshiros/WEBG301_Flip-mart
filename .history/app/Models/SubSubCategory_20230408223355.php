<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubSubCategory extends Model
{
    use HasFactory;

    use HasFactory;

    protected $fillable = [
        'subcategory_id',
        'subsubcategory_name_en',
        'subsubcategory_name_vn',
        'subsubcategory_name_cn',
        'subsubcategory_slug_en',
        'subsubcategory_slug_vn',
        'subsubcategory_slug_cn',
    ];
    
    public function category(){
        return $this->belongsTo(Category::class,'category_id','id');
    }
    public function subcategory(){
        return $this->belongsTo(SubCategory::class,'subcategory_id','id');
    }
}