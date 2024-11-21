<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    protected $table = "products";

    protected $fillable = [
        "dish_type",
        "name",
        "description",
        "price",
        "image",
    ];
}
