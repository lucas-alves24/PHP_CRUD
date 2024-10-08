<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table = 'product';
    protected $fillable = ['description', 'quantity', 'value', 'product_types_id'];


    public function type()
    {
        return $this->belongsTo(ProductType::class, 'product_types_id', 'id');
    }
}
