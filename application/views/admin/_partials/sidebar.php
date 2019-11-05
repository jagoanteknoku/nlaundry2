
      <div class="logo">
        <a href="http://www.creative-tim.com" class="simple-text logo-normal">
          Creative Tim
        </a>
      </div>
      <div class="sidebar-wrapper">
        <ul class="nav">
          <li class="nav-item <?php if($this->uri->segment(2) == "dashboard"){ echo 'active';}?> ">
            <a class="nav-link" href="<?php echo base_url('admin/dashboard');?>">
              <i class="material-icons">dashboard</i>
              <p>Dashboard</p>
            </a>
          </li>
          <li class="nav-item <?php if($this->uri->segment(2) == "pelanggan"){ echo 'active';}?>">
            <a class="nav-link" href="<?php echo base_url('admin/pelanggan');?>">
              <i class="material-icons">person</i>
              <p>Pelanggan</p>
            </a>
          </li>
          <li class="nav-item <?php if($this->uri->segment(2) == "kurir"){ echo 'active';}?>">
            <a class="nav-link" href="<?php echo base_url('admin/kurir');?>">
              <i class="material-icons">local_shipping</i>
              <p>Kurir</p>
            </a>
          </li>
          <li class="nav-item <?php if($this->uri->segment(2) == "transaksi"){ echo 'active';}?>">
            <a class="nav-link" href="<?php echo base_url('admin/transaksi');?>">
              <i class="material-icons">swap_horiz</i>
              <p>Transaksi</p>
            </a>
          </li>
        </ul>
      </div>