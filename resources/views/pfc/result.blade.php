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
          <h3>{{ $l_b_mass }} kg</h3>
        </div>
        <div class="day-kcal">
          <h2>一日の接種カロリー</h2>
          <h3>{{ $total_kcal }} kcal</h3>
        </div>
      </section>

      <section class="protein">
        <div class="sec-title">
          <div class="title-img">
            <img src="/images/food_niku_gyuniku_steak.png" alt="肉の画像">
          </div>
          <h2>たんぱく質（protein）</h2>
        </div>
        <div class="p-result flex-items">
          <div class="mass">
            <h2>一日のたんぱく質摂取量（ｇ）</h2>
            <h3>{{ $p_mass }} g</h3>
          </div>
          <div class="calorie">
            <h2>たんぱく質摂取カロリー上限</h2>
            <h3>{{ $p_kcal }} kcal</h3>
          </div>
        </div>
        <div class="example-items flex-items">
          <div class="example-item egg example-flex">
            <img src="/images/food_oden_tamago.png" alt="卵の画像">
            <p>{{ $p_mass }} gは、たまご～個分のたんぱく質</p>
          </div>
          <div class="example-item natto example-flex">
            <img src="/images/food_nattou_pack.png" alt="">
            <p>{{ $p_mass }} gは、納豆～パック分のたんぱく質</p>
          </div>

        </div>
        <!-- 解説文の配置 -->
      </section>

      <section class="fat">
        <div class="sec-title">
          <div class="title-img">
            <img src="/images/food_sald_oil.png" alt="油の画像">
          </div>
          <h2>脂質（Fat）</h2>
        </div>
        <div class="f-result flex-items">
          <div class="mass">
            <h2>一日の脂質摂取量（ｇ）</h2>
            <h3>{{ $f_mass }} g</h3>
          </div>
          <div class="calorie">
            <h2>脂質摂取カロリー上限</h2>
            <h3>{{ $f_kcal }} kcal</h3>
          </div>
        </div>
        <div class="example-items">
          <div class="baraniku example-item example-flex">
            <img src="/images/niku_butabara_block.png" alt="豚バラ肉の画像">
            <p>{{ $f_mass }}g は豚バラ肉～g分</p>
          </div>
          <div class="tonkatsu example-item example-flex">
            <img src="/images/food_tonkatsu.png" alt="とんかつの画像">
            <p>{{ $f_mass }}g はとんかつ～枚分</p>
          </div>
          <div class="poteto example-item example-flex">
            <img src="/images/food_frenchfry.png" alt="ポテトの画像">
            <p>{{ $f_mass }}g は某有名のポテトMサイズ～個分</p>
          </div>
        </div>
        <!-- 解説文の配置 -->
      </section>

      <section class="Carbohydrate">
        <div class="sec-title">
          <div class="title-img">
            <img src="/images/food_flour_komugiko.png" alt="小麦粉の画像">
          </div>
          <h2>炭水化物（Carbohydrate）</h2>
        </div>
        <div class="c-result flex-items">
          <div class="mass">
            <h2>一日の炭水化物摂取量（ｇ）</h2>
            <h3>{{ $c_mass }} g</h3>
          </div>
          <div class="calorie">
            <h2>炭水化物摂取カロリー上限</h2>
            <h3>{{ $c_kcal }} kcal</h3>
          </div>
        </div>
        <div class="example-items flex-items">
          <!-- 解説文の配置 -->
          <div class="poteto example-item example-flex">
            <img src="/images/food_frenchfry.png" alt="ポテトの画像">
            <p>{{ $c_mass }}g は某有名のポテトMサイズ～個分</p>
          </div>
          <div class="poteto example-item example-flex">
            <img src="/images/food_frenchfry.png" alt="ポテトの画像">
            <p>{{ $c_mass }}g は某有名のポテトMサイズ～個分</p>
          </div>
        </div>
      </section>
    </div>
  </div>
@endsection