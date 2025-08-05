@extends('layouts.app')

@section('content')

<h1>EDIT CATEGORY</h1>
    <a href="{{ route('categories.index') }}" class="btn btn-dark">Back</a>
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <form action="{{ route('categories.update', $category['id']) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="name">Name</label>
            <input type="text" name="name" id="name" value="{{ old('name', $category->name) }}" class="form-control">
            @error('name')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="color" class="form-label">Color</label>
            <input type="text" class="form-control" name="color" id="color" value="{{ old('color', $category->color) }}">
            @error('color')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        <div class="mb-3">
            <label for="description">Description</label>
        <textarea name="description" id="description" class="form-control">{{ old('description', $category->description) }}</textarea>
            @error('description')
                <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
@endsection