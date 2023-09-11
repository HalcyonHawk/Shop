<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    protected $table = 'cart';
    protected $primaryKey = 'cart_id';
    public $timestamps = false;
    protected $guarded = [];

    /**
     * Check if product details in the cart are still in stock
     */
    public function isAvailable()
    {
        return $this->productDetail->isInStock();
    }

    /**
     * A cart belongs to a user
     */
    public function user()
    {
        return $this->belongsTo('App\Models\User', 'user_id', 'id');
    }

    /**
     * A cart has many product details
     */
    public function productDetail()
    {
        return $this->hasMany('App\Models\ProductDetail', 'product_detail_id', 'product_detail_id');
    }
}
