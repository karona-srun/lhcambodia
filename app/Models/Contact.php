<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    public function product()
    {
        return $this->belongsTo(Product::class,'product_id');
    }

    public function replied()
    {
        return $this->belongsTo(User::class,'replied_by');
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
