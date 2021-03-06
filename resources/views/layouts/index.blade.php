</html><!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <!-- CSRF Token -->
    <mata name="csrf-token" content="{{ csrf_token() }}">

    <style>
     header {
      background-image: url(https://i.pinimg.com/originals/e5/e8/c0/e5e8c030d4a67fd11d55b57a613517bd.jpg);
      background-size: auto;
    }
    .nav-pills {
      margin-top: 30px;
    }
    .reviews {
      margin-top: 50px;
      border-radius: 5px;
      border: solid thin silver;
    }
    .myreviews {
      border-radius: 5px;
      border: solid thin silver;
    }
    .error {
      margin-top: 5px;
      margin-bottom: 15px;
      color: red;
    }
    .review-value {
      background-color: #F2F2F2;
      border: 1px silver solid;
      border-radius: 5px;
      padding: 3px 5px;
    }
    .review-delete {
      margin-left: 60px;
    }
    .pagination {
      margin-left: 150px;
    }
    .myaccount-processing-btn {
      margin-left: 275px;
    }
    .myaccount-delete-btn {
      margin-left: 60px;
    }
    .service-description {
      font-size: 20px;
    }
    .row {
      padding: 20px;
    }
    .invalid-feedback {
      font-size: 18px;
      color: red;
    }
    .back {
      margin-left: 60px;
    }
    /* .content_image {
      margin: 0 0 10px 400px;
    } */
    </style>


    <title>@yield('title')</title>

    <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.2/css/bootstrap.min.css" integrity="sha384-y3tfxAZXuh4HwSYylfB+J125MxIs6mR5FOHamPBG064zB+AFeWH94NdvaCBm8qnd" crossorigin="anonymous">
  </head>
  <body>
    <header>

       <div class="container">
           <div class="btn-group col-sm-offset-11">
             <ul class="nav">
               <li class="nav-item">
                 <a href="{{ action('ReviewController@index') }}" class="nav-link btn btn-danger">レビュー 一覧</a>
               </li>
               <li class="nav-item">
                 <a href="{{ action('ReviewController@create') }}" class="nav-link btn btn-warning">レビュー 作成</a>
               </li>
             </ul>
            <button type="button" class="btn btn-secondary dropdown-toggle bg-primary" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              マイページ
            </button>
            <div class="dropdown-menu">
              <a class="dropdown-item" href="{{ action('ReviewController@myreview_show') }}">レビュー表示</a>
              <a class="dropdown-item" href="{{ action('UserController@show') }}">アカウント表示</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="{{ action('UserController@logout') }}">ログアウト</a>
            </div>
          </div>
       </div>

       <div class="logo text-sm-center">
          <h1><a class="display-4" href="{{ action('ReviewController@index') }}">
            <small><small><small>あなたの気づきを価値あるものに。</small></small></small><br>
            <big><big>BookMe</big></big></a></h1>
            <p class="service-description">< 明日からできる実践知識提供サービス ></p>

       </div>


       <div class="row">
         <form action="{{ action('ReviewController@index') }}" method="get">
           @csrf
           <div class="text-center col-md-8 col-md-offset-2">
             <div class="input-group">
               <input type="text" class="form-control" name="cond_statement"
               @if (isset($cond_statement))
                 value="{{ $cond_statement }}"
               @endif
               placeholder="レビュー投稿された本のタイトル、本の作者を検索">
               <span class="input-group-btn">
                 <button class="btn btn-secondary" type="submit">検索</button>
               </span>
             </div>
           </div>
         </form>
       </div>

       <div>
       <ul class="nav nav-pills">
         <li class="nav-item">
           <a href="{{ action('ReviewController@business_economy') }}" class="nav-link btn-danger">ビジネス・経済</a>
         </li>
         <li class="nav-item">
           <a href="{{ action('ReviewController@society_politics') }}" class="nav-link btn-warning">社会・政治</a>
         </li>
         <li class="nav-item">
           <a href="{{ action('ReviewController@investment_finance') }}" class="nav-link btn-primary">投資・金融</a>
         </li>
         <li class="nav-item">
           <a href="{{ action('ReviewController@nature_environment') }}" class="nav-link btn-success">自然・環境</a>
         </li>
         <li class="nav-item">
           <a href="{{ action('ReviewController@history_geography') }}" class="nav-link btn-info">地理・歴史</a>
         </li>
         <li class="nav-item">
           <a href="{{ action('ReviewController@culture_thought') }}" class="nav-link btn-primary">文化・思想</a>
         </li>
         <li class="nav-item">
           <a href="{{ action('ReviewController@education_selfdevelopment') }}" class="nav-link btn-danger">教育・自己啓発</a>
         </li>
         <li class="nav-item">
           <a href="{{ action('ReviewController@science_technology') }}" class="nav-link btn-warning">科学・テクノロジー</a>
         </li>
         <li class="nav-item">
           <a href="{{ action('ReviewController@travel') }}" class="nav-link btn-primary">旅行・紀行</a>
         </li>
         <li class="nav-item">
           <a href="{{ action('ReviewController@sports_outdoor') }}" class="nav-link btn-success">スポーツ・アウトドア</a>
         </li>
         <li class="nav-item">
           <a href="{{ action('ReviewController@other') }}" class="nav-link btn-info">その他</a>
         </li>
       </ul>
     </div>

    </header>

    <main>
      @yield('content')



    </main>

    <br>
    <a href="https://www.amazon.co.jp/" class="alert-link" target="_blank">
    <div class="alert alert-danger container text-sm-center" role="alert">
      amazonで本を検索・購入する
    </div>
    </a>
    <a href="https://www.rakuten.co.jp/" class="alert-link" target="_blank">
    <div class="alert alert-warning container text-sm-center" role="alert">
      楽天市場で本を検索・購入する
    </div>
    </a>
    <a href="https://www.mercari.com/jp/" class="alert-link" target="_blank">
    <div class="alert alert-info container text-sm-center" role="alert">
      メルカリで本を購入する
    </div>
    </a>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.2/js/bootstrap.min.js" integrity="sha384-vZ2WRJMwsjRMW/8U7i6PWi6AlO1L79snBrmgiDpgIWJ82z8eA5lenwvxbMV1PAh7" crossorigin="anonymous"></script>
  </body>
</html>
