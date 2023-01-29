@extends('layout')

@section('content')
    <div class="container text-center mt-3" style="width:600px">
      <div class="row">
        @if($errors->any())
        <div class="alert alert-danger">
          @foreach($errors->all() as $message)
          <p>{{ $message }}</p>
          @endforeach
        </div>
        @endif
        <div class="col">
          <h2>商品の出品</h2>
          <form action="{{route('item.register')}}" method="post" enctype="multipart/form-data">
          @csrf
            <div class="d-flex flex-wrap">
              <div>出品画像</div>
              <input type="file" class="form-control" name="item_image" value="{{ old('item_image') }}">
            </div>
            <h3 class="text-start mt-3">
              商品の詳細
            </h3>
            <div class="d-flex flex-wrap">
              <div>カテゴリー</div>
              <div class="form-group w-100">
                <select name="category" class="form-control">
                  <option>レディース</option>
                  <option>メンズ</option>
                  <option>ベビー・キッズ</option>
                  <option>インテリア・住まい・小物</option>
                  <option>本・音楽・ゲーム</option>
                  <option>おもちゃ・ボビー・グッズ</option>
                  <option>コスメ・香水・美容</option>
                  <option>家電・スマホ・カメラ</option>
                  <option>スポーツ・レジャー</option>
                  <option>ハンドメイド</option>
                  <option>チケット</option>
                  <option>自動車・オートバイ</option>
                  <option>その他</option>
                </select>
              </div>
              <div>商品の状態</div>
              <div class="form-group w-100">
                <select name="status" class="form-control">
                  <option>新品、未使用</option>
                  <option>未使用に近い</option>
                  <option>目立った傷や汚れなし</option>
                  <option>やや傷や汚れあり</option>
                  <option>傷や汚れあり</option>
                  <option>全体的に状態が悪い</option>
                </select>
              </div>
            </div>
            <h3 class="text-start mt-3">
              商品名と説明
            </h3>
            <div class="d-flex flex-wrap">
              <div>商品名</div>
              <div class="w-100">
                <input type="text" name="title" class="form-control" placeholder="商品名を入力してください" value="{{ old('title') }}">
              </div>
              <div class="mt-3">商品の説明</div>
              <div class="w-100">
                <textarea class="form-control" name="content" style="height:200px" placeholder="色、素材、重さ、定価、注意点など

（例）2010年頃に1万円で購入したグレーのジャケットです。
 ライトグレーで傷はありません。

 #ジャケット #ジャケットコーデ" value="{{ old('content') }}">
</textarea>
</div>
</div>
          <h3 class="text-start mt-3">
            配送について
          </h3>
          <div class="d-flex flex-wrap">
            <div>配送料の負担</div>
            <div class="form-group w-100">
              <select name="postage" class="form-control">
                <option>送料込み(出品者負担)</option>
                <option>着払い(購入者負担)</option>
              </select>
            </div>
            <div>配送方法</div>
            <div class="form-group w-100">
              <select name="shippingmethod" class="form-control">
                <option>未定</option>
                <option>らくらくメルカリ便</option>
                <option>ゆうゆうメルカリ便</option>
                <option>梱包・発送たのメル便</option>
                <option>ゆうメール</option>
                <option>普通郵便(定型、定型型)</option>
                <option>クロネコヤマト</option>
                <option>ゆうパック</option>
                <option>クリックポスト</option>
                <option>ゆうパケット</option>
              </select>
            </div>
            <div class="mt-3">配送元の地域</div>
            <div class="form-group w-100">
              <select name="sender" class="form-control">
                <option>北海道</option>
                <option>青森県</option>
                <option>岩手県</option>
                <option>宮城県</option>
                <option>秋田県</option>
                <option>山形県</option>
                <option>福島県</option>
                <option>茨城県</option>
                <option>栃木県</option>
                <option>群馬県</option>
                <option>千葉県</option>
                <option>東京都</option>
                <option>神奈川県</option>
                <option>新潟県</option>
                <option>富山県</option>
                <option>石川県</option>
                <option>福井県</option>
                <option>山梨県</option>
                <option>長野県</option>
                <option>岐阜県</option>
                <option>静岡県</option>
                <option>愛知県</option>
                <option>三重県</option>
                <option>滋賀県</option>
                <option>京都府</option>
                <option>大阪府</option>
                <option>兵庫県</option>
                <option>奈良県</option>
                <option>和歌山県</option>
                <option>鳥取県</option>
                <option>岡山県</option>
                <option>広島県</option>
                <option>山口県</option>
                <option>徳島県</option>
                <option>香川県</option>
                <option>愛媛県</option>
                <option>高知県</option>
                <option>福岡県</option>
                <option>佐賀県</option>
                <option>長崎県</option>
                <option>熊本県</option>
                <option>大分県</option>
                <option>宮崎県</option>
                <option>鹿児島県</option>
                <option>沖縄県</option>
                <option>未定</option>
              </select>
            </div>
            <div class="mt-3">発送までの日数</div>
            <div class="form-group w-100">
              <select name="deliverytime"class="form-control">
                <option>1〜2日で発送</option>
                <option>2日〜3日で発送</option>
                <option>4日〜5日で発送</option>
              </select>
            </div>
          </div>
          <h3 class="text-start mt-3">
            販売価格
          </h3>
          <div class="d-flex flex-wrap">
            <div>
              販売価格(¥300〜9,999,999)
            </div>
            <div class="w-100">
              <input type="text" name="prices" class="form-control" placeholder="数字のみ入れて下さい" value="{{ old('prices') }}">
            </div>
          </div>
        </div>
        <button type="submit" class="btn btn-primary mt-5">出品</button>
      </form>
    </div>
  </div>
</div>
@endsection