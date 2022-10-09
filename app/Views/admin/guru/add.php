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
          <form action="/guru/save/" method="Post" enctype="multipart/form-data">
            <div class="form-group">
              <label for="nip">Nip</label>
              <input type="number" class="form-control <?= ($validation->hasError('nip')) ? 'is-invalid' : ''; ?>"
                id="nip" name="nip" value="<?= old('nip') ; ?>" autofocus>
              <div class="invalid-feedback">
                <?= $validation->getError('nip'); ?>
              </div>
            </div>

            <div class="form-group">
              <label for="nama">Nama</label>
              <input type="text" class="form-control  <?= ($validation->hasError('nama')) ? 'is-invalid' : ''; ?>"
                id="nama" name="nama" value="<?= old('nama') ; ?>">
              <div class="invalid-feedback">
                <?= $validation->getError('nama'); ?>
              </div>
            </div>

            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="tempat_lahir">Tempat Lahir</label>
                <input type="text"
                  class="form-control <?= ($validation->hasError('tempat_lahir')) ? 'is-invalid' : ''; ?>"
                  id="tempat_lahir" name="tempat_lahir" value="<?= old('tempat_lahir') ; ?>">
                <div class="invalid-feedback">
                  <?= $validation->getError('tempat_lahir'); ?>
                </div>
              </div>

              <div class="form-group col-md-6">
                <label for="tgl_lahir">Tanggal Lahir</label>
                <input type="date" class="form-control <?= ($validation->hasError('tgl_lahir')) ? 'is-invalid' : ''; ?>"
                  id="tgl_lahir" name="tgl_lahir" value="<?= old('tgl_lahir') ; ?>">
                <div class="invalid-feedback">
                  <?= $validation->getError('tgl_lahir'); ?>
                </div>
              </div>
            </div>

            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="id_mapel">Mata Pelajaran</label>
                <select name="id_mapel"
                  class="form-control <?= ($validation->hasError('id_mapel')) ? 'is-invalid' : ''; ?>" id="id_mapel">
                  <option value="">-- Pilih Mata Pelajaran --</option>
                  <?php foreach($mapel as $M): ?>
                  <option value="<?= $M['id']; ?>"><?= $M['nama_mapel']; ?></option>
                  <?php endforeach; ?>
                </select>
                <div class="invalid-feedback">
                  <?= $validation->getError('id_mapel'); ?>
                </div>
              </div>

              <div class="form-group col-md-6">
                <label for="pendidikan">Pendidikan</label>
                <select name="pendidikan"
                  class="form-control <?= ($validation->hasError('pendidikan')) ? 'is-invalid' : ''; ?>"
                  id="pendidikan">
                  <option value="">-- Pilih Pendidikan --</option>
                  <option value="D3">D3</option>
                  <option value="S1">S1</option>
                  <option value="S2">S2</option>
                  <option value="S3">S3</option>
                </select>
                <div class="invalid-feedback">
                  <?= $validation->getError('pendidikan'); ?>
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