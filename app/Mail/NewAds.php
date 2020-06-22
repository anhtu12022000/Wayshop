<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NewAds extends Mailable
{
    use Queueable, SerializesModels;

    protected $new_ads;
    protected $user;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($user,$new_ads)
    {
        $this->user = $user;
        $this->new_ads = $new_ads;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
       
        return $this->markdown('emails.newads')
                    ->subject($this->new_ads->title)
                    ->from('dailyshop@company.com', 'Wonderful Dailyshop')
                    ->with([
                        'user'=> $this->user,
                        'new_ads' => $this->new_ads,
                    ]);
    }
}
