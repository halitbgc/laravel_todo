@extends('layouts.app')

@section('content')

<h1>EDIT TODO</h1>
    <a href="{{ route('todos.index') }}" class="btn btn-dark">Back</a>
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <form action="{{ route('todos.update', $todo['id']) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-control" id="title" name="title" value="{{ $todo['title'] }}" required>
        </div>
        <div class="mb-3">
            <label for="category_id" class="form-label">Category</label>
            <select class="form-select" id="category_id" name="category_id" required>
            <option value="" disabled>Select a category</option>
            @foreach ($categories as $category)
                <option value="{{ $category->id }}" {{ $category->id == $todo['category_id'] ? 'selected' : '' }}>{{ $category->name }}</option>
            @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea class="form-control" id="description" name="description" rows="3">{{ $todo['description'] }}</textarea>
        </div>        

        <div class="mb-3">
            <label for="status" class="form-label">Status</label>
            <select class="form-select" id="status" name="status" required>
            <option value="" disabled>Select a status</option>
            @foreach ($statuses as $status)
            <option value="{{ $status }}" {{ $status === $todo['status'] ? 'selected' : '' }}>{{ $status }}</option>
            @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="priority" class="form-label">Priority</label>
            <select class="form-select" id="priority" name="priority" required>
            <option value="" disabled>Select a priority</option>
            @foreach ($priorities as $priority)
                <option value="{{ $priority }}" {{ $priority == $todo['priority'] ? 'selected' : '' }}>{{ $priority }}</option>
            @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="due_date" class="form-label">Due Date</label>
            <input type="date" class="form-control" id="due_date" name="due_date" value="{{ $todo['due_date'] }}" required>
        </div>

        <div class="mb-3">
            <label for="is_starred" class="form-label">Star</label>
            <input type="hidden" name="is_starred" value="0">
            <input type="checkbox" class="form-check-input" id="is_starred" name="is_starred" value="1" {{ $todo['is_starred'] == 1 ? 'checked' : '' }}>
        </div>
        
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection