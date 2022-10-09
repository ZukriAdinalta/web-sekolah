<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

  <!-- Sidebar - Brand -->
  <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
    <div class="sidebar-brand-icon rotate-n-15">
      <i class="fas fa-laugh-wink"></i>
    </div>
    <div class="sidebar-brand-text mx-3">Admin</div>
  </a>

  <!-- Divider -->
  <hr class="sidebar-divider my-0">

  <!-- Nav Item - Dashboard -->
  <li class="nav-item <?= $link == 'admin' ? 'active': '' ?>">
    <a class="nav-link" href="<?= base_url('admin') ; ?>">
      <i class="fas fa-fw fa-tachometer-alt"></i>
      <span>Dashboard</span></a>
  </li>
  <?php if(session()->level == 1) : ?>
  <!-- Divider -->
  <hr class="sidebar-divider">

  <!-- Heading -->
  <div class="sidebar-heading">
    Input Data
  </div>

  <!-- Nav Item - Mata Pelajaran -->
  <li class="nav-item <?= $link == 'users' ? 'active': '' ?>">
    <a class="nav-link" href="<?= base_url('users');?>">
      <i class="fas fa-users"></i>
      <span>Users</span></a>
  </li>

  <!-- Nav Item - Mata Pelajaran -->
  <li class="nav-item <?= $link == 'mapel' ? 'active': '' ?>">
    <a class="nav-link" href="<?= base_url('mapel');?>">
      <i class="fas fa-fw fa-table"></i>
      <span>Mata Pelajaran</span></a>
  </li>

  <!-- Nav Item - Mata Pelajaran -->
  <li class="nav-item <?= $link == 'kelas' ? 'active': '' ?>">
    <a class="nav-link" href="<?= base_url('kelas');?>">
      <i class="fas fa-people-arrows"></i>
      <span>Kelas</span></a>
  </li>


  <!-- Nav Item - Guru -->
  <li class="nav-item <?= $link == 'guru' ? 'active': '' ?>">
    <a class="nav-link" href="<?= base_url('guru');?>">
      <i class="fas fa-chalkboard-teacher"></i>
      <span>Guru</span></a>
  </li>

  <!-- Nav Item - Siswa -->
  <li class="nav-item <?= $link == 'siswa' ? 'active': '' ?>">
    <a class="nav-link" href="<?= base_url('siswa');?>">
      <i class="fas fa-user-graduate"></i>
      <span>Siswa</span></a>
  </li>
  <?php endif; ?>
  <!-- Divider -->
  <hr class="sidebar-divider">


  <!-- Heading -->
  <div class="sidebar-heading">
    Informasi
  </div>

  <?php if(session()->level == 1): ?>
  <!-- Nav Item - Utilities Collapse Menu -->
  <li class="nav-item <?= $link == 'sekolah' ? 'active': '' ?>">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true"
      aria-controls="collapseUtilities">
      <i class="fas fa-school"></i>
      <span>Sekolah</span>
    </a>
    <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
      <div class="bg-white py-2 collapse-inner rounded">
        <h6 class="collapse-header">Tentang Sekolah</h6>
        <a class="collapse-item" href="<?= base_url('sekolah/logo/1'); ?>">Logo & Kontak Website</a>
        <a class="collapse-item" href="<?= base_url('sekolah/visiMisi/1'); ?>">Visi Dan Misi</a>
        <a class="collapse-item" href="<?= base_url('sekolah/sejarah/1'); ?>">Sejarah Singkat</a>
        <a class="collapse-item" href="<?= base_url('sekolah/kepsek/1'); ?>">Kepala Sekolah</a>
        <a class="collapse-item" href="<?= base_url('sekolah/organisasi/1'); ?>">Strutur Organisasi</a>

      </div>
    </div>
  </li>
  <?php endif; ?>


  <!-- Nav Item - Pengumunan -->
  <li class="nav-item <?= $link == 'pengumuman' ? 'active': '' ?>">
    <a class="nav-link" href="<?= base_url('pengumuman');?>">
      <i class="fas fa-bullhorn"></i>
      <span>Pengumuman</span></a>
  </li>

  <!-- Nav Item - Pengumunan -->
  <li class="nav-item <?= $link == 'berita' ? 'active': '' ?>">
    <a class="nav-link" href="<?= base_url('berita');?>">
      <i class="fas fa-newspaper"></i>
      <span>Berita</span></a>
  </li>

  <!-- Nav Item - Pengumunan -->
  <li class="nav-item <?= $link == 'prestasi' ? 'active': '' ?>">
    <a class="nav-link" href="<?= base_url('prestasi');?>">
      <i class="fas fa-trophy"></i>
      <span>Prestasi</span></a>
  </li>

  <!-- Nav Item - Pengumunan -->
  <li class="nav-item <?= $link == 'down' ? 'active': '' ?>">
    <a class="nav-link" href="<?= base_url('down');?>">
      <i class="fas fa-download"></i>
      <span>File Download</span></a>
  </li>


  <!-- Divider -->
  <hr class="sidebar-divider">
  <!-- Heading -->
  <div class="sidebar-heading">
    Album
  </div>


  <!-- Nav Item - Gallery -->
  <li class="nav-item <?= $link == 'gallery' ||  $link == 'foto' ? 'active': '' ?>">
    <a class="nav-link" href="<?= base_url('gallery');?>">
      <i class="fas fa-image"></i>
      <span>Gallery</span></a>
  </li>
  <?php if(session()->level == 1): ?>
  <!-- Nav Item - Slide Show -->
  <li class="nav-item <?= $link == 'slide' ? 'active': '' ?>">
    <a class="nav-link" href="<?= base_url('slide');?>">
      <i class="fas fa-image"></i>
      <span>Slide Show</span></a>
  </li>
  <?php endif; ?>
  <!-- Divider -->
  <hr class="sidebar-divider d-none d-md-block">

  <!-- Sidebar Toggler (Sidebar) -->
  <div class="text-center d-none d-md-inline">
    <button class="rounded-circle border-0" id="sidebarToggle"></button>
  </div>

</ul>