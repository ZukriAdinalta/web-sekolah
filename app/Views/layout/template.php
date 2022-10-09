<?= $this->include('layout/head'); ?>

<body>
  <div class="super_container">
    <?= $this->include('layout/navbar'); ?>
    <?= $this->renderSection('content'); ?>


    <!-- Footer -->

    <footer class="footer">
      <div class="footer_background"></div>
      <div class="container">
        <div class="row footer_row">
          <div class="col">
            <div class="footer_content">
              <div class="row">

                <div class="col-lg-4 footer_col">

                  <!-- Footer About -->
                  <div class="footer_section footer_about">
                    <div class="footer_logo_container">
                      <a href="<?= base_url() ; ?>">
                        <img src="<?= base_url('img/berita/' . $sekolah['logo']) ; ?>" alt="">
                        <div class="logo_text"><?= $sekolah['title'];?><span><br><?= $sekolah['title2'];?></span></div>
                      </a>
                    </div>

                    <div class="footer_social">
                      <ul>
                        <li><a href="#"><i class="fab fa-facebook" aria-hidden="true"></i></a></li>
                        <li><a href="#"><i class="fab fa-google-plus" aria-hidden="true"></i></a></li>
                        <li><a href="#"><i class="fab fa-instagram" aria-hidden="true"></i></a></li>
                        <li><a href="#"><i class="fab fa-twitter" aria-hidden="true"></i></a></li>
                      </ul>
                    </div>
                  </div>

                </div>

                <div class="col-lg-4 footer_col">

                  <!-- Footer Contact -->
                  <div class="footer_section footer_contact">
                    <div class="footer_title">Kontak</div>
                    <div class="footer_contact_info">
                      <ul>
                        <li>Email: <?= $sekolah['email']; ?></li>
                        <li>Phone: <?= $sekolah['tlpn']; ?></li>
                        <li><?= $sekolah['alamat']; ?></li>
                      </ul>
                    </div>
                  </div>

                </div>

                <div class="col-lg-4 footer_col">

                  <!-- Footer links -->
                  <div class="footer_section footer_links">
                    <div class="footer_title">Menu</div>
                    <div class="footer_links_container">
                      <ul>
                        <li><a href="<?= base_url() ; ?>">Home</a></li>
                        <li><a href="<?= base_url('home/berita') ; ?>">Berita</a></li>
                        <li><a href="<?= base_url('home/prestasi') ; ?>">Prestasi</a></li>
                        <li><a href="<?= base_url('home/pengumuman') ; ?>">Pengumuman</a></li>
                        <li><a href="<?= base_url('home/gallery') ; ?>">Gallery</a></li>
                        <li><a href="<?= base_url('home/guru') ; ?>">Guru</a></li>
                        <li><a href="<?= base_url('home/siswa') ; ?>">Siswa</a></li>
                        <li><a href="<?= base_url('home/kontak') ; ?>">Kontak</a></li>
                      </ul>
                    </div>
                  </div>

                </div>


              </div>
            </div>
          </div>
        </div>

        <div class="row copyright_row">
          <div class="col">
            <div class="copyright d-flex flex-lg-row flex-column align-items-center justify-content-start">
              <div class="cr_text">
                <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                Copyright &copy;<script>
                document.write(new Date().getFullYear());
                </script>
              </div>
              <div class="ml-lg-auto cr_links">
                <ul class="cr_list">
                  <li><a href="#">Copyright notification</a></li>
                  <li><a href="#">Terms of Use</a></li>
                  <li><a href="#">Privacy Policy</a></li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </footer>
  </div>
  <script src="<?= base_url();?>/js/jquery-3.2.1.min.js"></script>
  <script src="<?= base_url();?>/styles/bootstrap4/popper.js"></script>
  <script src="<?= base_url();?>/styles/bootstrap4/bootstrap.min.js"></script>
  <script src="<?= base_url();?>/plugins/greensock/TweenMax.min.js"></script>
  <script src="<?= base_url();?>/plugins/greensock/TimelineMax.min.js"></script>
  <script src="<?= base_url();?>/plugins/scrollmagic/ScrollMagic.min.js"></script>
  <script src="<?= base_url();?>/plugins/greensock/animation.gsap.min.js"></script>
  <script src="<?= base_url();?>/plugins/greensock/ScrollToPlugin.min.js"></script>
  <script src="<?= base_url();?>/plugins/OwlCarousel2-2.2.1/owl.carousel.js"></script>
  <script src="<?= base_url();?>/plugins/easing/easing.js"></script>
  <script src="<?= base_url();?>/plugins/parallax-js-master/parallax.min.js"></script>
  <script src="<?= base_url();?>/js/custom.js"></script>
  <script src="<?= base_url();?>/plugins/marker_with_label/marker_with_label.js"></script>
  <script src="<?= base_url();?>/js/contact.js"></script>
  <script src="<?= base_url();?>/plugins/colorbox/jquery.colorbox-min.js"></script>
  <script src="<?= base_url();?>/js/courses.js"></script>
  <script src="js/blog_single.js"></script>

  <!-- Page level plugins -->
  <script src="<?= base_url();?>/vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="<?= base_url();?>/vendor/datatables/dataTables.bootstrap4.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="<?= base_url();?>/js/demo/datatables-demo.js"></script>

</body>

</html>