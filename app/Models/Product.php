<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'cost',
        'price',
        'category_id',
        'stock',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
public function orders()
    {
        return $this->belongsToMany(Order::class, 'order_product', 'product_id', 'order_id')
                    ->withPivot('quantity');
    }
}

