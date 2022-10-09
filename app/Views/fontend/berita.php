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
              <li>Berita</li>
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
      <div class="col-lg-8">
        <div class="courses_search_container">
          <h2 class="text-center">Berita</h2>
        </div>
        <div class="courses_container">
          <div class="row courses_row">

            <!-- Course -->
            <?php foreach($berita as $B): ?>
            <div class="col-lg-6 course_col">
              <div class="course" style="height: 460px;">
                <div class="course_image"><img src="<?= base_url('img/berita/'. $B['gambar']) ; ?>" width="345px"
                    height="220px" alt=""></div>
                <div class=" course_body">
                  <h4 class="course_title"><a
                      href="<?= base_url('home/detail/'.$B['slug']) ; ?>"><?= substr( $B['judul'], 0 , 47 )?>
                      <?= strlen($B['judul']) >= 47 ? '...' : '' ?></a>
                  </h4>
                  <!-- <div class="course_teacher">Penulis</div> -->
                  <div class="course_text">
                    <p><?= substr( $B['isi'], 0 , 100 )?><?= strlen($B['isi']) >= 100 ? '...' : '' ?></p>
                  </div>
                </div>
                <div class="course_footer">
                  <div class="course_footer_content d-flex flex-row align-items-center justify-content-start">
                    <div class="course_info">
                      <i class="fas fa-calendar" aria-hidden="true"> </i>
                      <span><?=date('d F Y', strtotime($B['created_at'])); ?></span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <?php endforeach; ?>
          </div>
          <?= $pager->links('berita', 'berita_pagination');?>
        </div>
      </div>

      <?= $this->include('layout/sidebar'); ?>
    </div>
  </div>
</div>

<?= $this->endSection(); ?>