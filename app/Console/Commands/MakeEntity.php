<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class MakeEntity extends Command
{
    protected $model;
    protected $entity;
    protected $namespace;
    protected $additionalSteps  = [];
    protected $tableContents    = [];
    protected $tableHeaders     = ['Artefact', 'Location'];

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
    protected $description = 'Create a new Entity and its artefacts';

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

        $this->entity     = $this->argument('entity');
        $this->namespace  = $this->option('namespace');

        $this->makeModel();
        $this->makeMigration();
        $this->makeController();
        $this->makeRequest();
        $this->makeFactory();
        $this->makePolicy();
        $this->makeSeeder();
        $this->makeTest();

        $this->printReport();
        $this->printAdditionalSteps();
    }

    /**
     * Run make:model command with defined entity name and/or namespace
     *
     * @return void
     */
    protected function makeModel()
    {
        if ($this->option('all') || $this->option('model')) {

            $this->model = 'Models/' . $this->entity;

            $this->callSilent('make:model', ['name' => $this->model]);

            $data['artefact'] = 'Model';
            $data['location'] = $this->model . '.php';
            array_push($this->tableContents, $data);

            $this->info($data['artefact'] . ' created.');
        }
    }

    /**
     * Run make:migration command with defined entity name and/or namespace
     *
     * @return void
     */
    protected function makeMigration()
    {
        if ($this->option('all') || $this->option('migration')) {

            $pluralizedEntity = str_plural($this->entity);
            $migration = 'create_' . strtolower($pluralizedEntity) . '_table';

            $this->callSilent('make:migration', [
                'name' => $migration . '.php',
                '--create' => strtolower($pluralizedEntity),
            ]);

            $data['artefact'] = 'Migration';
            $data['location'] = $migration;
            array_push($this->tableContents, $data);

            $this->info($data['artefact'] . ' created.');
        }
    }

    /**
     * Run make:controller command with defined entity name and/or namespace
     *
     * @return void
     */
    protected function makeController()
    {
        if ($this->option('all') || $this->option('controller')) {

            $controller = $this->entity . 'Controller';

            switch (strtolower($this->namespace)) {
                case 'both':
                    $this->callSilent('make:controller', [
                        'name' => 'Admin/' . $controller,
                        '--model' => $this->model,
                        '--resource' => true,
                    ]);

                    $data['artefact'] = 'Controller';
                    $data['location'] = 'Admin/' . $controller . '.php';
                    array_push($this->tableContents, $data);

                    $this->callSilent('make:controller', [
                        'name' => 'Frontend/' . $controller,
                        '--model' => $this->model,
                        '--resource' => true,
                    ]);

                    $data['artefact'] = 'Controller';
                    $data['location'] = 'Frontend/' . $controller . '.php';
                    array_push($this->tableContents, $data);

                    break;

                case 'none':
                    $this->callSilent('make:controller', [
                        'name' => $controller,
                        '--model' => $this->model,
                        '--resource' => true,
                    ]);

                    $this->info('Controller created: ' . $controller . '.php');

                    $data['artefact'] = 'Controller';
                    $data['location'] = $controller . '.php';
                    array_push($this->tableContents, $data);

                    break;

                default:
                    $this->callSilent('make:controller', [
                        'name' => $this->namespace . '/' . $controller,
                        '--model' => $this->model,
                        '--resource' => true,
                    ]);

                    $data['artefact'] = 'Controller';
                    $data['location'] = $this->namespace . '/' . $controller . '.php';
                    array_push($this->tableContents, $data);

                    break;
            }

            $this->info($data['artefact'] . ' created.');
        }
    }

    /**
     * Run make:request command with defined entity name and/or namespace
     *
     * @return void
     */
    protected function makeRequest()
    {
        if ($this->option('all') || $this->option('request')) {

            $requestStore  = $this->entity . 'Store';
            $requestUpdate = $this->entity . 'Update';

            switch (strtolower($this->namespace)) {
                case 'both':
                    $this->callSilent('make:request', ['name' => 'Admin/' . $requestStore]);

                    $data['artefact'] = 'Form Request';
                    $data['location'] = 'Admin/' . $requestStore . '.php';
                    array_push($this->tableContents, $data);

                    $this->callSilent('make:request', ['name' => 'Admin/' . $requestUpdate]);

                    $data['artefact'] = 'Form Request';
                    $data['location'] = 'Admin/' . $requestUpdate . '.php';
                    array_push($this->tableContents, $data);

                    $this->callSilent('make:request', ['name' => 'Frontend/' . $requestStore]);

                    $data['artefact'] = 'Form Request';
                    $data['location'] = 'Frontend/' . $requestStore . '.php';
                    array_push($this->tableContents, $data);

                    $this->callSilent('make:request', ['name' => 'Frontend/' . $requestUpdate]);

                    $data['artefact'] = 'Form Request';
                    $data['location'] = 'Frontend/' . $requestUpdate . '.php';
                    array_push($this->tableContents, $data);

                    break;

                case 'none':
                    $this->callSilent('make:request', ['name' => $requestStore]);

                    $data['artefact'] = 'Form Request';
                    $data['location'] = $requestStore . '.php';
                    array_push($this->tableContents, $data);

                    $this->callSilent('make:request', ['name' => $requestUpdate]);

                    $data['artefact'] = 'Form Request';
                    $data['location'] = $requestUpdate . '.php';
                    array_push($this->tableContents, $data);

                    break;

                default:
                    $this->callSilent('make:request', ['name' => $this->namespace . '/' . $requestStore]);

                    $data['artefact'] = 'Form Request';
                    $data['location'] = $this->namespace . '/' . $requestStore . '.php';
                    array_push($this->tableContents, $data);

                    $this->callSilent('make:request', ['name' => $this->namespace . '/' . $requestUpdate]);

                    $data['artefact'] = 'Form Request';
                    $data['location'] = $this->namespace . '/' . $requestUpdate . '.php';
                    array_push($this->tableContents, $data);

                    break;
            }

            $this->info($data['artefact'] . ' created.');
        }
    }

    /**
     * Run make:factory command with defined entity name and/or namespace
     *
     * @return void
     */
    protected function makeFactory()
    {
        if ($this->option('all') || $this->option('factory')) {

            $factory = $this->entity . 'Factory';

            $this->callSilent('make:factory', [
                'name' => $factory,
                '--model' => $this->model,
            ]);

            $data['artefact'] = 'Model Factory';
            $data['location'] = $factory . '.php';
            array_push($this->tableContents, $data);

            $this->info($data['artefact'] . ' created.');
        }
    }

    /**
     * Run make:policy command with defined entity name and/or namespace
     *
     * @return void
     */
    protected function makePolicy()
    {
        if ($this->option('all') || $this->option('policy')) {

            $policy = $this->entity . 'Policy';

            $this->callSilent('make:policy', [
                'name' => $policy,
                '--model' => $this->model,
            ]);

            $data['artefact'] = 'Policy';
            $data['location'] = $policy . '.php';
            array_push($this->tableContents, $data);

            $this->info($data['artefact'] . ' created.');

            array_push($this->additionalSteps, 'Register the Policy');
        }
    }

    /**
     * Run make:seed command with defined entity name and/or namespace
     *
     * @return void
     */
    protected function makeSeeder()
    {
        /** Table seeder */

        if ($this->option('all') || $this->option('seeder')) {

            $seederTable = ($pluralizedEntity) . 'TableSeeder';

            $this->callSilent('make:seeder', ['name' => $seederTable]);

            $data['artefact'] = 'Seeder: Table';
            $data['location'] = 'seeds/' . $seederTable . '.php';
            array_push($this->tableContents, $data);

            $this->info($data['artefact'] . ' created.');
        }

        /** Example data seeder */

        if ($this->option('all') || $this->option('example')) {

             $seederExample = ($pluralizedEntity);

             $this->callSilent('make:seeder', ['name' => 'examples/' . $seederExample]);

             $data['artefact'] = 'Seeder: Example Data';
             $data['location'] = 'seeds/examples/' . $seederExample . '.php';
             array_push($this->tableContents, $data);

             $this->info($data['artefact'] . ' created.');

             array_push($this->additionalSteps, 'Fix the Example Seeder class name');
        }
    }

    /**
     * Run make:test command with defined entity name and/or namespace
     *
     * @return void
     */
    protected function makeTest()
    {
        if ($this->option('all') || $this->option('test')) {

            /** Feature test */

            $test = $this->entity . 'Test';

            $this->callSilent('make:test', ['name' => $test]);

            $data['artefact'] = 'Test: Feature';
            $data['location'] = 'tests/Feature/' . $test . '.php';
            array_push($this->tableContents, $data);

            $this->info($data['artefact'] . ' created.');

            /** Unit test */

            $this->callSilent('make:test', [
                'name' => $test,
                '--unit' => true,
            ]);

            $data['artefact'] = 'Test: Unit';
            $data['location'] = 'tests/Unit/' . $test . '.php';
            array_push($this->tableContents, $data);

            $this->info($data['artefact'] . ' created.');
        }
    }

    /**
     * Print the whole command result / report
     *
     * @return void
     */
    protected function printReport()
    {
        if ($this->option('all') ||
           ($this->option('controller') && $this->option('request'))) {

            array_push($this->additionalSteps, 'Define a route for the generated Controller');
            array_push($this->additionalSteps, 'Use generated Requests for the generated Controller');
        }
        else if ($this->option('request')) {

            array_push($this->additionalSteps, 'Use generated Requests for the Controller');
        }
        else if ($this->option('controller')) {

            array_push($this->additionalSteps, 'Define a route for the generated Controller');
        }

        if (in_array(true, $this->options(), true) === false) {

            $this->error('No files has been created. You may missed an option or two');
        }

        $this->comment('[DONE ] Creating new entity.');
        $this->line('');

        if (in_array(true, $this->options(), true) === true) {

            $this->table($this->tableHeaders, $this->tableContents);
            $this->line('');
        }
    }

    /**
     * Print additional steps, if any
     *
     * @return void
     */
    protected function printAdditionalSteps()
    {
        if ($this->additionalSteps) {

            $this->comment('ATTENTION: You may have to proceed these additional steps:');

            foreach ($this->additionalSteps as $key => $step) {
                $this->line('- ' . $step);
            }

            $this->line('');
        }
    }

    /**
     * Command's copyright'
     *
     * @return mixed
     */
    protected function copyright()
    {
        $this->line('');
        $this->line('"Make Entity" artisan command');
        $this->line('version 1.0 by @rkukuh');
        $this->line('');
    }
}
