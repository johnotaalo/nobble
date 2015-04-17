<!DOCTYPE html>
<html>
  <head>
  <meta charset="UTF-8">
  <title><?php ?></title>
  <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
  <!-- Bootstrap 3.3.2 -->
  <link href="<?php echo base_url(); ?>assets/admin/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
  <!-- Font Awesome Icons -->
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
  <!-- Ionicons -->
  <link href="http://code.ionicframework.com/ionicons/2.0.0/css/ionicons.min.css" rel="stylesheet" type="text/css" />
  <!-- Morris chart -->
  <link href="<?php echo base_url(); ?>assets/admin/plugins/morris/morris.css" rel="stylesheet" type="text/css" />
  <!-- jvectormap -->
  <link href="<?php echo base_url(); ?>assets/admin/plugins/jvectormap/jquery-jvectormap-1.2.2.css" rel="stylesheet" type="text/css" />
  <!-- Daterange picker -->
  <link href="<?php echo base_url(); ?>assets/admin/plugins/daterangepicker/daterangepicker-bs3.css" rel="stylesheet" type="text/css" />
  <!-- Theme style -->
  <link href="<?php echo base_url(); ?>assets/admin/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
  <!-- AdminLTE Skins. Choose a skin from the css/skins 
  folder instead of downloading all of them to reduce the load. -->
  <link href="<?php echo base_url(); ?>assets/admin/css/skins/_all-skins.min.css" rel="stylesheet" type="text/css" />
  <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/admin/css/admin.css">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/bower_components/ionicons/css/ionicons.min.css">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/admin/plugins/datatables/dataTables.bootstrap.css">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/dropzone/basic.css">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/dropzone/dropzone.css">
  <style type="text/css">
    .row
    {
      margin-right: 0 !important;
    }
  </style>
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
  <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
  <![endif]-->
  <!-- jQuery 2.1.3 -->
  <script src="<?php echo base_url(); ?>assets/admin/plugins/jQuery/jQuery-2.1.3.min.js"></script>
  <script type="text/javascript" src = "<?php echo base_url(); ?>assets/dropzone/dropzone.js"></script>
  <script type="text/javascript">
      $(document).ready(function(){
        $('#<?php echo $list_item; ?>').addClass('active');
        base_url = '<?php echo base_url();?>';
      });
    </script>

    <script type="text/javascript" src = "<?php echo base_url();?>assets/ckeditor/ckeditor.js"></script>
    <script type="text/javascript" src = "<?php echo base_url();?>assets/tinymce/js/tinymce/tinymce.min.js"></script>
    <script type="text/javascript" src = "<?php echo base_url();?>assets/admin/plugins/datatables/jquery.dataTables.js"></script>
    <script type="text/javascript" src = "<?php echo base_url();?>assets/admin/plugins/datatables/dataTables.bootstrap.js"></script>
    <style type="text/css">
      .adddiv
      {
        border: 3px dashed #95a5a6;
        padding: 7px;
      }
      .action
      {
        color: #7f8c8d;
      }
      .action:hover
      {
        color: #95a5a6;
      }

      .action:hover .addiv
      {
        background-color: #2c3e50;
      }

      .folder
      {
        cursor: pointer;
      }
      .folder i
      {
        color: #3498db;
      }

      .content-wrapper
      {
        background-color: #fff;
      }
      .breadcrumb > li + li:before {
        color: #ccc;
        content: ">>";
        padding: 0 5px;
      }
      .ajax-overlay{
        background-color: rgba(0, 0, 0, 0.7);
        width: 100%;
        height: 100%;
        position: absolute;
        z-index: 2222222;
        display: none;
      }

      .ajax-overlay .load-container
      {
        text-align: center;
        width: 500px;
        height: 100px;

        position: absolute;
        top:0;
        bottom: 0;
        left: 0;
        right: 0;

        margin: auto;
      }
    </style>
  </head>
  <body class="skin-blue fixed">
    <div class = "ajax-overlay">
      <div class = "load-container">
        <i class = "fa fa-refresh fa-spin fa-3x" style = "color: #ffffff;"></i> <h2 style = "color: #ffffff;">Loading... Please Wait</h2>
      </div>
    </div>
    <div class="wrapper">
      
      <header class="main-header">
        <!-- Logo -->
        <a href="index2.html" class="logo"><b>Nobble</b>Drug</a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
          </a>
          <!-- Navbar Right Menu -->
         
        </nav>
      </header>
      <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel -->
          <div class="user-panel">
            <div class="pull-left image">
              <img src="<?php echo $this->session->userdata('profile'); ?>" class="img-circle" alt="User Image" />
            </div>
            <div class="pull-left info">
              <p><?php echo $this->session->userdata('first_name') .' ' . $this->session->userdata('last_name');?></p>

              <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
          </div>
          <!-- search form -->
          <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
              <input type="text" name="q" class="form-control" placeholder="Search..."/>
              <span class="input-group-btn">
                <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>
              </span>
            </div>
          </form>
          <!-- /.search form -->
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            <li class="header">ADMIN MENU</li>
            <li id = "dashboard">
              <a href="<?php echo base_url();?>dashboard">
                <i class="fa fa-dashboard"></i> <span>Dashboard</span></i>
              </a>
            </li>
             <li id = "products">
              <a href="<?php echo base_url();?>dashboard/categories">
                <i class="fa fa-barcode"></i> <span>Products</span></i>
              </a>
            </li>
            </li>
            <li id = "orders">
              <a href="<?php echo base_url();?>dashboard/orders">
                <i class="fa fa-shopping-cart"></i> <span>Orders</span></i>
              </a>
            </li>
            <li id = "blog">
              <a href="<?php echo base_url();?>dashboard/blog">
                <i class="fa fa-newspaper-o"></i> <span>Blog</span></i>
              </a>
            </li>
            <li id = "user">
              <a href="<?php echo base_url();?>dashboard/users">
                <i class="ion ion-person-stalker"></i> <span>User Management</span></i>
              </a>
            </li>
            <li id = "inbox">
              <a href="#">
                <i class="fa fa-inbox"></i> <span>Inbox</span></i>
              </a>
            </li>
            <li>
              <a href="<?php echo base_url();?>user/logout">
                <i class="fa fa-sign-out"></i> <span>Log Out</span></i>
              </a>
            </li>
          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>


      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">

        <!-- Main content -->
        <section class="content">
          <!-- Info boxes -->
          <div class="row">
            <?php $this->load->view($content_view);?>
          </div><!-- /.row -->
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
       <?php $this->load->view('modals/general_modal'); ?>
      <footer class="main-footer">
        <div class="pull-right hidden-xs">
          <b>Admin</b> Panel
        </div>
        <strong>Copyright &copy; <?php echo date('Y'); ?> <a href="">Nobble Drug</a>.</strong> All rights reserved.
      </footer>

    </div><!-- ./wrapper -->

    
    <!-- Bootstrap 3.3.2 JS -->
    <script src="<?php echo base_url(); ?>assets/admin/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>

    <script src="<?php echo base_url(); ?>assets/admin/admin.js" type="text/javascript"></script>
    <!-- FastClick -->
    <script src='<?php echo base_url(); ?>assets/admin/plugins/fastclick/fastclick.min.js'></script>
    <!-- AdminLTE App -->
    <script src="<?php echo base_url(); ?>assets/admin/js/app.min.js" type="text/javascript"></script>
    <!-- Sparkline -->
    <script src="<?php echo base_url(); ?>assets/admin/plugins/sparkline/jquery.sparkline.min.js" type="text/javascript"></script>
    <!-- jvectormap -->
    <script src="<?php echo base_url(); ?>assets/admin/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>assets/admin/plugins/jvectormap/jquery-jvectormap-world-mill-en.js" type="text/javascript"></script>
    <!-- daterangepicker -->
    <script src="<?php echo base_url(); ?>assets/admin/plugins/daterangepicker/daterangepicker.js" type="text/javascript"></script>
    <!-- datepicker -->
    <script src="<?php echo base_url(); ?>assets/admin/plugins/datepicker/bootstrap-datepicker.js" type="text/javascript"></script>
    <!-- iCheck -->
    <script src="<?php echo base_url(); ?>assets/admin/plugins/iCheck/icheck.min.js" type="text/javascript"></script>
    <!-- SlimScroll 1.3.0 -->
    <script src="<?php echo base_url(); ?>assets/admin/plugins/slimScroll/jquery.slimscroll.min.js" type="text/javascript"></script>
    <!-- ChartJS 1.0.1 -->
    <script src="<?php echo base_url(); ?>assets/admin/plugins/chartjs/Chart.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>assets/highcharts/js/highcharts.js"></script>
    <script src="<?php echo base_url(); ?>assets/highcharts/js/modules/exporting.js"></script>

    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <!--<script src="<?php echo base_url(); ?>assets/admin/js/pages/dashboard2.js" type="text/javascript"></script> -->

    <!-- AdminLTE for demo purposes -->
    <script src="<?php echo base_url(); ?>assets/admin/js/demo.js" type="text/javascript"></script>
    <script type="text/javascript" src = "<?php echo base_url();?>assets/admin/js/jquery.searchabledropdown-1.0.8.min.js"></script>
    

    <script type="text/javascript">
      $(document).ready(function(){
        $('#1yr').trigger('click');
        $('select').searchable({
          maxListSize: 100,                       // if list size are less than maxListSize, show them all
        maxMultiMatch: 50,
        exactMatch: false,
        wildcards: true, 
        ignoreCase: true,
        latency: 200,
        warnMultiMatch: 'top {0} matches ...',
        warnNoMatch: 'no matches ...',
        zIndex: 'auto'       
        });

        $('table').dataTable();
        Dropzone.options.myAwesomeDropzone = {
                autoProcessQueue: false,
                uploadMultiple: true,
                parallelUploads: 100,
                maxFiles: 100,

                // Dropzone settings
                init: function() {
                    var myDropzone = this;

                    this.element.querySelector("button[type=submit]").addEventListener("click", function(e) {
                        e.preventDefault();
                        e.stopPropagation();
                        myDropzone.processQueue();
                    });
                    this.on("sendingmultiple", function() {
                        console.log('Uploading Files. Please wait...');
                    });
                    this.on("successmultiple", function(files, response) {
                        location.reload();
                    });
                    this.on("errormultiple", function(files, response) {
                        alert(response);
                    });
                }

            }
      });
    </script>
  </body>
</html>