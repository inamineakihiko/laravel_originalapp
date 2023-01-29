@extends('layout')

@section('content')
<h1 class="text-center mb-3">商品登録履歴</h1>
<div class="container">
  <div class="row">
    @foreach($register_products as $register_product)
    <div class="col-sm-6 col-md-3 mt-3">
      <div class="card" style="width: 18rem;">
      <img src="{{ asset('storage/img/' . $register_product->item_image) }}" class="card-img-top" alt="...">
      <div class="card-body">
        <h5 class="card-title">{{$register_product->title}}</h5>
        <p class="card-text text-truncate">{{$register_product->content}}</p>
        <div class="d-flex justify-content-around">
          <div>
            <a href="{{ route('productlist.disp', ['id' => $register_product->id]) }}" class="btn btn-primary">商品詳細</a>
          </div>
          <a href="{{ route('item.edit', ['id' => $register_product->id]) }}" class="btn btn-primary">編集</a>
          <div>
          </div>
        </div>
      </div>
    </div>
  </div>
  @endforeach
</div>
@endsection