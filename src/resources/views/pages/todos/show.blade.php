@extends('layouts.app')
@section('content')
  <h1>Todo Details</h1>
  <a  href="{{ route('todos.index') }}" class="btn btn-dark">Back</a>
  
  <div class="card" style="width: 18rem; background-color: {{$todo->category['color']}}">
    <div class="card-body">
      <h5 class="card-title">{{$todo['title']}}</h5>
      <h6 class="card-subtitle">{{$todo['description']}}</h6>
      <p class="card-text">{{ $todo->category['name'] ?? 'No Category' }}</p>
      <a href="{{ route('todos.edit', $todo['id']) }}" class="btn btn-primary">Edit</a>
      <form action="{{ route('todos.destroy', $todo['id']) }}" method="POST" style="display:inline;">
          @csrf
          @method('DELETE')
          <button type="submit" class="btn btn-danger">Delete</button>
      </form>
    </div>
  </div>
@endsection