<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Support\Facades\Mail;

class SendCommentEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    //收件人
    protected $email;
    //发送的内容
    protected $content;
    //标题
    protected $subject;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($email,$content,$subject)
    {
        $this->email   = $email;
        $this->content = $content;
        $this->subject = $subject;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        Mail::send('emails.mail_template',$this->content,function($message){   
            $message->to($this->email)->subject($this->subject);
        });
    }
}
