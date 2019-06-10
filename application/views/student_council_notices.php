<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Notices
        <small>Manage notices here</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?= base_url(); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Notices</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">



      <?php if($this->session->flashdata('success')) { ?>
          <div class="callout callout-info">
              <?php echo $this->session->flashdata('success'); ?>
          </div>
      <?php } else if($this->session->flashdata('error')) { ?>
          <div class="callout callout-error">
              <?php echo $this->session->flashdata('error'); ?>
          </div>
      <?php } ?>

		<div class="row">
	        <div class="col-xs-12">
	          <div class="box">
	            <div class="box-header">
	              <h3 class="box-title">Notices</h3>

	              <div class="box-tools">
	                <div class="input-group input-group-sm  pull-left" style="width: 150px;">
	                  <input type="text" name="table_search" class="form-control" placeholder="Search">

	                  <div class="input-group-btn">
	                    <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
	                  </div>
	                </div>
	                <a href="<?= base_url(); ?>student_council/create_notice_view" class="btn btn-sm btn-primary" ><i class="fa fa-plus"></i> New Notice</a>
	              </div>
	              
	            </div>
	            <!-- /.box-header -->
	            <div class="box-body">
                  <?php if(!$notices) { echo "No Record Found in the Database."; } else { ?>
	              <table class="table table-hover table-responsive no-padding">
	                <tr>
	                  <th>Status</th>
	                  <th>User</th>
	                  <th>Title</th>
	                  <th>Date Created</th>
	                  <th>Action</th>
	                </tr>
	                <?php foreach($notices as $notice) { ?>
	                <tr>
	                  <td><?php if($notice['status'] == 1) echo "Active"; else echo "Inactive"; ?></td>
	                  <td><?= $notice['first_name'].' '.$notice['middle_name']; ?></td>
	                  <td><?= $notice['title']; ?></td>
	                  <td><?= $notice['date_posted']; ?></td>
	                  <td>
	                    <a href="<?= base_url(); ?>admin/edit_department_view" class="btn btn-xs btn-success"><i class="fa fa-edit"></i></a>
	                    <a href="" class="btn btn-xs btn-danger"><i class="fa fa-times"></i></a>
				      </td>
	                </tr>
	                <?php } ?>
	              </table>
	              <?php } ?>
	            </div>
	            <div class="box-footer"> 
	            Hellow There
	            </div>
	            <!-- /.box-body -->
	          </div>
	          <!-- /.box -->
	        </div>
	    </div>


    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
