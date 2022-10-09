<?= $this->extend('layout/template') ; ?>
<?= $this->Section('content') ; ?>

<!-- Home -->

<div class="home2">
  <div class="home_slider_container">

    <!-- Home Slider -->
    <div class="owl-carousel owl-theme home_slider">

      <!-- Home Slider Item -->
      <?php foreach($slide as $S) : ?>
      <div class="owl-item">
        <div class="home_slider_background"
          style=" background-size: 1350px 600px; background-image:url( <?= base_url('img/slide/'.$S['foto'] );?>">
        </div>
        <div class="home_slider_content">
          <div class="container">
            <div class="row">
              <div class="col text-center">
                <div class="home_slider_title text-primary"><?= $S['judul']; ?></div>
                <div class="home_slider_subtitle"></div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <?php endforeach; ?>

    </div>
  </div>

  <!-- Home Slider Nav -->

  <div class="home_slider_nav home_slider_prev"><i class="fa fa-angle-left" aria-hidden="true"></i></div>
  <div class="home_slider_nav home_slider_next"><i class="fa fa-angle-right" aria-hidden="true"></i></div>
</div>

<!-- Popular Courses -->

<div class="courses">
  <div class="section_background parallax-window" data-parallax="scroll" data-image-src="images/courses_background.jpg"
    data-speed="0.8"></div>
  <div class="container">
    <div class="row">
      <div class="col">
        <div class="section_title_container text-center">
          <h2 class="section_title  ">Pengumuman</h2>
        </div>
      </div>
    </div>
    <div class="row courses_row">

      <!-- Course -->
      <?php foreach($pengumuman as $P): ?>
      <div class="col-lg-4 course_col">
        <div class="course">
          <div class="course_image"><img src=" <?= base_url('img/pengumuman/'. $P['foto'] ) ; ?> " alt=""></div>
          <div class="course_body">
            <h3 class="course_title"><a href="course.html"><?= $P['nama']; ?></a></h3>
            <div class="course_text">
              <p><?= substr($P['isi'], 0, 100);?><?= strlen($P['isi']) >= 100 ? '...' : '' ?>
              </p>
            </div>
          </div>
          <div class="course_footer">
            <div class="course_footer_content d-flex flex-row align-items-center justify-content-start">
              <div class="course_info">
                <i class="fas fa-calendar" aria-hidden="true"> </i>
                <span><?=date('d F Y', strtotime($P['created_at'])); ?></span>
              </div>
            </div>
          </div>
        </div>
      </div>
      <?php endforeach; ?>

    </div>
    <div class="row">
      <div class="col">
        <div class="courses_button trans_200"><a href="<?= base_url('home/pengumuman') ; ?>">Selengkapnya</a></div>
      </div>
    </div>
  </div>
</div>


<!-- Events -->

<div class="events">
  <div class="container">
    <div class="row">
      <div class="col">
        <div class="section_title_container text-center">
          <h2 class="section_title">Prestasi</h2>
        </div>
      </div>
    </div>
    <div class="row events_row">

      <!-- Event -->
      <?php foreach($prestasi as $P): ?>
      <div class="col-lg-4 event_col">
        <div class="event event_left">
          <div class="event_image"><img src=" <?= base_url('img/prestasi/' . $P['foto']) ; ?>" alt=""></div>
          <div class="event_body d-flex flex-row align-items-start justify-content-start">
            <div class="event_date">
              <div class="d-flex flex-column align-items-center justify-content-center trans_200">

                <div class="event_day trans_200 "><i class="fas fa-trophy"></i></div>
              </div>
            </div>
            <div class="event_content">
              <div class="event_title"><a href="#"><?= substr($P['judul'], 0, 70) ; ?></a></div>
            </div>
          </div>
        </div>
      </div>
      <?php endforeach; ?>
    </div>
    <div class="row">
      <div class="col">
        <div class="btn-info courses_button trans_200"><a href="<?= base_url('home/prestasi') ; ?>">Selengkapnya</a>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Team -->

<div class="team">
  <div class="team_background parallax-window" data-parallax="scroll" data-image-src="images/team_background.jpg"
    data-speed="0.8"></div>
  <div class="container">
    <div class="row">
      <div class="col">
        <div class="section_title_container text-center">
          <h2 class="section_title">Tenaga Pendidikan</h2>
        </div>
      </div>
    </div>
    <div class="row team_row">

      <!-- Team Item -->
      <?php foreach($guru as $G): ?>
      <div class="col-lg-3 col-md-6 team_col">
        <div class="team_item">
          <div class="team_image"><img src="<?= base_url('img/guru/'.$G['foto']);?>" alt="">
          </div>
          <div class="team_body" style="height: 275px;">
            <div class="team_title"> <a href="#"> <?= ucwords($G['nama']); ?> </a>
            </div>
            <div class="team_subtitle"><?= strtoupper($G['nama_mapel']) ; ?></div>
            <div class="social_list">
              <ul>
                <li><a href="#"><i class="fab fa-facebook" aria-hidden="true"></i></a></li>
                <li><a href="#"><i class="fab fa-instagram" aria-hidden="true"></i></a></li>
                <li><a href="#"><i class="fab fa-twitter" aria-hidden="true"></i></a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
      <?php endforeach; ?>

    </div>
    <div class="row">
      <div class="col">
        <div class="btn-danger courses_button trans_200"><a href="<?= base_url('home/guru') ; ?>">Selengkapnya</a></div>
      </div>
    </div>
  </div>
</div>

<!-- Latest News -->

<div class="news">
  <div class="container">
    <div class="row">
      <div class="col">
        <div class="section_title_container text-center">
          <h2 class="section_title">Berita Terbaru</h2>
        </div>
      </div>
    </div>
    <div class="row news_row">
      <div class="col-lg-7 news_col">

        <!-- News Post Large -->
        <?php foreach($berita2 as $B): ?>
        <div class="news_post_large_container">
          <div class="news_post_large">
            <div class="news_post_image"><img src="<?= base_url('img/berita/' . $B['gambar'] ); ?>" alt=""></div>
            <div class="news_post_large_title"><a href="blog_single.html"><?= $B['judul']; ?></a></div>
            <div class="news_post_meta">
              <ul>
                <li><a href="#"><?= $B['nama']; ?></a></li>
                <li><a href="#"><?= date('d F Y', strtotime($B['created_at'])); ?></a></li>
              </ul>
            </div>
            <div class="news_post_text">
              <?= substr( $B['isi'], 0 , 150 )?><?= strlen($B['isi']) >= 150 ? '...' : '' ?>
            </div>
            <div class="news_post_link"><a href="blog_single.html">read more</a></div>
          </div>
        </div>
        <?php endforeach; ?>
      </div>

      <div class="col-lg-5 news_col">
        <div class="news_posts_small">

          <!-- News Posts Small -->
          <?php foreach($berita as $B): ?>
          <div class="news_post_small">
            <div class="news_post_small_title"><a href="blog_single.html"><?= $B['judul']; ?></a></div>
            <div class="news_post_meta">
              <ul>
                <li><a href="#"><?= $B['nama']; ?></a></li>
                <li><a href="#"><?= date('d F Y', strtotime($B['created_at'])); ?></a></li>
              </ul>
            </div>
          </div>
          <?php endforeach; ?>


        </div>
      </div>
    </div>
  </div>
</div>


<?= $this->endSection(); ?>