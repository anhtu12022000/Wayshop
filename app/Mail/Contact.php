<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class Contact extends Mailable
{
    use Queueable, SerializesModels;

    protected $content;
    protected $user;
    protected $email;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($user, $email, $content)
    {
        $this->user = $user;
        $this->content = $content;
        $this->email = $email;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        
        return $this->markdown('emails.contact')
                    ->subject($this->email)
                    ->from('dailyshop@company.com', 'Wonderful Dailyshop')
                    ->with([
                        'user'=> $this->user,
                        'content' => $this->content,
                    ]);
    }
}
