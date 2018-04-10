@extends('layouts.app')
@section('content')
<div class="container">
  <div class="row">
    <div class="col-sm-12">
      <h3>Ini Daftar Pelanggaran</h3>
      <table class="table">
        <thead>
          <tr>
            <th>Nomor Pelanggaran</th>
            <th>Nama Pelanggaran</th>
            <th>Identitas Pelanggaran</th>
          </tr>
        </thead>
        <tbody>
          @foreach($items as $item)
          <tr>
            <td>{{ $item->id }}</td>
            <td>{{ $item->nama }}</td>
            <td>{{ $item->violation_identinty_number }}</td>
          </tr>
          @endforeach
        </tbody>
      </table>
      {{ $items->links() }}
    </div>
  </div>
</div>
@endsection
