@extends('layouts.app')
@section('content')
<div class="container">
  <div class="row">
    <div class="col-sm-12">
      <h3>Ini Daftar Pelanggaran</h3>
      <table class="table">
        <a href="{{ route('violations.create') }} " class="btn btn-primary">Tambah Pelanggaran</a>
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
            <td>{{ $item->violator_name }}</td>
            <td>{{ $item->violator_identity_number }}</td>
            <td>
              <a href="{{ route('violations.edit', $item->id ) }}" class="btn btn-secondary">Edit</a>
              <a href="#" class="btn btn-danger">Hapus</a>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
      {{ $items->links() }}
    </div>
  </div>
</div>
@endsection
