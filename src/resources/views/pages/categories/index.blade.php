@extends('layouts.app')
@section('content')
<h1>Categories</h1>
  <a href="{{route('categories.create')}}" class="btn btn-primary">Create Category</a>
  <table class="table table-striped">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Name</th>
        <th scope="col">Color</th>
        <th scope="col">Description</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($categories as $category)
          <tr>
            <th scope="row">{{$category['id']}}</th>
            <td><a href="{{ route('categories.show', $category->id) }}" class="">{{$category['name']}}</a></td>
            <td>{{$category['color']}}</td>
            <td>{{$category['description']}}</td>
          </tr>
      @endforeach
    </tbody>
  </table>
  {{ $categories->links('pagination::bootstrap-5') }}
@endsection