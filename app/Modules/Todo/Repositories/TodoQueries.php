<?php

declare(strict_types=1);

namespace App\Modules\Todo\Repositories;

use App\Modules\Todo\Models\Todo;
use Illuminate\Support\Collection;

interface TodoQueries
{
    /**
     * @return Collection<int, Todo>
     */
    public function all(): Collection;

    public function find(int $id): ?Todo;
}
