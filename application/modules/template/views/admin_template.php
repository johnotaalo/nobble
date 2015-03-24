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
    </style>
  </head>
  <body class="skin-blue fixed">
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
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <!-- Messages: style can be found in dropdown.less-->
              <li class="dropdown messages-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <i class="fa fa-envelope-o"></i>
                  <span class="label label-success">4</span>
                </a>
                <ul class="dropdown-menu">
                  <li class="header">You have 4 messages</li>
                  <li>
                    <!-- inner menu: contains the actual data -->
                    <ul class="menu">
                      <li><!-- start message -->
                        <a href="#">
                          <div class="pull-left">
                            <img src="<?php echo base_url(); ?>assets/admin/img/user2-160x160.jpg" class="img-circle" alt="User Image"/>
                          </div>
                          <h4>
                            Support Team
                            <small><i class="fa fa-clock-o"></i> 5 mins</small>
                          </h4>
                          <p>Why not buy a new awesome theme?</p>
                        </a>
                      </li><!-- end message -->
                      <li>
                        <a href="#">
                          <div class="pull-left">
                            <img src="<?php echo base_url(); ?>assets/admin/img/user3-128x128.jpg" class="img-circle" alt="user image"/>
                          </div>
                          <h4>
                            AdminLTE Design Team
                            <small><i class="fa fa-clock-o"></i> 2 hours</small>
                          </h4>
                          <p>Why not buy a new awesome theme?</p>
                        </a>
                      </li>
                      <li>
                        <a href="#">
                          <div class="pull-left">
                            <img src="<?php echo base_url(); ?>assets/admin/img/user4-128x128.jpg" class="img-circle" alt="user image"/>
                          </div>
                          <h4>
                            Developers
                            <small><i class="fa fa-clock-o"></i> Today</small>
                          </h4>
                          <p>Why not buy a new awesome theme?</p>
                        </a>
                      </li>
                      <li>
                        <a href="#">
                          <div class="pull-left">
                            <img src="<?php echo base_url(); ?>assets/admin/img/user3-128x128.jpg" class="img-circle" alt="user image"/>
                          </div>
                          <h4>
                            Sales Department
                            <small><i class="fa fa-clock-o"></i> Yesterday</small>
                          </h4>
                          <p>Why not buy a new awesome theme?</p>
                        </a>
                      </li>
                      <li>
                        <a href="#">
                          <div class="pull-left">
                            <img src="<?php echo base_url(); ?>assets/admin/img/user4-128x128.jpg" class="img-circle" alt="user image"/>
                          </div>
                          <h4>
                            Reviewers
                            <small><i class="fa fa-clock-o"></i> 2 days</small>
                          </h4>
                          <p>Why not buy a new awesome theme?</p>
                        </a>
                      </li>
                    </ul>
                  </li>
                  <li class="footer"><a href="#">See All Messages</a></li>
                </ul>
              </li>
              <!-- Notifications: style can be found in dropdown.less -->
              <li class="dropdown notifications-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <i class="fa fa-bell-o"></i>
                  <span class="label label-warning">10</span>
                </a>
                <ul class="dropdown-menu">
                  <li class="header">You have 10 notifications</li>
                  <li>
                    <!-- inner menu: contains the actual data -->
                    <ul class="menu">
                      <li>
                        <a href="#">
                          <i class="fa fa-users text-aqua"></i> 5 new members joined today
                        </a>
                      </li>
                      <li>
                        <a href="#">
                          <i class="fa fa-warning text-yellow"></i> Very long description here that may not fit into the page and may cause design problems
                        </a>
                      </li>
                      <li>
                        <a href="#">
                          <i class="fa fa-users text-red"></i> 5 new members joined
                        </a>
                      </li>

                      <li>
                        <a href="#">
                          <i class="fa fa-shopping-cart text-green"></i> 25 sales made
                        </a>
                      </li>
                      <li>
                        <a href="#">
                          <i class="fa fa-user text-red"></i> You changed your username
                        </a>
                      </li>
                    </ul>
                  </li>
                  <li class="footer"><a href="#">View all</a></li>
                </ul>
              </li>
              <!-- Tasks: style can be found in dropdown.less -->
              <li class="dropdown tasks-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <i class="fa fa-flag-o"></i>
                  <span class="label label-danger">9</span>
                </a>
                <ul class="dropdown-menu">
                  <li class="header">You have 9 tasks</li>
                  <li>
                    <!-- inner menu: contains the actual data -->
                    <ul class="menu">
                      <li><!-- Task item -->
                        <a href="#">
                          <h3>
                            Design some buttons
                            <small class="pull-right">20%</small>
                          </h3>
                          <div class="progress xs">
                            <div class="progress-bar progress-bar-aqua" style="width: 20%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                              <span class="sr-only">20% Complete</span>
                            </div>
                          </div>
                        </a>
                      </li><!-- end task item -->
                      <li><!-- Task item -->
                        <a href="#">
                          <h3>
                            Create a nice theme
                            <small class="pull-right">40%</small>
                          </h3>
                          <div class="progress xs">
                            <div class="progress-bar progress-bar-green" style="width: 40%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                              <span class="sr-only">40% Complete</span>
                            </div>
                          </div>
                        </a>
                      </li><!-- end task item -->
                      <li><!-- Task item -->
                        <a href="#">
                          <h3>
                            Some task I need to do
                            <small class="pull-right">60%</small>
                          </h3>
                          <div class="progress xs">
                            <div class="progress-bar progress-bar-red" style="width: 60%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                              <span class="sr-only">60% Complete</span>
                            </div>
                          </div>
                        </a>
                      </li><!-- end task item -->
                      <li><!-- Task item -->
                        <a href="#">
                          <h3>
                            Make beautiful transitions
                            <small class="pull-right">80%</small>
                          </h3>
                          <div class="progress xs">
                            <div class="progress-bar progress-bar-yellow" style="width: 80%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                              <span class="sr-only">80% Complete</span>
                            </div>
                          </div>
                        </a>
                      </li><!-- end task item -->
                    </ul>
                  </li>
                  <li class="footer">
                    <a href="#">View all tasks</a>
                  </li>
                </ul>
              </li>
              <!-- User Account: style can be found in dropdown.less -->
              <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <img src="<?php echo base_url(); ?>assets/admin/img/user2-160x160.jpg" class="user-image" alt="User Image"/>
                  <span class="hidden-xs">Alexander Pierce</span>
                </a>
                <ul class="dropdown-menu">
                  <!-- User image -->
                  <li class="user-header">
                    <img src="<?php echo base_url(); ?>assets/admin/img/user2-160x160.jpg" class="img-circle" alt="User Image" />
                    <p>
                      Alexander Pierce - Web Developer
                      <small>Member since Nov. 2012</small>
                    </p>
                  </li>
                  <!-- Menu Body -->
                  <li class="user-body">
                    <div class="col-xs-4 text-center">
                      <a href="#">Followers</a>
                    </div>
                    <div class="col-xs-4 text-center">
                      <a href="#">Sales</a>
                    </div>
                    <div class="col-xs-4 text-center">
                      <a href="#">Friends</a>
                    </div>
                  </li>
                  <!-- Menu Footer-->
                  <li class="user-footer">
                    <div class="pull-left">
                      <a href="#" class="btn btn-default btn-flat">Profile</a>
                    </div>
                    <div class="pull-right">
                      <a href="#" class="btn btn-default btn-flat">Sign out</a>
                    </div>
                  </li>
                </ul>
              </li>
            </ul>
          </div>
        </nav>
      </header>
      <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel -->
          <div class="user-panel">
            <div class="pull-left image">
              <img src="<?php echo base_url(); ?>assets/admin/img/user2-160x160.jpg" class="img-circle" alt="User Image" />
            </div>
            <div class="pull-left info">
              <p>Alexander Pierce</p>

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
              <a href="<?php echo base_url();?>products">
                <i class="fa fa-barcode"></i> <span>Products</span></i>
              </a>
            </li>
            </li>
            <li id = "orders">
              <a href="#">
                <i class="fa fa-shopping-cart"></i> <span>Orders</span></i>
              </a>
            </li>
             <li id = "blog">
              <a href="<?php echo base_url();?>blog">
                <i class="fa fa-newspaper-o"></i> <span>Blog</span></i>
              </a>
            </li>
            <li id = "inbox">
              <a href="#">
                <i class="fa fa-inbox"></i> <span>Inbox</span></i>
              </a>
            </li>
            <li>
              <a href="#">
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

    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <!--<script src="<?php echo base_url(); ?>assets/admin/js/pages/dashboard2.js" type="text/javascript"></script> -->

    <!-- AdminLTE for demo purposes -->
    <script src="<?php echo base_url(); ?>assets/admin/js/demo.js" type="text/javascript"></script>
    <script type="text/javascript" src = "<?php echo base_url();?>assets/admin/js/jquery.searchabledropdown-1.0.8.min.js"></script>
    

    <script type="text/javascript">
      $(document).ready(function(){
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