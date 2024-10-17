<?php

declare(strict_types=1);

namespace App\Modules\Todo\Repositories\Eloquent;

use App\Modules\Todo\Models\Todo;
use App\Modules\Todo\Repositories\TodoCommands as TodoCommandsRepository;

class TodoCommands implements TodoCommandsRepository
{
    /**
     * @param array{title: string, description?: string, is_completed: bool} $data
     *      - title: The title of the todo (required).
     *      - description: The description of the todo (optional).
     * @return Todo
     */
    public function create(array $data): Todo
    {
        return Todo::create($data);
    }

    public function update(Todo $todo, array $data): Todo
    {
        $todo->update($data);

        return $todo;
    }

    public function delete(Todo $todo): void
    {
        $todo->delete();
    }
}
