<?php

namespace App;

use App\Mail\SendSubscriptionMessage;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Mail;

class Subscription extends Model
{
    protected $fillable = ['user_id'];


    public function user() {
        return $this->belongsTo('App\User');
    }

    public static function sendEmailBySubscription($product) {
        $subscriptions = self::all();
        foreach ($subscriptions as $subscription) {
            Mail::to($subscription->user->email)->send(new SendSubscriptionMessage($subscription->user->name, $product->id));
        }
    }
}
