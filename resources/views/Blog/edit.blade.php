<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>My Blog</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <style>
    body {
      background-color: #f4f4f4;
    }
    .container {
      max-width: 800px;
      margin: 30px auto;
      padding: 20px;
      background-color: #fff;
      border-radius: 5px;
      box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
    }
  </style>
</head>
<body>
  <div class="container">
    <h2>Edit Post</h2>
    <form enctype="multipart/form-data" method="POST" action="{{url('user/save-post')}}">
      @csrf
      <input type="hidden" name="created_by" value="{{Auth::user()->name}}">
      <form enctype="multipart/form-data">
      <div class="form-group">
        <label for="title">Title:</label>
        <input type="text" class="form-control" id="title" name="title" required>
      </div>
      <div class="form-group">
        <label for="content">Content:</label>
        <textarea class="form-control" id="content" name="content" rows="5" required></textarea>
      </div>
      <div class="form-group">
        <label for="image">Image:(Optional)</label>
        <input type="file" class="form-control-file" id="image" name="image">
      </div>
      <button type="submit" class="btn btn-primary">Submit</button>
    </form>
  </div>