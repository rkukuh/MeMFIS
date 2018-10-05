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
                            {entity : Name of the Entity, eg: Post, Product, Employee}
                            {--namespace=Both : eg: Frontend | Admin | Both | None}';

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

        $model = 'Models/' . $entity;
        $this->callSilent('make:model', ['name' => $model]);

        $this->info('Model created: ' . $model . '.php');

        /** CONTROLLER */

        $controller = $entity . 'Controller';

        switch (strtolower($namespace)) {
            case 'both':
                $this->callSilent('make:controller', [
                    'name' => 'Admin/' . $controller,
                    '--model' => $model,
                    '--resource' => true,
                ]);

                $this->info('Controller created: ' . 'Admin/' . $controller . '.php');

                $this->callSilent('make:controller', [
                    'name' => 'Frontend/' . $controller,
                    '--model' => $model,
                    '--resource' => true,
                ]);

                $this->info('Controller created: ' . 'Frontend/' . $controller . '.php');

                break;

            case 'none':
                $this->callSilent('make:controller', [
                    'name' => $controller,
                    '--model' => $model,
                    '--resource' => true,
                ]);

                $this->info('Controller created: ' . $controller . '.php');

                break;

            default:
                $this->callSilent('make:controller', [
                    'name' => $namespace . '/' . $controller,
                    '--model' => $model,
                    '--resource' => true,
                ]);

                $this->info('Controller created: ' . $namespace . '/' . $controller . '.php');

                break;
        }

        /** REQUEST */

        $requestStore  = $entity . 'Store';
        $requestUpdate = $entity . 'Update';

        switch (strtolower($namespace)) {
            case 'both':
                $this->callSilent('make:request', ['name' => 'Admin/' . $requestStore]);

                $this->callSilent('make:request', ['name' => 'Admin/' . $requestUpdate]);

                $this->callSilent('make:request', ['name' => 'Frontend/' . $requestStore]);

                $this->callSilent('make:request', ['name' => 'Frontend/' . $requestUpdate]);

                break;

            case 'none':
                $this->callSilent('make:request', ['name' => $requestStore]);

                $this->callSilent('make:request', ['name' => $requestUpdate]);

                break;

            default:
                $this->callSilent('make:request', ['name' => $namespace . '/' . $requestStore]);

                $this->callSilent('make:request', ['name' => $namespace . '/' . $requestUpdate]);

                break;
        }
    }
}
