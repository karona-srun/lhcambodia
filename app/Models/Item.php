<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    public function itemCategory()
    {
        return $this->belongsTo(ItemCategory::class);
    }
    public function itemSubCategory()
    {
        return $this->belongsTo(ItemSubCategory::class);
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
