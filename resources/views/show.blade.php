<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>{{ $post->title }}</title>
</head>
<body>
    @markdown
        {!! $post->body !!}
    @endmarkdown
</body>
</html>
