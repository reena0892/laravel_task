<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products'; 

    protected $fillable = ['name', 'colour', 'category_id', 'active']; // Define fillable columns

    // Define relationship: A product belongs to one category
    public function category()
    {
        return $this->belongsTo(ProductCategory::class, 'category_id');
    }
}

