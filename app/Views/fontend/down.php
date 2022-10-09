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
                  <th>Nama File</th>
                  <th>Tanggal</th>
                  <th style="width: 200px;">Action</th>
                </tr>
              </thead>
              <tbody>
                <?php $i = 1; ?>
                <?php foreach($down as $D): ?>
                <tr>
                  <td scope="row"><?= $i++; ?></td>
                  <td><?= $D['nama'] ?></td>
                  <td><?=  date('d F Y', strtotime($D['created_at'] ))  ?></td>
                  <td class="text-center">
                    <a href="<?= base_url('file/'.$D['file'])?>" class="btn btn-info btn-sm text-center"> <i
                        class="fas fa-download"></i>
                      Download</a>
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




<?= $this->endSection(); ?>