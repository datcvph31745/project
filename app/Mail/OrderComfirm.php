<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use App\Models\DonHang;


class OrderComfirm extends Mailable
{
    use Queueable, SerializesModels;

    public $donHang;

    /**
     * Create a new message instance.
     */
    public function __construct(DonHang $donHang)
    {
        //
        $this->donHang =$donHang;
    }

    public function build(){
        return $this->subject('Xác nhận đơn hàng')
        ->markdown('donhang.mail')
        ->with('donHang',$this->donHang);
    }
   
}
