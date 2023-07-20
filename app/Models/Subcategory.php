<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subcategory extends Model
{
    use HasFactory;
    // protected $fillable = [
    //     'subcategory_name',
    //     'category_id',
    //     'category_name',
    //     'product_count',
    //     'slug',
    // ];
    protected $fillable = [
        
        'subcategory_name',
        'slug',
        'category_id',
        'category_name'
    ];
}
