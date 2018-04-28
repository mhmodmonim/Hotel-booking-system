<?php

namespace App\Console\Commands;

use Illuminate\Notifications\Notifiable;
use App\Notifications\Sheduled;
use Illuminate\Console\Command;
use App\User;
use Carbon\Carbon;


class LastLogin extends Command
{
    use Notifiable;
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'check:login';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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
    public function handle(Sheduled $invoice)
    {
        foreach(User::all() as $user)
        {
            $timestamp = strtotime($user->lastLogin());
            $now = Carbon::now()->timestamp;
            $duration = $now + 30*24*60*60 ;
            if($timestamp > $duration)
            {
                $user->sendScheduleNotification($invoice);
            }
        }
        
    }
}
