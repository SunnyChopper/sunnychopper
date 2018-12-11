<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class UpdateSitemap extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sitemap:update';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update the sitemap for the site.';

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
     _ Define the application's command schedule.
     _
     _ @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     _ @return void
     _*/
    protected function schedule(Schedule $schedule)
    {
       //insert name and signature of you command and define the time of excusion
        $schedule->command('sitemap:update')->everyDay();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        include('public/sitemap.php');
    }
}
