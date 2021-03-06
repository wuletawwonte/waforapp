<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>WaForApp | Admin</title>

  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="<?= base_url(); ?>assets/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?= base_url(); ?>assets/bower_components/font-awesome/css/font-awesome.min.css"> 
  <link rel="stylesheet" href="<?= base_url(); ?>assets/bower_components/Ionicons/css/ionicons.min.css">
  <link rel="stylesheet" href="<?= base_url(); ?>assets/bower_components/select2/dist/css/select2.min.css">
  <link rel="stylesheet" href="<?= base_url(); ?>assets/bower_components/select2/dist/css/select2-bootstrap.min.css">

  <link rel="stylesheet" href="<?= base_url(); ?>assets/css/AdminLTE.min.css">
  <link rel="stylesheet" href="<?= base_url(); ?>assets/css/skins/_all-skins.min.css">

  <link rel="icon" href="<?= base_url('assets/img/favicon.ico'); ?>" type="image/x-icon">
  
  <style type="text/css">    
    .se-pre-con {
      position: fixed;
      left: 0px;
      top: 0px;
      width: 100%;
      height: 100%;
      z-index: 9999;
      background: url(<?= base_url('assets/img/ripple.gif'); ?>) center no-repeat #eee;
    }
  </style>

  <script src="<?= base_url(); ?>assets/bower_components/jquery/dist/jquery.min.js"></script>
  <script src="<?= base_url(); ?>assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
  <script src="<?= base_url(); ?>assets/bower_components/select2/dist/js/select2.min.js"></script>



</head>
<body class="hold-transition skin-yellow-light sidebar-mini">
<!-- Site wrapper -->
<div class="se-pre-con"></div>
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="<?= base_url(); ?>student_council/index" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>W</b>FP</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Wa</b>ForApp</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Tasks: style can be found in dropdown.less -->
          <li class="user user-menu"><a href="<?= base_url(); ?>welcome/index"><i class="fa fa-home"></i>Homepage</a></li>
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="<?= base_url(); ?>assets/img/profile_pictures/<?= $this->session->userdata('avatar'); ?>" class="user-image" alt="User Image">
              <span class="hidden-xs"><?= $this->session->userdata('name'); ?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="<?= base_url(); ?>assets/img/profile_pictures/<?= $this->session->userdata('avatar'); ?>" class="img-circle" alt="User Image">

                <p>
                  <?= $this->session->userdata('name'); ?> 
                  <small><?= $this->session->userdata('user_type'); ?></small>
                </p>
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="#" class="btn btn-default btn-flat">Profile</a>
                </div>
                <div class="pull-right">
                  <a href="<?= base_url(); ?>users/logout" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>

        </ul>
      </div>
    </nav>
  </header>

  <!-- =============================================== -->

  <!-- Left side column. contains the sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- search form -->
<!--       <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
          <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
 -->      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        <li <?php if($active_menu == 'dashboard') echo "class='active'" ?> >
          <a href="<?= base_url(); ?>student_council/index">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
          </a>
        </li>

        <li <?php if($active_menu == 'notices') echo "class='active'" ?>>
          <a href="<?= base_url('student_council/notices'); ?>">
            <i class="fa fa-bell"></i> <span>Notices</span>
          </a>
        </li>

        <li <?php if($active_menu == 'election') echo "class='active'" ?>>
          <a href="<?= base_url('student_council/election'); ?>">
            <i class="fa fa-archive"></i> <span>Election</span>
          </a>
        </li>

        <li <?php if($active_menu == 'settings') echo "class='active'" ?>>
          <a href="<?= base_url(); ?>student_council/settings">
            <i class="fa fa-gears"></i> <span>Settings</span>
          </a>
        </li>

      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- =============================================== -->