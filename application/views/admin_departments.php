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

      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Title</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                    title="Collapse">
              <i class="fa fa-minus"></i></button>
          </div>
        </div>
        <div class="box-body">

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

                <tr>
                  <td>Trident</td>
                  <td>X</td>
                  <td>X</td>
                  <td>
                    
                  </td>
                </tr>        

              </tbody>
          </table>

        </div>
        <!-- /.box-body -->
        <div class="box-footer">
          <a type="button" href="<?= base_url('admin/admin_create_department_view'); ?>" class="btn btn-primary pull-right" style="margin-right: 5px;">
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
