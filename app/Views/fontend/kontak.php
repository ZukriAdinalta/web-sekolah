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
              <li>Contact</li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Contact -->

<div class="contact">

  <!-- Contact Map -->

  <div class="contact_map">

    <!-- Google Map -->

    <div class="map mt-1">
      <div id="google_map" class="google_map">
        <div class="map_container">
          <div id="map">
            <?= str_replace('width="600" height="450"', 'width="100%" height="550"', $sekolah['map']  ) ?>
          </div>
        </div>
      </div>
    </div>

  </div>

  <!-- Contact Info -->

  <div class="contact_info_container">
    <div class="container">
      <div class="row">

        <!-- Contact Info -->
        <div class="contact_info_location">
          <div class="contact_info_location_title">Kontak Info</div>
          <ul class="location_list">
            <li><?= $sekolah['alamat']; ?></li>
            <li><?= $sekolah['tlpn']; ?></li>
            <li><?= $sekolah['email']; ?></li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</div>


<?= $this->endSection(); ?>