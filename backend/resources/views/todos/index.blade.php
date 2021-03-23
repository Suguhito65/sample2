<!doctype html>
<html lang="ja">
  <head>
    <title>Todoリスト - トップページ</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  </head>
  <body>
    <div class="container" style="margin-top:50px;">
      <h1>Todoリスト追加</h1>
      <form action="{{ url('/todos')}}" method="post">
        {{csrf_field()}}
        <div class="form-group">
          <label >やることを追加してください</label>
          <input type="text" name="body"class="form-control" style="max-width:1000px;">
        </div>
        <button type="submit" class="btn btn-primary">追加する</button>
      </form>
      <h1 style="margin-top:50px;">Todoリスト</h1>
      <!-- フラッシュメッセージ -->
      @if (session('err_msg'))
        <p class="text-danger">
          {{ session('err_msg') }}
        </p>
      @endif
      <table class="table table-striped" style="max-width:1000px; margin-top:20px;">
        <tbody>
          @foreach ($todos as $todo)
            <tr>
              <td>{{$todo->body}}</td>
              <td>
                <form action="{{ action('TodosController@edit', $todo) }}" method="post">
                  {{ csrf_field() }}
                  {{ method_field('get') }}
                  <button type="submit" class="btn btn-success">編集</button>
                </form>
              </td>
              <!-- 削除ボタン -->
              <!-- <td>
                <form action="{{url('/todos', $todo->id)}}" method="post">
                  {{ csrf_field() }}
                  {{ method_field('delete') }}
                  <button type="submit" class="delete btn btn-danger">削除</button>
                </form>
              </td> -->
              <!-- 削除した際にポップ画面で確認をする -->
              <td>
                <a class="delete btn btn-danger" data-id="{{ $todo->id }}" href="#">削除</a>
                <form method="post" action="{{ url('/todos', $todo->id) }}" id="form_{{ $todo->id}}">
                  {{ csrf_field() }}
                  {{ method_field('delete') }}
                </form>
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>
    <!-- オプションのJavaScript -->
    <!-- 最初にjQuery、次にPopper.js、次にBootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script>
      (function() {
        'use strict';

        var cmds = document.getElementsByClassName('delete');
        var i;

        for (i = 0; i < cmds.length; i++) {
          cmds[i].addEventListener('click', function(e) {
            e.preventDefault();
            if (confirm('are you sure?')) {
              document.getElementById('form_' + this.dataset.id).submit();
            }
          });
        }

      })();
    </script>
  </body>
</html>