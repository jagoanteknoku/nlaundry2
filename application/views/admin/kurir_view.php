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
                          Nama
                        </th>
                        <th>
                          Alamat
                        </th>
                        <th>
                          No. HP
                        </th>
                        <th>
                          Action
                        </th>
                      </thead>
                      <tbody>
                        <?php foreach ($data as $data) : ?>
                          <tr>
                            <th scope="row"><?php echo $data['kurir_id'] ?></th>
                            <td><?php echo $data['kurir_nama'] ?></td>
                            <td><?php echo $data['kurir_alamat'] ?></td>
                            <td><?php echo $data['kurir_no'] ?></td>
                            <td>
                            <?php echo '
                            <a href="'.base_url('admin/kurir/edit/'.$data['kurir_id']).'" class="btn btn-sm btn-info" >Edit</a>
                            <a href="'.base_url('admin/kurir/delete/'.$data['kurir_id']).'" class="btn btn-sm btn-danger" >Delete</a> 
                            '; ?>  
                            </td>
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
