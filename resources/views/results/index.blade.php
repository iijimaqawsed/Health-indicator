@extends('layout')

@section('content')
  <div class="container">
    <div class="row">
    <div class="column col-md-6">
        <a href="/bmi/measure" class="btn btn-primary btn-block">BMI計測開始</a>
        <br>
        <div class="panel panel-default">
          <div class="panel-heading">過去のBMI測定結果一覧</div>
          <table class="table">
            <thead>
            <tr>
              <th>過去の測定日</th>
              <th>評価</th>
              <th></th>
            </tr>
            </thead>
            <tbody>
            @foreach($bmis as $bmi)
            <tr>
                <td><a href="" class="bmi-result-item">{{ $bmi->formatted_created_date }}</a></td>
                <td>
                  <span class="label {{ $bmi->score_class }}">{{ $bmi->score_label }}</span>
                </td>
                <td><a href="">削除</a></td>
              </tr>
            @endforeach
            </tbody>
          </table>
        </div>
      </div>
      <div class="column col-md-6">
        <a href="/pfc/measure" class="btn btn-primary btn-block">PFCバランス計測開始</a>
        <br>
        <div class="panel panel-default">
          <div class="panel-heading">過去のPFCバランス測定結果一覧</div>
          <table class="table">
            <thead>
            <tr>
              <th>過去の測定日</th>
              <th></th>
            </tr>
            </thead>
            <tbody>
            @foreach($pfcs as $pfc)
            <tr>
                <td><a href="" class="pfc-result-item">{{ $pfc->created_at }}</a></td>
                <td><a href="">削除</a></td>
              </tr>
            @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>

  <!-- <script>
    document.getElementById('bmi').addEventListener('click', function(event) {
      event.preventDefault();
      window.location.href('#');
    });
    document.getElementById('pfc').addEventListener('click', function(event) {
      event.preventDefault();
      window.location.href('#');
    });
  </script> -->
@endsection