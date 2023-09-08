<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products';
    protected $primaryKey = 'product_id';
    public $timestamps = false;
    protected $guarded = [];

    /**
     * A product has many product details
     */
    public function productDetail()
    {
        return $this->hasMany('App\Models\ProductDetail', 'product_detail_id', 'product_detail_id');
    }
}
