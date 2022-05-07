@extends('backend.layouts.app', ['title' => 'Daftar Galeri'])

@section('content')
<div class="row">
  <div class="col-lg-12">
    <div class="card">
      <div class="card-body">
        @include('utilities.alert')
        <div class="d-flex justify-content-end pb-2">
          <a href="{{ route('backend.galleries.create') }}" class="btn btn-primary">
            <i class="fas fa-plus"></i> Tambah Data
          </a>
        </div>
        <div class="table-responsive">
          <table class="table datatable">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Judul</th>
                <th scope="col">Gambar</th>
                <th scope="col">Status</th>
                <th scope="col">Aksi</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($galleries as $gallery)
              <tr>
                <th scope="row">{{ $loop->iteration }}</th>
                <td>{{ str()->limit($gallery->title, 50) }}</td>
                <td>
                  <a href="{{ asset('storage/galleries/' . $gallery->image) }}" data-lightbox="image">
                    <img src="{{ asset('storage/galleries/' . $gallery->image) }}" width="200px" class="img-thumbnail"
                      alt="{{
                      $gallery->title }}">
                  </a>
                </td>
                <td>
                  <span class="badge badge-{{ $gallery->is_active ? 'success' : 'danger' }}">
                    {{ $gallery->is_active ? 'Aktif' : 'Tidak Aktif' }}
                  </span>
                </td>
                <td>
                  <div class="btn-group" role="group">
                    <a href="{{ route('backend.galleries.edit', $gallery) }}" class="btn btn-sm btn-success">
                      <i class="fas fa-edit"></i>
                    </a>

                    <form action="{{ route('backend.galleries.destroy', $gallery) }}" method="POST">
                      @csrf
                      @method('DELETE')
                      <button type="submit" class="btn btn-sm btn-danger delete">
                        <i class="fas fa-trash-alt"></i>
                      </button>
                    </form>
                  </div>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection