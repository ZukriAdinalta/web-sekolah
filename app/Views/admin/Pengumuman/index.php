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
            <a href="<?= base_url('pengumuman/add'); ?>" type="button" class=" btn btn-success btn-sm "><i
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
                  <th>Judul Pengumunan</th>
                  <th>Isi Pengumunan</th>
                  <th>Foto</th>
                  <th style="width: 80px;">Action</th>
                </tr>
              </thead>
              <tbody>
                <?php $i = 1; ?>
                <?php foreach($pengumuman as $P): ?>
                <tr>
                  <td scope="row"><?= $i++; ?></td>
                  <td><?= $P['nama'] ?></td>
                  <td><?= $P['isi'] ?></td>
                  <td> <img src="<?= base_url('img/pengumuman/'.$P['foto']) ; ?>" alt="" width="100px"></td>
                  <td class="text-center">
                    <a href="<?= base_url('pengumuman/edit/'. $P['slug']) ?>" class="btn btn-info"> <i
                        class="fas fa-edit"></i></a>
                    <a href="" class="btn btn-danger" data-toggle="modal" data-target="#delete<?=$P['id'];?>"> <i
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

<!-- modal Guru Delete -->
<?php foreach($pengumuman as $P): ?>
<div class="modal fade " id="delete<?=$P['id'];?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
  <div class="modal-dialog " role="document">
    <div class="modal-content ">
      <div class="modal-header ">
        <h5 class="modal-title" id="exampleModalLabel">Hapus <?= $title; ?></h5>
      </div>
      <div class="modal-body">
        Yakin Hapus Data <?= $P['nama']; ?>!
      </div>
      <div class="modal-footer">
        <button class="btn btn-secondary" type="button" data-dismiss="modal">Tidak</button>
        <a class="btn btn-danger" href="<?= base_url('/pengumuman/delete/'.$P['id']); ?>">Ya</a>
      </div>
    </div>
  </div>
</div>
<?php endforeach; ?>


<?= $this->endSection() ; ?>