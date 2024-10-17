@extends('app')

@section('content')
    <div class="container mt-5">
        <h1 class="mb-4">Edit Todo</h1>

        <form action="{{ route('todos.update', $todo->id) }}" method="POST">
            @csrf
            @method('PUT') <!-- This method spoofing is necessary for the PUT request -->

            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" name="title" id="title" class="form-control" value="{{ $todo->title }}" required>
            </div>

            <div class="form-group">
                <label for="description">Description</label>
                <textarea name="description" id="description" class="form-control" rows="3">{{ $todo->description }}</textarea>
            </div>

            <button type="submit" class="btn btn-primary">Update Todo</button>
            <a href="{{ route('todos.index') }}" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
@endsection
