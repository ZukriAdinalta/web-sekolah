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
              <li>Guru</li>
            </ul>
          </div>
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
          <h2 class="section_title bg-info text-light">Tenaga Pendidik</h2>
        </div>
      </div>
    </div>
    <div class="row team_row ">

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
  </div>
</div>
<?= $this->endSection(); ?>