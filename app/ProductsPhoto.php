<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductsPhoto extends Model
{
    protected $fillable = ['product_id', 'url', 'main'];

    public function product() {
        return $this->belongsTo('App\Product');
    }
}
