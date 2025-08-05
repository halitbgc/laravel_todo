@extends('layouts.app')

@section('content')
<h1>Login</h1>

<form action="{{ route('login.store') }}" method="POST">
    @csrf

    <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="email" name="email" id="email" class="form-control" required>
    </div>

    <div class="mb-3">
        <label for="password" class="form-label">Password</label>
        <input type="password" name="password" id="password" class="form-control" required>
    </div>

    <button type="submit" class="btn btn-primary">Login</button>

    <div class="mt-3">
        <a href="{{ route('register.create') }}">Don't have an account? Register here</a>
    </div>
</form>
@endsection