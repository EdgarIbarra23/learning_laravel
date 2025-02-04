<?php

namespace App\Providers;

use Illuminate\Support\Facades\File;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        $migrationPaths = collect(File::allFiles(database_path('migrations')))
            ->map(fn ($file) => $file->getPath())
            ->unique()
            ->toArray();

        $this->loadMigrationsFrom($migrationPaths);
    }
}
