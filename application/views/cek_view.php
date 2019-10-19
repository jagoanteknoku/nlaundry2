<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title><?php echo $title;?></title>
<link href="<?php echo base_url('assets/css/bootstrap.min.css');?>"  rel="stylesheet">
</head>
<body>
<div class="container-fluid">
	<div class="row">
		<div class="col-md-2">
		
		</div>
		<div class="col-md-8">
		<h1> WELCOME TO OTONG LAUNDRY ONLINE </h1>
		<table class="table table-striped">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">##</th>
          </tr>
        </thead>
        <?php
          foreach ($data as $data) :
        ?>
          <tr>
            <th scope="row">Nomor Antrian </th>
            <td><?php echo $data['transaksi_id'] ?></td>
          </tr>
		  <tr>
            <th scope="row">Status </th>
            <td><?php if($data['transaksi_status'] == 0){echo 'Antri';} elseif ($data['transaksi_status'] == 1){echo 'Pencucian';} elseif ($data['transaksi_status'] == 2){echo 'Siap Diambil';} elseif ($data['transaksi_status'] == 3){echo 'Barang di Antar';}  ?></td>
          </tr>
		  <tr>
            <th scope="row">Nama Pelanggan </th>
            <td><?php echo $data['pelanggan_nama'] ?></td>
          </tr>
		  <tr>
            <th scope="row">Barang Masuk </th>
            <td><?php echo $data['transaksi_masuk'] ?></td>
          </tr>
		  <tr>
            <th scope="row">Barang Keluar </th>
            <td><?php echo $data['transaksi_keluar'] ?></td>
          </tr>
		  <tr>
            <th scope="row">Berat </th>
            <td><?php echo $data['transaksi_berat'] ?></td>
          </tr>
		  <tr>
            <th scope="row">Total tang di bayar </th>
            <td><?php echo $data['transaksi_total'] ?></td>
          </tr>
        <?php endforeach;?>
        </tbody>
      </table>

		</div>
		<div class="col-md-2">
		
		</div>
		
	</div>
</div>

    <!-- load jquery js file -->
    <script src="<?php echo base_url('assets/js/jquery-3.4.1.min.js');?>"></script>
    <!-- load bootstrap js file -->
    <script src="<?php echo base_url('assets/js/bootstrap.min.js');?>"></script>
</body>
</html>