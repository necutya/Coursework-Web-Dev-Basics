<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendSubscriptionMessage extends Mailable
{
    use Queueable, SerializesModels;

    protected $name, $product;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($name,  $product_id)
    {
        $this->name = $name;
        $this->product_id = $product_id;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mail.subscription', ['name'=>$this->name, 'product_id'=>$this->product_id]);
    }
}
