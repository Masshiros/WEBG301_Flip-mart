<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function subsubcategory(){
        return $this->belongsTo(SubCategory::class,'subcategory_id','id');
    }
}