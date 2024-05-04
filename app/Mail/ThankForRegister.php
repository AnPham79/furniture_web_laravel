<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ThankForRegister extends Mailable
{
    use Queueable, SerializesModels;

    public $name;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($name)
    {
        $this->name = $name;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this
        ->from('Anltweb79@gmail.com')
        // ->to('user@gmail.com')
        ->subject('Thank you - Wellcome to ANDEV')
        ->attachFromStorage('app/img/avt/1714637314.jpg')
        // view tạo giao diện thông thường , hãy dùng markdown để làm giao diện đẹp mặt hơn
        // ->view('Mail.mail')
        ->markdown('Mail.mail');
    }
}
