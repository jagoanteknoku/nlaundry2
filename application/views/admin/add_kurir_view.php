<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <?php $this->load->view('admin/_partials/header.php'); ?>
</head>

<body class="">
  <div class="wrapper ">
    <div class="sidebar" data-color="purple" data-background-color="white" data-image="../assets/img/sidebar-1.jpg">
    <?php $this->load->view('admin/_partials/sidebar.php'); ?>
    </div>

    <div class="main-panel">

      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
        <?php $this->load->view('admin/_partials/navbar.php') ?>
      </nav>
      <!-- End Navbar -->

      <div class="content">
        <div class="container-fluid">
          <div class="row">
          <div class="col-md-9">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title ">Tambah Kurir</h4>
                  <p class="card-category"> </p>
                </div>
                <div class="card-body">
                <?php echo validation_errors(); ?>
				<form method="POST">
				
				<div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="bmd-label-floating">Nama</label>
						  <input type="text" class="form-control" name="nama" value="">
						</div>
					</div>
				</div>
				<div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
						  <label class="bmd-label-floating">Alamat</label>
						  <input type="text" class="form-control" name="alamat" value="">
						</div>
					</div>
				</div>
				<div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
						  <label class="bmd-label-floating">Phone</label>
                          <input type="number" class="form-control" name="phone"value="">
						</div>
					</div>
				</div>
				
				<input class="btn btn-primary pull-right" type="submit" name="add" value="Tambah">
				</form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <footer class="footer">
        <?php $this->load->view('admin/_partials/footer.php'); ?>
      </footer>

    </div>

  </div>
  
    <?php $this->load->view('admin/_partials/js.php'); ?>

</body>

</html>
