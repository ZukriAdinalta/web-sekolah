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
          <div class="blog_title"> <?= $prestasi['judul']; ?>
          </div>
          <div class="blog_image"><img src=" <?= base_url('img/prestasi/'. $prestasi['foto']) ; ?>" alt=""
              width="750px;" height="425 px"></div>
          <?= $prestasi['isi']; ?>
        </div>
        <div
          class="blog_extra d-flex flex-lg-row flex-column align-items-lg-center align-items-start justify-content-start">
        </div>
      </div>

      <!-- Blog Sidebar -->
      <?= $this->include('layout/sidebar'); ?>
    </div>
  </div>
</div>

<?= $this->endSection(); ?>