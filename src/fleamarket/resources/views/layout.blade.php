<!doctype html>
<html lang="ja">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>fleamarket</title>
  </head>
  <body style="padding-top: 5rem">
  <header>
    <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
      <div class="container-fluid">
        <a class="navbar-brand" href="#">簡単フリマ</a>
        @if(Auth::check())
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ms-auto mb-2 mb-lg-0 ">
            <div class="nav-item">
              <span class="nav-link text-dark">
                ようこそ!!{{ Auth::user()->name }}さん
              </span>
            </div>
            @if(Auth::user()->image === null)
            <div class="d-flex justify-content-around">
              <img src="{{ asset('storage/icon_image/noimage.png') }}" class="img-fluid rounded-circle" style="width:30px" alt="...">
            @else
              <div class="d-flex justify-content-around">
                <img src="{{ asset('storage/icon_image/'. Auth::user()->image) }}" class="img-fluid rounded-circle" style="width:30px" alt="...">
            @endif
            @if(Auth::user()->authority === '99')
            <li class="nav-item">
              <a class="nav-link" href="{{route('/admin')}}">管理画面</a>
            </li>
            @endif
            <li class="nav-item">
              <a class="nav-link" href="{{ route('productlist.index') }}">商品一覧</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ route('mypage.index')}}">マイページ</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{route('productlist.search')}}">商品検索</a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-danger" href="{{ route('item.register') }}">出品</a>
            </li>
            <li class="nav-item">
              <a href="#" id="logout" class="nav-link text-dark">ログアウト</a>
              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
              @csrf
            </form>
          </ul>
        </div>
        @else
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ms-auto mb-2 mb-lg-0 ">
            <li class="nav-item">
              <a class="nav-link" href="{{ route('login') }}">ログイン</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ route('register') }}">新規登録</a>
            </li>
          </ul>
        </div>
        @endif
      </div>
    </nav>
  </header>
    <main>
      @yield('content')
    </main>
    @if(Auth::check())
    <script>
    document.getElementById('logout').addEventListener('click', function(event) {
      event.preventDefault();
      document.getElementById('logout-form').submit();
    });
    </script>
    @endif
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
    var myModal = document.getElementById('myModal')
    var myInput = document.getElementById('myInput')

    myModal.addEventListener('shown.bs.modal', function () {
      myInput.focus()
    })

</body>
</html>