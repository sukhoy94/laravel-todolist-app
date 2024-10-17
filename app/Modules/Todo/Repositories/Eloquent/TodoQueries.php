<?php

declare(strict_types=1);

namespace App\Modules\Todo\Repositories\Eloquent;

use App\Modules\Todo\Models\Todo;
use App\Modules\Todo\Repositories\TodoQueries as TodoQueriesRepository;
use Illuminate\Support\Collection;

class TodoQueries implements TodoQueriesRepository
{
    public function all(): Collection
    {
        return Todo::all();
    }

    public function find(int $id): ?Todo
    {
        return Todo::find($id);
    }
}
