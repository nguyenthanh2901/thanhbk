<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Models\Transaction;
class ShoppingMail extends Mailable
{
    use Queueable, SerializesModels;
    public $order;
    public $orderdetail = [];
    /**
     * Create a new message instance.
     *
     * @return void
     */
    private $transactions;
   
    public function __construct( $transactions)
    {
        $this->transactions = $transactions;
      
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('email.shopping')->with(['products'=>$this->transactions]);
    }
}
