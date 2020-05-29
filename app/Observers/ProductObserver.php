<?php

namespace App\Observers;

use App\Product;
use App\Subscription;

class ProductObserver
{
    /**
     * Handle the product "created" event.
     *
     * @param  \App\Product  $product
     * @return void
     */
    public function created(Product $product)
    {
        Subscription::sendEmailBySubscription($product);
    }
}
