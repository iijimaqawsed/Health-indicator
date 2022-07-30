@extends('layout')

@section('content')
  <div class="container">
    <div class="row">
      <div class="col col-md-offset-3 col-md-6">
        <nav class="panel panel-default">
          <div class="panel-heading">BMIを測定する</div>
          <div class="panel-body">
            @if($errors->any())
              <div class="alert alert-danger">
                @foreach($errors->all() as $message)
                  <p>{{ $message }}</p>
                @endforeach
              </div>
            @endif
            <form class="bmi_mesure_form" action="{{route('bmi.measure')}}" method="POST">
              @csrf
              <div class="form-group">
                <label for="height">身長</label>
                <div class="row">
                  <div class="col col-md-10">
                    <input type="text" class="form-control" name="height" id="height" value="{{ old('height') }}" placeholder="165" />
                  </div>
                  <div class="col col-md-2">
                    <p class="unit">cm</p>
                  </div>
                </div>
              </div>
              <div class="form-group">
                <label for="weight">体重</label>
                <div class="row">
                  <div class="col col-md-10">
                    <input type="text" class="form-control" name="weight" id="weight" value="{{ old('weight') }}" placeholder="60" />
                  </div>
                  <div class="col col-md-2">
                    <p class="unit">kg</p>
                  </div>
                </div>
              </div>
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