<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Create
        <small>Create student record here</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?= base_url(); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="<?= base_url(); ?>admin/students"><i class="fa fa-users"></i> Students</a></li>
        <li class="active">Create</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">



<div class="box box-default">
        <div class="box-header with-border">
          <h3 class="box-title">Fill the form below</h3>
        </div>

        <form action="<?= base_url('admin/create_student'); ?>" method="POST">
          <div class="box-body">
            <div class="row">

                <div class="form-group col-md-4">
                  <label for="first_name">First Name</label>
                  <input type="text" class="form-control" name="first_name" required placeholder="Enter first name">
                </div>

                <div class="form-group col-md-4">
                  <label for="middle_name">Middle Name</label>
                  <input type="text" class="form-control" name="middle_name" required placeholder="Enter middle name">
                </div>

                <div class="form-group col-md-4">
                  <label for="last_name">Last Name</label>
                  <input type="text" class="form-control" name="last_name" required placeholder="Enter last name">
                </div>
            </div>
            <div class="row">

                <div class="form-group col-md-6">
                  <label for="email">Email Address</label>
                  <input type="email" class="form-control" name="email" required placeholder="Enter email address">
                </div>

                <div class="form-group col-md-2">
                  <label>Sex</label>
                  <select class="form-control" name="sex">
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                  </select>
                </div>

            </div><hr>
            <div class="row">

                <div class="form-group col-md-6">
                    <label>Department: </label>
                    <select name="department" class="form-control">
                        <?php foreach($departments as $department) { ?>
                        <option value="<?= $department['id']; ?>"><?= $department['name']; ?></option>
                        <?php } ?>
                    </select>
                </div>


                <div class="form-group col-md-2">
                  <label for="year">Year</label>
                  <input type="number" class="form-control" name="year" max="7" min="1" required placeholder="Enter year">
                </div>

            </div>
            <!-- /.row -->
          </div>

      <div class="box-footer">
              <a type="button" href="<?= base_url(); ?>admin/students" class="btn btn-default">Cancel</a>
              <button type="submit" class="btn btn-primary pull-right">Create</button>
        </div>
      </form>
  </div>



    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->


