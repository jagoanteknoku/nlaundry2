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
            <th scope="col">Nama</th>
            <th scope="col">Alamat</th>
            <th scope="col">No HP</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <?php
          foreach ($data as $data) :
        ?>
          <tr>
            <th scope="row"><?php echo $data['pelanngan_id'] ?></th>
            <td><?php echo $data['pelanggan_nama'] ?></td>
            <td><?php echo $data['pelanggan_alamat'] ?></td>
            <td><?php echo $data['pelanggan_no'] ?></td>
            <td>
            <?php echo '
            <a href="'.base_url('user/pelanggan/edit/'.$data['pelanngan_id']).'" class="btn btn-sm btn-info" >Edit</a>
            <a href="'.base_url('user/pelanggan/delete/'.$data['pelanngan_id']).'" class="btn btn-sm btn-danger" >Delete</a> 
            '; ?>
            </td>
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