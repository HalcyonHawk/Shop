<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShippingDetail extends Model
{
    use HasFactory;

    protected $table = 'shipping_details';
    protected $primaryKey = 'shipping_detail_id';
    public $timestamps = false;
    protected $guarded = [];

    /**
     * A shipping detail belongs to a user
     */
    public function user()
    {
        return $this->belongsTo('App\Models\User', 'user_id', 'id');
    }
}
