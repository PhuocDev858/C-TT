<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    // Cho phép mass assignment các cột
    protected $fillable = [
        'name',
        'description',
    ];

    // Quan hệ với products
    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
