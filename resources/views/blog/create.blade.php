<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>{{ $title }}</title>
</head>
<body>
    <h1>{{ $title }}</h1>
    {{Form::open(['url'=>'blog', 'method'=>'post'])}}
    {{Form::label('title', '標題')}}<br>
    {{Form::text('title')}}<br>
        @if ($errors->has('title'))
            <div style="color:red;">{{ $errors->first('title') }}</div>
        @endif

    {{Form::label('content', '內容')}}<br>
    {{Form::textarea('content')}}<br>
        @if ($errors->has('content'))
            <div style="color:red;">{{ $errors->first('content') }}</div>
        @endif
    {{Form::submit('發表文章')}}
    {{Form::close()}}
</body>
</html>