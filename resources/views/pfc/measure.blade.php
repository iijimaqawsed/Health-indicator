@extends('layout')

@section('content')
  <div class="container">
    <div class="row">
      <div class="col col-md-offset-3 col-md-6">
        <nav class="panel panel-default">
          <div class="panel-heading">PFCバランスを算出する</div>
          <div class="panel-body">
            @if($errors->any())
              <div class="alert alert-danger">
                @foreach($errors->all() as $message)
                  <p>{{ $message }}</p>
                @endforeach
              </div>
            @endif
            <form class="pfc_mesure_form" action="{{route('pfc.measure')}}" method="POST">
              @csrf
              <div class="form-group">
                <label for="weight">体重</label>
                <div class="row">
                  <div class="col col-xs-10">
                    <input type="text" class="form-control" name="weight" id="weight" value="{{ old('weight') }}" placeholder="60" />
                  </div>
                  <div class="col col-xs-2">
                    <div class="text-left">
                      <p class="unit">kg</p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="form-group">
                <label for="body_fat">体脂肪率</label>
                <div class="row">
                  <div class="col col-xs-10">
                    <input type="text" class="form-control" name="body_fat" id="body_fat" value="{{ old('body_fat') }}" placeholder="25" />
                  </div>
                  <div class="col col-xs-2">
                    <p class="unit">%</p>
                  </div>
                </div>
              </div>
              <p class="confirm" style="color: red;">※事前に体脂肪率を計測可能な体重計にて測定を行ってください</p>
              <div class="text-right">
                <button type="submit" class="btn btn-primary">送信</button>
              </div>
            </form>
          </div>
        </nav>
      </div>
    </div>
  </div>
@endsection