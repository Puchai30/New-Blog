<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/app.css">
    <title>Blog</title>
</head>

<body>

   @foreach ($blogs as $blog)
   <h1><a href="blog/{{ $blog->slug }}">{{ $blog->title }}</a></h1>

   <div>
    <p>{{ $blog->intro }}</p>
   </div>

   @endforeach

</body>

</html>
