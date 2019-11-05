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
                          <td><?php echo $data['kurir_nama'] ?></td>
                          <td><?php echo $data['transaksi_berat'] ?></td>
                          <td><?php if($data['transaksi_status'] == 0){echo 'Antri';} elseif ($data['transaksi_status'] == 1){echo 'Pencucian';} elseif ($data['transaksi_status'] == 2){echo 'Siap Diambil';} elseif ($data['transaksi_status'] == 3){echo 'Barang di Antar';}  ?></td>
                          <td><?php echo $data['transaksi_masuk'] ?></td>
                          <td><?php echo $data['transaksi_keluar'] ?></td>
                          <td><?php echo $data['transaksi_total'] ?></td>
                          <td><?php echo '<a href="'.base_url('admin/transaksi/edit/'.$data['transaksi_id']).'" class="btn btn-sm btn-info" >Edit</a>'; ?></td>
                        </tr>
                      <?php endforeach;?>
                      </tbody>
                    </table>
                  </div>
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
