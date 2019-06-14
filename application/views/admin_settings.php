<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard
        <small>it all starts here</small>
      </h1>
      <ol class="breadcrumb">
        <li class="active"><a href="<?= base_url(); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">


		<div class="box">
		    <div class="box-body">

		        <div class="callout callout-info">
		            Note: System related settings reside here.
		        </div>


		        <form method="post" action="">
		            <div class="table-responsive">
		                <table class="table table-hover">

		                    <tbody><tr>
		                        <td>System Name:</td>
		                        <td><input type="text" name="system_name" value="<?= $system_name; ?>" class="form-control" width="32"></td>
		                    </tr>

		                    <tr>
		                        <td>System Name in Short:</td>
		                        <td><input type="text" name="system_name_short" value="<?= $system_name_short; ?>" class="form-control" width="5"></td>
		                    </tr>

		                    <tr>
		                        <td>Language:</td>
		                    	<td><select name="language" size="3" class="form-control" disabled>
					                    <option selected="" value="english">english</option>
					                    <option value="amharic">amharic</option>
					                </select>
					            </td>
		                    </tr>

		                    <tr>
		                        <td>Default Password:</td>
		                        <td><input type="password" name="default_password" value="<?= $default_password; ?>" class="form-control" width="32"></td>
		                    </tr>

		                    <tr>
		                        <td>Maximum Student Councils:</td>
		                        <td><input type="number" name="default_password" value="<?= $student_council_amount; ?>" min="1" max="50" class="form-control"></td>
		                    </tr>
		                    <tr>
		                        <td colspan="2" align="center">
		                            <input type="submit" class="btn btn-primary" value="Save" name="save">&nbsp;
		                            <input type="button" class="btn" name="Cancel" value="Cancel">
		                        </td>
		                    </tr>
		                </tbody></table>
		            </div>
		        </form>
		    </div>
		    <!-- /.box-body -->
		</div>


    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->



