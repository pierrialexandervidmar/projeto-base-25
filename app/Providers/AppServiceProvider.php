<?php

declare(strict_types = 1);

namespace App\Providers;

use Carbon\CarbonImmutable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\URL;
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
        //$this->configUrls();
        $this->configDate();
    }

    public function setupLogViewer(): void
    {
        LogViewer::auth(fn ($request) => $request->user()->is_admin);
    }

    public function configModels(): void
    {   
        // Disable mass assignment protection
        Model::unguard();
        // Enable strict mode and prevent lazy loading in production
        Model::shouldBeStrict();
    }


    private function configCommands() 
    {
        DB::prohibitDestructiveCommands(
            app()->isProduction()
        );
    }

    private function configUrls(): void
    {
        URL::forceHttps();
    }

    private function configDate(): void
    {
        Date::use(CarbonImmutable::class);        
    }
}
