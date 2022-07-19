@extends('layout')

@section('content')
  <div class="container">
    <div class="row">
      <div class="clo col-md-6">
        <dvi class="panel panel-default">
          <a href="#" class="btn btn-default btn-block">BMI計測開始</a>
          <div class="panel-heding">BMI計測結果一覧</div>
          <div class="panel-body">
            <table class="table">
              <thread>
                <tr>
                  <th>過去のBMI測定日</th>
                  <th>スコア</th>
                  <th></th>
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
                  <td><a href="#">削除</a></td>
                </tr>
                @endforeach
              </tbody>
            </table>
            <button class="btn" id="bmi">BMI計測開始</button>
          </div>
        </dvi>
      </div>
      <div class="clo col-md-6">
        <dvi class="panel panel-default">
          <a href="#" class="btn btn-default btn-block">PFC計測開始</a>
          <div class="panel-heding">PFC計測結果一覧</div>
          <div class="panel-body">
            <table class="table">
              <thread>
                <tr>
                  <th>過去のPFC測定日</th>
                  <th>スコア</th>
                  <th></th>
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
                  <td class="label ">
                    <!-- スコアによって色を変更 -->
                    {{$pfc->score}}
                  </td>
                  <td><a href="#">削除</a></td>
                </tr>
                @endforeach
              </tbody>
            </table>
            <button class="btn" id="pfc">PFC計測開始</button>
          </div>
        </dvi>
      </div>
    </div>
  </div>

  <script>
    document.getElementById('bmi').addEventListener('click', function(event) {
      event.preventDefault();
      window.location.href('#');
    });
    document.getElementById('pfc').addEventListener('click', function(event) {
      event.preventDefault();
      window.location.href('#');
    });
  </script>
@endsection