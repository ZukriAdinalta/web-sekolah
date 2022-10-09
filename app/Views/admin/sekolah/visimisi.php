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
          <?php
            if(session()->getFlashdata('pesan')){
              echo '<div class="alert alert-success alert-dismissible pesan">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
              <h4><i class="icon fa fa-check"></i> Success! - ';
              echo session()->getFlashdata('pesan');
              echo '</h4></div>';
            }
          ?>
        </div>
        <div class="card-body">

          <form action="/sekolah/updateVisimisi/<?= $sekolah['id']; ?>" method="Post" ">
            <div class=" form-group ck-editor__editable_inline">
            <textarea class="form-control  <?= ($validation->hasError('visiMisi')) ? 'is-invalid' : ''; ?>" id="editor"
              name="visiMisi" value="<?= old('visiMisi') ; ?>"><?= $sekolah['visiMisi'] ; ?></textarea>
            <div class="invalid-feedback">
              <?= $validation->getError('visiMisi'); ?>
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