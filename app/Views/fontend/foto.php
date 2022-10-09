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
              <li>Foto</li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Courses -->

<div class="courses">
  <div class="container">
    <div class="row">

      <!-- Courses Main Content -->
      <div class="col-lg-12">
        <div class="courses_search_container">
          <h2 class="text-center"><?= $title .' : '. $gallery['nama_gallery'] ; ?></h2>
        </div>

        <div class="table-responsive mt-4">
          <table class="table table-bordered text-center " width="100%" cellspacing="2">
            <tbody>
              <?php foreach($foto as $F): ?>
              <td class="text-center d-inline-block mb-3 ml-3 mt-3">
                <div class="d-block mt-2">
                </div>
                <img src="<?= base_url('img/gallery/'. $F['foto']) ; ?>" alt="" width="280px" height="150px">
                <h5><?= $F['ket_foto']; ?></h5>
              </td>
              <?php endforeach; ?>
            </tbody>
          </table>
        </div>

      </div>
    </div>
  </div>
</div>

<?= $this->endSection(); ?>