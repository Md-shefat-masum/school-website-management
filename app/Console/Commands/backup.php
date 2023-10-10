<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class backup extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:backup';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $backup_file = public_path() . "/app/backup/" . "backup_sql.gz";
        if (file_exists($backup_file)) {
            unlink($backup_file);
        }
        $filename = "backup_sql" . ".gz";

        $command = "mysqldump --user=" . env('DB_USERNAME') . " --password=" . env('DB_PASSWORD') . " --host=" . env('DB_HOST') . " " . env('DB_DATABASE') . "  | gzip > " . public_path() . "/app/backup/" . $filename;

        $returnVar = NULL;
        $output  = NULL;

        exec($command, $output, $returnVar);
    }
}
