<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductCategory extends Model
{
    use HasFactory;

    public function submenu() 
    {
        return $this->hasMany(ProductSubCategoory::class,'product_category_id');
    }

    public function product() 
    {
        return $this->hasMany(Product::class,'product_category_id');
    }

    public function subCategory() 
    {
        return $this->hasMany(ProductSubCategoory::class);
    }

    public function creator()
    {
        return $this->belongsTo(User::class,'created_by');
    }

    public function updator()
    {
        return $this->belongsTo(User::class,'updated_by');
    }
}
