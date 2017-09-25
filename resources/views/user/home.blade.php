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
  {{--<a href="./user/create">新增</a> --}}
  {{-- <a href="{{ route('create') }}">新增</a>--}}
  <a href="{{ route('create') }}">新增</a>
  </div>
<center>
  <h1>{{ $title }}</h1>
  
  @if (isset($posts))
  <ol>
 <table border="1">
    <th>標題</th>
    <th>狀態</th>
 
    @foreach ($posts as $post)
    <tr>
      <td>
        {{ link_to('user/'.$post->id, $post->name) }}
      </td>
      <td>
        ({{ link_to('user/'.$post->id.'/edit', '編輯') }})
        ({{ link_to('user/'.$post->id.'/delete', '刪除') }})
      </td>
    </tr>
      {{--
      <div>
          {{ link_to('user/'.$post->id, $post->name) }}
          ({{ link_to('user/'.$post->id.'/edit', '編輯') }})
          ({{ link_to('user/'.$post->id.'/delete', '刪除') }})
      </div>
      --}}
    {{--<li>
    <a href="./user/{{ $post->id }}">{{$post->name}}</a>
    (<a href="./user/{{ $post->id }}/edit">編輯</a>)
    (<a href="./user/{{ $post->id }}/delete">刪除</a>)
    </li> --}}

    <br>
    {{-- Form::open(['url'=>'user/'.$post->id, 'method'=>'delete']) }}
    <button type="submit">刪除</button>
    {{ Form::close() --}}

    @endforeach
  </table>
  </ol>
  {{ $posts->links() }}
  
  @endif
</body>
</html>
@endsection