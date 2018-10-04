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
    protected $description = 'Create a new Entity (Model, Controller, Requests, Factory, Migration, Seeder, Policy, Tests)';

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

        /** MODEL */

        $this->call('make:model', ['name' => 'Models/' . $entity]);

        /** CONTROLLER */

        switch (strtolower($namespace)) {
            case 'both':
                $this->call('make:controller', [
                    'name' => 'Admin/' . $entity . 'Controller',
                    '--model' => 'Models/' . $entity,
                    '--resource' => true,
                ]);

                $this->call('make:controller', [
                    'name' => 'Frontend/' . $entity . 'Controller',
                    '--model' => 'Models/' . $entity,
                    '--resource' => true,
                ]);

                break;

            case 'none':
                $this->call('make:controller', [
                    'name' => $entity . 'Controller',
                    '--model' => 'Models/' . $entity,
                    '--resource' => true,
                ]);

                break;

            default:

                $this->call('make:controller', [
                    'name' => $namespace . '/' . $entity . 'Controller',
                    '--model' => 'Models/' . $entity,
                    '--resource' => true,
                ]);

                break;
        }
    }
}
