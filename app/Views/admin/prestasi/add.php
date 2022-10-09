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
              echo '<div class="alert alert-danger alert-dismissible pesan">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
              <h4><i class="icon fa fa-check"></i> Success! - ';
              echo session()->getFlashdata('pesan');
              echo '</h4></div>';
            }
         ?>
          <form action="/prestasi/save/" method="Post" enctype="multipart/form-data">
            <div class="form-group">
              <label for="judul">Judul Prestasi</label>
              <input type="text" class="form-control <?= ($validation->hasError('judul')) ? 'is-invalid' : ''; ?>"
                id="judul" name="judul" value="<?= old('judul') ; ?>" autofocus autocomplete="off">
              <div class="invalid-feedback">
                <?= $validation->getError('judul'); ?>
              </div>
            </div>

            <div class="form-group">
              <label for="foto">Foto Prestasi</label>
              <input type="file" class="form-control <?= ($validation->hasError('foto')) ? 'is-invalid' : ''; ?>"
                id="foto" name="foto" value="<?= old('foto') ; ?>">
              <div class="invalid-feedback">
                <?= $validation->getError('foto'); ?>
              </div>
            </div>

            <div class="form-group ck-editor__editable_inline">
              <label for="isi">Isi prestasi</label>
              <textarea class="form-control  <?= ($validation->hasError('isi')) ? 'is-invalid' : ''; ?>" id="editor"
                name="isi" value="<?= old('isi'); ?>"></textarea>
              <div class="invalid-feedback">
                <?= $validation->getError('isi'); ?>
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