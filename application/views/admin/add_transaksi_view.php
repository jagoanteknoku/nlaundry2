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
				<form method="POST"> 
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
						  <label class="bmd-label-floating">Barang</label>
              <select class="form-control dropdown" id="barang" name="barang">
               <?php foreach($barang as $vbarang): ?> 
                    <option value="<?php echo $vbarang['barang_id']; ?>"><?php echo $vbarang['barang_jenis'];?></option>
                <?php endforeach ?>
              </select>
            </div>
					</div>
				</div>
				<div class="row">
          <div class="col-md-12">
            <div class="form-group">
						  <label class="bmd-label-floating">Berat</label>
              <input type="number" class="form-control" name="berat" id="berat" value="0">
						</div>
					</div>
				</div>
        <div class="row">
          <div class="col-md-12">
            <div class="form-group">
						  <label class="bmd-label-floating">Harga</label>
              <input type="number" class="form-control" name="harga" id="harga" value="0">
						</div>
					</div>
				</div>
 
				<input class="btn btn-primary pull-right" type="submit" name="save" value="ADD">
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
            <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title ">Tambahkan User</h4>
                  <p class="card-category"> </p>
              </div>
              <div class="card-body"> 
            <form class="form-horizontal">
                <div class="modal-body"> 
                    <div class="form-group">
                    <label class="bmd-label-floating">Nama</label>
                        <div class="col-xs-9">
                            <input name="nama" id="nama" class="form-control" type="text">
                        </div>
                    </div>
 
                    <div class="form-group">
                      <label class="bmd-label-floating">Alamat</label>
                        <div class="col-xs-9">
                            <input name="alamat" id="alamat" class="form-control" type="text">
                        </div>
                    </div>
 
                    <div class="form-group">
                        <label class="bmd-label-floating">Phone</label>
                        <div class="col-xs-9">
                            <input name="phone" id="phone" class="form-control" type="text">
                        </div>
                    </div>
 
                </div>
 
                <div class="modal-footer">
                    <button class="btn" data-dismiss="modal" aria-hidden="true">Tutup</button>
                    <button class="btn btn-primary" id="btn_simpan">Simpan</button>
                </div>
            </form>
            </div>
            </div>
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
    <script type="text/javascript">
    $(document).ready(function(){

        //Input Harga 
        $("#berat").keyup(function(){
          var berat = $(this).val();
          var barang = $("#barang").children("option").filter(":selected").val();
          var harga =
          $.ajax({
            type : "POST",
            url : "<?php echo base_url('admin/transaksi/get_harga')?>",
            dataType : "JSON",
            data : {berat:berat, barang:barang},
            success : function(data){
              //console.log(data);
              $("#harga").val(data);
            } 
          });
        })
        .keyup();

        //Add User
        $('#btn_simpan').on('click',function(){
            var nama=$('#nama').val();
            var alamat=$('#alamat').val();
            var phone=$('#phone').val();
            $.ajax({
                type : "POST",
                url  : "<?php echo base_url('admin/transaksi/add_user')?>",
                dataType : "JSON",
                data : {nama:nama , alamat:alamat, phone:phone},
                success: function(data){
                    location.reload();
                }
            });
            return false;
        });

    });
    </script>
 </body>

</html>
