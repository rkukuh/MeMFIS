<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class MakeEntity extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'memfis:make-entity
                            {entity : Name of the entity, eg: Post, Product, Employee}
                            {--namespace=Both : Where this entity should resides, eg: Frontend | Admin | Both | None}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new entity (model, controller, requests, factory, migration, seeder, policy, tests)';

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
        $entity = $this->argument('entity');
        $namespace = $this->option('namespace');

        $this->call('make:model', ['name' => 'Models/' . $entity]);     // Model
    }
}
