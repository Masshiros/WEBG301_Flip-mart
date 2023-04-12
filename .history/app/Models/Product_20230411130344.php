<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function subsubcategory(){
        return $this->belongsTo(SubSubCategory::class,'subsubcategory_id','id');
    }
    public function brand(){
        return $this->belongsTo(Brand::class,'subsubcategory_id','id');
    }
}