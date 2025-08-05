@extends('layouts.app')
@section('content')
<a  href="{{ route('categories.index') }}" class="btn btn-dark">Back</a>
<div class="card" style="width: 18rem; background-color: {{$category['color']}}">
  <div class="card-body">
    <h5 class="card-title">{{$category['name']}}</h5>
    <p class="card-text">{{$category['description']}}</p>
    <a href="{{ route('categories.edit', $category['id']) }}" class="btn btn-primary">Edit</a>
    <form action="{{ route('categories.destroy', $category['id']) }}" method="POST" style="display:inline;">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger">Delete</button>
    </form>
  </div>
</div>
@endsection
