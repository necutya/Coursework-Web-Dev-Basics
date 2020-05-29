<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = ['user_id', 'name', 'email', 'phone', 'country', 'city', 'post_type', 'department',
                        'price', 'comment', 'payment_type', 'confirmed'];

    /* return order owner using Eloquent */
    public function user() {
        return $this->belongsTo('App\User');
    }

    /* return all products of an order using Eloquent */
    public function products() {
        return $this->belongsToMany('App\Product');
    }
}
