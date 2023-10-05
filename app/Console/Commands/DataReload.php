<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;

class DataReload extends Command
{
    protected $signature = 'data-reload';

    protected $description = 'Reload database data';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        // Step 1: Wipe the database
        Artisan::call('db:wipe');

        // Step 2: Run migrations from the specified path
        $this->info('Running migrations from "database/migrations/"...');
        Artisan::call('migrate', [
            '--path' => 'database/migrations/',
        ]);

        // Step 3: Run migrations from subdirectories within "database/migrations/"
        $this->info('Running migrations from "database/migrations/*"...');
        Artisan::call('migrate', [
            '--path' => 'database/migrations/*',
        ]);

        // Step 4: Seed the database
        Artisan::call('db:seed');
    }
}
