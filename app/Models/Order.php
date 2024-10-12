<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'customer_id',
        'status',
        'total_amount',
        'created_at',
        'updated_at',
    ];
    
    public function products()
    {
        return $this->belongsToMany(Product::class, 'order_product', 'order_id', 'product_id')
           
        ->withPivot('quantity'); 
    }
    
    public function items()
{
    return $this->belongsToMany(Product::class, 'order_items')->withPivot('quantity', 'price');
}
public function customer()
{
    return $this->belongsTo(Customer::class);
}


    
}
