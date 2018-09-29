<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Modificar Tasques</title>
</head>
<body>
<form action="{{ route('tasks.update', $tasks) }}" method="post">

    {{ csrf_field() }}

    {{ method_field('PUT') }}

    <textarea name="title">{{ $tasks->name}}</textarea>

    <BR>
    <input type="submit">
</form>
</body>
</html>