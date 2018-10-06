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
                            {--p|policy : Generate an entity\'s Policy}
                            {--s|seeder : Generate an entity\'s Table Seeder}
                            {--e|example : Generate an entity\'s Example Seeder}
                            {--t|test : Generate an entity\'s Unit and Feature Test} ';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new Entity (Model, Migration, Controller, Requests, Factory, Policy, Seeder, Tests)';

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

        $this->comment('[START] Creating new entity.....');

        $entity     = $this->argument('entity');
        $namespace  = $this->option('namespace');

        $tableHeaders   = ['Artefact', 'Location'];
        $tableContents  = [];

        $additionalSteps = [];

        /** MODEL */

        if ($this->option('all') || $this->option('model')) {

            $model = 'Models/' . $entity;

            $this->callSilent('make:model', ['name' => $model]);

            $data['artefact'] = 'Model';
            $data['location'] = $model . '.php';
            array_push($tableContents, $data);
        }

        /** MIGRATION */

        if ($this->option('all') || $this->option('migration')) {

            $pluralizedEntity = str_plural($entity);
            $migration = 'create_' . strtolower($pluralizedEntity) . '_table';

            $this->callSilent('make:migration', [
                'name' => $migration . '.php',
                '--create' => strtolower($pluralizedEntity),
            ]);

            $data['artefact'] = 'Migration';
            $data['location'] = $migration;
            array_push($tableContents, $data);
        }

        /** CONTROLLER */

        if ($this->option('all') || $this->option('controller')) {

            $controller = $entity . 'Controller';

            switch (strtolower($namespace)) {
                case 'both':
                    $this->callSilent('make:controller', [
                        'name' => 'Admin/' . $controller,
                        '--model' => $model,
                        '--resource' => true,
                    ]);

                    $data['artefact'] = 'Controller';
                    $data['location'] = 'Admin/' . $controller . '.php';
                    array_push($tableContents, $data);

                    $this->callSilent('make:controller', [
                        'name' => 'Frontend/' . $controller,
                        '--model' => $model,
                        '--resource' => true,
                    ]);

                    $data['artefact'] = 'Controller';
                    $data['location'] = 'Frontend/' . $controller . '.php';
                    array_push($tableContents, $data);

                    break;

                case 'none':
                    $this->callSilent('make:controller', [
                        'name' => $controller,
                        '--model' => $model,
                        '--resource' => true,
                    ]);

                    $this->info('Controller created: ' . $controller . '.php');

                    $data['artefact'] = 'Controller';
                    $data['location'] = $controller . '.php';
                    array_push($tableContents, $data);

                    break;

                default:
                    $this->callSilent('make:controller', [
                        'name' => $namespace . '/' . $controller,
                        '--model' => $model,
                        '--resource' => true,
                    ]);

                    $data['artefact'] = 'Controller';
                    $data['location'] = $namespace . '/' . $controller . '.php';
                    array_push($tableContents, $data);

                    break;
            }
        }

        /** REQUEST */

        if ($this->option('all') || $this->option('request')) {

            $requestStore  = $entity . 'Store';
            $requestUpdate = $entity . 'Update';

            switch (strtolower($namespace)) {
                case 'both':
                    $this->callSilent('make:request', ['name' => 'Admin/' . $requestStore]);

                    $data['artefact'] = 'Form Request';
                    $data['location'] = 'Admin/' . $requestStore . '.php';
                    array_push($tableContents, $data);

                    $this->callSilent('make:request', ['name' => 'Admin/' . $requestUpdate]);

                    $data['artefact'] = 'Form Request';
                    $data['location'] = 'Admin/' . $requestUpdate . '.php';
                    array_push($tableContents, $data);

                    $this->callSilent('make:request', ['name' => 'Frontend/' . $requestStore]);

                    $data['artefact'] = 'Form Request';
                    $data['location'] = 'Frontend/' . $requestStore . '.php';
                    array_push($tableContents, $data);

                    $this->callSilent('make:request', ['name' => 'Frontend/' . $requestUpdate]);

                    $data['artefact'] = 'Form Request';
                    $data['location'] = 'Frontend/' . $requestUpdate . '.php';
                    array_push($tableContents, $data);

                    break;

                case 'none':
                    $this->callSilent('make:request', ['name' => $requestStore]);

                    $data['artefact'] = 'Form Request';
                    $data['location'] = $requestStore . '.php';
                    array_push($tableContents, $data);

                    $this->callSilent('make:request', ['name' => $requestUpdate]);

                    $data['artefact'] = 'Form Request';
                    $data['location'] = $requestUpdate . '.php';
                    array_push($tableContents, $data);

                    break;

                default:
                    $this->callSilent('make:request', ['name' => $namespace . '/' . $requestStore]);

                    $data['artefact'] = 'Form Request';
                    $data['location'] = $namespace . '/' . $requestStore . '.php';
                    array_push($tableContents, $data);

                    $this->callSilent('make:request', ['name' => $namespace . '/' . $requestUpdate]);

                    $data['artefact'] = 'Form Request';
                    $data['location'] = $namespace . '/' . $requestUpdate . '.php';
                    array_push($tableContents, $data);

                    break;
            }
        }

        /** FACTORY */

        if ($this->option('all') || $this->option('factory')) {

            $factory = $entity . 'Factory';

            $this->callSilent('make:factory', [
                'name' => $factory,
                '--model' => $model,
            ]);

            $data['artefact'] = 'Model Factory';
            $data['location'] = $factory . '.php';
            array_push($tableContents, $data);
        }

        /** POLICY */

        if ($this->option('all') || $this->option('policy')) {

            $policy = $entity . 'Policy';

            $this->callSilent('make:policy', [
                'name' => $policy,
                '--model' => $model,
            ]);

            $data['artefact'] = 'Policy';
            $data['location'] = $policy . '.php';
            array_push($tableContents, $data);

            array_push($additionalSteps, 'Register the Policy');
        }

        /** SEEDER: Table Seeder */

        if ($this->option('all') || $this->option('factory')) {

            $seederTable = ($pluralizedEntity) . 'TableSeeder';

            $this->callSilent('make:seeder', ['name' => $seederTable]);

            $data['artefact'] = 'Seeder: Table';
            $data['location'] = 'seeds/' . $seederTable . '.php';
            array_push($tableContents, $data);

            /** SEEDER: Example Seeder */

            $seederExample = ($pluralizedEntity);

            $this->callSilent('make:seeder', ['name' => 'examples/' . $seederExample]);

            $data['artefact'] = 'Seeder: Example Data';
            $data['location'] = 'seeds/examples/' . $seederExample . '.php';
            array_push($tableContents, $data);

            array_push($additionalSteps, 'Fix the Example Seeder class name');
        }

        /** TEST (Feature and Unit tests) */

        if ($this->option('all') || $this->option('test')) {

            $test = $entity . 'Test';

            $this->callSilent('make:test', ['name' => $test]);

            $data['artefact'] = 'Test: Feature';
            $data['location'] = 'tests/Feature/' . $test . '.php';
            array_push($tableContents, $data);

            $this->callSilent('make:test', [
                'name' => $test,
                '--unit' => true,
            ]);

            $data['artefact'] = 'Test: Unit';
            $data['location'] = 'tests/Unit/' . $test . '.php';
            array_push($tableContents, $data);
        }

        if ($this->option('all') ||
           ($this->option('controller') && $this->option('request'))) {

            array_push($additionalSteps, 'Use generated Requests for the generated Controller');
        }
        else if ($this->option('request')) {

            array_push($additionalSteps, 'Use generated Requests for the Controller');
        }

        if (in_array(true, $this->options(), true) === false) {

            $this->error('No files has been created. You may missed an option or two');
        }
        else {
            $this->table($tableHeaders, $tableContents);
        }

        $this->comment('[DONE ] Creating new entity.');
        $this->info('');

        /** TODO */

        if ($additionalSteps) {

            $this->comment('ATTENTION: You may have to proceed these additional steps:');

            foreach ($additionalSteps as $key => $step) {
                $this->info('- ' . $step);
            }

            $this->info('');
        }
    }

    /**
     * Command's copyright'
     *
     * @return mixed
     */
    protected function copyright()
    {
        $this->info('');
        $this->question('"Make Entity" artisan command v1.0 by @rkukuh');
        $this->info('');
    }
}
