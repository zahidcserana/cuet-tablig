<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class testMail extends Mailable
{
    use Queueable, SerializesModels;
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
        $data = $this->data;
        $address = 'zahid1004048@gmail.com';
        $name = 'CUET TABLIG';

        return $this->view('emails.register')
            ->from($address, $name)
            //->cc($address, $name)
            //->bcc($address, $name)
            ->replyTo($address, $data['name'])
            ->subject($data['subject'])
            ->with([ 'name' => $data['name'] ])
            ->with([ 'email' => $data['email'] ])
            ->with([ 'password' => $data['password'] ])
            ->with([ 'code' => $data['code'] ])
            ->with([ 'subject' => $data['subject'] ]);
        //return $this->view('view.name');
    }
}
