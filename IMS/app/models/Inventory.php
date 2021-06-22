<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Inventory extends Model
{
    protected $fillable = ['product_name', 'quantity', 'created_at', 'created_by'];
    public $timestamps = false;
}