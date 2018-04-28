<?php

namespace App\Console\Commands;

use Illuminate\Support\Facades\Hash; 
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
        Employee::create([
            'name' => $adminName,
            'password' => Hash::make($adminPass),
            'email' => $adminName,
            'National_ID' => mt_rand(10000000000 , 99999999999),
            'image' => 'public/images/3.jpg',
            'employee_id' => 1
        ]);
        $this->info('Done');
    }

}
