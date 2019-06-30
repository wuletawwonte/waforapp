<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>WaForApp</title>

  <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    
    <link rel="stylesheet" href="<?php echo base_url('assets/bower_components/bootstrap/dist/css/bootstrap.min.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/bower_components/font-awesome/css/font-awesome.min.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/bower_components/Ionicons/css/ionicons.min.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/AdminLTE.css'); ?>">

  	<link rel="stylesheet" href="<?php echo base_url('assets/css/skins/_all-skins.min.css'); ?>">
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



<body class="hold-transition skin-black layout-top-nav">
<div class="se-pre-con"></div>
<div class="wrapper">

  <header class="main-header">
    <nav class="navbar navbar-static-top">
      <div class="container">
        <div class="navbar-header">
          <a href="<?php echo base_url(); ?>" class="navbar-brand">WaForApp</a>
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
            <i class="fa fa-bars"></i>
          </button>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse pull-left" id="navbar-collapse">
          <ul class="nav navbar-nav">
            <li <?php if($active_menu == "notices") { echo "class='active'"; } ?> ><a href="<?= base_url(); ?>">Notice <span class="sr-only">(current)</span></a></li>
            <li <?php if($active_menu == "forums") { echo "class='active'"; } ?>><a href="<?= base_url(); ?>welcome/forums">Forum</a></li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">Election <span class="caret"></span></a>
              <ul class="dropdown-menu" role="menu">
                <li><a href="#">Action</a></li>
                <li><a href="#">Another action</a></li>
                <li><a href="#">Something else here</a></li>
                <li class="divider"></li>
                <li><a href="#">Separated link</a></li>
                <li class="divider"></li>
                <li><a href="#">One more separated link</a></li>
              </ul>
            </li>
          </ul>
          <form class="navbar-form navbar-left" role="search">
            <div class="form-group">
              <input type="text" class="form-control" id="navbar-search-input" placeholder="Search">
            </div>
          </form>
        </div>
        <!-- /.navbar-collapse -->






        <!-- Navbar Right Menu -->
        <div class="navbar-custom-menu">
          <ul class="nav navbar-nav">
            <!-- Messages: style can be found in dropdown.less-->

            <?php if($this->session->userdata('is_logged_in') == TRUE) { ?>
              
              <!-- Notifications Menu -->
              <li class="dropdown notifications-menu">
                <!-- Menu toggle button -->
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <i class="fa fa-bell-o"></i>
                  <span class="label label-warning">10</span>
                </a>
                <ul class="dropdown-menu">
                  <li class="header">You have 10 notifications</li>
                  <li>
                    <!-- Inner Menu: contains the notifications -->
                    <ul class="menu">
                      <li><!-- start notification -->
                        <a href="#">
                          <i class="fa fa-users text-aqua"></i> 5 new members joined today
                        </a>
                      </li>
                      <!-- end notification -->
                    </ul>
                  </li>
                  <li class="footer"><a href="#">View all</a></li>
                </ul>
              </li>
              <?php if($this->session->userdata('user_type') == "Student council") { ?>
              <li class="user user-menu"> 
                <a href="<?= base_url(); ?>student_council/index"><i class="fa fa-dashboard"></i> Dashboard</a>
              </li>
              <?php } ?>
              <!-- User Account Menu -->
              <li class="dropdown user user-menu">
                <!-- Menu Toggle Button -->
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">

                  <img src="<?= base_url(); ?>assets/img/profile_pictures/<?= $this->session->userdata('avatar'); ?>" class="user-image" alt="User Image">
                  <span class="hidden-xs"><?= $this->session->userdata('name'); ?></span>

                </a>
                <ul class="dropdown-menu">

                  <li class="user-header">
                    <img src="<?= base_url(); ?>assets/img/profile_pictures/<?= $this->session->userdata('avatar'); ?>" class="img-circle" alt="User Image">

                    <p>
                      <?= $this->session->userdata('name'); ?> - <?= $this->session->userdata('user_type'); ?>
                    </p>
                  </li>
                  <!-- Menu Footer-->
                  <li class="user-footer">
                    <div class="pull-left">
                      <a href="<?= base_url(); ?>welcome/profile" class="btn btn-default btn-flat">Profile</a>
                    </div>
                    <div class="pull-right">
                      <a href="<?= base_url(); ?>users/logout/homepage" class="btn btn-default btn-flat">Sign out</a>
                    </div>
                  </li>
                </ul>
              </li>

          <?php } else { ?>

              <li><a href="<?= base_url(); ?>welcome/loginpage">Login</a></li>

            <?php } ?>
          </ul>
        </div>
        <!-- /.navbar-custom-menu -->
      </div>
      <!-- /.container-fluid -->
    </nav>
  </header>
  <!-- Full Width Column -->
  <div class="content-wrapper">
    <div class="container">
