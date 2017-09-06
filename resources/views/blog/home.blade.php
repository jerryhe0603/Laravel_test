{{--
@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
  <div class="col-md-8 col-md-offset-2">
  <div class="panel panel-default">
  <div class="panel-heading">Dashboard</div>

  <div class="panel-body">
  You are logged in!
  </div>
  </div>
  </div>
  </div>
</div>
@endsection --}}

@extends('layouts.app')

@section('content')

{{-- 網誌寫法 --}}
<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>{{ $title }}</title>
</head>
<body>
<div>
  <a href="./blog/create">新增</a>
  </div>
<center>
  <h1>{{ $title }}</h1>
  
  @if (isset($posts))
  <ol>
  @foreach ($posts as $post)

    <div>
        {{ link_to('blog/'.$post->id, $post->title) }}
        ({{ link_to('blog/'.$post->id.'/edit', '編輯') }})
        ({{ link_to('blog/'.$post->id.'/delete', '刪除') }})
    </div>

  {{--<li>
  <a href="./blog/{{ $post->id }}">{{$post->title}}</a>
  (<a href="./blog/{{ $post->id }}/edit">編輯</a>)
  (<a href="./blog/{{ $post->id }}/delete">刪除</a>)
  </li> --}}

  <br>
  {{-- Form::open(['url'=>'blog/'.$post->id, 'method'=>'delete']) }}
  <button type="submit">刪除</button>
  {{ Form::close() --}}

  @endforeach
  </ol>
  {{ $posts->links() }}
  
  @endif
</body>
</html>
@endsection