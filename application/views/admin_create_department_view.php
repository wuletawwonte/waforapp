<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Department
        <small>Create new department here</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?= base_url(); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="<?= base_url(); ?>admin/departments"><i class="fa fa-university"></i> Departments</a></li>
        <li class="active"><a href="#"> Create</a></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

<div class="box box-default">
        <div class="box-header with-border">
          <h3 class="box-title">Fill the form below</h3>
        </div>

        <form action="<?= base_url('admin/create_department'); ?>" method="POST">
	        <div class="box-body">
	          <div class="row">
	            <div class="col-md-6">

					<div class="form-group">
	                  <label for="name">Name</label>
	                  <input type="text" class="form-control" name="name" required placeholder="Enter Department Name">
	                </div>

					<div class="form-group">
	                  <label>Description</label>
	                  <textarea class="form-control" name="description" placeholder="Enter ..."></textarea>
	                </div>            

	            </div>            
	            <div class="col-md-6">

					<div class="form-group">
	                  <label for="exampleInputEmail1">Department Code</label>
	                  <input type="text" class="form-control" name="code" placeholder="Enter Department Code if any">
	                </div>

	            </div>           
	            <!-- /.col -->
	          </div>
	          <!-- /.row -->
	        </div>

			<div class="box-footer">
	            <a type="button" href="<?= base_url(); ?>admin/departments" class="btn btn-default">Cancel</a>
	            <button type="submit" class="btn btn-primary pull-right">Create</button>
	    	</div>
    	</form>
	</div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
