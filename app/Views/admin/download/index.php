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
              <h4><i class="icon fa fa-check"></i> Gagal! - ';
              echo '<ul>';
              foreach ($errors as  $error){ ;
              echo '<li>' . esc($error) .'</li>'; } ;
              echo '</ul>';
              echo '</h4></div>';
            }
         ?>
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Nama File</th>
                  <th>File</th>
                  <th style="width: 200px;">Action</th>
                </tr>
              </thead>
              <tbody>
                <?php $i = 1; ?>
                <?php foreach($down as $D): ?>
                <tr>
                  <td scope="row"><?= $i++; ?></td>
                  <td><?= $D['nama'] ?></td>
                  <td><?= $D['file'] ?></td>
                  <td class="text-center">
                    <a href="<?= base_url() ?>" class="btn btn-info" data-toggle="modal"
                      data-target="#edit<?=$D['id'];?>"> <i class="fas fa-edit"></i> Edit</a>
                    <a href="" class="btn btn-danger" data-toggle="modal" data-target="#delete<?=$D['id'];?>"> <i
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
        <form action="/down/add/" method="Post" enctype="multipart/form-data">
          <div class="form-group">
            <label for="nama">Nama File</label>
            <input type="text" class="form-control" id="nama" name="nama">
          </div>

          <div class="form-group">
            <label for="file">File</label>
            <input type="file" class="form-control" id="file" name="file">
            <label class="text-danger">*File Harus Format .PDF, .DOC, .DOCX</label>
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
<?php foreach ($down as $D) : ?>
<div class="modal fade" id="edit<?=$D['id'];?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit <?= $title; ?></h5>
      </div>
      <div class="modal-body">
        <form action="/down/edit/<?= $D['id']; ?> " method="Post" enctype="multipart/form-data">
          <input type="hidden" name="filelama" value="<?= $D['file']; ?>">
          <div class="form-group">
            <label for="nama">Nama File</label>
            <input type="text" class="form-control" id="nama" name="nama" value="<?= $D['nama']; ?>" required>
          </div>

          <div class="form-group">
            <label for="file">Edit File</label>
            <input type="file" class="form-control" id="file" name="file">
            <label class="text-danger">*File Harus Format .PDF, .DOC, .DOCX</label>
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
<?php foreach($down as $D): ?>
<div class="modal fade " id="delete<?=$D['id'];?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
  <div class="modal-dialog " role="document">
    <div class="modal-content ">
      <div class="modal-header ">
        <h5 class="modal-title" id="exampleModalLabel">Hapus <?= $title; ?></h5>
      </div>
      <div class="modal-body">
        Yakin Hapus Data Kategori <?= $D['nama']; ?>!
      </div>
      <div class="modal-footer">
        <button class="btn btn-secondary" type="button" data-dismiss="modal">Tidak</button>
        <a class="btn btn-danger" href="<?= base_url('down/delete/'.$D['id']); ?>">Ya</a>
      </div>
    </div>
  </div>
</div>
<?php endforeach; ?>

<?= $this->endSection() ; ?>