<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Vendor extends Model
{
    protected $fillable = ['vendor_name', 'phone_number', 'email', 'address'];
    public $timestamps = false;
}