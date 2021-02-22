<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Http\Controllers\Cron\JobsController;

class FetchProduct extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'fetch:shopware-product';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Run a function that fetch product from shopware and store in SQLite database';

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
     * @return int
     */
    public function handle()
    {
        $job = new JobsController();
        $response = $job->fetchProductFromShopware();
        $this->info($response);
    }
}
