<!doctype html>
<html lang="ja">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>flea maraket</title>
  </head>
  <body>
    <div class="container text-center mt-3" style="width:600px">
    <div class="row">
      <div class="col">
        <form action="{{route('productregistration.test')}}" method="post">
          @csrf
          <div class="d-flex flex-wrap">
            <div>名前</div>
            <div class="w-100">
              <input type="name" name="name" class="form-control" placeholder="商品名を入力してください">
            </div>
            <div>email</div>
            <div class="w-100">
              <input type="email" name="email" class="form-control" placeholder="メアドを入れて">
            </div>
            <div>タイトル</div>
            <div class="w-100">
              <input type="text" name="title" class="form-control" placeholder="タイトルを入力してください">
            </div>
            <div>コメント</div>
            <div class="w-100">
              <input type="text" name="comment" class="form-control" placeholder="コメントを入力してください">
            </div>
            <button type="submit" class="btn btn-primary mt-5">送信</button>
          </form>
        </div>
      </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  </body>
</html>