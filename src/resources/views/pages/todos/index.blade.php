@extends('layouts.app')
@section('content')
<h1>Todos</h1>
  <a href="{{route('todos.create')}}" class="btn btn-primary">Create Todo</a>
  <table class="table table-striped">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Title</th>
        <th scope="col">Category</th>
        <th scope="col">Status</th>
        <th scope="col">Prioity</th>
        <th scope="col">Due Date</th>
        <th scope="col">Completed At</th>
        <th scope="col">Is Starred</th>
        <th scope="col">Check</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($todos as $todo)
          <tr>
            <th scope="row">{{$todo['id']}}</th>
            <td><a href="{{ route('todos.show', $todo->id) }}" class="">{{$todo['title']}}</a></td>
            <td>{{$todo->category['name'] ?? 'No Category'}}</td>
            <td>{{$todo['status']}}</td>
            <td>{{$todo['priority']}}</td>
            <td>{{$todo['due_date']}}</td>
            <td>{{$todo['completed_at']}}</td>
            <td>{{$todo['is_starred'] ? 'Yes' : 'No'}}</td>
            <td>
              <form action="{{ route('todos.check', $todo['id']) }}" method="POST">
                @csrf
                @method('PUT')
                <input type="checkbox" name="check" {{ $todo['completed_at'] ? 'checked' : '' }} onchange="this.form.submit()">
              </form>
            </td>
          </tr>
      @endforeach
    </tbody>
  </table>
  {{ $todos->links('pagination::bootstrap-5') }}
@endsection