@extends('layout')

@section('styles')
  <link rel="stylesheet" href="/css/form-back-img.css">
@endsection

@section('content')
  <div class="container">
    <div class="row">
      <div class="col col-md-offset-3 col-md-6">
        <nav class="panel panel-default">
          <div class="panel-heading">パスワード再発行</div>
          <div class="panel-body">
            <!-- パスワードリセットに必要な追記 -->
            <!-- バリデーションエラーの表示 -->
            @if($errors->any())
              <div class="alert alert-danger" role="alert">
                @foreach($errors->all() as $message)
                  <p>{{ $message }}</p>
                @endforeach
              </div>
            @endif
            <!---------->
            <form action="{{ route('password.update') }}" method="POST">
              @csrf
              <!-- パスワードリセットに必要な追記 -->
              <!-- パスワードリセットに必要なトークンの送信 -->
              <input type="hidden" name="token" value="{{ $token }}" />
              <!---------->
              <div class="form-group">
                <label for="email">メールアドレス</label>
                <input type="text" class="form-control" id="email" name="email" value="{{ old('email') }}" />
              </div>
              <div class="form-group">
                <label for="password">新しいパスワード</label>
                <input type="password" class="form-control" id="password" name="password" />
              </div>
              <div class="form-group">
                <label for="password-confirm">新しいパスワード（確認）</label>
                <input type="password" class="form-control" id="password-confirm" name="password_confirmation" />
              </div>
              <div class="text-right">
                <button type="submit" class="btn btn-primary">送信</button>
              </div>
            </form>
          </div>
        </nav>
      </div>
    </div>
  </div>
@endsection