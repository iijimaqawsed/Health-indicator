@extends('layout')

@section('content')
  <div class="container 404 error">
    <div class="row">
      <div class="col col-md-offset-3 col-md-6">
        <div class="text-center">
          <div class="error-img">
            <img src="/images/sleep_animal_cat.png" alt="寝る猫">
          </div>
          <div class="icon">
            <img src="/images/error-icon.png" alt="">
            <p>403 Error</p>
          </div>
          <div class="text">
            <p>権限がありません</p>
          </div>
          <a href="{{ route('results.index') }}" class="btn">ホームへ戻る</a>
        </div>
      </div>
    </div>
  </div>
@endsection