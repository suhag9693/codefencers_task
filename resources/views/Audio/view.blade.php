<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>view</title>
</head>
<body>
    <h1>View Details</h1>

    <p><strong>Title:</strong> {{ $audioFile['title'] }}</p>
    <p><strong>Language:</strong> {{ $audioFile['language'] }}</p>
    <p><strong>File Path:</strong> <a href="{{ $audioFile['filepath'] }}">{{ $audioFile['filepath'] }}</a></p>
    <a href="{{route('index')}} "class="btn btn-primary">Back</a>
</body>
</html>
