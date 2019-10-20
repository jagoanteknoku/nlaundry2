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
            <th scope="col">ID</th>
            <th scope="col">Pelanggan</th>
            <th scope="col">Kurir</th>
            <th scope="col">Berat</th>
            <th scope="col">Status</th>
            <th scope="col">Tgl Masuk</th>
            <th scope="col">Tgl Keluar</th>
            <th scope="col">Total Harga</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <?php
          foreach ($data as $data) :
        ?>
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