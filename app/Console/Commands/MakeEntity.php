<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Filesystem\Filesystem;

class MakeEntity extends Command
{
    protected $data;
    protected $entity;
    protected $namespace;
    protected $modelName;
    protected $modelNamespace;
    protected $controllerName;
    protected $requestStoreName;
    protected $requestUpdateName;
    protected $pluralizedEntity;
    protected $additionalSteps  = [];
    protected $tableContents    = [];
    protected $tableHeaders     = ['Artefact', 'Location'];

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'memfis:make:entity
                            {entity : Name of the Entity, eg: Post, Product, Employee}
                            {--namespace=Both : eg: Frontend | Admin | Both | None | [your-choice]}
                            {--a|all : Generate an entity\'s along with its following artefacts below:}
                            {--M|model : Generate an entity\'s Model}
                            {--m|migration : Generate an entity\'s Migration}
                            {--r|request : Generate an entity\'s Request}
                            {--c|controller : Generate an entity\'s Controller}
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
    public function __construct(Filesystem $files)
    {
        parent::__construct();

        $this->files = $files;
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        if ($this->option('all')) {
            $this->input->setOption('model', true);
            $this->input->setOption('migration', true);
            $this->input->setOption('request', true);
            $this->input->setOption('controller', true);
            $this->input->setOption('factory', true);
            $this->input->setOption('policy', true);
            $this->input->setOption('seeder', true);
            $this->input->setOption('example', true);
            $this->input->setOption('test', true);
        }

        $this->copyright();

        $this->comment('[START] Creating new entity.....');

        $this->entity     = $this->argument('entity');
        $this->namespace  = $this->option('namespace');

        $this->makeModel();
        $this->makeMigration();
        $this->makeRequest();
        $this->makeController();
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
        if ($this->option('model')) {

            $this->modelName = $this->entity;
            $this->modelNamespace = 'Models/' . $this->modelName;

            if ($this->files->exists(
                    $path = base_path() . '/app/' . $this->modelNamespace . '.php')
            ) {
                $this->input->setOption('model', false);

                return $this->error($this->modelNamespace . '.php file already exists!');
            }

            $this->compileModelStub($path);

            $data['artefact'] = 'Model';
            $data['location'] = $this->modelNamespace;
            array_push($this->tableContents, $data);

            $this->info($data['artefact'] . ' created.');
        }
    }

    /**
     * Compile the Model stub
     *
     * @param String $path
     * @return void
     */
    protected function compileModelStub($path)
    {
        $stub = $this->files->get(__DIR__ . '/stubs/model.stub');
        $stub = str_replace('{{class}}', $this->entity, $stub);

        $this->files->put($path, $stub);

        return $this;
    }

    /**
     * Run make:migration command with defined entity name and/or namespace
     *
     * @return void
     */
    protected function makeMigration()
    {
        if ($this->option('migration')) {

            $this->pluralizedEntity = str_plural($this->entity);
            $migration = 'create_' . strtolower($this->pluralizedEntity) . '_table';

            $this->callSilent('make:migration', [
                'name' => $migration . '.php',
                '--create' => strtolower($this->pluralizedEntity),
            ]);

            $data['artefact'] = 'Migration';
            $data['location'] = $migration;
            array_push($this->tableContents, $data);

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
        if ($this->option('request')) {

            $this->requestStoreName  = $this->entity . 'Store';
            $this->requestUpdateName = $this->entity . 'Update';

            switch (strtolower($this->namespace)) {
                case 'both':
                    $this->callSilent('make:request', ['name' => 'Admin/' . $this->requestStoreName]);

                    $data['artefact'] = 'Form Request';
                    $data['location'] = 'Admin/' . $this->requestStoreName . '.php';
                    array_push($this->tableContents, $data);

                    $this->callSilent('make:request', ['name' => 'Admin/' . $this->requestUpdateName]);

                    $data['artefact'] = 'Form Request';
                    $data['location'] = 'Admin/' . $this->requestUpdateName . '.php';
                    array_push($this->tableContents, $data);

                    $this->callSilent('make:request', ['name' => 'Frontend/' . $this->requestStoreName]);

                    $data['artefact'] = 'Form Request';
                    $data['location'] = 'Frontend/' . $this->requestStoreName . '.php';
                    array_push($this->tableContents, $data);

                    $this->callSilent('make:request', ['name' => 'Frontend/' . $this->requestUpdateName]);

                    $data['artefact'] = 'Form Request';
                    $data['location'] = 'Frontend/' . $this->requestUpdateName . '.php';
                    array_push($this->tableContents, $data);

                    break;

                case 'none':
                    $this->callSilent('make:request', ['name' => $this->requestStoreName]);

                    $data['artefact'] = 'Form Request';
                    $data['location'] = $this->requestStoreName . '.php';
                    array_push($this->tableContents, $data);

                    $this->callSilent('make:request', ['name' => $this->requestUpdateName]);

                    $data['artefact'] = 'Form Request';
                    $data['location'] = $this->requestUpdateName . '.php';
                    array_push($this->tableContents, $data);

                    break;

                default:
                    $this->callSilent('make:request', ['name' => $this->namespace . '/' . $this->requestStoreName]);

                    $data['artefact'] = 'Form Request';
                    $data['location'] = $this->namespace . '/' . $this->requestStoreName . '.php';
                    array_push($this->tableContents, $data);

                    $this->callSilent('make:request', ['name' => $this->namespace . '/' . $this->requestUpdateName]);

                    $data['artefact'] = 'Form Request';
                    $data['location'] = $this->namespace . '/' . $this->requestUpdateName . '.php';
                    array_push($this->tableContents, $data);

                    break;
            }

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
        if ($this->option('controller')) {

            $this->controllerName = $this->entity . 'Controller';

            switch (strtolower($this->namespace)) {
                case 'both':
                    if ($this->files->exists(
                            $path = base_path() . '/app/Http/Controllers/Admin/' . $this->controllerName . '.php')
                    ) {
                        $this->input->setOption('controller', false);

                        return $this->error('Admin/' . $this->controllerName . '.php file already exists!');
                    }

                    $this->compileControllerStub($path, 'Admin');

                    $data['artefact'] = 'Controller';
                    $data['location'] = 'Admin/' . $this->controllerName . '.php';
                    array_push($this->tableContents, $data);

                    if ($this->files->exists(
                        $path = base_path() . '/app/Http/Controllers/Frontend/' . $this->controllerName . '.php')
                    ) {
                        $this->input->setOption('controller', false);

                        return $this->error('Frontend/' . $this->controllerName . '.php file already exists!');
                    }

                    $this->compileControllerStub($path, 'Frontend');

                    $data['artefact'] = 'Controller';
                    $data['location'] = 'Frontend/' . $this->controllerName . '.php';
                    array_push($this->tableContents, $data);

                    break;

                case 'none':
                    $this->callSilent('make:controller', [
                        'name' => $this->controllerName,
                        '--model' => $this->modelNamespace,
                        '--resource' => true,
                    ]);

                    $this->info('Controller created: ' . $this->controllerName . '.php');

                    $data['artefact'] = 'Controller';
                    $data['location'] = $this->controllerName . '.php';
                    array_push($this->tableContents, $data);

                    break;

                default:
                    $this->callSilent('make:controller', [
                        'name' => $this->namespace . '/' . $this->controllerName,
                        '--model' => $this->modelNamespace,
                        '--resource' => true,
                    ]);

                    $data['artefact'] = 'Controller';
                    $data['location'] = $this->namespace . '/' . $this->controllerName . '.php';
                    array_push($this->tableContents, $data);

                    break;
            }

            $this->info($data['artefact'] . ' created.');
        }
    }

    /**
     * Compile the Controller stub
     *
     * @param String $path
     * @return void
     */
    protected function compileControllerStub($path, $namespace)
    {
        $stub = $this->files->get(__DIR__ . '/stubs/controller.stub');

        $stub = str_replace('{{classNamespace}}', $namespace, $stub);
        $stub = str_replace('{{modelName}}', $this->modelName, $stub);
        $stub = str_replace('{{className}}', $this->controllerName, $stub);

        $stub = str_replace('{{requestStoreNamespace}}', $namespace, $stub);
        $stub = str_replace('{{requestStoreName}}', $this->requestStoreName, $stub);

        $stub = str_replace('{{requestUpdateNamespace}}', $namespace, $stub);
        $stub = str_replace('{{requestUpdateName}}', $this->requestUpdateName, $stub);

        $stub = str_replace('{{modelNameVariabel}}', camel_case($this->entity), $stub);

        $this->files->put($path, $stub);

        return $this;
    }

    /**
     * Run make:factory command with defined entity name and/or namespace
     *
     * @return void
     */
    protected function makeFactory()
    {
        if ($this->option('factory')) {

            $factory = $this->entity . 'Factory';

            $this->callSilent('make:factory', [
                'name' => $factory,
                '--model' => $this->modelNamespace,
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
        if ($this->option('policy')) {

            $policy = $this->entity . 'Policy';

            $this->callSilent('make:policy', [
                'name' => $policy,
                '--model' => $this->modelNamespace,
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

        if ($this->option('seeder')) {

            $seederTable = ($this->pluralizedEntity) . 'TableSeeder';

            $this->callSilent('make:seeder', ['name' => $seederTable]);

            $data['artefact'] = 'Seeder: Table';
            $data['location'] = 'seeds/' . $seederTable . '.php';
            array_push($this->tableContents, $data);

            $this->info($data['artefact'] . ' created.');
        }

        /** Example data seeder */

        if ($this->option('example')) {

             $seederExample = ($this->pluralizedEntity);

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
        if ($this->option('test')) {

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

            $this->addToTable('Test: Unit', 'tests/Unit/' . $test . '.php');
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
        if ($this->option('request')) {

            array_push($this->additionalSteps, 'Use generated Requests for the Controller');
        }
        else if ($this->option('controller') ||
                ($this->option('controller') && $this->option('request'))) {

            array_push($this->additionalSteps, 'Define a route for the generated Controller');
        }

        if (in_array(true, $this->options(), true) === false) {

            $this->error('No files has been created.');
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
     * Add new row of data to output table
     *
     * @param String $artefact
     * @param String $location
     * @return void
     */
    protected function addToTable($artefact, $location)
    {
        $this->data['artefact'] = $artefact;
        $this->data['location'] = $location;

        array_push($this->tableContents, $this->data);
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
