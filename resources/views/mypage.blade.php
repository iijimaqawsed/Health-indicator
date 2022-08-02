@extends('layout')

@section('content')
  <div class="container">
    <div class="col col-md-offset-3 col-md-6">
    <nav class="panel panel-default">
          <div class="panel-heading">マイページ</div>
          <div class="panel-body">
            @if($errors->any())
              <div class="alert alert-danger">
                @foreach($errors->all() as $message)
                  <p>{{ $message }}</p>
                @endforeach
              </div>
            @endif
            <form action="{{ route('login') }}" method="POST">
              @csrf
              <div class="form-group">
                <label for="name">ユーザーネーム</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $user->name }}" />
              </div>
              <div class="form-group">
                <label for="email">メールアドレス</label>
                <input type="text" class="form-control" id="email" name="email" value="{{ $user->email }}" />
              </div>
              <div class="form-group">
                <label for="current-password">現在のパスワード</label>
                <input type="password" class="form-control" id="password" name="password" value=""/>
              </div>
              <div class="form-group">
                <label for="password">新しいパスワード</label>
                <input type="password" class="form-control" id="password" name="password" value=""/>
              </div>
              <div class="form-group">
                <label for="password">新しいパスワード（確認用）</label>
                <input type="password" class="form-control" id="password" name="password" value=""/>
              </div>
              <div class="text-right">
                <button type="submit" class="btn btn-primary">ユーザー情報の編集</button>
              </div>
            </form>
          </div>
        </nav>
    </div>
  </div>
@endsection