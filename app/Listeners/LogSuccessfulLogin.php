<?php

namespace App\Listeners;

use Illuminate\Auth\Events\Login;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Events\LoginEvent;

class LogSuccessfulLogin implements ShouldQueue
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  Login  $event
     * @return void
     */
    public function handle(Login $event)
    {  
            $event->$this->last_login = date('Y-m-d H:i:s');
            $event->$this->save();   
    }

    public function failed(Login $event, $exception)
    {
        print($exception);
    }
}
