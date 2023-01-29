@extends('layout')

@section('content')
    <div class="container text-center mt-5" style="width:600px;">
      <div class="row">
        <div class="col">
        @if($errors->any())
              <div class="alert alert-danger">
                @foreach($errors->all() as $message)
                  <p>{{ $message }}</p>
                @endforeach
              </div>
            @endif
          <form method="POST" action="{{ route('register') }}">
            @csrf
            <div class="form-group mb-3">
              <input id="name" type="text" class="form-control" placeholder="ユーザー名" name="name" value="{{ old('name') }}">
            </div>
            <div class="form-group mb-3">
              <input id="email" type="email" class="form-control" name="email" placeholder="name@example.com" value="{{ old('email') }}">
            </div>
            <div class="form-group mb-3">
              <input id="password" type="password" class="form-control" name="password"
              placeholder="パスワードを入力して下さい">
            </div>
            <div class="form-group mb-3">
                <input id="password-confirm" type="password" class="form-control" name="password_confirmation"  placeholder="もう一度パスワードを入力して下さい"
                >
              </div>
                <button type="submit" class="btn btn-primary w-100">
                  新規登録
                </button>
              </form>
            </div>
          </div>
        </div>
        @endsection