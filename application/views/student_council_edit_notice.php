<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Create Notice
        <small>Create new notice here</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?= base_url(); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="<?= base_url(); ?>student_council/notices"><i class="fa fa-bell"></i> Notices</a></li>
        <li class="active">Create</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">


		<div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Notice</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal" action="<?= base_url(); ?>student_council/edit_notice" method="POST">
              <div class="box-body">
	            <input type="text" name="nid" value="<?= $notice['nid']; ?>" hidden>
                <div class="form-group">
                  <label for="title" class="col-sm-2 control-label">Title</label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="title" value="<?= $notice['title']; ?>" required>
                  </div>
                </div>
                <div class="form-group">
                  <label for="content" class="col-sm-2 control-label">Content</label>

                  <div class="col-sm-10">
      					<textarea class="form-control"  name="content" rows="3" required><?= $notice['content']; ?></textarea>                  
				  </div>
                </div>
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <a href="<?= base_url(); ?>student_council/notices" class="btn btn-default">Cancel</a>
                <button type="submit" class="btn btn-info pull-right">Edit</button>
              </div>
              <!-- /.box-footer -->
            </form>
          </div>



    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
