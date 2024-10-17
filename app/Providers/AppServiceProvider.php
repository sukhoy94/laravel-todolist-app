<?php

declare(strict_types=1);

namespace App\Providers;

use App\Modules\Todo\Repositories\Eloquent\TodoCommands;
use App\Modules\Todo\Repositories\Eloquent\TodoQueries;
use App\Modules\Todo\Repositories\TodoCommands as TodoCommandsRepository;
use App\Modules\Todo\Repositories\TodoQueries as TodoQueriesRepository;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(TodoCommandsRepository::class, TodoCommands::class);
        $this->app->bind(TodoQueriesRepository::class, TodoQueries::class);
    }

    public function boot(): void
    {
    }
}
