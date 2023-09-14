<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'product_name', 'product_description','main_image', 'other_images', 'quantity_m', 'quantity_l', 'quantity_xl','total_quantity', 'product_price'
    ];

    
}
