<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PurchaseOrder extends Model
{
    use HasFactory;

    public function scopeCreatedToday($query)
    {
        return $query->whereDate('created_at', today());
    }

    public function scopeCreatedThisMonth($query)
    {
        return $query->whereMonth('created_at', now()->month);
    }
}
