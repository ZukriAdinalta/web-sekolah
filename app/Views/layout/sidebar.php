<!-- Courses Sidebar -->
<div class="col-lg-4">
  <div class="sidebar">

    <!-- Latest Course -->
    <div class="sidebar_section">
      <div class="sidebar_section_title">Berita Terbaru</div>
      <div class="sidebar_latest">

        <?php foreach($limit as $L): ?>
        <!-- Latest Course -->
        <div class="latest d-flex flex-row align-items-start justify-content-start">
          <div class="latest_image">
            <div><img src="<?= base_url('img/berita/'. $L['gambar']) ; ?>" alt=""></div>
          </div>
          <div class=" latest_content">
            <div class="latest_title"><a href="<?= base_url('home/detail/'.$L['slug']) ; ?>"><?= $L['judul']; ?></a>
            </div>
          </div>
        </div>
        <?php endforeach; ?>

      </div>
    </div>

    <div class="sidebar_section">
      <div class="sidebar_section_title">Berita Populer</div>
      <div class="sidebar_latest">

        <?php foreach($populer as $L): ?>
        <!-- Latest Course -->
        <div class="latest d-flex flex-row align-items-start justify-content-start">
          <div class="latest_image">
            <div><img src="<?= base_url('img/berita/'. $L['gambar']) ; ?>" alt=""></div>
          </div>
          <div class=" latest_content">
            <div class="latest_title"><a href="<?= base_url('home/detail/'.$L['slug']) ; ?>"><?= $L['judul']; ?></a>
            </div>
          </div>
        </div>
        <?php endforeach; ?>

      </div>
    </div>



    <!-- Banner -->
    <div class="sidebar_section">
      <div class="sidebar_banner d-flex flex-column align-items-center justify-content-center text-center">
        <div class="sidebar_banner_background" style="background-image:url(<?= base_url(); ?>/img/banner_1.jpg)">
        </div>
        <div class="sidebar_banner_overlay"></div>
        <div class="sidebar_banner_content">
          <div class="banner_title">Free Book</div>
          <div class="banner_button"><a href="<?= base_url('home/down'); ?>">download now</a></div>
        </div>
      </div>
    </div>
  </div>
</div>