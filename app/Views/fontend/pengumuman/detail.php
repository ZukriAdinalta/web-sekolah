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
          <div class="blog_title"> <?= $pengumuman['nama']; ?>
          </div>
          <div class="blog_meta">
          </div>
          <div class="blog_image"><img src=" <?= base_url('img/pengumuman/'. $pengumuman['foto']) ; ?>" alt=""
              width="750px;" height="425 px"></div>
          <?= $pengumuman['isi']; ?>
        </div>
      </div>

      <?= $this->include('layout/sidebar'); ?>
    </div>
  </div>
</div>

<?= $this->endSection(); ?>