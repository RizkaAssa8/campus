<!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="<?php echo base_url();?>assets/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">WOZMI</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="<?php echo base_url();?>assets/dist/img/ppppp.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block"><?php echo $this->session->userdata("username"); ?></a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item has-treeview">
            <a href="<?php echo base_url().'web' ?>" class="nav-link">
              <i class="nav-icon fa fa-dashboard"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?php echo base_url().'services_c' ?>" class="nav-link">
              <i class="nav-icon fa fa-gear"></i>
              <p>
                Manages Services
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link active">
              <i class="nav-icon fa fa-user"></i>
              <p>
                Manages User
                <i class="right fa fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo base_url().'admin_c' ?>" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Admin</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url().'ironmam_c' ?>" class="nav-link active">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Ironmam</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url().'customer_c' ?>" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Customer</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="<?php echo base_url().'accounting_c' ?>" class="nav-link">
              <i class="nav-icon fa fa-dollar"></i>
              <p>
                Manages Accounting
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview">
            <a href="<?php echo base_url().'order_c' ?>" class="nav-link">
              <i class="nav-icon fa fa-eye"></i>
              <p>
                Monitoring Order
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="pages/calendar.html" class="nav-link">
              <i class="nav-icon fa fa-calendar"></i>
              <p>
                Report
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Dashboard</h1>
            </br>
            <a href="<?=base_url()?>customer_c/add_customer" class="btn btn-sm btn-primary"><i class="glyphicon glyphicon-plus"></i>Add</a>      
      
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active"></li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <?php echo $this->session->flashdata("ubah");?>
      <?php echo $this->session->flashdata("hapus");?>
      <?php echo $this->session->flashdata("sukses");?>

      <!-- Small boxes (Stat box) -->
      <div class="row">
      <div class="col-12">
          <div class="card">
        <div class="box">
          <div class="card-body">
                  <table id="example1" class="table table-bordered table-striped">
              <thead>
               <tr>
                  <th>Nomor</th>
                  <th>ID Customer</th>
                  <th>Nama</th>
                  <th>No HP</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>

          <?php 
          $no = 1;
          foreach($customer as $u){ 
          ?>

          <tr>
            <td><?php echo $no++ ?></td>
            <td><?php echo $u->id_cst ?></td>
            <td><?php echo $u->name_cst ?></td>
            <td><?php echo $u->nohp_cst ?></td>
            <td>
                  <a class="btn btn-success" href="<?php echo base_url('customer_c/edit_customer/'.$u->id_cst)?>">Edit</a>

                  <a class="btn btn-info" href="<?php echo base_url('customer_c/detail_customer/'.$u->id_cst)?>">Detail</a>

                  <a class="btn btn-danger" href="<?php echo base_url('customer_c/delete_customer/'.$u->id_cst)?>" onclick="return confcst('Are you sure to delete this?');">Delete</a>
                  
            </td>
          </tr>
          <?php } ?>
              </tbody>
             </table>
          </div>
        </div>
        </div>
      </div>
      </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->