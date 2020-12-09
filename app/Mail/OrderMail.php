<?php

namespace App\Mail;

// use App\Models\Imoveis;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class OrderMail extends Mailable 
{
    use Queueable, SerializesModels;
    
    public function __construct($imovel,$name,$email,$message)
    {
        $this->name = $name;
        $this->email = $email;
        $this->message = $message;
        $this->imovel = $imovel;
    }

    public function build()
    {   
        return $this->view('mail.orderMail')
                    ->from($this->email)
                    ->with([
                        'username'=>$this->name,
                        'email'=>$this->email,
                        'msg'=>$this->message,
                        'data'=>date('d/m/Y'),
                        'imovel'=>$this->imovel
                    ]);
    }
}
