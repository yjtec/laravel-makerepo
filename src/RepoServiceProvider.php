<?php

namespace Yjtec\Repo;

use Illuminate\Support\ServiceProvider;

class RepoServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->commands([
                RepoiMakeCommand::class,
                RepoMakeCommand::class,
            ]);
        }
    }
}
