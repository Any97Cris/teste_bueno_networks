<?php

namespace App\Jobs;

use App\Mail\Mailgun;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class SendEmailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $dadosUsuario;

    /**
     * Create a new job instance.
     */
    public function __construct($dadosUsuario)
    {
        $this->dadosUsuario = $dadosUsuario;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $data = $this->dadosUsuario;

        Mail::to(users: $this->dadosUsuario->email)->send(new Mailgun);
    }
}
