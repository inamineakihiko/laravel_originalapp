@extends('layout')

@section('content')
    <div class="container text-center mt-3 bg-light ">
      <h3>商品についての問い合わせ</h3>
      <div class="row">
        <div class="col">
          @foreach($all_comments as $all_comment)
          <div class="d-flex justify-content-end mt-5">
            <div>
              <p>{{$all_comment->content}}</p>
              <div class="w-100 small">
                名前:{{$all_comment->name}}
              </div>
              <div class="w-100 small">
                日付:{{$all_comment->created_at}}
              </div>
            </div>
          </div>
          @endforeach
          @foreach($register_comments as $register_comment)
            <div class="d-flex justify-content-start mt-5">
              <div>
                <p>{{$register_comment->content}}</p>
                <div class="w-100 small">
                  名前:{{$register_comment->name}}
                </div>
                <div class="w-100 small">
                  日付:{{$register_comment->created_at}}
                </div>
              </div>
            </div>
            @endforeach
          <div class="d-flex justify-content-start mt-5">
            <div>
              問い合わせ内容
            </div>
          </div>
          <form action="{{ route('productlist.contact', ['id' => $currentd_products->id]) }}"method="post">
            @csrf
            <textarea class="form-control" style="height:100px" name="content">
          </textarea>
          <input type="hidden" name="items_id"value="{{$currentd_products->id}}">
          <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
          <input type="hidden" name="name" value="{{ Auth::user()->name }}">
          <button type="submit" class="btn btn-primary">
            送信
          </button>
        </form>
        </div>
      </div>
    </div>
@endsection