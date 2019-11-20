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
				<form method="POST" action="<?php echo base_url('admin/transaksi/save/'.$this->uri->segment(4)); ?>"> 
				<div class="row">
          <div class="col-md-12">
            <div class="form-group">
            <label class="bmd-label-floating">Pelanggan</label> 
              <select class="form-control dropdown" name="pelanggan">
                  <?php foreach($pelanggan as $pelanggan): ?> 
                    <option value="<?php echo $pelanggan['pelanngan_id'];?>"><?php echo $pelanggan['pelanggan_nama']; ?></option>
                  <?php endforeach ?>
              </select>
              <small><a href="#" data-toggle="modal" data-target="#ModalaAdd"> Add New User </a></small>
            </div>
					</div>
				</div>
				<div class="row">
          <div class="col-md-12">
            <div class="form-group">
						  <label class="bmd-label-floating">Kurir</label>
              <select class="form-control dropdown" name="kurir">
               <?php foreach($kurir as $kurir): ?> 
                    <option value="<?php echo $kurir['kurir_id']; ?>"><?php echo $kurir['kurir_nama'];?></option>
                <?php endforeach ?>
              </select>
              </div>
					</div>
				</div>
				<div class="row">
          <div class="col-md-12">
            <div class="form-group">
						  <label class="bmd-label-floating">Berat</label>
              <input type="number" class="form-control" name="berat" value="0">
						</div>
					</div>
				</div>
				<div class="row">
          <div class="col-md-12">
            <div class="form-group">
						  <label class="bmd-label-floating">Barang</label>
              <select class="form-control dropdown" name="barang">
               <?php foreach($barang as $vbarang): ?> 
                    <option value="<?php echo $vbarang['barang_id']; ?>"><?php echo $vbarang['barang_jenis'];?></option>
                <?php endforeach ?>
              </select>
            </div>
					</div>
				</div>
 
				<input class="btn btn-primary pull-right" type="submit" name="save" value="SAVE">
				</form>
                </div>
              </div>
            </div>
          </div>
        
        </div>
      </div>

        <!-- MODAL ADD -->
        <div class="modal fade" id="ModalaAdd" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
            <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h3 class="modal-title" id="myModalLabel">Tambah Barang</h3>
            </div>
            <form class="form-horizontal">
                <div class="modal-body">
 
                    <div class="form-group">
                        <label class="control-label col-xs-3" >Kode Barang</label>
                        <div class="col-xs-9">
                            <input name="kobar" id="kode_barang" class="form-control" type="text" placeholder="Kode Barang" style="width:335px;" required>
                        </div>
                    </div>
 
                    <div class="form-group">
                        <label class="control-label col-xs-3" >Nama Barang</label>
                        <div class="col-xs-9">
                            <input name="nabar" id="nama_barang" class="form-control" type="text" placeholder="Nama Barang" style="width:335px;" required>
                        </div>
                    </div>
 
                    <div class="form-group">
                        <label class="control-label col-xs-3" >Harga</label>
                        <div class="col-xs-9">
                            <input name="harga" id="harga" class="form-control" type="text" placeholder="Harga" style="width:335px;" required>
                        </div>
                    </div>
 
                </div>
 
                <div class="modal-footer">
                    <button class="btn" data-dismiss="modal" aria-hidden="true">Tutup</button>
                    <button class="btn btn-info" id="btn_simpan">Simpan</button>
                </div>
            </form>
            </div>
            </div>
        </div>
        <!--END MODAL ADD-->
        
      <footer class="footer">
        <?php $this->load->view('admin/_partials/footer.php'); ?>
      </footer>

    </div>

  </div>
   
    <?php $this->load->view('admin/_partials/js.php'); ?>
 </body>

</html>
