<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use App\News;
use App\Follow;
use Mail;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        //
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {   
         $schedule->call(function () {
            $news = News::whereRaw('Date(created_at) = CURDATE()')->get();
            $content = "";
            foreach ($news as $new) {
                $content = $content . $new->title . '-' .url('news/'.$new->slug) . "\n";
            }
            
            $follows = Follow::where('status',1)->get();
            $emails = [];
            foreach ($follows as $value) {
                array_push($emails, $value->email);
            }
            Mail::send('view.mail_form', array('name'=>"abc",'email'=>"email", 'content'=> $content), 
            function($message) use ($emails)
            {    
                $message->to($emails)->subject('Bài viết mới có thể bạn quan tâm');    
            });
        })
        ->everyMinute();
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
