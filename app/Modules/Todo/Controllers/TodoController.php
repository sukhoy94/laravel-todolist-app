<?php

declare(strict_types=1);

namespace App\Modules\Todo\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\Todo\Models\Todo;
use App\Modules\Todo\Services\TodoService;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    public function __construct(private readonly TodoService $todoService)
    {
    }

    public function index(): Factory|View|Application
    {
        $todos = $this->todoService->getAllTodos();

        return view('todos.index', compact('todos'));
    }

    public function create(): Factory|View|Application
    {
        return view('todos.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $this->todoService->createTodo([
            'title' => $validatedData['title'],
            'description' => $validatedData['description'],
            'is_completed' => false,
        ]);

        return redirect()->route('todos.index')->with('success', 'Todo created successfully.');
    }

    public function edit(Todo $todo): Factory|View|Application
    {
        return view('todos.edit', compact('todo'));
    }

    public function update(Request $request, Todo $todo): RedirectResponse
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $this->todoService->updateTodo($todo, $request->all());

        return redirect()->route('todos.index')->with('success', 'Todo updated successfully.');
    }

    public function markAsComplete(Todo $todo): RedirectResponse
    {
        $this->todoService->markAsComplete($todo);

        return redirect()->route('todos.index')->with('success', 'Todo marked as completed.');
    }

    public function destroy(Todo $todo): RedirectResponse
    {
        $this->todoService->deleteTodo($todo);

        return redirect()->route('todos.index')->with('success', 'Todo deleted successfully.');
    }
}
