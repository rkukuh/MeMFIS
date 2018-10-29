<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Composer;

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
     * Create a new migration install command instance.
     *
     * @param  \Illuminate\Support\Composer  $composer
     * @return void
     */
    public function __construct(Composer $composer)
    {
        parent::__construct();

        $this->composer = $composer;
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

            $this->composer->dumpAutoloads();

            $this->line('');

            $this->info('[START] Install initial data..........');

            $this->call('db:seed', ['--force' => true]);

            $this->info('[DONE ] Install initial data.');

            if ($this->confirm('Install dummy data?')) {

                $this->info('[START] Install dummy data..........');

                $this->call('db:seed', [
                    '--class' => 'DummyDataSeeder',
                    '--force' => true,
                ]);

                $this->info('[DONE ] Install dummy data.');
            }

            if ($this->confirm('Install example data?')) {

                $this->info('[START] Install example data..........');

                $this->call('db:seed', [
                    '--class' => 'ExampleDataSeeder',
                    '--force' => true,
                ]);

                $this->info('[DONE ] Install example data.');
            }

            $this->line('');
        }
    }
}
