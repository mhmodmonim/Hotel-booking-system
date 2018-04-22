<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Employee;

class createAdmin extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'create:admin {--name=} {--password=}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create Admin';

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

        $adminName = $this->option('name');
        $adminPass = $this->option('password');

        $headers = ['email', 'password'];
        $admins = App\Employee::all([$adminName, $adminPass])->toArray();
        $this->table($headers, $admins);

        $this->info('Done');
        $this->save();
    }
}
