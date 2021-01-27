<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class Product extends Eloquent
{
    protected $collection = 'products';
    protected $fillable = [
        'name', 'price','category'
    ];
}