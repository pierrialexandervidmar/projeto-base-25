<?php

declare(strict_types = 1);

namespace App\Providers;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\ServiceProvider;
use Opcodes\LogViewer\Facades\LogViewer;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    #[\Override]
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        $this->setupLogViewer();
        $this->configModels();
        $this->configCommands();
    }

    public function setupLogViewer(): void
    {
        LogViewer::auth(fn ($request) => $request->user()->is_admin);
    }

    public function configModels(): void
    {
        Model::unguard();
        Model::shouldBeStrict();
    }


    private function configCommands() 
    {
        DB::prohibitDestructiveCommands(
            app()->isProduction()
        );
    }
}
