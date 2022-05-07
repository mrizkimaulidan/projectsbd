@extends('backend.layouts.app', ['title' => 'Daftar Komentar Yang Belum Diverifikasi'])

@section('content')
<div class="row">
  <div class="col-lg-12">
    <div class="card">
      <div class="card-body">
        @include('utilities.alert')
        <div class="table-responsive">
          <table class="table datatable">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Pada Artikel</th>
                <th scope="col">Nama dan Email</th>
                <th scope="col">Isi Komentar</th>
                <th scope="col">Tanggal</th>
                <th scope="col">Aksi</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($newestComments as $newestComment)
              <tr>
                <th scope="row">{{ $loop->iteration }}</th>
                <td>{{ str()->limit($newestComment->article->title, 50) }}</td>
                <td>
                  <span class="badge bg-primary">{{ $newestComment->name }} - ({{ $newestComment->email }})</span>
                </td>
                <td>{{ str()->limit($newestComment->body, 50) }}</td>
                <td>
                  <span class="badge badge-info">{{ date('d-m-Y H:i:s', strtotime($newestComment->date)) }}</span>
                </td>
                <td>
                  <div class="btn-group" role="group">
                    <a href="{{ route('backend.comments.newest-comments.show', $newestComment) }}"
                      class="btn btn-sm btn-success">
                      <i class="fas fa-eye"></i>
                    </a>

                    <form action="{{ route('backend.comments.newest-comments.destroy', $newestComment) }}"
                      method="POST">
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