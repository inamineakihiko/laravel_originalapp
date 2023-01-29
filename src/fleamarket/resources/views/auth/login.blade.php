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
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="form-group mb-3">
                    <input id="email" type="email" class="form-control " name="email" value="{{ old('email') }}"placeholder="メールアドレスを入力して下さい">
                </div>
                <div class="form-group mb-3">
                    <input id="password" type="password" class="form-control" name="password"placeholder="パスワードを入力して下さい">
                </div>
                <button type="submit" class="btn btn-primary w-100">
                    LOG IN
                </button>
                <a class="btn btn-link" href="{{ route('password.request') }}">
                    パスワードを忘れた方はこちらを押して下さい！
                </a>
            </form>
        </div>
    </div>
</div>
@endsection
