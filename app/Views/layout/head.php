<!DOCTYPE html>
<html lang="en">

<head>
  <title><?= $title; ?></title>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="description" content="Unicat project">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="shortcut icon" type="image/ico" href="<?= base_url('img/berita/' . $sekolah['logo']) ; ?>">
  <link rel="stylesheet" type="text/css" href="<?= base_url();?>/styles/bootstrap4/bootstrap.min.css">
  <link href="<?= base_url();?>/plugins/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <link href="<?= base_url();?>/plugins/colorbox/colorbox.css" rel="stylesheet" type="text/css">
  <link rel="stylesheet" type="text/css" href="<?= base_url();?>/plugins/OwlCarousel2-2.2.1/owl.carousel.css">
  <link rel="stylesheet" type="text/css" href="<?= base_url();?>/plugins/OwlCarousel2-2.2.1/owl.theme.default.css">
  <link rel="stylesheet" type="text/css" href="<?= base_url();?>/plugins/OwlCarousel2-2.2.1/animate.css">
  <link rel="stylesheet" type="text/css" href="<?= base_url();?>/styles/main_styles.css">
  <?php if($link == '' || $link == 'home'): ?>
  <link rel="stylesheet" type="text/css" href="<?= base_url();?>/styles/responsive.css">
  <?php elseif($link == 'down' || $link == 'guru' || $link == 'kontak' ): ?>
  <link rel="stylesheet" type="text/css" href="<?= base_url();?>/styles/contact.css">
  <link rel="stylesheet" type="text/css" href="<?= base_url();?>/styles/contact_responsive.css">
  <?php elseif($link == 'berita' || $link == 'gallery' || $link == 'foto' )  : ?>
  <link rel="stylesheet" type="text/css" href="<?= base_url();?>/styles/courses.css">
  <link rel="stylesheet" type="text/css" href="<?= base_url();?>/styles/courses_responsive.css">
  <?php else: ?>
  <link rel="stylesheet" type="text/css" href="<?= base_url();?>/styles/blog_single.css">
  <link rel="stylesheet" type="text/css" href="<?= base_url();?>/styles/blog_single_responsive.css">
  <?php endif; ?>
  <!-- Custom styles for this page -->
  <link href="<?= base_url();?>/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
  <link href="<?= base_url() ; ?>/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
</head>