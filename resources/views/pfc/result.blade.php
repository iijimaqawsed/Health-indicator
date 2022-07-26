@extends('layout')

@section('styles')
<link rel="stylesheet" href="/css/pfc-results.css">
@endsection

@section('content')
  <div class="container pfc-results">
    <div class="result-contents">
      <h2 class="main-title">{{ Auth::user()->name }}さんのPFCバランス測定値</h2>
      <section class="body-result flex-items">
        <div class="l-b-mass">
          <h2>除脂肪体重</h2>
          <h3>{{ $l_b_mass }}</h3>
        </div>
        <div class="day-kcal">
          <h2>一日接種カロリー</h2>
          <h3>{{ $total_kcal }}</h3>
        </div>
      </section>

      <section class="protein">
        <div class="sec-title flex-items">
          <h2>たんぱく質（protein）</h2>
          <div>
            <img src="/images/food_niku_gyuniku_steak.png" alt="肉の画像">
          </div>
        </div>
        <div class="p-result">
          <div class="mass">
            <h2>一日のたんぱく質摂取量（ｇ）</h2>
            <h3>{{ $p_mass }} g</h3>
          </div>
          <div class="calorie">
            <h2>一日のたんぱく質摂取カロリー上限</h2>
            <h3>{{ $p_kcal }} kcal</h3>
          </div>
        </div>
        <div class="example-items">
          <div class="example-item egg">
            <img src="/images/food_oden_tamago.png" alt="卵の画像">
            <p>{{ $p_mass }} gは、たまご～個分のタンパク質</p>
          </div>
          <div class="example-item natto">
            <img src="/images/food_nattou_pack.png" alt="">
            <p>{{ $p_mass }} gは、納豆～パック分のタンパク質</p>
          </div>

        </div>
        <!-- 解説文の配置 -->
      </section>

      <section class="fat">
        <div class="sec-title">
          <h2>脂質（Fat）</h2>
          <div>
            <img src="/images/food_sald_oil.png" alt="油の画像">
          </div>
        </div>
        <div class="f-result">
          <div class="mass">
            <h2>一日の脂質摂取量（ｇ）</h2>
            <h3>{{ $f_mass }} g</h3>
          </div>
          <div class="calorie">
            <h2>一日の脂質摂取カロリー上限</h2>
            <h3>{{ $f_kcal }} kcal</h3>
          </div>
        </div>
        <div class="example-items">
          <div class="baraniku example-item">
            <img src="/images/niku_butabara_block.png" alt="豚バラ肉の画像">
            <p>{{ $f_mass }} gは豚バラ肉～g分</p>
          </div>
          <div class="tonkatsu example-item">
            
          </div>
        </div>
        <!-- 解説文の配置 -->
      </section>

      <section class="Carbohydrate">
        <div class="sec-title">
          <h2>炭水化物（Carbohydrate）</h2>
          <div>
            <img src="/images/food_flour_komugiko.png" alt="小麦粉の画像">
          </div>
        </div>
        <div class="c-result">
          <div class="mass">
            <h2>一日の炭水化物摂取量（ｇ）</h2>
            <h3>{{ $c_mass }}</h3>
          </div>
          <div class="calorie">
            <h2>一日の炭水化物摂取カロリー上限</h2>
            <h3>{{ $c_kcal }}</h3>
          </div>
        </div>
        <div class="example"></div>
        <!-- 解説文の配置 -->
      </section>
    </div>
  </div>
@endsection