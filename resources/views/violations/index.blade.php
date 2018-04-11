@extends('layouts.app')
@section('content')
<div class="container">
  <div class="row">
    <div class="col-sm-12">
      @if (session('status'))
          <div class="alert alert-success">
              {{ session('status') }}
          </div>
      @endif
      
      <h3>Ini Daftar Pelanggaran</h3>
      <table class="table">
        <a href="{{ route('violations.create') }} " class="btn btn-primary">Tambah Pelanggaran</a>
        <thead>
          <tr>
            <th>Nomor Pelanggaran</th>
            <th>Nama Pelanggaran</th>
            <th>Identitas Pelanggaran</th>
            <th></th>
          </tr>
        </thead>
        <tbody>
          @foreach($items as $item)
          <tr>
            <td>{{ $item->id }}</td>
            <td>{{ $item->violator_name }}</td>
            <td>{{ $item->violator_identity_number }}</td>
            <td>
              <form class="" action="{{ route('violations.destroy', $item->id ) }}" method="post">
                <a href="{{ route('violations.edit', $item->id ) }}" class="btn btn-secondary">Edit</a>
                {{ csrf_field() }}
                @method('DELETE')
                <button type="submit" class="btn btn-danger" name="delete">Hapus</button>
              </form>
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
