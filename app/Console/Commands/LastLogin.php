<?php

namespace App\Console\Commands;

use Illuminate\Notifications\Notifiable;
use App\Notifications\InvoicePaid;
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
    public function handle(InvoicePaid $invoice)
    {
        $this->line('hii');
        $users = User::all();
        // dd($users);
        foreach($users as $user)
        {
            $timestamp = strtotime($user->lastLogin());
            $now = Carbon::now()->timestamp;
            // dd($now);
            $duration = $now + 30*24*60*60 ;
            // dd($duration);
            if($timestamp > $duration)
            {
                // dd($user);
                $user->sendEmailNotification($invoice);
                // dd('here');
            }
        }
        // $user = User::lastLogin();
        
    }
}
