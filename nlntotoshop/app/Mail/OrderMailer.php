<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class OrderMailer extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Tạo biến chứa dữ liệu dùng để render email template
     */
    public $data;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $ddh_ma = $this->data['dondathang']['ddh_ma'];
        return $this->from(env('MAIL_FROM_ADDRESS', 'tranlenhatminh97@gmail.com'), env('MAIL_FROM_NAME', 'ToToShop'))
            ->subject("Đơn hàng [$ddh_ma] hoàn tất")
            ->view('emails.order-email')
            ->with('data', $this->data);
    }
}