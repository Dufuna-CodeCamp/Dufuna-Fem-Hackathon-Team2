<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    protected $fillable = ['product', 'product_price', 'quantity', 'vendor', 'created_at', 'created_by'];
    public $timestamps = false;
}