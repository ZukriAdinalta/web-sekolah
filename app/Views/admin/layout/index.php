<?php 
use App\Models\SekolahModel;
$this->SekolahModel = new SekolahModel();
$icon = $this->SekolahModel->first();
?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title> <?= $title; ?></title>

  <!-- Custom fonts for this template-->
  <link rel="shortcut icon" type="image/ico" href="<?= base_url('img/berita/'. $icon['logo']);?>">
  <link href="<?= base_url() ; ?>/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link
    href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
    rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="<?= base_url() ; ?>/css/sb-admin-2.min.css" rel="stylesheet">

  <!-- Custom styles for this page -->
  <link href="<?= base_url() ; ?>/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

  <link type="text/css" href="<?= base_url() ; ?>/ckeditor5/sample/css/sample.css" rel="stylesheet" media="screen" />

</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <?= $this->include('admin/layout/sidebar') ; ?>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <?= $this->include('admin/layout/topbar') ; ?>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <?= $this->renderSection('content') ; ?>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; Your Website 2021</span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel"><?= session()->get('nama'); ?></h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Yakin Mau Logout?</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="<?= base_url('login/logout'); ?>">Logout</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="<?= base_url() ; ?>/vendor/jquery/jquery.min.js"></script>
  <script src="<?= base_url() ; ?>/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="<?= base_url() ; ?>/vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="<?= base_url() ; ?>/js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <script src="<?= base_url() ; ?>/vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="<?= base_url() ; ?>/vendor/datatables/dataTables.bootstrap4.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="<?= base_url() ; ?>/js/demo/datatables-demo.js"></script>

  <script>
  window.setTimeout(function() {
    $('.pesan').fadeTo(500, 0).slideUp(500, function() {
      $(this).remove();
    });
  }, 3000);
  </script>

  <script src="<?= base_url() ; ?>/ckeditor5/ckeditor.js"></script>

  <style>
  .ck-editor__editable_inline {
    min-height: 200px;
  }
  </style>
  <script>
  ClassicEditor
    .create(document.querySelector('#editor'), {
      // toolbar: ['heading', '|', 'bold', 'italic', 'link']

    })
    .then(editor => {
      window.editor = editor;
    })
    .catch(err => {
      console.error(err.stack);
    });
  </script>
</body>

</html>