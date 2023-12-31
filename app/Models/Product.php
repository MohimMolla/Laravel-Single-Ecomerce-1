<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    // protected $primaryKey = 'id';
    use HasFactory;
    protected $fillable = [
        'product_name',
        'product_tittle',
        'product_description',
        'price',
        'product_category_name',
        'product_subcategory_name',
        'product_category_id',
        'product_subcategory_id',
        'product_image',
        'slug',
    ];
}
