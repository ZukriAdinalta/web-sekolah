<?= $this->extend('layout/template') ; ?>
<?= $this->Section('content') ; ?>

<div class="home">
  <div class="breadcrumbs_container">
    <div class="container">
      <div class="row">
        <div class="col">
          <div class="breadcrumbs">
            <ul>
              <li><a href="<?= base_url() ; ?>">Home</a></li>
              <li><a href="">Visi & Misi</a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Blog -->

<div class="blog">
  <div class="container">
    <div class="row">

      <!-- Blog Content -->
      <div class="col-lg-8">
        <div class="blog_content">
          <div class="blog_title text-center bg-info text-light"><?= $title; ?></div>
          <div class="blog_image"><img class="rounded mx-auto d-block mb-3"
              src=" <?= base_url('img/guru/' .  $sekolah['fotoKepsek']) ; ?>" alt="" width="300px" height=" 300px">
          </div>
          <?= $sekolah['kepalaSekolah']; ?>
        </div>
        <div
          class="blog_extra d-flex flex-lg-row flex-column align-items-lg-center align-items-start justify-content-start">
          <div class="blog_social ml-lg-auto">
            <span>Share: </span>
            <ul>
              <li><a href="#"><i class="fab fa-facebook" aria-hidden="true"></i></a></li>
              <li><a href="#"><i class="fab fa-twitter" aria-hidden="true"></i></a></li>
              <li><a href="#"><i class="fab fa-google-plus" aria-hidden="true"></i></a></li>
              <li><a href="#"><i class="fab fa-linkedin" aria-hidden="true"></i></a></li>
              <li><a href="#"><i class="fab fa-envelope" aria-hidden="true"></i></a></li>
            </ul>
          </div>
        </div>
      </div>

      <!-- Blog Sidebar -->
      <?= $this->include('layout/sidebar'); ?>
    </div>
  </div>
</div>

<?= $this->endSection(); ?>