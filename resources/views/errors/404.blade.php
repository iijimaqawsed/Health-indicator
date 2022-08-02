@extends('layout')

@section('content')
  <div class="container 404 error">
    <div class="row">
      <div class="col col-md-offset-3 col-md-6">
        <div class="text-center">
          <div class="error-img">
          @if(Auth::user()->gender === 0)
            <img src="/images/businessman_cry_man.png" alt="落ち込む人">
          @endif
          @if(Auth::user()->gender === 1)
            <img src="/images/businessman_cry_woman.png" alt="落ち込む人">
          @endif
          </div>
          <div class="icon">
            <img src="/images/error-icon.png" alt="">
            <p>404 Error</p>
          </div>
          <div class="text">
            <p>ページが見つかりません</p>
          </div>
          <a href="{{ route('results.index') }}" class="btn">ホームへ戻る</a>
        </div>
      </div>
    </div>
  </div>
@endsection