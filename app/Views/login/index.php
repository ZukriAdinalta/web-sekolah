<?= $this->extend('login/layout/index') ; ?>
<?= $this->Section('content') ; ?>
<div class="row justify-content-center">

  <div class="col-md-6">

    <div class="card o-hidden border-0 shadow-lg my-5">
      <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row">
          <div class="col-lg">
            <div class="p-5">
              <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4">Login</h1>
                <?php 
        $errors = session()->getFlashdata('errors');
        if(!empty($errors)){ ?>
                <div class="alert alert-danger alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <ul>
                    <?php  foreach ($errors as $key => $error){ ?>
                    <li><?= esc($error) ?> </li>
                    <?php } ?>
                  </ul>
                </div>
                <?php } ?>
                <?php
        if(session()->getFlashdata('pesan')){
          echo '<div class="alert alert-danger alert-dismissible">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>';
          echo session()->getFlashdata('pesan');
          echo '</div>';
        }
      ?>
              </div>
              <form action="/login/auth" method="POST" class="user">
                <div class="form-group">
                  <input type="text" class="form-control form-control-user" id="username" name="username"
                    placeholder="Masukan Username..." required>
                </div>
                <div class="form-group">
                  <input type="password" class="form-control form-control-user" id="passsword" name="password"
                    placeholder="Password" required>
                </div>
                <button type="submit" class="btn btn-primary btn-user btn-block">
                  Login
                </button>
                <a href="<?= base_url(); ?>" class="btn btn-google btn-user btn-block">
                  Kembali
                </a>
              </form>
              <hr>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>

</div>
<?= $this->endSection() ; ?>