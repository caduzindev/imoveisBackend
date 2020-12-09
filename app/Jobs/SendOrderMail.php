<?php

namespace App\Jobs;

use App\Models\Imoveis;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;
use App\Mail\OrderMail;
use Illuminate\Support\Facades\Log;

use Throwable;

class SendOrderMail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $timeout = 30;
    public $tries = 3;

    protected string $name;
    protected string $email;
    protected string $message;
    protected Imoveis $imovel;

    public function __construct($imovel,$name,$email,$message)
    {
        $this->name = $name;
        $this->email = $email;
        $this->message = $message;
        $this->imovel = $imovel;
    }

    public function handle()
    {   
        Mail::to('27b5e32355-48c356@inbox.mailtrap.io')->send(new OrderMail($this->imovel,$this->name,$this->email,$this->message));

        Log::info('E-mail enviado de '.$this->name.' foi enviado... condigo do imovel é '.$this->imovel->id);
    }

    public function failed(Throwable $exception)
    {
        Log::notice('[Error]Erro ao enviar o E-mail: ',[$exception]);
    }
}
