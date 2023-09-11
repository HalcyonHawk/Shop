<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $table = 'orders';
    protected $primaryKey = 'order_id';
    public $timestamps = false;
    protected $guarded = [];

    /**
     * Calc total price
     */
    public function getTotalAttribute()
    {
      return $this->productDetails->sum('price');
    }

    /**
     * An order belongs to a user
     */
    public function user()
    {
        return $this->belongsTo('App\Models\User', 'user_id', 'id');
    }

    /**
     * A order has many product details
     */
    public function productDetail()
    {
        return $this->hasMany('App\Models\ProductDetail', 'product_detail_id', 'product_detail_id');
    }
}
