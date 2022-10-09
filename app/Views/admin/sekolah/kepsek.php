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

          <form action="/sekolah/updatekepsek/<?= $sekolah['id']; ?>" method="Post" enctype="multipart/form-data">
            <input type="hidden" name="fotolama" value="<?= $sekolah['fotoKepsek']; ?>">

            <div class="form-group col-md">
              <label for="fotoKepsek">Foto Kepala Sekolah</label>
              <input type="file" class="form-control <?= ($validation->hasError('fotoKepsek')) ? 'is-invalid' : ''; ?>"
                id="fotoKepsek" name="fotoKepsek" value="<?= old('fotoKepsek') ; ?>">
              <div class="invalid-feedback">
                <?= $validation->getError('fotoKepsek'); ?>
              </div>
            </div>

            <div class="form-group text-center">
              <label for="fotoKepsek">Foto Lama Kepala Sekolah</label>
              <img src="/img/guru/<?= $sekolah['fotoKepsek']; ?>" class="img-thumbnail mx-auto d-block" width="180px"
                height="300px" alt="">
            </div>

            <div class=" form-group ck-editor__editable_inline">
              <label for="kepalaSekolah">Profil Kepala Sekolah</label>
              <textarea class="form-control  <?= ($validation->hasError('kepalaSekolah')) ? 'is-invalid' : ''; ?>"
                id="editor" name="kepalaSekolah"
                value="<?= old('kepalaSekolah') ; ?>"><?= $sekolah['kepalaSekolah'] ; ?></textarea>
              <div class="invalid-feedback">
                <?= $validation->getError('kepalaSekolah'); ?>
              </div>
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

<?= $this->endSection() ; ?>