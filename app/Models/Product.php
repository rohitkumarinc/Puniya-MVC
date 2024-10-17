<?php

namespace App\Models;

class Product extends BaseModel
{
    protected $table = 'products';
    protected $fillable = ['name', 'description', 'price'];

}
