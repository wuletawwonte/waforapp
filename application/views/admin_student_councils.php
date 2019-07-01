<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Student Councils
        <small>Add and manage student council records here</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?= base_url(); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Student Councils</li>
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


	    <!-- Default box -->
	    <div class="box box-info">
	        <div class="box-header with-border">
	          <h3 class="box-title">Add Student Council</h3>

	          <div class="box-tools pull-right">
	            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
	                    title="Collapse">
	              <i class="fa fa-minus"></i></button>
	          </div>
	        </div>
	        <div class="box-body">
				<form method="POST" action="<?= base_url(); ?>admin/add_student_council">	
					<div class="col-md-6">
	                	<select id="members" name="student_id" class="form-control" style="width: 100%;">


		                  		<?php foreach($students as $student) { ?>
	                  		<option value="<?= $student['id']?>"><?= $student['first_name'].' '.$student['middle_name']; ?></option>
	                  		<?php } ?>
	                	</select>
	                </div>
	                <div>
	                	<button type="submit" class="btn btn-primary"><i class="fa fa-plus"></i></button>
	                </div>	
	            </form>
				<hr>

		        <?php if(!$student_councils) { echo "No Record Found in the Database."; } else { ?>
		          <table id="example2" class="table table-bordered table-hover">
		              <thead>
		                <tr>
		                  <th>ID Number</th>
		                  <th>Name</th>
		                  <th>Department</th>
		                  <th>Action</th>
		                </tr>
		              </thead>
		              <tbody>

		              <?php foreach($student_councils as $student) { ?>

		                <tr>
		                  <td><a href="#"><?= $student['id_number']; ?></a></td>
		                  <td><?= $student['first_name']." ".$student['middle_name']; ?></td>
		                  <td><?= $student['name']; ?></td>
		                  <td>
		                    <a href="<?= base_url(); ?>admin/remove_student_council/<?= $student['id']; ?>" class="btn btn-xs btn-danger"><i class="fa fa-minus"></i></a>
		                  </td>
		                </tr>        

		              <?php } ?>

		              </tbody>
		          </table>
		          <?php } ?>
		        </div>



      </div>
      <!-- /.box -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->



<script type="text/javascript">
$(document).ready(function() {
	$('#members').select2();
});
</script>