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
          <form action="/siswa/update/<?= $siswa['id']; ?>" method="Post" enctype="multipart/form-data">
            <input type="hidden" name="fotolama" value="<?= $siswa['foto'] ?>">
            <div class="form-group">
              <label for="nis">Nis</label>
              <input type="number" class="form-control <?= ($validation->hasError('nis')) ? 'is-invalid' : ''; ?>"
                id="nis" name="nis" value="<?= $siswa['nis'] ?>">
              <div class="invalid-feedback">
                <?= $validation->getError('nis'); ?>
              </div>
            </div>

            <div class="form-group">
              <label for="nama">Nama</label>
              <input type="text" class="form-control  <?= ($validation->hasError('nama')) ? 'is-invalid' : ''; ?>"
                id="nama" name="nama" value="<?= $siswa['nama'] ?>">
              <div class="invalid-feedback">
                <?= $validation->getError('nama'); ?>
              </div>
            </div>

            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="tempat_lahir">Tempat Lahir</label>
                <input type="text"
                  class="form-control <?= ($validation->hasError('tempat_lahir')) ? 'is-invalid' : ''; ?>"
                  id="tempat_lahir" name="tempat_lahir" value="<?= $siswa['tempat_lahir'] ?>">
                <div class="invalid-feedback">
                  <?= $validation->getError('tempat_lahir'); ?>
                </div>
              </div>

              <div class="form-group col-md-4">
                <label for="tgl_lahir">Tanggal Lahir</label>
                <input type="date" class="form-control <?= ($validation->hasError('tgl_lahir')) ? 'is-invalid' : ''; ?>"
                  id="tgl_lahir" name="tgl_lahir" value="<?= $siswa['tgl_lahir'] ?>">
                <div class="invalid-feedback">
                  <?= $validation->getError('tgl_lahir'); ?>
                </div>
              </div>

              <div class="form-group col-md-2">
                <label for="id_kelas">Kelas</label>
                <select name="id_kelas"
                  class="form-control <?= ($validation->hasError('id_kelas')) ? 'is-invalid' : ''; ?>" id="id_kelas">
                  <?php foreach($kelas as $K): ?>
                  <?php if($K['id_kelas'] == $siswa['id_kelas']) : ?>
                  <option value="<?= $K['id_kelas']; ?>" selected><?= $K['kelas']; ?></option>
                  <?php else: ?>
                  <option value="<?= $K['id_kelas']; ?>"><?= $K['kelas']; ?></option>
                  <?php endif; ?>
                  <?php endforeach; ?>
                </select>
                <div class="invalid-feedback">
                  <?= $validation->getError('id_kelas'); ?>
                </div>
              </div>
            </div>



            <div class="form-row">
              <div class="form-group col-md-2">
                <label for="foto">Foto Lama</label>
                <img src="/img/siswa/<?= $siswa['foto']; ?>" alt="" width="100px">
              </div>

              <div class="form-group col-md-10">
                <label for="foto">Update Foto</label>
                <input type="file" class="form-control <?= ($validation->hasError('foto')) ? 'is-invalid' : ''; ?>"
                  id="foto" name="foto">
                <div class="invalid-feedback">
                  <?= $validation->getError('foto'); ?>
                </div>
              </div>
            </div>
            <div class="modal-footer">
              <button type="submit" class="btn btn-primary">Ubah</button>
            </div>

          </form>

        </div>
      </div>
    </div>
  </div>
</div>



<?= $this->endSection() ; ?>