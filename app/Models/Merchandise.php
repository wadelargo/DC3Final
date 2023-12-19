<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Merchandise extends Model
{
    use HasFactory;

    
    protected $fillable = [
        'brand',
        'description',
        'retail_price',
        'whole_sale_price',
        'whole_sale_qty',
        'qty_stock',
    ];

    public function purchased_item() {
        return $this->belongsTo(Merchandise::class);
    }

    public function sold_item() {
        return $this->belongsTo(Merchandise::class);
    }

    
}
