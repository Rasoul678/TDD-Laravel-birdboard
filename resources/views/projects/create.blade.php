<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>BirdBoard</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
</head>
<body>
    <form method="POST" action="/projects" class="container mt-4">
        @csrf
        <h1>Create a Project</h1>
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text"  name="title" id="title" placeholder="Title" class="form-control"/>
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <textarea name="description" id="description" placeholder="Description" class="form-control"></textarea>
        </div>
        <input type="submit" value="Create Project" class="btn btn-primary">
    </form>
</body>
</html>

