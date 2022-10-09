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
            <a href="<?= base_url('gallery/add'); ?>" type="button" class=" btn btn-success btn-sm " data-toggle="modal"
              data-target="#add"><i class="fa fa-plus">
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
                  <th>Nama Gallery</th>
                  <th>Sampul Gallery</th>
                  <th style="width: 80px;">Action</th>
                </tr>
              </thead>
              <tbody>
                <?php $i = 1; ?>
                <?php foreach($gallery as $G): ?>
                <tr>
                  <td scope="row"><?= $i++; ?></td>
                  <td><?= $G['nama_gallery']; ?></td>
                  <td class="text-center"> <img src="<?= base_url('img/gallery/'. $G['sampul_gallery']) ; ?>"
                      alt="<?= $G['nama_gallery']; ?>" width="200px">
                    <i class="fas fa-image d-block"> <?= $G['jml_foto'];; ?> Foto</i>
                    <a href="<?= base_url('foto/index/'. $G['id_gallery']); ?>"
                      class=" btn btn-success btn-sm d-block "><i class="fas fa-eye"></i> Lihat Foto</a>
                  </td>
                  <td class="text-center">
                    <a class="btn btn-info" data-toggle="modal" data-target="#edit<?=$G['id_gallery'];?>"> <i
                        class="fas fa-edit"></i></a>
                    <a class="btn btn-danger" data-toggle="modal" data-target="#delete<?=$G['id_gallery'];?>">
                      <i class="fas fa-trash-alt"></i></a>
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
        <form action="/gallery/add/" method="Post" enctype="multipart/form-data">
          <div class="form-group">
            <label for="nama_gallery">Nama Gallery</label>
            <input type="text" class="form-control" id="nama_gallery" name="nama_gallery">
          </div>
          <div class="form-group">
            <label for="sampul_gallery">Sampul Gallery</label>
            <input type="file" class="form-control" id="sampul_gallery" name="sampul_gallery">
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

<!-- Add Modal-->
<?php foreach($gallery as $G): ?>
<div class="modal fade" id="edit<?=$G['id_gallery'];?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit <?= $title; ?></h5>
      </div>
      <div class="modal-body">
        <form action="/gallery/edit/<?=$G['id_gallery'];?>" method="Post" enctype="multipart/form-data">
          <input type="hidden" name="fotolama" value="<?= $G['sampul_gallery']; ?>">
          <div class="form-group">
            <label for="nama_gallery">Nama Gallery</label>
            <input type="text" class="form-control" id="nama_gallery" name="nama_gallery"
              value="<?= $G['nama_gallery']; ?>">
          </div>
          <div class="form-group">
            <label for="sampul_gallery">Sampul Lama</label>
            <img src="<?= base_url('img/gallery/'. $G['sampul_gallery'] ) ; ?>" alt=""
              class="img-fluid img-thumbnail w-90">
          </div>

          <div class="form-group">
            <label for="sampul_gallery">Sampul Gallery</label>
            <input type="file" class="form-control" id="sampul_gallery" name="sampul_gallery">
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
<?php endforeach; ?>

<!-- modal Guru Delete -->
<?php foreach($gallery as $G): ?>
<div class="modal fade " id="delete<?=$G['id_gallery'];?>" tabindex="-1" role="dialog"
  aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog " role="document">
    <div class="modal-content ">
      <div class="modal-header ">
        <h5 class="modal-title" id="exampleModalLabel">Hapus <?= $title; ?></h5>
      </div>
      <div class="modal-body">
        Yakin Hapus Data <?= $G['nama_gallery']; ?>!
      </div>
      <div class="modal-footer">
        <button class="btn btn-secondary" type="button" data-dismiss="modal">Tidak</button>
        <a class="btn btn-danger" href="<?= base_url('/gallery/delete/'.$G['id_gallery']); ?>">Ya</a>
      </div>
    </div>
  </div>
</div>
<?php endforeach; ?>


<?= $this->endSection() ; ?>