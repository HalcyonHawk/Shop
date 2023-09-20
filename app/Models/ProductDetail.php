<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductDetail extends Model
{
    use HasFactory;

    protected $table = 'product_details';
    protected $primaryKey = 'product_detail_id';
    public $timestamps = false;
    protected $guarded = [];

    /**
     * Get in stock product details from Eloquent query
     * Eg. ProductDetail::inStock()->get();
     */
    public function scopeInStock($query)
    {
      return $query->where('stock', '>', 0);
    }

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
