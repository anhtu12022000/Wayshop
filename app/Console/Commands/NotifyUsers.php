<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

use App\Message;
use Carbon\Carbon;
use App\Jobs\SendMailJob;
use App\User;
use App\Mail\NewAds;

class NotifyUsers extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'notify:users';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send email ads to user';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        // Một giờ được thêm vào để bù cho PHP nhanh hơn một giờ 
        $now = date("Y-m-d H:i", strtotime(Carbon::now()->addHour()));
        logger($now);

        $messages = Message::get();
        if($messages !== null){
            //Nhận tất cả các tin nhắn rằng ngày gửi của họ là hạn cuối
            $messages->where('date_string',  $now)->each(function($message) {
                if($message->delivered == 'NO')
                {
                    $users = User::all();
                    foreach($users as $user) {
                        dispatch(new SendMailJob(
                            $user->email, 
                            new NewAds($user, $message))
                        );
                    }
                    $message->delivered = 'YES';
                    $message->save();   
                }
            });
        }
    }
}
