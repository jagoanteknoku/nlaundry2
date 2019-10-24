<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title> LOGIN </title>
<link href="<?php echo base_url('assets/css/bootstrap.min.css');?>"  rel="stylesheet">
</head>
<body>
<div class="container-fluid">
	<div class="row">
		<div class="col-md-2">
		
		</div>
		<div class="col-md-8">
		<h1> Login Admin </h1>
		<?php if($this->session->flashdata('message')){
			echo $this->session->flashdata('message');
		} ?>
        <form method="POST" action="<?php echo base_url('auth/auth_login');?>">
            Username : <input type="text" name="username"> Password : <input type="password" name="password">
            <input type="submit" value="login"> 
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