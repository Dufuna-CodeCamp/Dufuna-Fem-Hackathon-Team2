<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['category_name', 'created_at', 'created_by'];
    public $timestamps = false;
}