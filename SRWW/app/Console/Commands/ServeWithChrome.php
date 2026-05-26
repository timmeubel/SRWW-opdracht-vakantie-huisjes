<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class ServeWithChrome extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'serve:chrome';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Start the development server and open it in Chrome';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $url = 'http://127.0.0.1:8000';
        
        $this->info("Opening $url in Chrome...");
        
        // Open Chrome (Windows)
        shell_exec("start chrome \"$url\"");
        
        $this->info('Starting Laravel development server...');
        $this->call('serve');
    }
}
