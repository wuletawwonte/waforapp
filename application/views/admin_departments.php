<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Departments
        <small>Create and manage departments here</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?= base_url(); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Departments</li>
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
          <h3 class="box-title">List of Departments</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                    title="Collapse">
              <i class="fa fa-minus"></i></button>
          </div>
        </div>
        <div class="box-body">
        <?php if(!$departments) { echo "No Record Found in the Database."; } else { ?>
          <table id="example2" class="table table-bordered table-hover">
              <thead>
                <tr>
                  <th>Code</th>
                  <th>Name</th>
                  <th>Description</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>

              <?php foreach($departments as $department) { ?>

                <tr>
                  <td><?= $department['code']; ?></td>
                  <td><?= $department['name']; ?></td>
                  <td><?= $department['description']; ?></td>
                  <td>
                    <a href="<?= base_url(); ?>admin/edit_department_view/<?= $department['did']; ?>" class="btn btn-xs btn-success"><i class="fa fa-edit"></i></a>
                    <a href="" class="btn btn-xs btn-danger"><i class="fa fa-times"></i></a>
                  </td>
                </tr>        

              <?php } ?>

              </tbody>
          </table>
          <?php } ?>
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
          <a type="button" href="<?= base_url('admin/create_department_view'); ?>" class="btn btn-primary pull-right" style="margin-right: 5px;">
              <i class="fa fa-plus"></i> Create Department
            </a>
        </div>
        <!-- /.box-footer-->
      </div>
      <!-- /.box -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
