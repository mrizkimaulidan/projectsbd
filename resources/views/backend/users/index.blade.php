@extends('backend.layouts.app', ['title' => 'Daftar Pengguna'])

@section('content')
<div class="row">
  <div class="col-lg-12">
    <div class="card">
      <div class="card-body">
        @include('utilities.alert')
        <div class="d-flex justify-content-end pb-2">
          <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addUserModal">
            <i class="fas fa-plus"></i> Tambah Data
          </button>
        </div>
        <div class="table-responsive">
          <table class="table datatable">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Nama Lengkap</th>
                <th scope="col">Email</th>
                <th scope="col">Ditambahkan Pada</th>
                <th scope="col">Aksi</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($users as $user)
              <tr>
                <th scope="row">{{ $loop->iteration }}</th>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->created_at->format('d-m-Y H:i') }}</td>
                <td>
                  <div class="btn-group" role="group">
                    @if(auth()->id() === $user->id)
                    <button type="button" data-id="{{ $user->id }}" data-toggle="modal" data-target="#editUserModal"
                      class="btn btn-sm btn-success edit">
                      <i class="fas fa-edit"></i>
                    </button>
                    @endif
                  </div>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
        {{ $users->links('pagination::bootstrap-5') }}
      </div>
    </div>
  </div>
</div>
@endsection

@push('modal')
@include('backend.users.modal.create')
@include('backend.users.modal.edit')
@endpush

@push('js')
@include('backend.users.script')
@endpush