<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'shipping_phoneNumber',
        'shipping_city',
        'shipping_postalcode',
        'product_name',
        'quantity',
        'total_price',
    ];
}

