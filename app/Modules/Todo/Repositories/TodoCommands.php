<?php

declare(strict_types=1);

namespace App\Modules\Todo\Repositories;

use App\Modules\Todo\Models\Todo;

interface TodoCommands
{
    /**
     * @param array{title: string, description?: string, is_completed: bool} $data
     * @return Todo
     */
    public function create(array $data): Todo;

    /**
     * @param Todo $todo
     * @param array{title?: string, description?: string, is_completed?: bool} $data
     *      - title: The title of the todo (required).
     *      - description: The description of the todo (optional).
     * @return Todo
     */
    public function update(Todo $todo, array $data): Todo;

    public function delete(Todo $todo): void;
}
