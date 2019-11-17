<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <?php $this->load->view('admin/_partials/header.php'); ?>
</head>

<body>
  
<!--formden.js communicates with FormDen server to validate fields and submit via AJAX -->
<script type="text/javascript" src="https://formden.com/static/cdn/formden.js"></script>

  <div class="wrapper">
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
                  <h4 class="card-title ">Edit Transaksi</h4>
                  <p class="card-category"> </p>
          </div>
        <div class="card-body">

				<form method="POST" action="<?php echo base_url('admin/pelanggan/save/'.$this->uri->segment(4)); ?>">
				<?php foreach($transaksi as $data): ?>
				<div class="row">
          <div class="col-md-12">
            <div class="form-group">
            <label class="bmd-label-floating">Pelanggan</label> 
              <select class="form-control dropdown" name="pelanggan">
                  <?php foreach($pelanggan as $pelanggan): ?> 
                    <option value="<?php echo $pelanggan['pelanngan_id'];?>" <?php  if($data['pelanngan_id']==$pelanggan['pelanngan_id']) {echo "selected";} ?>><?php echo $pelanggan['pelanggan_nama']; ?></option>
                  <?php endforeach ?>
              </select>
            </div>
					</div>
				</div>
				<div class="row">
          <div class="col-md-12">
            <div class="form-group">
						  <label class="bmd-label-floating">Kurir</label>
              <select class="form-control dropdown" name="kurir">
               <?php foreach($kurir as $kurir): ?> 
                    <option value="<?php echo $kurir['kurir_id']; ?>" <?php  if($data['kurir_id']==$kurir['kurir_id']) { echo"selected";}?>><?php echo $kurir['kurir_nama'];?></option>
                <?php endforeach ?>
              </select>
              </div>
					</div>
				</div>
				<div class="row">
          <div class="col-md-12">
            <div class="form-group">
						  <label class="bmd-label-floating">Berat</label>
              <input type="number" class="form-control" name="berat" value="<?php echo $data['transaksi_berat']; ?>">
						</div>
					</div>
				</div>
				<div class="row">
          <div class="col-md-12">
            <div class="form-group">
						  <label class="bmd-label-floating">Status</label>
              <select class="form-control dropdown" name="status">
               <?php foreach($status as $status): ?> 
                    <option value="<?php echo $status['id']; ?>" <?php  if($data['transaksi_status']==$status['id']) { echo"selected";}?>><?php echo $status['status'];?></option>
                <?php endforeach ?>
              </select>
            </div>
					</div>
        </div>
				<div class="row">
          <div class="col-md-12">
            <div class="form-group">
						  <label class="bmd-label-floating">Barang</label>
              <select class="form-control dropdown" name="barang">
               <?php foreach($barang as $barang): ?> 
                    <option value="<?php echo $barang['barang_id']; ?>" <?php  if($data['transaksi_barang']==$barang['barang_id']) { echo"selected";}?>><?php echo $barang['barang_jenis'];?></option>
                <?php endforeach ?>
              </select>
            </div>
					</div>
				</div>
				<div class="row">
          <div class="col-md-12">
            <div class="form-group">
						  <label class="bmd-label-floating">Tanggal Masuk</label><br>
              <input class="form-control" id="datemasuk" name="datemasuk" placeholder="MM/DD/YYY" type="text" value="<?php echo $data['transaksi_masuk']; ?>"/>
						</div>
					</div>
				</div>
				<div class="row">
          <div class="col-md-12">
            <div class="form-group">
              <label class="bmd-label-floating">Tanggal Keluar</label><br>
              <input class="form-control" id="datekeluar" name="datekeluar" placeholder="MM/DD/YYY" type="text" value="<?php echo $data['transaksi_keluar']; ?>"/>
						</div>
					</div>
				</div>
				<?php endforeach ?>
				<input class="btn btn-primary pull-right" type="submit" name="save" value="SAVE">
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
    <script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>  
    <link rel="stylesheet" href="http://code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css"> 
    <script>  
      $(document).ready(function(){  
           $.datepicker.setDefaults({  
                dateFormat: 'yy-mm-dd'   
           });  
           $(function(){  
                $("#datemasuk").datepicker();  
                $("#datekeluar").datepicker();  
           });
      });  
    </script>
 </body>

</html>
