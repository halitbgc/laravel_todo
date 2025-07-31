<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous"></script>
    <title>Document</title>
</head>
<body>
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
</body>
</html>