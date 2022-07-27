@extends('layout')


@section('styles')
<link rel="stylesheet" href="/css/bmi-results.css">
@endsection

@section('content')
  <div class=" bmi-results">
  @if(Auth::user()->gender === 1)
  <p>hello world</p>
  @endif
    <div class="result-contents">
      <div class="bmi-result">
        <h2 class="main-title">{{ Auth::user()->name }}さんのBMI結果数値</h2><br>
        <h3 class="output">{{ $bmi->result }}</h3>
        <div class="result-explanation">
          <p>BMIの計算式：体重(kg) ÷ ( 身長(cm) / 100)<sup>2</sup></p>
          <p>BMIの結果数値は身長と体重から計算する体格指数です。</p>
        </div>
      </div>
      <div class="bmi-score">
        <div class="score-items flex-items">
          <div class="score-item">
            <h2>BMI数値の評価</h2>
            <h3  class="output">{{ $bmi->score_label }}</h3>
            <pre class="message {{$bmi->message_border}}">{{ $bmi->score_message }}</pre>
          </div>
          <div class="score-explanation">
            <h2>BMI評価基準</h2>
            <div class="explanation-items">
              <div class="skinny explanation-item">
                @if(Auth::user()->gender === 0)
                  <img src="/images/yase03_man.png" alt="痩せている人">
                  @endif
                  @if(Auth::user()->gender === 1)
                  <img src="/images/yase08_woman.png" alt="痩せている人">
                @endif
                <p>痩せ型<br>18.5未満</p>
              </div>
              <div class="standard explanation-item">
                @if(Auth::user()->gender === 0)
                  <img src="/images/pose_genki09_businessman.png" alt="標準体型の人">
                  @endif
                  @if(Auth::user()->gender === 1)
                  <img src="/images/pose_genki10_businesswoman.png" alt="標準体型の人">
                @endif
                <p>標準体型<br>18.5~25未満</p>
              </div>
              <div class="obese explanation-item">
                @if(Auth::user()->gender === 0)
                  <img src="/images/himan_pocchari_businessman.png" alt="太り気味の人">
                  @endif
                  @if(Auth::user()->gender === 1)
                  <img src="/images/himan_pocchari_businesswoman.png" alt="太り気味の人">
                @endif
                <p>肥満気味<br>25~30未満</p>
              </div>
              <div class="obesity explanation-item">
                @if(Auth::user()->gender === 0)
                  <img src="/images/himan07_ojisan.png" alt="肥満体型の人">
                  @endif
                  @if(Auth::user()->gender === 1)
                  <img src="/images/himan04_youngwoman.png" alt="肥満体型の人">
                @endif
                <p>肥満体型<br>30以上</p>
              </div>
            </div>
            <!-- <div class="result-img">
            </div>
            <div class="result-explanation">
            </div> -->
          </div>
        </div>
        <div class="weight-items flex-items">
          <div class="sta-weight-items">
            <h2>標準体重</h2>
            <h3 class="output">{{ $weight }}</h3>
            <div class="result-explanation">
              <p>身長からみた標準体重</p>
              <p>計算式：( 身長(cm) / 100)<sup>2</sup> x 22</p>
            </div>
          </div>
          <div class="dif_weight-items">
            <h2>実測値 - 標準体重</h2>
            <h3 class="output">{{ $dif_weight }}</h3>
            <div class="result-explanation">
              <p>実測体重と標準体重との差</p>
              <p>標準体重よりも軽いと「ー」が付く</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection