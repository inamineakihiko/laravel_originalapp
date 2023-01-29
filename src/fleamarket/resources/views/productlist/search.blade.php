@extends('layout')

@section('content')
    <div class="container" style="width:600px;">
      <div class="row">
        <div class="col">
          <form action="{{route('productlist.search')}}" method="post">
            @csrf
            <div class="mt-5">
              <label class="form-label">商品検索</label>
              <input class="form-control" placeholder="キーワードで商品を検索してみて下さい" name="keyword" value="">
            </div>
            <div class="d-flex justify-content-end">
              <button type="submit" class="btn btn-primary mt-3">検索</button>
            </div>
          </form>
        </div>
      </div>
    </div>
    <div class="container">
      <div class="row">
        @foreach($products as $product)
          <div class="col-sm-6 col-md-3 mt-3">
            <div class="card" style="width: 18rem;">
              <img src="{{ asset('storage/img/' . $product->item_image) }}" class="card-img-top" alt="...">
              <div class="card-body">
                <h5 class="card-title">{{$product->title}}</h5>
                <p class="card-text text-truncate">{{$product->content}}</p>
                <div class="d-flex justify-content-around">
                  <div>
                    <a href="{{ route('productlist.disp', ['id' => $product->id]) }}" class="btn btn-primary">商品詳細</a>
                  </div>
                  <div>
                      <input type="hidden" name="items_id" value="{{$product->id}}">
                      <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                      <button type="submit" class="btn btn-primary">
                      お気に入り
                    </button>
                  </div>
              </div>
            </div>
          </div>
        </div>
        @endforeach
      </div>
    </div>
@endsection