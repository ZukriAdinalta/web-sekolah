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
          <form action="/berita/update/<?= $berita['id_berita']; ?>" method="Post" enctype="multipart/form-data">
            <?= csrf_field() ; ?>
            <input type="hidden" name="slug" value="<?= $berita['slug'] ?>">
            <input type="hidden" name="gambarlama" value="<?= $berita['gambar'] ?>">
            <div class="form-group">
              <label for="judul">Judul Berita</label>
              <input type="text" class="form-control <?= ($validation->hasError('judul')) ? 'is-invalid' : ''; ?>"
                id="judul" name="judul" value="<?= (old('judul')) ? old('judul') : $berita['judul']; ?>" autofocus
                autocomplete="off">
              <div class="invalid-feedback">
                <?= $validation->getError('judul'); ?>
              </div>
            </div>

            <div class="form-group">
              <label for="gambar">Gambar Berita Lama</label>
              <img src="/img/berita/<?= $berita['gambar']; ?>" class="img-thumbnail mx-auto d-block" width="600px"
                height="300px" alt="<?= $berita['judul'];  ?>">
            </div>
            <div class="form-group">
              <label for="gambar">Gambar Berita</label>
              <input type="file" class="form-control <?= ($validation->hasError('gambar')) ? 'is-invalid' : ''; ?>"
                id="gambar" name="gambar" value="<?= old('gambar') ; ?>">
              <div class="invalid-feedback">
                <?= $validation->getError('gambar'); ?>
              </div>
            </div>

            <div class="form-group ck-editor__editable_inline">
              <label for="isi">Isi Berita</label>
              <textarea class="form-control  <?= ($validation->hasError('isi')) ? 'is-invalid' : ''; ?>" id="editor"
                name="isi" value="<?= old('isi') ; ?>"><?= $berita['isi'] ; ?></textarea>
              <div class="invalid-feedback">
                <?= $validation->getError('isi'); ?>
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