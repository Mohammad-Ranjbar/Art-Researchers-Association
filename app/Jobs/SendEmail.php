<?php

namespace App\Jobs;

use App\Mail\AdminMessage;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class SendEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    protected $body;
    protected $name;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($body, $name)
    {
        $this->body = $body;
        $this->user = $name;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $email = new AdminMessage($this->body, $this->name);
        Mail::to('mj.ranjbar.94@gmail.com')->send($email);
    }
}
