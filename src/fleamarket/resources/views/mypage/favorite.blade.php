@extends('layout')

@section('content')
<h1 class="text-center mb-3">お気に入り一覧</h1>
<div class="container">
  <div class="row">
    @foreach($favorite_products as $favorite_product)
    <div class="col-sm-6 col-md-3 mt-3">
      <div class="card" style="width: 18rem;">
      <img src="{{ asset('storage/img/' . $favorite_product->item_image) }}" style="width: 300px; height:300px;" class="card-img-top" alt="...">
      <div class="card-body">
        <h5 class="card-title">{{$favorite_product->title}}</h5>
        <p class="card-text text-truncate">{{$favorite_product->content}}</p>
        <div class="d-flex justify-content-around">
          <div>
            <a href="{{ route('productlist.disp', ['id' => $favorite_product->items_id]) }}" class="btn btn-primary">商品詳細</a>
          </div>
          <div>
            <form action="{{route('mypage.favorite')}}" method="post">
              @method('DELETE')
              @csrf
            <input type="hidden" name="items_id" value="{{$favorite_product->items_id}}">
            <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
            <button type="submit"class="btn btn-primary">
              お気に入り解除
            </button>
          </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  @endforeach
</div>
@endsection