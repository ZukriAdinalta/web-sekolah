<?= $this->extend('admin/layout/index') ; ?>
<?= $this->Section('content') ; ?>

<div class="container-fluid">

  <!-- Page Heading -->
  <div class="row">
    <div class="col-lg-12">
      <!-- DataTales Example -->
      <div class="card shadow mb-4">
        <div class="card-header py-3 d-block ">
          <h6 class="m-0 font-weight-bold text-primary"><?= $title; ?></h6>
          <div class="text-right ">
            <a href="<?= base_url('users/add') ; ?>" type="button" class=" btn btn-success btn-sm "><i
                class="fa fa-plus">
                Add</i></a>
          </div>
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
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Nama</th>
                  <th>Usename</th>
                  <th>Status</th>
                  <th>Foto</th>
                  <th>Tanggal Daftar</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <?php $i = 1; ?>
                <?php foreach($users as $U): ?>
                <tr>
                  <td scope="row"><?= $i++; ?></td>
                  <td><?= $U['nama'] ?></td>
                  <td><?= $U['username'] ?></td>
                  <td><?= $U['level'] == 1 ? 'Admin' : 'User' ?></td>
                  <td class="text-center"> <img src="<?= base_url( '/img/guru/'.$U['foto'] ); ?>" style="width: 50px;"
                      alt=""></td>
                  <td> <?=  date('d F Y', strtotime($U['created'] )) ?></td>
                  <td class="text-center">
                    <a href="users/edit/<?=$U['id']; ?>" class="btn btn-info btn-sm">
                      <i class="fas fa-edit"></i></a>
                    <a href="users/resset/<?=$U['id']; ?>" class="btn btn-primary btn-sm" data-toggle="modal"
                      data-target="#password<?=$U['id'];?>">
                      <i class="fas fa-key"></i></a>
                    <a href="" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete<?=$U['id'];?>"> <i
                        class="fas fa-trash-alt"></i></a>
                  </td>
                </tr>
                <?php endforeach; ?>
              </tbody>
            </table>

          </div>
        </div>
      </div>
    </div>
  </div>

</div>

<!-- modal Users Delete -->
<?php foreach($users as $U): ?>
<div class="modal fade " id="delete<?=$U['id'];?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
  <div class="modal-dialog " role="document">
    <div class="modal-content ">
      <div class="modal-header ">
        <h5 class="modal-title" id="exampleModalLabel">Hapus <?= $title; ?></h5>
      </div>
      <div class="modal-body">
        Yakin Hapus User <?= $U['nama']; ?>!
      </div>
      <div class="modal-footer">
        <button class="btn btn-secondary" type="button" data-dismiss="modal">Tidak</button>
        <a class="btn btn-danger" href="<?= base_url('/users/delete/'.$U['id']); ?>">Ya</a>
      </div>
    </div>
  </div>
</div>
<?php endforeach; ?>

<!-- Edit Password-->
<?php foreach($users as $U): ?>
<div class="modal fade" id="password<?=$U['id'];?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Ganti Password</h5>
      </div>
      <div class="modal-body">
        <form action="/users/reset/<?=$U['id'];?>" method="Post">
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
<?php endforeach; ?>

<?= $this->endSection() ; ?>