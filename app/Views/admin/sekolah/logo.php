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

          <form action="/sekolah/updatelogo/<?= $sekolah['id']; ?>" method="Post" enctype="multipart/form-data">
            <input type="hidden" name="fotolama" value="<?= $sekolah['logo']; ?>">
            <div class="form-row">
              <div class="form-group col-md-4">
                <label for="logo">Logo</label>
                <input type="file" class="form-control <?= ($validation->hasError('logo')) ? 'is-invalid' : ''; ?>"
                  id="logo" name="logo" value="<?= old('logo') ; ?>">
                <div class="invalid-feedback">
                  <?= $validation->getError('logo'); ?>
                </div>
              </div>

              <div class="form-group col-md-4">
                <label for="title">Nama Sekolah</label>
                <input type="text" class="form-control <?= ($validation->hasError('title')) ? 'is-invalid' : ''; ?>"
                  id="title" name="title" value="<?= $sekolah['title']; ?>"
                  onkeyup="this.value = this.value.toUpperCase()">
                <div class="invalid-feedback">
                  <?= $validation->getError('title'); ?>
                </div>
              </div>

              <div class="form-group col-md-4">
                <label for="title2">Nama Sekolah</label>
                <input type="text" class="form-control <?= ($validation->hasError('title2')) ? 'is-invalid' : ''; ?>"
                  id="title2" name="title2" value="<?= $sekolah['title2']; ?>"
                  onkeyup="this.value = this.value.toUpperCase()">
                <div class="invalid-feedback">
                  <?= $validation->getError('title2'); ?>
                </div>
              </div>
            </div>

            <div class="form-group">
              <div class="card mb-3 mx-auto" style="max-width: 300px;">
                <div class="row no-gutters">
                  <div class="col-md-2 m-2 mt-3 ">
                    <img src="<?= base_url('img/berita/' . $sekolah['logo'] ); ?>" alt="..." width="60px" height="50px">
                  </div>
                  <div class="col-md-8">
                    <div class="card-body ml-0">
                      <h5 class="card-title mb-0 font-weight-bold"><?= $sekolah['title'] ?></h5>
                      <h5 class="card-title mt-0 font-weight-bold text-primary"><?= $sekolah['title2'] ?></h5>
                    </div>
                  </div>
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

  <!-- Page Heading -->
  <div class="row mt-3">
    <div class="col-sm-12">
      <!-- DataTales Example -->
      <div class="card shadow mb-4">
        <div class="card-header py-3 d-block ">
          <h6 class="m-0 font-weight-bold text-primary">Kontak</h6>
        </div>
        <div class="card-body">

          <?php
            if(session()->getFlashdata('msg')){
              echo '<div class="alert alert-success alert-dismissible pesan">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
              <h4><i class="icon fa fa-check"></i> Success! - ';
              echo session()->getFlashdata('msg');
              echo '</h4></div>';
            }
          ?>

          <form action="/sekolah/updatekontak/<?= $sekolah['id']; ?>" method="Post" enctype="multipart/form-data">
            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="email">Email Sekolah</label>
                <input type="email" class="form-control <?= ($validation->hasError('email')) ? 'is-invalid' : ''; ?>"
                  id="email" name="email" value="<?= $sekolah['email'] ?>">
                <div class="invalid-feedback">
                  <?= $validation->getError('email'); ?>
                </div>
              </div>

              <div class="form-group col-md-6">
                <label for="tlpn">Telpon Sekolah</label>
                <input type="text" class="form-control <?= ($validation->hasError('tlpn')) ? 'is-invalid' : ''; ?>"
                  id="tlpn" name="tlpn" value="<?= $sekolah['tlpn']; ?>">
                <div class="invalid-feedback">
                  <?= $validation->getError('tlpn'); ?>
                </div>
              </div>
            </div>
            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="alamat">Alamat</label>
                <textarea name="alamat" id="" cols="30"
                  class="form-control <?= ($validation->hasError('alamat')) ? 'is-invalid' : ''; ?>"><?= $sekolah['alamat']; ?></textarea>
                <div class="invalid-feedback">
                  <?= $validation->getError('alamat'); ?>
                </div>
              </div>

              <div class="form-group col-md-6">
                <label for="map">Sematkan peta Sekolah</label>
                <textarea name="map" id="" cols="30"
                  class="form-control <?= ($validation->hasError('map')) ? 'is-invalid' : ''; ?>"><?= $sekolah['map']; ?></textarea>
                <div class="invalid-feedback">
                  <?= $validation->getError('map'); ?>
                </div>
              </div>
            </div>
            <div class="form-group">
              <div class="row no-gutters">
                <div class="col-md-2 m-2 mt-3 ">
                  <?= str_replace('height="450"', 'height="200"', $sekolah['map']  ) ?>
                </div>
                <div class="card  mb-2 " style="width: 20rem; margin-left:450px;">
                  <ul class="list-group list-group-flush">
                    <li class="list-group-item">Email: <?= $sekolah['email']; ?> </li>
                    <li class="list-group-item">Telpon: <?= $sekolah['tlpn']; ?> </li>
                    <li class="list-group-item">Almat: <?= $sekolah['alamat']; ?></li>
                  </ul>
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
</div>



<?= $this->endSection() ; ?>