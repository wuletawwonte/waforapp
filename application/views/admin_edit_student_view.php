<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Edit
        <small>Edit student record here</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?= base_url(); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="<?= base_url(); ?>admin/students"><i class="fa fa-users"></i> Students</a></li>
        <li class="active">Edit</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">



<div class="box box-default">
        <div class="box-header with-border">
          <h3 class="box-title">Fill the form below</h3>
        </div>

        <form action="<?= base_url('admin/edit_student'); ?>" method="POST">
          	<input type="text" name="id" hidden value="<?= $student['id']; ?>">

          <div class="box-body">
            <div class="row">
          
                <div class="form-group col-md-4">
                  <label for="id_number">ID Number</label>
                  <input type="text" class="form-control" name="id_number" required value="<?= $student['id_number']; ?>">
                </div>

            </div>
            <div class="row">

                <div class="form-group col-md-4">
                  <label for="first_name">First Name</label>
                  <input type="text" class="form-control" name="first_name" required value="<?= $student['first_name']; ?>">
                </div>

                <div class="form-group col-md-4">
                  <label for="middle_name">Middle Name</label>
                  <input type="text" class="form-control" name="middle_name" required value="<?= $student['middle_name']; ?>">
                </div>

                <div class="form-group col-md-4">
                  <label for="last_name">Last Name</label>
                  <input type="text" class="form-control" name="last_name" required value="<?= $student['last_name']; ?>">
                </div>
            </div>
            <div class="row">

                <div class="form-group col-md-6">
                  <label for="email">Email Address</label>
                  <input type="email" class="form-control" name="email" required value="<?= $student['email']; ?>">
                </div>

                <div class="form-group col-md-2">
                  <label>Sex</label>
                  <select class="form-control" name="sex">
                    <option <?php if($student['sex'] == 'Male') { echo 'selected'; } ?> value="Male">Male</option>
                    <option <?php if($student['sex'] == 'Female') { echo 'selected'; } ?> value="Female">Female</option>
                  </select>
                </div>

            </div><hr>
            <div class="row">

                <div class="form-group col-md-6">
                    <label>Department: </label>
                    <select name="department" class="form-control">
                        <?php foreach($departments as $department) { ?>
                        <option <?php if($department['did'] == $student['department']) { echo "selected"; }?> value="<?= $department['did']; ?>"><?= $department['name']; ?></option>
                        <?php } ?>
                    </select>
                </div>


                <div class="form-group col-md-2">
                  <label for="year">Year</label>
                  <input type="number" class="form-control" name="year" max="7" min="1" required value="<?= $student['year']; ?>">
                </div>

            </div>
            <!-- /.row -->
          </div>

      <div class="box-footer">
              <a type="button" href="<?= base_url(); ?>admin/students" class="btn btn-default">Cancel</a>
              <button type="submit" class="btn btn-info pull-right">Edit</button>
        </div>
      </form>
  </div>



    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->


