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
    protected $modelPath;
    protected $modelNamespace;
    protected $controllerName;
    protected $pluralizedEntity;
    protected $requestStoreName;
    protected $requestUpdateName;
    protected $additionalSteps  = [];
    protected $tableContents    = [];
    protected $tableHeaders     = ['Artefact', 'Location'];

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'memfis:entity
                            {name : Name of the entity, eg: Post, Product, Employee}
                            {--namespace=Both : eg: Both | None | [your-choice]}
                            {--a|all=true : Generate an entity\'s and its all artefacts}
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

        $this->entity    = $this->argument('name');
        $this->namespace = $this->option('namespace');

        switch ($this->checkExistingModel()) {
            case 'Abort':
                $this->line('Aborted.');
                $this->info('');

                break;

            case 'Use existing model':
                $this->info('Model: use existing.');

                $this->makeMigration();
                $this->makeRequest();
                $this->makeController();
                $this->makeFactory();
                $this->makePolicy();
                $this->makeSeeder();
                $this->makeTest();

                $this->printReport();
                $this->printAdditionalSteps();

                break;

            case 'Overwrite existing model':

            default:
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

                break;
        }
    }

    protected function checkExistingModel()
    {
        $modelChoice = '';
        $this->modelName = $this->entity;
        $this->modelNamespace = 'Models/' . $this->modelName;

        if ($this->files->exists(
            $this->modelPath = base_path() . '/app/' . $this->modelNamespace . '.php')
        ) {
            $this->error('Model already exists: ' . $this->modelNamespace . '.php');

            $modelChoice = $this->choice('What should we do?', [
                'Overwrite existing model',
                'Use existing model',
                'Abort'
            ]);
        }

        return $modelChoice;
    }

    /**
     * Run make:model command with defined entity name and/or namespace
     *
     * @return void
     */
    protected function makeModel()
    {
        $this->compileModelStub($this->modelPath);

        $this->addToTable('Model', $this->modelNamespace . '.php');

        $this->info($this->data['artefact'] . ' created.');
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
                'name' => $migration,
                '--create' => strtolower($this->pluralizedEntity),
            ]);

            $this->addToTable('Migration', $migration . '.php');

            $this->info($this->data['artefact'] . ' created.');
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
                    $this->callSilent('make:request', [
                        'name' => 'Admin/' . $this->requestStoreName
                    ]);

                    $this->addToTable('Form Request', 'Admin/' . $this->requestStoreName . '.php');

                    $this->callSilent('make:request', [
                        'name' => 'Admin/' . $this->requestUpdateName
                    ]);

                    $this->addToTable('Form Request', 'Admin/' . $this->requestUpdateName . '.php');

                    $this->callSilent('make:request', [
                        'name' => 'Frontend/' . $this->requestStoreName
                    ]);

                    $this->addToTable('Form Request', 'Frontend/' . $this->requestStoreName . '.php');

                    $this->callSilent('make:request', [
                        'name' => 'Frontend/' . $this->requestUpdateName
                    ]);

                    $this->addToTable('Form Request', 'Frontend/' . $this->requestUpdateName . '.php');

                    break;

                case 'none':
                    $this->callSilent('make:request', [
                        'name' => $this->requestStoreName
                    ]);

                    $this->addToTable('Form Request', $this->requestStoreName . '.php');

                    $this->callSilent('make:request', [
                        'name' => $this->requestUpdateName
                    ]);

                    $this->addToTable('Form Request', $this->requestUpdateName . '.php');

                    break;

                default:
                    $this->callSilent('make:request', [
                        'name' => $this->namespace . '/' . $this->requestStoreName
                    ]);

                    $this->addToTable('Form Request', $this->namespace . '/' . $this->requestStoreName . '.php');

                    $this->callSilent('make:request', [
                        'name' => $this->namespace . '/' . $this->requestUpdateName
                    ]);

                    $this->addToTable('Form Request', $this->namespace . '/' . $this->requestUpdateName . '.php');

                    break;
            }

            $this->info($this->data['artefact'] . ' created.');
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
                    /** Admin's Controller */

                    if ($this->files->exists(
                            $path = base_path() . '/app/Http/Controllers/Admin/' . $this->controllerName . '.php')
                    ) {
                        $this->input->setOption('controller', false);

                        $this->error('Controller: use existing: Admin/' . $this->controllerName . '.php');
                    }
                    else {
                        $this->compileControllerStub($path, 'Admin');

                        $this->addToTable('Controller', 'Admin/' . $this->controllerName . '.php');
                    }

                    /** Frontend's Controller */

                    if ($this->files->exists(
                        $path = base_path() . '/app/Http/Controllers/Frontend/' . $this->controllerName . '.php')
                    ) {
                        $this->input->setOption('controller', false);

                        $this->error('Controller: use existing: Frontend/' . $this->controllerName . '.php');
                    }
                    else {
                        $this->compileControllerStub($path, 'Frontend');

                        $this->addToTable('Controller', 'Frontend/' . $this->controllerName . '.php');
                    }

                    break;

                case 'none':
                    if ($this->files->exists(
                            $path = base_path() . '/app/Http/Controllers/' . $this->controllerName . '.php')
                    ) {
                        $this->input->setOption('controller', false);

                        return $this->error('Controller: use existing: ' . $this->controllerName . '.php');
                    }

                    $this->compileControllerStub($path);

                    $this->addToTable('Controller', $this->controllerName . '.php');

                    break;

                default:
                    if ($this->files->exists(
                        $path = base_path() . '/app/Http/Controllers/' . $this->namespace .'/' . $this->controllerName . '.php')
                    ) {
                        $this->input->setOption('controller', false);

                        return $this->error('Controller: use existing: ' . $this->namespace .'/' . $this->controllerName . '.php');
                    }

                    $this->compileControllerStub($path, $this->namespace);

                    $this->addToTable('Controller', $this->namespace . '/' . $this->controllerName . '.php');

                    break;
            }

            $this->info($this->data['artefact'] . ' created.');
        }
    }

    /**
     * Compile the Controller stub
     *
     * @param String $path
     * @return void
     */
    protected function compileControllerStub($path, $namespace = '')
    {
        if ($namespace) {
            $stub = $this->files->get(__DIR__ . '/stubs/controller.stub');
        }
        else {
            $stub = $this->files->get(__DIR__ . '/stubs/controller.none.stub');
        }

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

            if ($this->files->exists(
                $path = base_path() . '/database/factories/' . $factory . '.php')
            ) {
                $this->input->setOption('factory', false);

                return $this->error('Model Factory: use existing: ' . $factory . '.php');
            }

            $this->compileFactoryStub($path);

            $this->addToTable('Model Factory', $factory . '.php');

            $this->info($this->data['artefact'] . ' created.');
        }
    }

    /**
     * Compile the Factory stub
     *
     * @param String $path
     * @return void
     */
    protected function compileFactoryStub($path)
    {
        $stub = $this->files->get(__DIR__ . '/stubs/model.factory.stub');

        $stub = str_replace('{{modelName}}', $this->modelName, $stub);

        $this->files->put($path, $stub);

        return $this;
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

            $this->addToTable('Policy', $policy . '.php');

            $this->info($this->data['artefact'] . ' created.');

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

            $this->callSilent('make:seeder', [
                'name' => $seederTable
            ]);

            $this->addToTable('Table Seeder', 'database/seeds/' . $seederTable . '.php');

            $this->info($this->data['artefact'] . ' created.');
        }

        /** Example data seeder */

        if ($this->option('example')) {

            $seederExample = $this->pluralizedEntity;

            if ($this->files->exists(
                $path = base_path() . '/database/seeds/examples/' . $seederExample . '.php')
            ) {
                $this->input->setOption('example', false);

                return $this->error('Example Seeder: use existing: ' . $seederExample . '.php');
            }

            $this->compileExampleSeederStub($path);

            $this->addToTable('Example Seeder', 'database/seeds/examples/' . $seederExample . '.php');

            $this->info($this->data['artefact'] . ' created.');
        }
    }

    /**
     * Compile the example data Seeder stub
     *
     * @param String $path
     * @return void
     */
    protected function compileExampleSeederStub($path)
    {
        $stub = $this->files->get(__DIR__ . '/stubs/seeder.example.stub');

        $stub = str_replace('{{modelName}}', $this->modelName, $stub);
        $stub = str_replace('{{className}}', $this->pluralizedEntity, $stub);

        $this->files->put($path, $stub);

        return $this;
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

            $this->callSilent('make:test', [
                'name' => $test
            ]);

            $this->addToTable('Test: Feature', 'tests/Feature/' . $test . '.php');

            $this->info($this->data['artefact'] . ' created.');

            /** Unit test */

            $this->callSilent('make:test', [
                'name' => $test,
                '--unit' => true,
            ]);

            $this->addToTable('Test: Unit', 'tests/Unit/' . $test . '.php');

            $this->info($this->data['artefact'] . ' created.');
        }
    }

    /**
     * Print the whole command result / report
     *
     * @return void
     */
    protected function printReport()
    {
        if ($this->option('controller') ||
           ($this->option('controller') && $this->option('request'))) {

            array_push($this->additionalSteps, 'Define a route for the generated Controller');
        }
        else if ($this->option('request')) {

            array_push($this->additionalSteps, 'Use generated Requests for the Controller');
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
        $this->line('"MeMFIS: Entity" artisan command');
        $this->line('version 1.0 by @rkukuh');
        $this->line('');
    }
}
