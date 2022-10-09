<?= $this->extend('admin/layout/index') ; ?>
<?= $this->Section('content') ; ?>

<div class="container-fluid">

  <!-- Page Heading -->
  <div class="row">
    <div class="col-sm-12">
      <!-- DataTales Example -->
      <div class="card shadow mb-4">
        <div class="card-header py-3 d-block ">
          <h6 class="m-0 font-weight-bold text-primary"><?= $title; ?></h6>
        </div>
        <div class="card-body">
          <?php
            if(session()->getFlashdata('pesan')){
              echo '<div class="alert alert-success alert-dismissible pesan">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
              <h4><i class="icon fa fa-check"></i> Success! - ';
              echo session()->getFlashdata('pesan');
              echo '</h4></div>';
            }
         ?>
          <form action="/users/save/" method="Post" enctype="multipart/form-data">

            <div class="form-group">
              <label for="nama">Nama</label>
              <input type="text" class="form-control  <?= ($validation->hasError('nama')) ? 'is-invalid' : ''; ?>"
                id="nama" name="nama" value="<?= old('nama') ; ?>">
              <div class="invalid-feedback">
                <?= $validation->getError('nama'); ?>
              </div>
            </div>

            <div class="form-group">
              <label for="username">Username</label>
              <input type="text" class="form-control  <?= ($validation->hasError('username')) ? 'is-invalid' : ''; ?>"
                id="username" name="username" value="<?= old('username') ; ?>">
              <div class="invalid-feedback">
                <?= $validation->getError('username'); ?>
              </div>
            </div>

            <div class="form-row">
              <div class="form-group col-md-5">
                <label for="password">Password</label>
                <input type="password"
                  class="form-control <?= ($validation->hasError('password')) ? 'is-invalid' : ''; ?>" id="password"
                  name="password">
                <div class="invalid-feedback">
                  <?= $validation->getError('password'); ?>
                </div>
              </div>

              <div class="form-group col-md-5">
                <label for="password1">Konfirmasi Password</label>
                <input type="password"
                  class="form-control <?= ($validation->hasError('password1')) ? 'is-invalid' : ''; ?>" id="password1"
                  name="password1">
                <div class="invalid-feedback">
                  <?= $validation->getError('password1'); ?>
                </div>
              </div>

              <div class="form-group col-md-2">
                <label for="level">level</label>
                <select name="level" class="form-control <?= ($validation->hasError('level')) ? 'is-invalid' : ''; ?>"
                  id="level">
                  <option value="">-- Pilih Status --</option>
                  <option value="1">Admin</option>
                  <option value="2">User</option>
                </select>
                <div class="invalid-feedback">
                  <?= $validation->getError('level'); ?>
                </div>
              </div>
            </div>
            <div class="form-group">
              <label for="foto">Foto</label>
              <input type="file" class="form-control <?= ($validation->hasError('foto')) ? 'is-invalid' : ''; ?>"
                id="foto" name="foto">
              <div class="invalid-feedback">
                <?= $validation->getError('foto'); ?>
              </div>
            </div>
            <div class="modal-footer">
              <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
          </form>

        </div>
      </div>
    </div>
  </div>
</div>



<?= $this->endSection() ; ?>