<?= $this->extend('layout/template') ; ?>
<?= $this->Section('content') ; ?>


<!-- Home -->

<div class="home">
  <div class="breadcrumbs_container">
    <div class="container">
      <div class="row">
        <div class="col">
          <div class="breadcrumbs">
            <ul>
              <li><a href="index.html">Home</a></li>
              <li>Contact</li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>


<div class="container mt-5 mb-5">

  <!-- Page Heading -->
  <div class="row">
    <div class="col-lg-12">
      <!-- DataTales Example -->
      <div class="card shadow mb-4">
        <div class="card-header py-3 d-block ">
          <h6 class="m-0 font-weight-bold text-primary text-center"><?= $title; ?></h6>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Nis</th>
                  <th>Nama</th>
                  <th>Kelas</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <?php $i = 1; ?>
                <?php foreach($siswa as $S): ?>
                <tr>
                  <td scope="row"><?= $i++; ?></td>
                  <td><?= $S['nis'] ?></td>
                  <td><?= $S['nama'] ?></td>
                  <td><?= $S['kelas'] ?></td>
                  <td class="text-center">
                    <a href="" class="btn btn-info btn-sm" data-toggle="modal" data-target="#lihat<?= $S['id'] ?>">
                      <i class="fas fa-eye"></i></a>
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
<?php foreach($siswa as $S): ?>
<div class="modal fade" id="lihat<?= $S['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content" style="width: 650px;">
      <div class="modal-header ">
        <h5 class="modal-title" id="exampleModalLabel">Data Siswa</h5>
      </div>

      <div class="modal-body">
        <div class="card mb-3">
          <div class="row no-gutters ">
            <div class="col-md-4" style="margin: 10px 10px ;">
              <img src="<?= base_url(). '/img/siswa/' . $S['foto']; ?>" width="200px" height="280px"
                alt="<?= session()->get('nama'); ?>">
            </div>
            <div class="col-md-7">
              <div class="card " style=" margin: 20px 20px; width: 100%">
                <div class="card-body">
                  <ul class="list-group list-group-flush">
                    <li class="list-group-item">
                      Nama: <?= $S['nama']; ?>
                    </li>
                    <li class="list-group-item">
                      Nis: <?= $S['nis']; ?>
                    </li>
                    <li class="list-group-item">Tempat Lahir: <?= $S['tempat_lahir'] ?></li>
                    <li class="list-group-item">Tangal Lahir:
                      <?= ($S['tgl_lahir'] == null) ? '' :  date('d F Y', strtotime($S['tgl_lahir'] )); ?></a></li>
                    <li class="list-group-item">Kelas: <?= $S['kelas'] ?></a></li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <a class="btn btn-primary text-light" href="" data-dismiss="modal">Cancel</a>
        </div>

      </div>

    </div>
  </div>

</div>
<?php endforeach ; ?>



<?= $this->endSection(); ?>