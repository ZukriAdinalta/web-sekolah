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
            <a href="" type="button" class=" btn btn-success btn-sm " data-toggle="modal" data-target="#add"><i
                class="fa fa-plus">
                Add</i></a>
          </div>
        </div>
        <div class="card-body">
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
              <h4><i class="fas fa-times"></i> Gagal! - ';
              foreach ($errors as  $error){ ;
              echo   esc($error) ; } ;
              echo '</h4></div>';
            }
         ?>
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Nama Kelas</th>
                  <th style="width: 200px;">Action</th>
                </tr>
              </thead>
              <tbody>
                <?php $i = 1; ?>
                <?php foreach($kelas as $K): ?>
                <tr>
                  <td scope="row"><?= $i++; ?></td>
                  <td><?= $K['kelas'] ?></td>
                  <td class="text-center">
                    <a href="<?= base_url() ?>" class="btn btn-info" data-toggle="modal"
                      data-target="#edit<?=$K['id_kelas'];?>"> <i class="fas fa-edit"></i> Edit</a>
                    <a href="" class="btn btn-danger" data-toggle="modal" data-target="#delete<?=$K['id_kelas'];?>"> <i
                        class="fas fa-trash-alt"></i> Delete</a>
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

<!-- Add Modal-->
<div class="modal fade" id="add" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah <?= $title; ?></h5>
      </div>
      <div class="modal-body">
        <form action="/kelas/add/" method="Post">
          <div class="form-group">
            <label for="nama">Nama Kelas</label>
            <input type="text" class="form-control" id="nama" name="kelas"
              onkeyup="this.value = this.value.toUpperCase()">
          </div>

      </div>
      <div class="modal-footer">
        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
        <button type="submit" class="btn btn-primary">Simpan</button>
      </div>
      </form>
    </div>
  </div>
</div>

<!-- Edit Modal-->
<?php foreach ($kelas as $K) : ?>
<div class="modal fade" id="edit<?=$K['id_kelas'];?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit <?= $title; ?></h5>
      </div>
      <div class="modal-body">
        <form action="/kelas/edit/<?= $K['id_kelas']; ?> " method="Post">
          <div class="form-group">
            <label for="nama">Nama Kelas</label>
            <input type="text" class="form-control" id="nama" name="kelas" value="<?= $K['kelas']; ?> "
              onkeyup="this.value = this.value.toUpperCase()" required>
          </div>
      </div>
      <div class="modal-footer">
        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
        <button type="submit" class="btn btn-primary">Edit</button>
      </div>
      </form>
    </div>
  </div>
</div>
<?php endforeach; ?>


<!-- modal kategori Delete -->
<?php foreach($kelas as $K): ?>
<div class="modal fade " id="delete<?=$K['id_kelas'];?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
  <div class="modal-dialog " role="document">
    <div class="modal-content ">
      <div class="modal-header ">
        <h5 class="modal-title" id="exampleModalLabel">Hapus <?= $title; ?></h5>
      </div>
      <div class="modal-body">
        Yakin Hapus Data Kelas <?= $K['kelas']; ?>!
      </div>
      <div class="modal-footer">
        <button class="btn btn-secondary" type="button" data-dismiss="modal">Tidak</button>
        <a class="btn btn-danger" href="<?= base_url('kelas/delete/'.$K['id_kelas']); ?>">Ya</a>
      </div>
    </div>
  </div>
</div>
<?php endforeach; ?>

<?= $this->endSection() ; ?>