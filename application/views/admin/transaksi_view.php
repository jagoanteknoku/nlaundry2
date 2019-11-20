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
          <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title ">List Kurir</h4>
                  <p class="card-category"> </p>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table">
                      <thead class=" text-primary">
                        <th>
                          ID
                        </th>
                        <th>
                          Pelanggan
                        </th>
                        <th>
                          Kurir
                        </th>
                        <th>
                          Berat
                        </th>
                        <th>
                          Status
                        </th>
                        <th>
                        Tgl Masuk
                        </th>
                        <th>
                        Tgl Keluar
                        </th>
                        <th>
                        Total Harga
                        </th>
                        <th>
                        Action
                        </th>
                      </thead>
                      <tbody>
                      <?php foreach ($data as $data) : ?>
                        <tr>
                          <th scope="row"><?php echo $data['transaksi_id'] ?></th>
                          <td><?php echo $data['pelanggan_nama'] ?></td>
                          <td><?php foreach ($kurir as $txkurir) {
                            if($data['transaksi_kurir'] == $txkurir['kurir_id']){
                              echo $txkurir['kurir_nama'];
                            }
                          } ?></td>
                          <td><?php echo $data['transaksi_berat'] ?></td>                          
                          <td><?php echo $data['status'] ?></td>
                          <td><?php echo $data['transaksi_masuk'] ?></td>
                          <td><?php echo $data['transaksi_keluar'] ?></td>
                          <td><?php echo $data['transaksi_total'] ?></td>
                          <td><?php echo '
                            <a href="'.base_url('admin/transaksi/edit/'.$data['transaksi_id']).'" class="btn btn-sm btn-info" >Edit</a>
                            <a href="'.base_url('admin/transaksi/delete/'.$data['transaksi_id']).'" class="btn btn-sm btn-danger" >Delete</a> 
                          '; ?>
                          <?php 
                          echo '<div class="dropdown">
                          <button class="btn btn-sm btn-success dropdown-toggle" type="button" data-toggle="dropdown">Status
                          <span class="caret"></span></button>
                          <ul class="dropdown-menu">';
                          foreach ($status as $statusi) {
                              echo '<li><a href="'.base_url('admin/transaksi/status/'.$data['transaksi_id']).'/'.$statusi['id'].'">'.$statusi['status'].'</a></li>';
                          }
                          echo '</ul> </div>';
                          ?>
                          </td>
                        </tr>
                      <?php endforeach;?>
                      </tbody>
                    </table>
                  </div>
                  <a href="<?php echo base_url('admin/transaksi/add');?>" class="btn btn-primary btn-lg pull-right"> Add </a>
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
    <script>
      $('.table-responsive').on('show.bs.dropdown', function () {
          $('.table-responsive').css( "overflow", "inherit" );
      });

      $('.table-responsive').on('hide.bs.dropdown', function () {
          $('.table-responsive').css( "overflow", "auto" );
      })
    </script>

</body>

</html>
