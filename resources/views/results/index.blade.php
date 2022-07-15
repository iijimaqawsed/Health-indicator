@extends('layout')

@section('content')
  <div class="container">
    <div class="row">
      <div class="clo col-md-6">
        <dvi class="panel panel-default">
          <div class="panel-heding">BMI計測結果一覧</div>
            <table class="table">
              <thread>
                <tr>
                  <th>測定日</th>
                  <th>スコア</th>
                </tr>
              </thread>
              <tbody>
                @foreach($bmis as $bmi)
                <tr>
                  <td>
                    <a href="#" class="list-group-item" >
                      {{$bmi->created_at}}
                    </a>
                  </td>
                  <td class="label ">
                    <!-- スコアによって色を変更 -->
                    {{$bmi->score}}
                  </td>
                </tr>
              </tbody>
            </table>
          <button class="btn" id="bmi">BMI計測開始</button>
        </dvi>
      </div>
      <div class="clo col-md-6">
        <dvi class="panel panel-default">
          <div class="panel-heding">PFC計測結果一覧</div>
            <table class="table">
              <thread>
                <tr>
                  <th>測定日</th>
                  <th>スコア</th>
                </tr>
              </thread>
              <tbody>
                @foreach($pfcs as $pfc)
                <tr>
                  <td>
                    <a href="#" class="list-group-item" >
                      {{$pfc->created_at}}
                    </a>
                  </td>
                </tr>
              </tbody>
            </table>
          <button class="btn" id="pfc">PFC計測開始</button>
        </dvi>
      </div>
    </div>
  </div>

  <script>
    document.getElementById('bmi').addEventListener('click', function(event) {
      event.preventDefault();
      window.location.href('#')
    });
    document.getElementById('pfc').addEventListener('click', function(event) {
      event.preventDefault();
      window.location.href('#')
    });
  </script>
@endsection