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
              <li><a href=""><?= $title; ?></a></li>
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
          <div class="blog_title"></div>
          <div class="blog_image"><img src=" <?= base_url('img/berita/sejarah.jpg') ; ?>" alt="" width="100%"
              height=" 200px">
          </div>
          <?= $sekolah['sejarah']; ?>
        </div>
      </div>

      <!-- Blog Sidebar -->
      <?= $this->include('layout/sidebar'); ?>
    </div>
  </div>
</div>

<?= $this->endSection(); ?>