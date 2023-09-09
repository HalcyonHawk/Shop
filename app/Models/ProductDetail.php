<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductDetail extends Model
{
    use HasFactory;

    protected $table = 'cart';
    protected $primaryKey = 'cart_id';
    public $timestamps = false;
    protected $guarded = [];

    /**
     * A product detail belongs to a product
     */
    public function product()
    {
        return $this->belongsTo('App\Models\Product', 'product_id', 'product_id');
    }

    /**
     * A product detail belongs to many orders
     */
    public function order()
    {
        return $this->belongsToMany('App\Models\Order', 'product_id', 'product_id');
    }
}
