<?php

namespace App\Console\Commands;

use App\Http\Controllers\DividenController;
use Illuminate\Console\Command;

class SendNotifications extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'Telegram:notification';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send notifications';

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
        $control = new DividenController();
        $control->remainder();
    }
}
