@extends('layouts.app')
@section('content')
<div class="container">
  <div class="row">
    <div class="col-sm-12">
      <h3>Edit Pelanggaran</h3>
      <form class="form-horizontal" action="{{ route('violations.update', $violation->id) }}" method="post">
        {{ csrf_field() }}
        @method('PUT')
        <fieldset>
        <!-- Text input-->
        <div class="form-group">
          <label class="col-md-4 control-label" for="violator_identity_number">Nomor Identitas Pelanggar</label>
          <div class="col-md-4">
          <input id="violator_identity_number" name="violator_identity_number" value="{{ $violation->violator_identity_number }}" type="text" placeholder="Contoh : 234567865432" class="form-control input-md" required="">

          </div>
        </div>

        <!-- Text input-->
        <div class="form-group">
          <label class="col-md-4 control-label" for="violator_name">Nama Pelanggar</label>
          <div class="col-md-4">
          <input id="violator_name" name="violator_name" type="text" placeholder="" value="{{ $violation->violator_name }}" class="form-control input-md">

          </div>
        </div>

        </fieldset>
        <button type="submit" name="button" class="btn btn-primary">Submit</button>
        </form>

    </div>
  </div>
</div>
@endsection
