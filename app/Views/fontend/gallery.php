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
              <li>Gallery</li>
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
          <h2 class="text-center">Gallery</h2>
        </div>
        <div class="courses_container">
          <div class="row courses_row">

            <!-- Course -->
            <?php foreach($gallery as $G): ?>
            <div class="col-lg-4 col-md-8 course_col">
              <div class="course_gallery">
                <div class="course_image"><img src="<?= base_url('img/gallery/'. $G['sampul_gallery']) ?>" width="345px"
                    height="220px" alt=""></div>
                <div class=" course_body">
                  <h4 class="course_title"><a href="<?= base_url('home/foto/'.$G['id_gallery']) ; ?>"> Gallery:
                      <?= $G['nama_gallery']; ?></a>
                  </h4>
                </div>
                <div class="course_footer">
                  <div class="course_footer_content d-flex flex-row align-items-center justify-content-start">
                    <div class="course_info">
                      <span> Jumlah : <?= $G['jml_foto']; ?></span>
                      <i class="fas fa-image" aria-hidden="true"> </i>
                    </div>
                  </div>
                </div>
              </div>

            </div>
            <?php endforeach; ?>

          </div>
          <?= $pager->links('gallery', 'berita_pagination');?>

        </div>

      </div>
    </div>
  </div>
</div>


<?= $this->endSection(); ?>