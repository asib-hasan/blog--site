<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Blog Listing Page</title>
  <!-- Include Bootstrap CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <style>
    body {
      background-color: #f8f9fa;
    }

    .container {
      background-color: #ffffff;
      border-radius: 10px;
      padding: 20px;
      box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
      margin-top: 40px;
    }

    .blog-post {
      margin-bottom: 40px;
      padding: 20px;
      border-radius: 8px;
      background-color: #f8f9fa;
      box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }

    .blog-post h2 {
      color: #343a40;
    }

    .blog-post p {
      color: #6c757d;
    }

    .blog-post strong {
      color: #343a40;
    }
  </style>
</head>
<body>
  <div class="container">
    <a href="{{url('user/logout')}}">Logout</a>
    <div  style="text-align: right;">
        <h3>User: {{Auth::user()->name}}</h3>
        <a class="btn btn-primary" href="{{url('user/add-new-blog')}}">Add New Post</a>
    </div>

    <h3 class="mt-4 mb-4">Latest Blog Posts</h3>
    <form action="{{url('user/search-post')}}">
      <label>Search post by title</label>
      <input type="text" value="{{old('search')}}"  name="search">
      <button type="submit"  class="btn btn-primary">Search</button>
    </form>
    <!-- Example Blog Post 1 -->
    @foreach($data as $i)
      <div class="blog-post" action>
        <h3>{{$i->title}}</h3>
        <p>{{$i->content}}</p>
        <p><strong>Author:</strong> {{$i->created_by}}</p>
      </div>
    @endforeach
    <div style="padding: 10px;float: right">
        {!! $data->appends(Illuminate\Support\Facades\Request::except('page'))->links() !!}
    </div>
  </div>
  
  <!-- Include Bootstrap JS and any additional scripts -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
