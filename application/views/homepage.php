
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
            <li class="active"><a href="<?= base_url(); ?>">Notice <span class="sr-only">(current)</span></a></li>
            <li><a href="#">Forum</a></li>
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
	            <li class="dropdown messages-menu">
	              <!-- Menu toggle button -->
	              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
	                <i class="fa fa-envelope-o"></i>
	                <span class="label label-success">4</span>
	              </a>
	              <ul class="dropdown-menu">
	                <li class="header">You have 4 messages</li>
	                <li>
	                  <!-- inner menu: contains the messages -->
	                  <ul class="menu">
	                    <li><!-- start message -->
	                      <a href="#">
	                        <div class="pull-left">
	                          <!-- User Image -->
	                          <img src="<?php echo base_url(); ?>dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
	                        </div>
	                        <!-- Message title and timestamp -->
	                        <h4>
	                          Support Team
	                          <small><i class="fa fa-clock-o"></i> 5 mins</small>
	                        </h4>
	                        <!-- The message -->
	                        <p>Why not buy a new awesome theme?</p>
	                      </a>
	                    </li>
	                    <!-- end message -->
	                  </ul>
	                  <!-- /.menu -->
	                </li>
	                <li class="footer"><a href="#">See All Messages</a></li>
	              </ul>
	            </li>
	            <!-- /.messages-menu -->

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
	            <!-- Tasks Menu -->
	            <li class="dropdown tasks-menu">
	              <!-- Menu Toggle Button -->
	              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
	                <i class="fa fa-flag-o"></i>
	                <span class="label label-danger">9</span>
	              </a>
	              <ul class="dropdown-menu">
	                <li class="header">You have 9 tasks</li>
	                <li>
	                  <!-- Inner menu: contains the tasks -->
	                  <ul class="menu">
	                    <li><!-- Task item -->
	                      <a href="#">
	                        <!-- Task title and progress text -->
	                        <h3>
	                          Design some buttons
	                          <small class="pull-right">20%</small>
	                        </h3>
	                        <!-- The progress bar -->
	                        <div class="progress xs">
	                          <!-- Change the assets/css width attribute to simulate progress -->
	                          <div class="progress-bar progress-bar-aqua" style="width: 20%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
	                            <span class="sr-only">20% Complete</span>
	                          </div>
	                        </div>
	                      </a>
	                    </li>
	                    <!-- end task item -->
	                  </ul>
	                </li>
	                <li class="footer">
	                  <a href="#">View all tasks</a>
	                </li>
	              </ul>
	            </li>
	            <!-- User Account Menu -->
	            <li class="dropdown user user-menu">
	              <!-- Menu Toggle Button -->
	              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
	                <!-- The user image in the navbar-->
	                <img src="<?php echo base_url('assets/img/admin.jpg'); ?>" class="user-image" alt="User Image">
	                <!-- hidden-xs hides the username on small devices so only the image appears. -->
	                <span class="hidden-xs">Wuletaw Wonte</span>
	              </a>
	              <ul class="dropdown-menu">
	                <!-- The user image in the menu -->
	                <li class="user-header">
	                  <img src="<?php echo base_url('assets/img/admin.jpg'); ?>" class="img-circle" alt="User Image">

	                  <p>
	                    Wuletaw Pierce - Web Developer
	                    <small>Member since Nov. 2012</small>
	                  </p>
	                </li>
	                <!-- Menu Body -->
	                <li class="user-body">
	                  <div class="row">
	                    <div class="col-xs-4 text-center">
	                      <a href="#">Followers</a>
	                    </div>
	                    <div class="col-xs-4 text-center">
	                      <a href="#">Sales</a>
	                    </div>
	                    <div class="col-xs-4 text-center">
	                      <a href="#">Friends</a>
	                    </div>
	                  </div>
	                  <!-- /.row -->
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
<!--  Content Header (Page header) 
      <section class="content-header">
        <h1>
          Top Navigation
          <small>Example 2.0</small>
        </h1>
        <ol class="breadcrumb">
          <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
          <li><a href="#">Layout</a></li>
          <li class="active">Top Navigation</li>
        </ol>
      </section>
 -->
      <!-- Main content -->
<section class="content">



  	<div class="row">
    	<div class="col-md-3 sidebar">

		    <div class="mini-submenu">
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
		    </div>
		    <div class="list-group">
		        <span href="#" class="list-group-item active">
		            Submenu
<!-- 		            <span class="pull-right" id="slide-submenu">
		                <i class="fa fa-times"></i>
		            </span>
 -->		        </span>
		        <a href="#" class="list-group-item">
		            <i class="fa fa-comment-o"></i> Lorem ipsum
		        </a>
		        <a href="#" class="list-group-item">
		            <i class="fa fa-search"></i> Lorem ipsum
		        </a>
		        <a href="#" class="list-group-item">
		            <i class="fa fa-user"></i> Lorem ipsum
		        </a>
		        <a href="#" class="list-group-item">
		            <i class="fa fa-folder-open-o"></i> Lorem ipsum <span class="badge">14</span>
		        </a>
		        <a href="#" class="list-group-item">
		            <i class="fa fa-bar-chart-o"></i> Lorem ipsumr <span class="badge">14</span>
		        </a>
		        <a href="#" class="list-group-item">
		            <i class="fa fa-envelope"></i> Lorem ipsum
		        </a>
		    </div>        
 
        </div>
        <!-- /.col -->
        <div class="col-md-9">
          	<div class="box box-primary">
          		<div class="box-body">
	                <!-- Post -->
	                <div class="post">
	                  <div class="user-block">
	                    <img class="img-circle img-bordered-sm" src="<?= base_url(); ?>assets/img/user1-128x128.jpg" alt="user image">
	                        <span class="username">
	                          <a href="#">Abiy Ahmed Pm.</a>
	                          <a href="#" class="pull-right btn-box-tool"><i class="fa fa-times"></i></a>
	                        </span>
	                    <span class="description">Shared publicly - 7:30 PM today</span>
	                  </div>
	                  <!-- /.user-block -->
	                  <p>
	                    Lorem ipsum represents a long-held tradition for designers,
	                    typographers and the like. Some people hate it and argue for
	                    its demise, but others ignore the hate as they create awesome
	                    tools to help create filler text for everyone from bacon lovers
	                    to Charlie Sheen fans.
	                  </p>
	                  <ul class="list-inline">
	                    <li><a href="#" class="link-black text-sm"><i class="fa fa-share margin-r-5"></i> Share</a></li>
	                    <li><a href="#" class="link-black text-sm"><i class="fa fa-thumbs-o-up margin-r-5"></i> Like</a>
	                    </li>
	                    <li class="pull-right">
	                      <a href="#" class="link-black text-sm"><i class="fa fa-comments-o margin-r-5"></i> Comments
	                        (5)</a></li>
	                  </ul>

	                  <input class="form-control input-sm" type="text" placeholder="Type a comment">
	                </div>
	                <!-- /.post -->

	                <!-- Post -->
	                <div class="post clearfix">
	                  <div class="user-block">
	                    <img class="img-circle img-bordered-sm" src="<?= base_url(); ?>assets/img/user7-128x128.jpg" alt="User Image">
	                        <span class="username">
	                          <a href="#">Sarah Ross</a>
	                          <a href="#" class="pull-right btn-box-tool"><i class="fa fa-times"></i></a>
	                        </span>
	                    <span class="description">Sent you a message - 3 days ago</span>
	                  </div>
	                  <!-- /.user-block -->
	                  <p>
	                    Lorem ipsum represents a long-held tradition for designers,
	                    typographers and the like. Some people hate it and argue for
	                    its demise, but others ignore the hate as they create awesome
	                    tools to help create filler text for everyone from bacon lovers
	                    to Charlie Sheen fans.
	                  </p>

	                  <form class="form-horizontal">
	                    <div class="form-group margin-bottom-none">
	                      <div class="col-sm-9">
	                        <input class="form-control input-sm" placeholder="Response">
	                      </div>
	                      <div class="col-sm-3">
	                        <button type="submit" class="btn btn-danger pull-right btn-block btn-sm">Send</button>
	                      </div>
	                    </div>
	                  </form>
	                </div>
	                <!-- /.post -->

	                <!-- Post -->
	                <div class="post">
	                  <div class="user-block">
	                    <img class="img-circle img-bordered-sm" src="<?= base_url(); ?>assets/img/user6-128x128.jpg" alt="User Image">
	                        <span class="username">
	                          <a href="#">Adam Jones</a>
	                          <a href="#" class="pull-right btn-box-tool"><i class="fa fa-times"></i></a>
	                        </span>
	                    <span class="description">Posted 5 photos - 5 days ago</span>
	                  </div>
	                  <!-- /.user-block -->
	                  <div class="row margin-bottom">
	                    <div class="col-sm-6">
	                      <img class="img-responsive" src="<?= base_url(); ?>assets/img/photo2.jpg" alt="Photo">
	                    </div>
	                    <!-- /.col -->
	                    <div class="col-sm-6">
	                      <div class="row">
	                        <div class="col-sm-6">
	                          <img class="img-responsive" src="<?= base_url(); ?>assets/img/photo2.jpg" alt="Photo">
	                          <br>
	                          <img class="img-responsive" src="<?= base_url(); ?>assets/img/photo9.jpg" alt="Photo">
	                        </div>
	                        <!-- /.col -->
	                        <div class="col-sm-6">
	                          <img class="img-responsive" src="<?= base_url(); ?>assets/img/photo1.jpg" alt="Photo">
	                          <br>
	                          <img class="img-responsive" src="<?= base_url(); ?>assets/img/photo4.jpg" alt="Photo">
	                        </div>
	                        <!-- /.col -->
	                      </div>
	                      <!-- /.row -->
	                    </div>
	                    <!-- /.col -->
	                  </div>
	                  <!-- /.row -->

	                  <ul class="list-inline">
	                    <li><a href="#" class="link-black text-sm"><i class="fa fa-share margin-r-5"></i> Share</a></li>
	                    <li><a href="#" class="link-black text-sm"><i class="fa fa-thumbs-o-up margin-r-5"></i> Like</a>
	                    </li>
	                    <li class="pull-right">
	                      <a href="#" class="link-black text-sm"><i class="fa fa-comments-o margin-r-5"></i> Comments
	                        (5)</a></li>
	                  </ul>

	                  <input class="form-control input-sm" type="text" placeholder="Type a comment">
	                </div>
	                <!-- /.post -->
           		</div>
           	</div>
		</div>
	  </div>




      </section>
      <!-- /.content -->
    </div>
    <!-- /.container -->



