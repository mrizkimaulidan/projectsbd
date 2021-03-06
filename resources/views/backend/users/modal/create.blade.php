<div class="modal fade" id="addUserModal" tabindex="-1" aria-labelledby="addUserModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="addUserModalLabel">Tambah Data</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{ route('backend.users.store') }}" method="POST">
          @csrf

          <div class="form-group">
            <label for="name">Nama Lengkap :</label>
            <input type="text" name="name" value="{{ old('name') }}" class="form-control" id="name"
              placeholder="Masukkan nama lengkap..">
          </div>
          <div class="form-group">
            <label for="email">Email :</label>
            <input type="email" name="email" value="{{ old('email') }}" class="form-control" id="email"
              placeholder="Masukkan alamat email..">
          </div>
          <div class="form-group">
            <label for="password">Password :</label>
            <div class="input-group">
              <input type="password" name="password" id="password" class="form-control"
                placeholder="Masukkan password..">
              <div class="input-group-append">
                <button class="btn btn-outline-secondary" type="button" id="show-password"><i class="fas fa-eye"
                    id="eye"></i></button>
              </div>
            </div>
          </div>
          <div class="form-group">
            <label for="password_confirmation">Konfirmasi Password :</label>
            <div class="input-group">
              <input type="password" name="password_confirmation" id="password_confirmation" class="form-control"
                placeholder="Ulangi password..">
              <div class="input-group-append">
                <button class="btn btn-outline-secondary" type="button" id="show-password-confirmation"><i
                    class="fas fa-eye" id="eye-password-confirmation"></i></button>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
            <button type="submit" class="btn btn-primary">Tambah</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>