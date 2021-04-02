<!doctype html>
<html lang="ja">
  <head>
    <title>Todoリスト - 編集ページ</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  </head>
  <body>
    <div class="container" style="margin-top:50px;">
      <h1>Todoリスト更新</h1>
      <form action="{{ url('/todos',$todo->id) }}" method="post">
        {{csrf_field()}}
        {{ method_field('patch')}}
        <div class="form-group">
          <input type="text" name="body"class="form-control" value="{{ $todo->body }}" style="max-width:1000px;">
        </div>
        <button type="submit" class="btn btn-primary">更新する</button>
      </form>
    </div>
  </body>
</html>