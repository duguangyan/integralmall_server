<?php

namespace App\Console\Commands;

use App\Models\Users;
use Illuminate\Console\Command;

class MyTimer extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:name';

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
    public function handle()
    {
        //
        $name = str_random(6);
        $data = [
            'loginName'=>$name,
            'loginPwd'=>'123456'
        ];
        Users::create($data);
    }
}
