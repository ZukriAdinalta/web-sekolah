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
              <li><?= $title; ?></li>
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
          <h2 class="text-center bg-danger text-light "><?= $title; ?></h2>
        </div>
        <div class="courses_container">
          <div class="row courses_row ">

            <!-- Course -->
            <?php foreach($prestasi as $P): ?>
            <div class="col-lg-6 course_col mb-4">
              <div class="course2">
                <div class="event">
                  <div class="event_image2"><img src=" <?= base_url('img/prestasi/' . $P['foto']) ; ?>" alt=""></div>
                  <div class="event_body d-flex flex-row align-items-start justify-content-start">
                    <div class="event_date ml-1">
                      <div class="d-flex flex-column align-items-center justify-content-center trans_200">
                        <div class="event_day trans_200"><i class="fas fa-trophy"></i></div>
                      </div>
                    </div>
                    <div class="event_content">
                      <div class="event_title"><a
                          href="<?= base_url('home/detailPrestasi/'.$P['slug']) ; ?>"><?= substr($P['judul'], 0, 70); ?><?= strlen($P['judul']) >= 70 ? '...' : '' ?></a>
                      </div>
                      <div class="event_info_container">
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <?php endforeach; ?>
          </div>
          <?= $pager->links('prestasi', 'berita_pagination');?>
        </div>
      </div>

      <!-- Courses Sidebar -->
      <?= $this->include('layout/sidebar'); ?>
    </div>
  </div>
</div>

<?= $this->endSection(); ?>