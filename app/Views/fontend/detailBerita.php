<?= $this->extend('layout/template') ; ?>
<?= $this->Section('content') ; ?>

<div class="home">
  <div class="breadcrumbs_container">
    <div class="container">
      <div class="row">
        <div class="col">
          <div class="breadcrumbs">
            <ul>
              <li><a href="index.html">Home</a></li>
              <li><a href="blog.html">Berita</a></li>
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
          <div class="blog_title"> <?= $berita['judul']; ?>
          </div>
          <div class="blog_meta">
            <ul>
              <li>By <a href="#"><?= $berita['nama']; ?></a></li>
              <li><i class="fas fa-eye " aria-hidden="true"></i> <a href="#"><?= $berita['views']; ?></a></li>
            </ul>
          </div>
          <div class="blog_image"><img src=" <?= base_url('img/berita/'. $berita['gambar']) ; ?>" alt="" width="750px;"
              height="425 px"></div>
          <?= $berita['isi']; ?>
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

      <?= $this->include('layout/sidebar'); ?>
    </div>
  </div>
</div>

<?= $this->endSection(); ?>