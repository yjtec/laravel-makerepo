<?php

namespace Yjtec\Repo;
use Illuminate\Support\Str;
use Illuminate\Console\GeneratorCommand;
use Symfony\Component\Console\Input\InputOption;

class RepoiMakeCommand extends GeneratorCommand
{
    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'make:repoi';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new repository interface class';

    /**
     * The type of class being generated.
     *
     * @var string
     */
    protected $type = 'Interface';

    public function handle()
    {
        if (parent::handle() === false) {
            return;
        }
        if($this->option('repo')){ 
            $this->createRepo();
        }
    }
    /**
     * Create a repository for the interface.
     *
     * @return void
     */
    protected function createRepo()
    {
        $this->call('make:repo', [
            'name' => $this->getTrueName().'Repository'
        ]);
    }
    private function getTrueName()
    {
        $name = explode('/', $this->getNameInput('name'));
        return str_replace($this->type, '', $name[count($name) - 1]);
    }
    /**
     * Get the stub file for the generator.
     *
     * @return string
     */
    protected function getStub()
    {
        return __DIR__ . '/stubs/interface.stub';
    }

    /**
     * Get the default namespace for the class.
     *
     * @param  string  $rootNamespace
     * @return string
     */
    protected function getDefaultNamespace($rootNamespace)
    {
        return $rootNamespace . '\Repositories\Contracts';
    }

    /**
     * Get the console command options.
     *
     * @return array
     */
    protected function getOptions()
    {
        return [
            ['repo', 'r', InputOption::VALUE_NONE, 'Injection  repository.'],
        ];
    }
}
