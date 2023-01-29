@extends('layout')

@section('content')
<div class="container text-center mt-3" style="width:1000px">
      <h3>管理者画面</h3>
      <div class="row mt-5">
        <div class="col">
          <table class="table">
            <thead>
              <tr>
                <th scope="col">ユーザーID</th>
                <th scope="col">ユーザー名</th>
                <th scope="col">メールアドレス</th>
                <th scope="col">ユーザー画像</th>
              </tr>
            </thead>
            <form action="{{route('/admin')}}" method="post">
              @csrf
            <tbody>
              @foreach($users as $user)
              <tr>
                <th scope="row">
                  <input class="form-check-input mx-3" type="radio" name="select_user" value=" {{$user->id}}" id="radio">
                  {{$user->id}}
                </th>
                <td>
                  <input type="name"name="name[{{$user->id}}]" class="form-control" value="{{$user->name}}" >
                </td>
                <td>
                  <input type="email"name="email[{{$user->id}}]" class="form-control" value="{{$user->email}}">
                </td>
                <td>
                  @if($user->image === null)
                  <img src="{{ asset('storage/icon_image/noimage.png') }}" class="img-fluid rounded-circle" style="width:50px"alt="...">
                  @else
                  <img src="{{ asset('storage/icon_image/' . $user->image) }}" class="img-fluid rounded-circle" style="width:50px"alt="...">
                  @endif
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
      <div class="d-flex justify-content-end">
        <button type="submit" class="btn btn-primary m-2" name="update">更新</button>
        <button type="submit" class="btn btn-primary m-2" name="delete">削除</button>
      </div>
    </form>
  </div>
    @endsection