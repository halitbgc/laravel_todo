@extends('layouts.app')

@section('content')
    <h1>Create</h1>
    <a  href="{{ route('todos.index') }}" class="btn btn-dark">Back</a>

    @if (session('success'))
        <div class="alert alert-success mt-3">
            {{ session('success') }}
        </div>
    @endif

        {{-- Genel hata bloğu --}}
        @if ($errors->any())
        <div class="alert alert-danger mt-3">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('todos.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-control" id="title" name="title" required>
        </div>
        <div class="mb-3">
            <label for="category_id" class="form-label">Category</label>
            <select class="form-select" id="category_id" name="category_id">
                <option value="" disabled selected>Select a category</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
        </div>        

        <div class="mb-3">
            <label for="status" class="form-label">Status</label>
            <select class="form-select" id="status" name="status" required>
                <option value="" disabled selected>Select a status</option>
                @foreach ($statuses as $status)
                    <option value="{{ $status }}">{{ $status }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="priority" class="form-label">Priority</label>
            <select class="form-select" id="priority" name="priority" required>
                <option value="" disabled selected>Select a priority</option>
                @foreach ($priorities as $priority)
                    <option value="{{ $priority }}">{{ $priority }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="due_date" class="form-label">Due Date</label>
            <input type="date" class="form-control" id="due_date" name="due_date" required>
        </div>
        <div class="mb-3">
            <label for="is_starred" class="form-label">Star</label>
            <input type="hidden" name="is_starred" value="0">
            <input type="checkbox" class="form-check-input" id="is_starred" name="is_starred" value="1">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection