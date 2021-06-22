<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    protected $fillable = ['product', 'product_price', 'quantity', 'customer_name', 'created_at', 'created_by'];
    public $timestamps = false;
}