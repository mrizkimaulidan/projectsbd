<div class="modal fade" id="editUserModal" tabindex="-1" aria-labelledby="editUserModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editUserModalLabel">Ubah Data</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="#" method="POST">
          @csrf
          @method('PUT')
          <div class="form-group">
            <label for="name">Nama Lengkap :</label>
            <input type="text" name="name" class="form-control" id="name" placeholder="Masukkan nama lengkap..">
          </div>
          <div class="form-group">
            <label for="email">Email :</label>
            <input type="email" name="email" class="form-control" id="email" placeholder="Masukkan alamat email..">
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
            <button type="submit" class="btn btn-primary">Ubah</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
