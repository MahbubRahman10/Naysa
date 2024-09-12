<?php
namespace App\Mail;
use App\Order;
use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
class OrderEMail extends Mailable
{
    use Queueable, SerializesModels;
    public $name;
    public $voucherno;
    public $totalprice;
    public $order;
    public $service;
    public $date;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($order, $name, $voucherno, $totalprice, $service, $date)
    {
        $this->name = $name;
        $this->totalprice = $totalprice;
        $this->voucherno = $voucherno;
        $this->order = $order;
        $this->service = $service;
        $this->date = $date;
    }
    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {   
        return $this->subject('Order Confirmation')->view('emails.order');
    }
}