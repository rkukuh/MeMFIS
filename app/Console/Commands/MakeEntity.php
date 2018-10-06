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
    protected $signature = 'make:entity
                            {entity : Name of the Entity, eg: Post, Product, Employee}
                            {--namespace=Both : eg: Frontend | Admin | Both | None | [your-choice]}
                            {--a|all : Generate an entity\'s along with its following artefacts below:}
                            {--M|model : Generate an entity\'s Model}
                            {--m|migration : Generate an entity\'s Migration}
                            {--c|controller : Generate an entity\'s Controller}
                            {--r|request : Generate an entity\'s Request}
                            {--f|factory : Generate an entity\'s Factory}
                            {--s|seeder : Generate an entity\'s Table Seeder}
                            {--e|example : Generate an entity\'s Example Seeder}
                            {--p|policy : Generate an entity\'s Policy}
                            {--t|test : Generate an entity\'s Unit and Feature Test} ';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new Entity (Model, Migration, Controller, Requests, Factory, Seeder, Policy, Tests)';

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

        /** MIGRATION */

        $pluralizedEntity = str_plural($entity);
        $migration = 'create_' . strtolower($pluralizedEntity) . '_table';

        $this->callSilent('make:migration', [
            'name' => $migration,
            '--create' => strtolower($pluralizedEntity),
        ]);

        $this->info('Migration created: ' . $migration . '.php');

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
                $this->info('Request created: ' . 'Admin/' . $requestStore . '.php');

                $this->callSilent('make:request', ['name' => 'Admin/' . $requestUpdate]);
                $this->info('Request created: ' . 'Admin/' . $requestUpdate . '.php');

                $this->callSilent('make:request', ['name' => 'Frontend/' . $requestStore]);
                $this->info('Request created: ' . 'Frontend/' . $requestStore . '.php');

                $this->callSilent('make:request', ['name' => 'Frontend/' . $requestUpdate]);
                $this->info('Request created: ' . 'Frontend/' . $requestUpdate . '.php');

                break;

            case 'none':
                $this->callSilent('make:request', ['name' => $requestStore]);
                $this->info('Request created: ' . $requestStore . '.php');

                $this->callSilent('make:request', ['name' => $requestUpdate]);
                $this->info('Request created: ' . $requestUpdate . '.php');

                break;

            default:
                $this->callSilent('make:request', ['name' => $namespace . '/' . $requestStore]);
                $this->info('Request created: ' . $namespace . '/' . $requestStore . '.php');

                $this->callSilent('make:request', ['name' => $namespace . '/' . $requestUpdate]);
                $this->info('Request created: ' . $namespace . '/' . $requestUpdate . '.php');

                break;
        }

        /** FACTORY */

        $factory = $entity . 'Factory';

        $this->callSilent('make:factory', [
            'name' => $factory,
            '--model' => $model,
        ]);

        $this->info('Factory created: ' . 'factories/' . $factory . '.php');

        /** SEEDER: Table Seeder */

        $seederTable = ($pluralizedEntity) . 'TableSeeder';

        $this->callSilent('make:seeder', ['name' => $seederTable]);

        $this->info('Table Seeder created: ' . 'seeds/' . $seederTable . '.php');

        /** SEEDER: Example Seeder */

        $seederExample = ($pluralizedEntity);

        $this->callSilent('make:seeder', ['name' => 'examples/' . $seederExample]);

        $this->info('Example Seeder created: ' . 'seeds/examples/' . $seederExample . '.php');
    }
}
