<?php

namespace App\Console\Commands;

use App;
use Illuminate\Console\Command;

class Rebuild extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'memfis:rebuild';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Rebuilding the app from scratch';

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
        $this->copyright();

        if (App::environment(['prod', 'production'])) {
            if ($this->confirm('You are in PRODUCTION environment. Continue?')) {
                $this->commandOperations();
            }
        } else {
            $this->commandOperations();
        }
    }

    /**
     * Command operation sequence
     *
     * @return mixed
     */
    protected function commandOperations()
    {
        $this->call('memfis:fresh');

        /**
         * Reset cached roles and permissions
         * https://github.com/spatie/laravel-permission#database-seeding
         *
         */
        $this->info('[START] Flush Spatie\'s Permission cache..........');
        app()['cache']->forget('spatie.permission.cache');
        $this->info('[DONE ] Flush Spatie\'s Permission cache.');
        $this->line('');

        $this->info('[START] Flush the application cache..........');
        $this->callSilent('cache:clear');
        $this->info('[DONE ] Flush the application cache.');
        $this->line('');

        $this->info('[START] Remove the configuration cache file..........');
        $this->callSilent('config:clear');
        $this->info('[DONE ] Remove the configuration cache file.');
        $this->line('');

        $this->info('[START] Remove the route cache file..........');
        $this->callSilent('route:clear');
        $this->info('[DONE ] Remove the route cache file.');
        $this->line('');

        $this->info('[START] Clear all compiled view files..........');
        $this->callSilent('view:clear');
        $this->info('[DONE ] Clear all compiled view files.');
        $this->line('');

        $this->info('[START] Flush expired password reset tokens..........');
        $this->callSilent('auth:clear-resets');
        $this->info('[DONE ] Flush expired password reset tokens.');
        $this->line('');

        $this->info('[START] Clear compiled class files..........');
        $this->callSilent('clear-compiled');
        $this->info('[DONE ] Clear compiled class files.');
        $this->line('');

        $this->info('[START] Rebuild the cached package manifest..........');
        $this->callSilent('package:discover');
        $this->info('[DONE ] Rebuild the cached package manifest.');
        $this->line('');

        $this->info('[START] Create a symbolic link..........');
        $this->callSilent('storage:link');
        $this->info('[DONE ] Create a symbolic link.');
        $this->line('');
    }

    /**
     * Command's copyright'
     *
     * @return mixed
     */
    protected function copyright()
    {
        $this->line('');
        $this->line('"MeMFIS: Rebuild" artisan command');
        $this->line('version 1.0 by @rkukuh');
    }
}
