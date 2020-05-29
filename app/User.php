<?php

namespace App;

use Illuminate\Auth\Notifications\ResetPassword as ResetPasswordNotification;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;
    use CanResetPassword;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'name', 'phone', 'country', 'city'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    /**
     * Send the password reset notification.
     *
     * @param  string  $token
     * @return void
     */
    public function sendPasswordResetNotification($token)
    {
        $this->notify(new Notifications\MailResetPasswordNotification($token));
    }

    /* Check if user is admin*/
    public function isAdmin(){
        return $this->isAdmin() === 1;
    }

    /* Return user orders using Eloquent */
    public function orders() {
        return $this->hasMany('App\Order');
    }

    /* Return user subscription using Eloquent */
    public function subscription() {
        return $this->hasOne('App\Subscription');
    }

    /* Return user purchase_history */
    public function purchase_history(){
        $confirmed_orders = $this->orders()->where('confirm', 1)->get();
        $items = array();
        foreach($confirmed_orders as $order) {
            array_push($items, $order->products);
        }
        return $items;
    }
}
