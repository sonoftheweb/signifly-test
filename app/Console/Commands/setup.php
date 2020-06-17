<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;

class setup extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'setup';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Setup the application and run seeder';

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
        $this->warn('Running fresh migrations and seeding...');

        Artisan::call('migrate:fresh --seed');

        $this->warn('Generating new application key...');

        Artisan::call('key:generate');

        $this->info('Clearing cache...');

        Artisan::call('cache:clear');

        $this->info('All done!');
    }
}
