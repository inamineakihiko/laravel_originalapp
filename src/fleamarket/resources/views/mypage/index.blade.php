@extends('layout')

@section('content')
   <div class="container text-center mt-3" style="width:600px">
      <div class="row">
        <form action="{{route('mypage.index')}}"method="post" enctype="multipart/form-data">
          @csrf
        <div class="col">
        @if($errors->any())
              <div class="alert alert-danger">
                @foreach($errors->all() as $message)
                  <p>{{ $message }}</p>
                @endforeach
              </div>
            @endif
          <div class="d-flex flex-wrap">
            <h4>
              アイコン画像
            </h4>
            <div class="w-100">
              @if($users->image === null)
              <div class="d-flex justify-content-around">
                <img src="{{ asset('storage/icon_image/noimage.png') }}" class="img-fluid rounded-circle" style="width:100px" alt="...">
                @else
                <div class="d-flex justify-content-around">
                  <img src="{{ asset('storage/icon_image/' . $users->image) }}" class="img-fluid rounded-circle" style="width:100px" alt="...">
              @endif
                <div class="d-flex align-items-center">
                  <input type="file" class="form-control" name="image">
                </div>
              </div>
            </div>
          </div>
          <div class="d-flex flex-wrap mt-5">
            <span>ニックネーム</span>
            <div class="w-100">
              <input type="name" class="form-control" name="name" value="{{$users->name}}">
            </div>
            <span class="mt-2">email</span>
            <div class="w-100">
              <input type="email" class="form-control" name="email"  value="{{$users->email}}">
            </div>
          </div>
        </div>
        <div class="d-flex justify-content-end">
          <button type="submit" class="btn btn-primary mt-5">更新</button>
        </div>
      </form>
    </div>
  </div>

    <div class="container text-center mt-5">
      <div class="row">
        <div class="col">
          <a href="{{route('mypage.favorite')}}" class="link-secondary text-decoration-none">お気に入り</a>
        </div>
        <div class="col">
          <a href="{{route('mypage.purchase')}}" class="link-secondary text-decoration-none">購入履歴</a>
        </div>
        <div class="col">
          <a href="{{route('mypage.register')}}" class="link-secondary text-decoration-none">商品登録履歴</a>
        </div>
      </div>
    </div>
    @endsection
