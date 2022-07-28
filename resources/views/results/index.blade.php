@extends('layout')

@section('content')
  <div class="container">
    <div class="row">
    <div class="column col-md-6 bmi">
        <a href="/bmi/measure" class="btn btn-primary btn-block">BMI計測開始</a>
        <br>
        <div class="panel panel-default">
          <div class="panel-heading">過去のBMI測定結果一覧</div>
          <table class="table">
            <thead>
            <tr>
              <th>過去の測定日</th>
              <th>BMI数値</th>
              <th>評価</th>
              <th></th>
            </tr>
            </thead>
            <tbody>
            @foreach($bmis as $bmi)
            <tr>
                <td><a href="{{ route('bmi.result', ['bmi' => $bmi->id]) }}" class="bmi-result-item">{{ $bmi->formatted_created_date }}</a></td>
                <td>{{ $bmi->result }}</td>
                <td>
                  <span class="label {{ $bmi->score_class }}">{{ $bmi->score_label }}</span>
                </td>
                <td><a class="b-delete" href="#">削除</a></td>
                <td class="b-id" hidden>{{ $bmi->id }}</td>
              </tr>
              <!-- route('bmi.delete', ['bmi' => $bmi->id]) -->
            @endforeach
            </tbody>
          </table>
        </div>
      </div>
      <div class="column col-md-6 pfc">
        <a href="/pfc/measure" class="btn btn-primary btn-block">PFCバランス計測開始</a>
        <br>
        <div class="panel panel-default">
          <div class="panel-heading">過去のPFCバランス測定結果一覧</div>
          <table class="table">
            <thead>
            <tr>
              <th>過去の測定日</th>
              <th>除脂肪体重</th>
              <th></th>
            </tr>
            </thead>
            <tbody>
            @foreach($pfcs as $pfc)
            <tr>
                <td><a href="{{ route('pfc.result', ['pfc' => $pfc->id]) }}" class="pfc-result-item">{{ $pfc->created_at }}</a></td>
                <td>{{$pfc->l_b_mass}}kg</td>
                <td><a id="p-delete" href="{{ route('pfc.delete', ['pfc' => $pfc->id]) }}">削除</a></td>
              </tr>
            @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>

  <script>
    document.querySelector('.b-delete').addEventListener('click', function(event) {
      event.preventDefault();
      var b_confirm = (window.confirm('本当に削除しますか？'));

      var content = $( this ).parent();
      var b_id = content.find( '.b-id' )
      if( b_confirm ) {
        location.href = "{{ route('bmi.delete', ['bmi' => $bmi->id]) }}";
      }
    });
  </script>
@endsection