<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">

  <!-- ajax処理用 -->
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>helth indicator</title>
  @yield('styles')
  <link rel="shortcut icon" href="data:/images/favicon.ico" type="image/x-icon">
  <link rel="apple-touch-icon" href="data:/images/apple-touch-icon.png" sizes="180x180">
  <link rel="icon" type="image/png" href="data:/images/android-touch-icon.png" sizes="192x192">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootflat/2.0.4/css/bootflat.min.css">
  <link rel="stylesheet" href="/css/styles.css">
  <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous">
  </script>
</head>
<body>
<header>
  <nav class="my-navbar">
    <a class="my-navbar-brand" href="/">helth indicator</a>

    <div class="my-navbar-control">
      @if(Auth::check())
      <div class="openbtn1"><span></span><span></span><span></span></div>
      <nav id="g-nav">
        <div id="g-nav-list"><!--ナビの数が増えた場合縦スクロールするためのdiv※不要なら削除-->
          <ul>
            <li><a href="{{ route('mypage', ['user' => Auth::user()->id]) }}">マイページ</a></li>
            <li><a href="/bmi/measure">BMI計測開始</a></li>
            <li><a href="/pfc/measure">PFC計測開始</a></li>
            <li><a href="#" id="logout">ログアウト</a></li>
          </ul>
        </div>
      </nav>
        <span class="my-navbar-item">ようこそ, {{ Auth::user()->name }}さん</span>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
          @csrf
        </form>
      @else
        <a class="my-navbar-item" href="{{ route('login') }}">ログイン</a>
        ｜
        <a class="my-navbar-item" href="{{ route('register') }}">会員登録</a>
      @endif
    </div>
</header>
<main>
  @yield('content')
</main>
@if(Auth::check())
  <script>
    document.getElementById('logout').addEventListener('click', function(event) {
      event.preventDefault();
      document.getElementById('logout-form').submit();
    });
  </script>
@endif
<script src="/js/script.js"></script>

@yield('scripts')
</body>
</html>