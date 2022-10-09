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
          <form action="/pengumuman/save/" method="Post" enctype="multipart/form-data">
            <?= csrf_field() ; ?>
            <div class="form-group">
              <label for="isi">Judul Pengumuman</label>
              <input type="text" class="form-control <?= ($validation->hasError('nama')) ? 'is-invalid' : ''; ?>"
                id="nama" name="nama" value="<?= old('nama') ; ?>" autofocus autocomplete="off">
              <div class="invalid-feedback">
                <?= $validation->getError('nama'); ?>
              </div>
            </div>

            <div class="form-group ck-editor__editable_inline">
              <label for="isi">Isi Pengumuman</label>
              <textarea type="text" class="form-control  <?= ($validation->hasError('isi')) ? 'is-invalid' : ''; ?>"
                id="editor" name="isi" value="<?= old('isi') ; ?>" rows="10"></textarea>
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