<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Support\Facades\Mail;
use PharIo\Manifest\Email;

class SendEmailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    protected $messageData;
    protected $email;
    public function __construct($messageData , $email)
    {
        $this->messageData =$messageData;
        $this->email = $email;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
          $email = $this->email;
        Mail::send('admin.emails.accept' , $this->messageData , function ($message)use($email){
            $message->to(setting()->email)->subject('Suggestione from E-com Website');
        });
    }
}
