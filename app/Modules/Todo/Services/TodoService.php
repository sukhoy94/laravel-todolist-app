<?php

declare(strict_types=1);

namespace App\Modules\Todo\Services;

use App\Modules\Todo\Models\Todo;
use App\Modules\Todo\Repositories\TodoCommands;
use App\Modules\Todo\Repositories\TodoQueries;
use Illuminate\Support\Collection;

class TodoService
{
    public function __construct(
        private readonly TodoQueries $todoQueries,
        private readonly TodoCommands $todoCommands
    ) {
    }

    /**
     * @return Collection<int, Todo>
     */
    public function getAllTodos(): Collection
    {
        return $this->todoQueries->all();
    }

    public function markAsComplete(Todo $todo): Todo
    {
        return $this->todoCommands->update($todo, ['is_completed' => true]);
    }

    /**
     * @param array{title: string, description?: string, is_completed: bool} $data
     *      - title: The title of the todo (required).
     *      - description: The description of the todo (optional).
     * @return Todo
     */
    public function createTodo(array $data): Todo
    {
        return $this->todoCommands->create($data);
    }

    /**
     * @param Todo $todo
     * @param array{title?: string, description?: string, is_completed?: bool} $data
     *      - title: The title of the todo (required).
     *      - description: The description of the todo (optional).
     * @return Todo
     */
    public function updateTodo(Todo $todo, array $data): Todo
    {
        return $this->todoCommands->update($todo, $data);
    }

    public function deleteTodo(Todo $todo): void
    {
        $this->todoCommands->delete($todo);
    }
}
