@extends('layout')

@section('content')
    <div class="container">
      <div class="row">
        @foreach($disp_products as $disp_product)
        <div class="col-sm-6">
          <img src="{{ asset('storage/img/' . $disp_product->item_image) }}" class="img-fluid img-thumbnail"style="width:600px;height:600px;" alt="...">
        </div>
        <div class="col-sm-6">
          <h2>{{$disp_product->title}}</h2>
          <span class="text-danger fs-3">￥{{$disp_product->prices}}
          </span>
          <span class="text-danger fs-6 text text-dark">(税込)送料込み
          </span>
          <!-- Button trigger modal -->
          <button type="button" class="btn btn-danger mt-3 mb-5" data-bs-toggle="modal" data-bs-target="#exampleModal"
          style="width:600px;">
            購入手続きに進む
          </button>
          <!-- Modal -->
          <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">{{$disp_product->title}}</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  本当に購入いたしますか？
                </div>
                <form action="{{route('mypage.purchase')}}" method="post">
                  @csrf
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">購入しない</button>
                  <button type="submit" class="btn btn-primary">購入する！</button>
                  <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                  <input type="hidden" name="items_id" value="{{$disp_product->id}}">
                </div>
              </form>
              </div>
            </div>
          </div>
          <h5>商品の説明</h5>
          <p>{{$disp_product->content}}</p>
          <h5>商品の情報</h5>
          <div class="container">
            <div class="row">
              <div class="w-50">
                <span>商品の状態</span>
                <span>:{{$disp_product->status}}</span>
              </div>
              <div>
                <span>配送料</span>
                <span>：{{$disp_product->postage}}</span>
              </div>
              <div>
                <span>配送方法</span>
                <span>：{{$disp_product->shippingmethod}}</span>
              </div>
              <div>
                <span>発送元の地域</span>
                <span>：{{$disp_product->sender}}</span>
              </div>
              <div>
                <span>発送までの日数</span>
                <span>：{{$disp_product->deliverytime}}</span>
              </div>
              @endforeach
            </div>
          </div>
            <div class="d-flex justify-content-end">
              <a href="{{ route('productlist.contact', ['id' => $disp_product->id]) }}" class="btn btn-primary">商品について質問する</a>
            </div>
        </div>
      </div>

    @endsection

