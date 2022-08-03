@extends('layout')

@section('styles')
  <link rel="stylesheet" href="/css/pfc-results.css">

  <!-- ログインユーザーの性別によって色を変化させる -->
  @if(Auth::user()->gender === 0)
    <link rel="stylesheet" href="/css/man-result.css">
  @endif
  @if(Auth::user()->gender === 1)
    <link rel="stylesheet" href="/css/woman-result.css">
  @endif
@endsection

@section('content')
  <div class="pfc-results">
    <div class="result-contents">
      <h2 class="main-title">{{ Auth::user()->name }}さんのPFCバランス測定値</h2>
      <section class="body-result flex-items">
        <div class="l-b-mass">
          <h2>除脂肪体重</h2>
          <div class="output">
            <h3>{{ $l_b_mass }}</h3>
            <p class="unit">kg</p>
          </div>
        </div>
        <div class="day-kcal">
          <h2>一日の接種カロリー</h2>
          <div class="output">
            <h3>{{ $total_kcal }}</h3>
            <p class="unit">kcal</p>
          </div>
        </div>
      </section>

      <!-- たんぱく質について -->
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
            <div class="output">
              <h3>{{ $p_mass }}</h3>
              <p class="unit">g</p>
            </div>
          </div>
          <div class="calorie">
            <h2>たんぱく質摂取カロリー上限</h2>
            <div class="output">
              <h3>{{ $p_kcal }}</h3>
              <p class="unit">kcal</p>
            </div>
          </div>
        </div>
        <!-- たんぱく質参考例 -->
        <div class="example-items flex-items">
          <div class="example-item ro-suniku example-flex">
            <img src="/images/food_niku_buta_ro-su.png" alt="ロース肉の画像">
            <p>豚ロース肉<span>{{ $p_example['ro-su'] }}</span>ｇ分のたんぱく質</p>
          </div>
          <div class="example-item egg example-flex">
            <img src="/images/food_oden_tamago.png" alt="卵の画像">
            <p>たまご<span>{{ $p_example['egg'] }}</span>個分のたんぱく質</p>
          </div>
          <div class="example-item natto example-flex">
            <img src="/images/food_nattou_pack.png" alt="納豆の画像">
            <p>納豆<span>{{ $p_example['natto'] }}</span>パック分のたんぱく質</p>
          </div>
          <div class="example-item touhu example-flex">
            <img src="/images/food_tofu_kinu.png" alt="豆腐の画像">
            <p>豆腐ミニパック<span>{{ $p_example['touhu'] }}</span>個分のたんぱく質</p>
          </div>
          <div class="example-item milk example-flex">
            <img src="/images/drink_milk_pack.png" alt="牛乳の画像">
            <p>牛乳<span>{{ $p_example['milk'] }}</span>ml分のたんぱく質</p>
          </div>
          <div class="example-item sake example-flex">
            <img src="/images/fish_sake_kirimi.png" alt="鮭の画像">
            <p>鮭の切身<span>{{ $p_example['sake'] }}</span>切れ分のたんぱく質</p>
          </div>

        </div>
        <!-- 解説文の配置 -->
      </section>

      <!-- 脂質について -->
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
            <div class="output">
              <h3>{{ $f_mass }}</h3>
              <p class="unit">g</p>
            </div>
          </div>
          <div class="calorie">
            <h2>脂質摂取カロリー上限</h2>
            <div class="output">
              <h3>{{ $f_kcal }}</h3>
              <p class="unit">kcal</p>
            </div>
          </div>
        </div>
        <!-- 脂質参考例 -->
        <div class="example-items">
          <div class="oil example-item example-flex">
            <img src="/images/food_sald_oil.png" alt="サラダ油の画像">
            <p>サラダ油<span>{{ $f_example['oil'] }}</span>g分の脂質</p>
          </div>
          <div class="butter example-item example-flex">
            <img src="/images/food_cheese_butter4.png" alt="バターの画像">
            <p>バター<span>{{ $f_example['butter'] }}</span>g分の脂質</p>
          </div>
          <div class="poteto example-item example-flex">
            <img src="/images/food_frenchfry.png" alt="ポテトの画像">
            <p>ポテトMサイズ<span>{{ $f_example['poteto'] }}</span>個分の脂質</p>
          </div>
          <div class="baraniku example-item example-flex">
            <img src="/images/niku_butabara_block.png" alt="豚バラ肉の画像">
            <p>豚バラ肉<span>{{ $f_example['baraniku'] }}</span>g分の脂質</p>
          </div>
          <div class="tonkatsu example-item example-flex">
            <img src="/images/food_tonkatsu.png" alt="とんかつの画像">
            <p>とんかつ<span>{{ $f_example['tonkatsu'] }}</span>枚分の脂質</p>
          </div>
        </div>
        <!-- 解説文の配置 -->
      </section>

      <!-- 炭水化物について -->
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
            <div class="output">
              <h3>{{ $c_mass }}</h3>
              <p class="unit">g</p>
            </div>
          </div>
          <div class="calorie">
            <h2>炭水化物摂取カロリー上限</h2>
            <div class="output">
              <h3>{{ $c_kcal }}</h3>
              <p class="unit">kcal</p>
            </div>
          </div>
        </div>
        <!-- 炭水化物参考例 -->
        <div class="example-items flex-items">
          <div class="rice example-item example-flex">
            <img src="/images/amount_gohan_ochawan3.png" alt="ご飯の画像">
            <p>ご飯<span>{{ $c_example['rice'] }}</span>杯分の炭水化物</p>
          </div>
          <div class="bread example-item example-flex">
            <img src="/images/food_bread.png" alt="パンの画像">
            <p>食パン6枚切り<span>{{ $c_example['bread'] }}</span>枚の炭水化物</p>
          </div>
          <div class="udon example-item example-flex">
            <img src="/images/bukkake_udon.png" alt="うどんの画像">
            <p>うどん<span>{{ $c_example['udon'] }}</span>杯分の炭水化物</p>
          </div>
          <div class="poteto example-item example-flex">
            <img src="/images/food_frenchfry.png" alt="ポテトの画像">
            <p>ポテトMサイズ<span>{{ $c_example['poteto'] }}</span>個分の炭水化物</p>
          </div>
          <div class="cola example-item example-flex">
            <img src="/images/drink_cola_petbottle.png" alt="コーラの画像">
            <p>500mlのコーラ<span>{{ $c_example['cola'] }}</span>本分の炭水化物</p>
          </div>
          <div class="honey example-item example-flex">
            <img src="/images/honey.png" alt="はちみつの画像">
            <p>はちみつ<span>{{ $c_example['honey'] }}</span>ｇ分の炭水化物</p>
          </div>
        </div>
      </section>
      <a href="{{ route('results.index') }}" class="btn btn-info">ホームへ戻る</a>
    </div>
  </div>
@endsection