<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['name', 'price', 'size', 'collection_id', 'type'];

    public function products_photos() {
        return $this->hasMany('App\ProductsPhoto', 'product_id');
    }

    public function collection() {
        return $this->belongsTo('App\Collection');
    }

    public function main_photo() {
        return $this->products_photos()->where('main', 1)->first();
    }

    public function orders() {
        return $this->belongsToMany('App\Order');
    }
}
