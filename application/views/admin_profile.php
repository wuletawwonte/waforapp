<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

    <!-- Main content -->
    <br><section class="content">


      <div class="row">




		<div class="col-md-3 col-md-offset-1" >
          <!-- Widget: user widget style 1 -->
          <div class="box box-widget widget-user">
            <!-- Add the bg color to the header using any of the bg-* classes -->
            <div class="widget-user-header bg-aqua-active" style="background: url('../assets/img/photo1.jpg') center center;">
              <h3 class="widget-user-username"><?= $this->session->userdata('name'); ?></h3>
              <h5 class="widget-user-desc"><?= $this->session->userdata('user_type'); ?></h5>
            </div>
            <div class="widget-user-image">
              <img class="img-circle" src="<?= base_url(); ?>assets/img/profile_pictures/<?= $this->session->userdata('avatar'); ?>" alt="User Avatar" style="height: 90px;">
            </div>
            <div class="box-footer">
              <div class="row">


              </div>
              <!-- /.row -->
            <div class="box-body">

              <hr>

              <strong><i class="fa fa-map-marker margin-r-5"></i> Location</strong>

              <p class="text-muted">Wachamo, Southern Nations Nationalities and Peoples Region, Ethiopia</p>

            </div>
            </div>
          </div>
          <!-- /.widget-user -->
        </div>



	<div class="col-md-7">


      <?php if($this->session->flashdata('success')) { ?>
          <div class="callout callout-info">
              <?php echo $this->session->flashdata('success'); ?>
          </div>
      <?php } else if($this->session->flashdata('error')) { ?>
          <div class="callout callout-warning">
              <?php echo $this->session->flashdata('error'); ?>
          </div>
      <?php } ?>

          <!-- Horizontal Form -->
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Edit your profile avatar</h3>
            </div>

            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal" method="POST" id="avatar_form" action="<?= base_url(); ?>welcome/update_profile" enctype="multipart/form-data">
              <div class="box-body">

                <div class="form-group">
                    <label class="col-sm-3 control-label">Avatar</label>
                    <div class="input-group  col-sm-8">
                      <input type="file" class="form-control" name="userfile" accept="jpg|png" required>
                          <span class="input-group-btn">
                            <button type="submit" form="avatar_form" class="btn btn-info btn-flat">Change</button>
                          </span>
                    </div>
                    <!-- <span class="help-block">Upload your profile picture here...</span>                   -->

                </div>

              </div>
              <!-- /.box-body -->
            </form>
          </div>
          <!-- /.box -->


        <div class="box">
          <div class="box-header with-border">
            <h3 class="box-title">Edit Your Account Information</h3>

          </div>

          <div class="box-body">
            <form class="form-horizontal" id="profile_information" name="profile_information" method="POST" action="<?= base_url(); ?>admin/change_password">
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-3 control-label">Username</label>

                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="inputEmail3" value="<?= $this->session->userdata('username'); ?>" disabled>
                  </div>
                </div>
                <div class="form-group">
                  <label for="current_password" class="col-sm-3 control-label">Current Password</label>

                  <div class="col-sm-9">
                    <input type="password" class="form-control" name="current_password" placeholder="Current Password">
                  </div>
                </div>

                <div class="form-group">
                  <label for="new_password" class="col-sm-3 control-label">New Password</label>

                  <div class="col-sm-9">
                    <input type="password" class="form-control" name="new_password" placeholder="New Password">
                  </div>
                </div>

          </div>
          
          <div class="box-footer">
            <a type="button" href="<?= base_url(); ?>admin/index" class="btn btn-default">Cancel</a>
            <button type="submit" form="profile_information" class="btn btn-info pull-right">Save</button>
          </div>

          </form>
        </div>





      </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
