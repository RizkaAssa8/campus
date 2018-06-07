<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?php echo base_url() ?>assets/dist/img/pp.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?php echo $this->session->userdata("username"); ?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- search form -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
          <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        
        <li class="treeview">
          <a href="<?php echo base_url().'web' ?>">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
            <span class="pull-right-container">
            </span>
          </a>
        </li>
        <li class="treeview">
          <a href="<?php echo base_url().'services_c' ?>">
            <i class="fa fa-gear"></i>
            <span>Manage services</span>
            <span class="pull-right-container">
            </span>
          </a>
        </li>
        <li class="active treeview">
          <a href="<?php echo base_url().'user_c' ?>">
            <i class="fa fa-user"></i> <span>Manage user</span>
            <span class="pull-right-container">
            </span>
          </a>
        </li>
        <li class="treeview">
          <a href="<?php echo base_url().'accounting_c' ?>">
            <i class="fa fa-dollar"></i>
            <span>Manage accounting</span>
            <span class="pull-right-container">
            </span>
          </a>
        </li>
        <li class="treeview">
          <a href="<?php echo base_url().'order_c' ?>">
            <i class="fa fa-eye"></i>
            <span>Monitoring order</span>
            <span class="pull-right-container">
            </span>
          </a>
        </li>
        
      </ul> 
        
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url().'web' ?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <?php echo $this->session->flashdata("ubah");?>
      <?php echo $this->session->flashdata("hapus");?>
      <?php echo $this->session->flashdata("sukses");?>
      <a href="<?=base_url()?>services_c/add_services" class="btn btn-sm btn-primary"><i class="glyphicon glyphicon-plus"></i>    Add</a>
      </br> </br>
      <!-- Small boxes (Stat box) -->
      <div class="row">
      <div class="col-xs-12">
        
        <div class="box">
          <div class="box-body">
                  <table id="example1" class="table table-bordered table-striped">
              <thead>
               <tr>
                  <th>Nomor</th>
                  <th>ID Ironmam</th>
                  <th>Name Ironmam</th>
                  <th>Nomor HP Ironam</th>
                  <th>ID Customer</th>
                  <th>Name Customer</th>
                  <th>Nomor HP Customer</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>

          <?php 
          $no = 1;
          foreach($user as $u){ 
          ?>

          <tr>
            <td><?php echo $no++ ?></td>
            <td><?php echo $u->id_irm ?></td>
            <td><?php echo $u->name_irm ?></td>
            <td><?php echo $u->nohp_irm ?></td>
            <td><?php echo $u->id_cst ?></td>
            <td><?php echo $u->name_cst ?></td>
            <td><?php echo $u->nohp_cst ?></td>


            <td>
                  <!-- <a class="btn btn-success" href="<?php echo base_url('user_c/edit_/'.$u->id_)?>">Edit</a>

                  <a class="btn btn-info" href="<?php echo base_url('user_c/detail_/'.$u->id_)?>">Detail</a>

                  <a class="btn btn-danger" href="<?php echo base_url('user_c/delete_/'.$u->id_)?>" onclick="return confirm('Are you sure to delete this?');">Delete</a> -->
                  
            </td>
          </tr>
          <?php } ?>
              </tbody>
             </table>
          </div>
        </div>

      </div>
      </div>
    </section>

    <section class="col-lg-5 connectedSortable">
    </section>
        <!-- right col -->

  </div>