<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name','description','image','price','stock','status',
        'brand_id','category_id'
    ];

    protected $casts = [
        'price' => 'decimal:2',
    ];

    public function brand(){
        return $this->belongsTo(Brand::class);
    }

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function orderItems(){
        return $this->hasMany(OrderItem::class);
    }
}