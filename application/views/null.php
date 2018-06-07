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
        <li class="active treeview">
          <a href="<?php echo base_url().'services_c' ?>">
            <i class="fa fa-gear"></i>
            <span>Manage services</span>
            <span class="pull-right-container">
            </span>
          </a>
        </li>
        <li>
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
        <div class="col-md-10">
        <div class="box box-info">
          <div class="box-header with-border">
              <h3 class="box-title">Input Sesi Form</h3>
          </div>

          <?php echo $this->session->flashdata("eror");?>
          <form class="form-horizontal" action="<?php echo base_url(). 'services_c/update_services'; ?>" method="post">
              <?php echo validation_errors(); ?>
              <!-- <?php //echo form_open('services_c/aksi_valid_services'); ?> -->
              <div class="box-body">
              <?php foreach($service_categories as $u){ ?>

                <div class="form-group">
                  <label for="inputNamaUser3" class="col-sm-2 control-label">Name of Services</label>

                  <div class="col-sm-10">
                    <input type="hidden" class="form-control" name="id_srvc" value="<?php echo $u->id_srvc ?>">
                    <input type="text" class="form-control" id="inputNamaUser3" placeholder="Ex : Setrika" name="name_srvc" value="<?php echo $u->name_srvc ?>" required>
                  </div>
                </div>

                <div class="form-group">
                  <label for="inputNamaUser3" class="col-sm-2 control-label">Price per-Kg</label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="inputNamaUser3" placeholder="Ex : 100000000" name="price_perkg" value="<?php echo $u->price_perkg ?>" required>
                  </div>
                </div>          
              </div>

              <!-- /.box-body -->
              <div class="box-footer">
                <a href="<?=base_url()?>services_c" class="btn btn-default">Cancel</a>
                <button type="submit" class="btn btn-info pull-right">Change</button>
              </div>
              <!-- /.box-footer -->
              <?php } ?>
            </form>

        </div>
        </div>

      </div>
    </section>

    <section class="col-lg-5 connectedSortable">
    </section>
        <!-- right col -->

  </div>