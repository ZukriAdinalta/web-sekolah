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

          <form action="/sekolah/updateOrganisasi/<?= $sekolah['id']; ?>" method="Post" enctype="multipart/form-data">
            <input type="hidden" name="fotolama" value="<?= $sekolah['organisasi']; ?>">
            <div class="form-group">
              <label for="organisasi">Struktur Organisasi</label>
              <input type="file" class="form-control <?= ($validation->hasError('organisasi')) ? 'is-invalid' : ''; ?>"
                id="organisasi" name="organisasi" value="<?= old('organisasi') ; ?>">
              <div class="invalid-feedback">
                <?= $validation->getError('organisasi'); ?>
              </div>
            </div>
            <div class="form-group">
              <img src="/img/berita/<?= $sekolah['organisasi']; ?>" class="img-thumbnail mx-auto d-block" width="600px"
                height="300px" alt="">
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