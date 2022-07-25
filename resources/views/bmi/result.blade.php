@extends('layout')

@section('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">
@endsection

@section('content')
  <div class="container bmi-results">
  @if(Auth::user()->gender === 1)
  <p>hello world</p>
  @endif
    <div class="result-contents">
      <h2>{{ Auth::user()->name }}さんのBMI結果数値</h2>
      <div class="bmi-result">
        <h3>{{ $bmi->result }}</h3>
        <div class="result-explanation">
          <p>BMIの計算式</p>
          <p>この結果はあくまで見かけの〜参考値です。</p>
        </div>
      </div>
      <div class="bmi-row">
        <div class="score-items">
          <h2>評価</h2>
          <h3 class="score-item">{{ $bmi->score_label }}</h3>
          <div class="score-explanation">
            <div class="result-img">
              <img src="/images/yase03_man.png" alt="痩せている人">
              <img src="/images/pose_genki09_businessman.png" alt="標準体型の人">
              <img src="/images/himan_pocchari_businessman.png" alt="太り気味の人">
              <img src="/images/himan07_ojisan.png" alt="肥満体型の人">
            </div>
            <div class="result-explanation">
              <p>18.5未満</p>
              <p>18.5~25未満</p>
              <p>25~30未満</p>
              <p>30以上</p>
            </div>
          </div>
        </div>
        <div class="weight-items">
          <h2>標準体重</h2>
          <h3>{{ $weight }}</h3>
          <div class="result-explanation">
            <p>身長からみた標準体重</p>
            <p>計算式</p>
          </div>
        </div>
        <div class="dif_weight-items">
          <h2>実測値 - 標準体重</h2>
          <h3>{{ $dif_weight }}</h3>
          <div class="result-explanation">
            <p>実測体重と標準体重との差</p>
            <p>「ー」がつくと標準体重よりも軽いということ</p>
          </div>
        </div>
      </div>

    </div>
  </div>
@endsection