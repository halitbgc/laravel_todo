<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous"></script>
    <title>Show</title>
</head>
<body>
<a  href="{{ route('categories.index') }}" class="btn btn-dark">Back</a>
<div class="card" style="width: 18rem; background-color: {{$category['color']}}">
  <div class="card-body">
    <h5 class="card-]">{{$category['name']}}</h5>
    <p class="card-text">{{$category['description']}}</p>
    <button type="button" class="btn btn-primary">Edit</button>
    <form action="{{ route('categories.destroy', $category['id']) }}" method="POST" style="display:inline;">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger">Delete</button>
    </form>
  </div>
</div>
</body>
</html>