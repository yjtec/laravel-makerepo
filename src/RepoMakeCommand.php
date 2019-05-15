<?php
namespace Yjtec\Repo;

use Illuminate\Console\GeneratorCommand;
use Symfony\Component\Console\Input\InputOption;

class RepoMakeCommand extends GeneratorCommand
{
    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'make:repo';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new repository class';

    /**
     * The type of class being generated.
     *
     * @var string
     */
    protected $type = 'Repository';

    /**
     * Get the stub file for the generator.
     *
     * @return string
     */
    protected function getStub()
    {
        return __DIR__ . '/stubs/repository.stub';
    }

    /**
     * Get the default namespace for the class.
     *
     * @param  string  $rootNamespace
     * @return string
     */
    protected function getDefaultNamespace($rootNamespace)
    {
        return $rootNamespace . '\Repositories\Eloquent';
    }

    protected function replaceNamespace(&$stub, $name)
    {
        $stub = str_replace(
            ['RepositoryNamespace', 'ModelName','NameInterface'],
            [$this->getNamespace($name),$this->setModel(),$this->setInterface()],
            $stub
        );

        return $this;
    }

    private function setInterface(){
        if (!empty($this->option('interface'))) {
            return $this->option('interface').'Interface';
        } else {
            $name = explode('/', $this->getNameInput('name'));
            return str_replace('Repository', '', $name[count($name) - 1]).'Interface';
        }
    }
    private function setModel()
    {
        if (!empty($this->option('model'))) {
            return $this->option('model');
        } else {
            $name = explode('/', $this->getNameInput('name'));
            return str_replace('Repository', '', $name[count($name) - 1]);
        }
    }
    /**
     * Get the console command options.
     *
     * @return array
     */
    protected function getOptions()
    {
        return [
            ['model', 'm', InputOption::VALUE_OPTIONAL, 'Injection  model.'],
            ['interface','i',InputOption::VALUE_OPTIONAL, 'Injection  interface.']
        ];
    }
}
