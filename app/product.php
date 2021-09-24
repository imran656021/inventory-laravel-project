<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    protected $fillable = [
        'product_name', 'product_code', 'buying_price','selling_price', 'image','category_id', 'supplier_id', 'root', 'product_quantity', 'selling_date',
    ];
}
