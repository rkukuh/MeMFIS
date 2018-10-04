<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class FreshMigrationWithSeed extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'memfis:fresh';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Fresh migration and Seeding data';

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
        if ($this->confirm('Continue to Fresh the migration and Seeding data?')) {

            $this->info('[START] Rebuild database schema..........');

            $this->callSilent('migrate:fresh', ['--force' => true]);

            $this->info('[DONE ] Rebuild database schema.');

            if ($this->confirm('Install initial data?')) {

                $this->info('[START] Install initial data..........');

                $this->call('db:seed', ['--force' => true]);

                $this->info('[DONE ] Install initial data.');
            }

            if ($this->confirm('Install example data?')) {

                $this->info('[START] Install example data..........');

                $this->call('db:seed', [
                    '--class' => 'ExampleDataSeeder',
                    '--force' => true,
                ]);

                $this->info('[DONE ] Install example data.');
            }

            $this->info('');
        }
    }
}
