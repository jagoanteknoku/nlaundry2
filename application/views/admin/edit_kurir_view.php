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
		<h1> EDIT KURIR </h1>

		<form method="POST" action="<?php echo base_url('admin/kurir/save/'.$this->uri->segment(4)); ?>">
        <?php foreach($kurir as $data): ?>
		<input type="text" name="nama" value="<?php echo $data['kurir_nama']; ?>">
		<input type="text" name="alamat" value="<?php echo $data['kurir_alamat']; ?>">
		<input type="number" name="phone" value="<?php echo $data['kurir_no']; ?>">
			<?php endforeach ?>
		<input type="submit" name="save" value="SAVE">
		</form>

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