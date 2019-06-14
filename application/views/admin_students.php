<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Students
        <small>Create and manage student records here</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?= base_url(); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Students</li>
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
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">List of student records</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                    title="Collapse">
              <i class="fa fa-minus"></i></button>
          </div>
        </div>
        <div class="box-body">
        <?php if(!$students) { echo "No Record Found in the Database."; } else { ?>
          <table id="example2" class="table table-bordered table-hover">
              <thead>
                <tr>
                  <th>ID Number</th>
                  <th>Name</th>
                  <th>Department</th>
                  <th>Year</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>

              <?php foreach($students as $student) { ?>

                <tr>
                  <td><a href="#"><?= $student['id_number']; ?></a></td>
                  <td><?= $student['first_name']." ".$student['middle_name']; ?></td>
                  <td><?= $student['name']; ?></td>
                  <td><?= $student['year']; ?></td>
                  <td>
                    <a href="<?= base_url(); ?>admin/edit_student_view/<?= $student['id']; ?>" class="btn btn-xs btn-success"><i class="fa fa-edit"></i></a>
                    <a href="" class="btn btn-xs btn-warning"><i class="fa fa-key"></i></a>
                    <a href="" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i></a>
                  </td>
                </tr>        

              <?php } ?>

              </tbody>
          </table>
          <?php } ?>
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
          <a type="button" href="<?= base_url('admin/create_student_view'); ?>" class="btn btn-primary pull-right" style="margin-right: 5px;">
              <i class="fa fa-user-plus"></i> New Student
            </a>
        </div>
        <!-- /.box-footer-->
      </div>
      <!-- /.box -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
