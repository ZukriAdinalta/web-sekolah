	<!-- Header -->

	<header class="header">

	  <!-- Top Bar -->
	  <div class="top_bar">
	    <div class="top_bar_container">
	      <div class="container">
	        <div class="row">
	          <div class="col">
	            <div class="top_bar_content d-flex flex-row align-items-center justify-content-start">
	              <ul class="top_bar_contact_list">

	              </ul>
	            </div>
	          </div>
	        </div>
	      </div>
	    </div>
	  </div>

	  <!-- Header Content -->
	  <div class="header_container">
	    <div class="container">
	      <div class="row">
	        <div class="col">
	          <div class=" header_content d-flex flex-row align-items-center justify-content-start">
	            <div class="logo_container">
	              <a href="<?= base_url() ; ?>">
	                <img src="<?= base_url('img/berita/' . $sekolah['logo']) ; ?>" alt="">
	                <div class="logo_text"><?= $sekolah['title'];?><span><br><?= $sekolah['title2'];?></span></div>
	              </a>
	            </div>
	            <nav class="main_nav_contaner ml-auto">
	              <ul class="main_nav">
	                <li class="<?= $link == '' || $link == 'home' ? 'active': '' ?>"><a href="<?= base_url() ; ?>">Home</a>
	                </li>

	                <li class="nav-item dropdown ">
	                  <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
	                    aria-haspopup="true" aria-expanded="false">
	                    Sekolah
	                  </a>
	                  <div class="dropdown-menu" aria-labelledby="navbarDropdown">
	                    <a class="dropdown-item <?= $link == 'visiMisi' ? 'active': '' ?>"
	                      href="<?= base_url('home/visiMisi/1'); ?>">Visi & Misi</a>
	                    <a class="dropdown-item <?= $link == 'sejarah' ? 'active': '' ?>"
	                      href="<?= base_url('home/sejarah/1'); ?>">Sejarah Singkat</a>
	                    <a class="dropdown-item <?= $link == 'kepsek' ? 'active': '' ?>"
	                      href="<?= base_url('home/kepsek/1') ; ?>">Kepala Sekolah</a>
	                    <a class="dropdown-item <?= $link == 'guru' ? 'active': '' ?>"
	                      href="<?= base_url('home/guru') ; ?>">Guru</a>
	                    <a class="dropdown-item <?= $link == 'organisasi' ? 'active': '' ?>"
	                      href="<?= base_url('home/organisasi/1'); ?>">Struktur Organisasi</a>
	                    <a class="dropdown-item <?= $link == 'siswa' ? 'active': '' ?>"
	                      href="<?= base_url('home/siswa'); ?>">Siswa</a>
	                    <a class="dropdown-item <?= $link == 'prestasi' ? 'active': '' ?>"
	                      href="<?= base_url('home/prestasi') ; ?>">Prestasi</a>
	                    <a class="dropdown-item <?= $link == 'pengumuman' ? 'active': '' ?>"
	                      href="<?= base_url('home/pengumuman') ; ?>">Pengumuman</a>
	                  </div>
	                </li>
	                <li class="<?= $link == 'berita' ? 'active': '' ?>"><a
	                    href="<?= base_url('home/berita') ; ?>">Berita</a></li>
	                <li class="<?= $link == 'gallery' ? 'active': '' ?>"><a
	                    href="<?= base_url('home/gallery') ; ?>">Gallery</a></li>
	                <li class=" <?= $link == 'down' ? 'active': '' ?>"><a
	                    href="<?= base_url('home/down') ; ?>">Download</a>
	                </li>
	                <li class="<?= $link == 'kontak' ? 'active': '' ?>"><a
	                    href="<?= base_url('home/kontak') ; ?>">Kontak</a></li>
	                <li><a href="<?= base_url('login') ; ?>" target="_blank" class="btn btn-primary text-light">Login</a>
	                </li>
	              </ul>

	              <!-- Hamburger -->

	              <div class="hamburger menu_mm">
	                <i class="fa fa-bars menu_mm" aria-hidden="true"></i>
	              </div>
	            </nav>

	          </div>
	        </div>
	      </div>
	    </div>
	  </div>

	  <!-- Header Search Panel -->
	  <div class="header_search_container">
	    <div class="container">
	      <div class="row">
	        <div class="col">
	          <div class="header_search_content d-flex flex-row align-items-center justify-content-end">
	            <form action="#" class="header_search_form">
	              <input type="search" class="search_input" placeholder="Search" required="required">
	              <button class="header_search_button d-flex flex-column align-items-center justify-content-center">
	                <i class="fa fa-search" aria-hidden="true"></i>
	              </button>
	            </form>
	          </div>
	        </div>
	      </div>
	    </div>
	  </div>
	</header>
	<!-- Menu untk mobile -->

	<div class="menu d-flex flex-column align-items-end justify-content-start text-right menu_mm trans_400">
	  <div class="menu_close_container">
	    <div class="menu_close">
	      <div></div>
	      <div></div>
	    </div>
	  </div>
	  <nav class="menu_nav">
	    <ul class="menu_mm">
	      <li class="menu_mm"><a href="index.html">Home</a></li>
	      <li class="menu_mm"><a href="#">Gallery</a></li>
	      <li class="menu_mm"><a href="#">Download</a></li>
	      <li class="menu_mm"><a href="#">Berita</a></li>
	      <li class="menu_mm"><a href="contact.html">About</a></li>
	    </ul>
	  </nav>
	</div>