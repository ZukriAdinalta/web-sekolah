<?= $this->extend('admin/layout/index') ; ?>
<?= $this->Section('content') ; ?>

<div class="container-fluid">

  <!-- Page Heading -->
  <div class="row">
    <div class="col-lg-12">
      <!-- DataTales Example -->
      <div class="card shadow mb-4">
        <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary"><?= $title .' : '. $gallery['nama_gallery'] ; ?> </h6>
          <div class="text-right ">
            <a href="<?= base_url('gallery/add'); ?>" type="button" class=" btn btn-success btn-sm " data-toggle="modal"
              data-target="#add"><i class="fa fa-plus">
                Add</i></a>
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
              <table class="table table-bordered text-center" width="100%" cellspacing="2">
                <tbody>
                  <?php foreach($foto as $F): ?>
                  <td class="text-center d-inline-block mb-3 ml-3">
                    <div class="d-block mt-2">
                      <?= $F['ket_foto']; ?>
                    </div>
                    <img src="<?= base_url('img/gallery/'. $F['foto']) ; ?>" alt="" width="280px" height="150px">
                    <div class="d-block mt-2">
                      <a class=" btn btn-primary btn-sm" data-toggle="modal" data-target="#edit<?=$F['id_foto'];?>"><i
                          class="fas fa-edit"></i>
                        Edit</a>
                      <a class=" btn btn-danger btn-sm " data-toggle="modal" data-target="#delete<?=$F['id_foto'];?>"><i
                          class=" fas fa-trash-alt"></i>
                        Delete</a>
                    </div>
                  </td>
                  <?php endforeach; ?>
                </tbody>
              </table>
            </div>
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
        <h5 class="modal-title" id="exampleModalLabel">Tambah Foto <?= $gallery['nama_gallery'] ?></h5>
      </div>
      <div class="modal-body">
        <form action="/foto/add/<?= $gallery['id_gallery']; ?>" method="Post" enctype="multipart/form-data">
          <input type="hidden" name="id_gallery" value="<?= $gallery['id_gallery']; ?>">
          <div class="form-group">
            <label for="ket_foto">Keterangan Foto</label>
            <input type="text" class="form-control" id="ket_foto" name="ket_foto">
          </div>
          <div class="form-group">
            <label for="foto">Foto</label>
            <input type="file" class="form-control" id="foto" name="foto">
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
<?php foreach($foto as $F): ?>
<div class="modal fade" id="edit<?=$F['id_foto'];?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Foto <?= $F['ket_foto']; ?></h5>
      </div>
      <div class="modal-body">
        <form action="/foto/edit/<?=$F['id_foto'];?>" method="Post" enctype="multipart/form-data">
          <input type="hidden" name="id_gallery" value="<?= $gallery['id_gallery']; ?>">
          <input type="hidden" name="fotolama" value="<?= $F['foto']; ?>">
          <div class="form-group">
            <label for="ket_foto">Nama foto</label>
            <input type="text" class="form-control" id="ket_foto" name="ket_foto" value="<?= $F['ket_foto']; ?>">
          </div>
          <div class="form-group">
            <label for="sampul_foto">Foto Lama</label>
            <img src="<?= base_url('img/gallery/'. $F['foto'] ) ; ?>" alt="" class="img-fluid img-thumbnail w-90">
          </div>

          <div class="form-group">
            <label for="foto">foto</label>
            <input type="file" class="form-control" id="foto" name="foto">
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

<!-- modal Guru Delete -->
<?php foreach($foto as $F): ?>
<div class="modal fade " id="delete<?=$F['id_foto'];?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
  <div class="modal-dialog " role="document">
    <div class="modal-content ">
      <div class="modal-header ">
        <h5 class="modal-title" id="exampleModalLabel">Hapus <?= $title; ?></h5>
      </div>
      <div class="modal-body">
        <form action="/foto/delete/<?=$F['id_foto'];?>" method="Post">
          <input type="hidden" name="id_gallery" value="<?= $gallery['id_gallery']; ?>">
          Yakin Hapus Data Foto <?= $F['ket_foto']; ?>!
      </div>
      <div class="modal-footer">
        <button class="btn btn-secondary" type="button" data-dismiss="modal">Tidak</button>
        <button type="submit" class="btn btn-danger">Ya</button>
        </form>
      </div>
    </div>
  </div>
</div>
<?php endforeach; ?>


<?= $this->endSection() ; ?>