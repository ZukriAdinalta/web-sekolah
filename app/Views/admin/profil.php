<?= $this->extend('admin/layout/index') ; ?>
<?= $this->Section('content') ; ?>

<div class="container-fluid mx-auto">
  <div class="row justify-content-md-center">

    <div class="col-md-8">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">
            <i class="fas fa-address-card"></i>
            Halaman Profil
          </h3>
          <?php
            $errors = session()->getFlashdata('errors');
            if(session()->getFlashdata('pesan')){
              echo '<div class="alert alert-success alert-dismissible pesan">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
              <h4><i class="icon fa fa-check"></i> Success! - ';
              echo session()->getFlashdata('pesan');
              echo '</h4></div>';
            }elseif($errors){
            echo '<div class="alert alert-danger alert-dismissible pesan">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
              <h4><i class="icon fa fa-check"></i> Gagal! - ';
              echo '<ul>';
              foreach ($errors as  $error){ ;
              echo '<li>' . esc($error) .'</li>'; } ;
              echo '</ul>';
              echo '</h4></div>';
            }
         ?>
          <div class="card-tools">
            <ul class="nav nav-pills ml-auto">
              <li class="nav-item">
                <a class="nav-link active" href="#revenue-chart" data-toggle="tab">Profil</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#sales-chart" data-toggle="tab">Edit Profil</a>
              </li>
            </ul>
          </div>
        </div><!-- /.card-header -->
        <div class="card-body">
          <div class="tab-content p-0">
            <!-- Morris chart - Sales -->
            <div class="chart tab-pane active" id="revenue-chart" style="position: relative; height: 300px;">
              <div class="card mb-3" style="max-width: 740px;">
                <div class="row no-gutters ">
                  <div class="col-md-4" style="margin: 10px 10px ;">
                    <img src="<?= base_url(). '/img/guru/' . $user['foto']; ?>" width="245px" height="280px"
                      alt="<?= session()->get('nama'); ?>">
                  </div>
                  <div class="col-md-7">
                    <div class="card " style=" margin: 20px 30px; width: 100%">
                      <div class="card-body">
                        <ul class="list-group list-group-flush">
                          <li class="list-group-item">
                            <td>Nama: </td><?= $user['nama']; ?>
                          </li>
                          <li class="list-group-item">
                            <td>Username: </td> <?= $user['username']; ?>
                          </li>
                          <li class="list-group-item">Status:
                            <?=  $user['level'] == 1 ? 'Admin' : 'User'; ?> </li>
                          <li class="list-group-item"><a class="btn btn-primary" data-toggle="modal"
                              data-target="#edit<?=$user['id'];?>">Ganti Password</a></li>
                        </ul>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="chart tab-pane" id="sales-chart" style="position: relative; height: 300px;">
              <form action="/admin/update/<?= $user['id']; ?>" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="fotolama" value="<?= $user['foto']; ?>">
                <input type="hidden" name="id" value="<?= $user['id']; ?>">
                <div class="form-group row">
                  <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control <?= ($validation->hasError('nama')) ? 'is-invalid' : ''; ?> "
                      name="nama" id="nama" readonly value="<?= (old('nama')) ? old('nama') : $user['nama']; ?>">
                    <div class="invalid-feedback">
                      <?= $validation->getError('nama'); ?>
                    </div>
                  </div>
                </div>

                <div class="form-group row">
                  <label for="username" class="col-sm-2 col-form-label">Username</label>
                  <div class="col-sm-10">
                    <input type="text"
                      class="form-control <?= ($validation->hasError('username')) ? 'is-invalid' : ''; ?>" id="username"
                      name="username" value="<?= $user['username']; ?>">
                    <div class="invalid-feedback">
                      <?= $validation->getError('username'); ?>
                    </div>
                  </div>
                </div>

                <div class="form-row">
                  <label for="inputPassword" class="col-sm-2 col-form-label">Foto</label>
                  <div class="form-group col-sm-2">
                    <img src="<?= base_url(). '/img/guru/' . $user['foto']; ?>" width="100px" height="100px"
                      alt="<?= session()->get('nama'); ?>">
                  </div>
                  <div class="form-group col-sm-8">
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
        </div><!-- /.card-body -->
      </div>

    </div>
  </div>
</div>

<!-- Edit Modal-->
<div class="modal fade" id="edit<?=$user['id'];?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Ganti Password</h5>
      </div>
      <div class="modal-body">
        <form action="/admin/reset" method="Post">
          <div class="form-group">
            <label for="repassword">Password Baru</label>
            <input type="password" class="form-control" id="repassword" name="repassword">
          </div>
          <div class="form-group">
            <label for="konpassword">Konfirmasi Password</label>
            <input type="password" class="form-control" id="konpassword" name="konpassword">
          </div>
      </div>
      <div class="modal-footer">
        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
        <button type="submit" class="btn btn-primary">Ganti Password</button>
      </div>
      </form>
    </div>
  </div>
</div>



<?= $this->endSection() ; ?>