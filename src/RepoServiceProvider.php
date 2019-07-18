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

        $this->makeInterface();
        
    }

    private function makeInterface(){

        $path = app_path('Repositories/Contracts');
        $files = scandir($path);
        //roleInterface.php
        foreach($files as $file){
            if(preg_match("/(.*?)Interface\.php/i", $file,$match)){
                $fileName = $match[1];
                $this->app->bind(
                    'App\Repositories\Contracts\\'.$fileName.'Interface',
                    'App\Repositories\Eloquent\\'.$fileName.'Repository'
                );
            }
        }
    }
}
