@extends('app')

@section('content')
    <div class="container mt-5">
        <h1 class="mb-4">Todo List</h1>

        <a href="{{ route('todos.create') }}" class="btn btn-primary mb-3">Add Todo</a>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <div class="card">
            <div class="card-body">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse ($todos as $todo)
                        <tr>
                            <td>{{ $todo->title }}</td>
                            <td>{{ $todo->description ?? 'No description' }}</td>
                            <td>
                                <span class="badge {{ $todo->is_completed ? 'bg-success' : 'bg-danger' }}">
                                    {{ $todo->is_completed ? 'Completed' : 'Pending' }}
                                </span>
                                @if (!$todo->is_completed)
                                    <form action="{{ route('todos.complete', $todo->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('PUT')
                                        <button type="submit" class="btn btn-success btn-sm">Complete</button>
                                    </form>
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('todos.edit', $todo->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                <!-- Delete button -->
                                <form action="{{ route('todos.destroy', $todo->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this todo?');">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center">No todos found.</td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
