<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Settings
        <small>Change the settings here</small>
      </h1>
      <ol class="breadcrumb">
        <li class="active"><a href="<?= base_url(); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active"> Settings</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">


		<div class="box">
		    <div class="box-body">

		        <div class="callout callout-info">
		            Note: Student related settings reside here.
		        </div>


		        <form method="post" action="">
		            <div class="table-responsive">
		                <table class="table table-hover">

		                    <tbody><tr>
		                        <td>Candidate Selection Date:</td>
		                        <td><input type="text" name="candidate_selection_date" value="<?= $candidate_selection_date; ?>" class="form-control" width="32"></td>
		                    </tr>

		                    <tr>
		                        <td>Candidate Approval Date:</td>
		                        <td><input type="text" name="candidate_approval_date" value="<?= $candidate_approval_date; ?>" class="form-control" width="5"></td>
		                    </tr>

		                    <tr>
		                        <td>Candidate Advertisement Start Date:</td>
		                        <td><input type="text" name="candidate_approval_date" value="<?= $candidate_approval_date; ?>" class="form-control" width="5"></td>
		                    </tr>

		                    <tr>
		                        <td>Candidate Advertisement End Date:</td>
		                        <td><input type="text" name="candidate_approval_date" value="<?= $candidate_approval_date; ?>" class="form-control" width="5"></td>
		                    </tr>

		                    <tr>
		                        <td>Election Start Date:</td>
		                        <td><input type="text" name="candidate_approval_date" value="<?= $candidate_approval_date; ?>" class="form-control" width="5"></td>
		                    </tr>

		                    <tr>
		                        <td>Election End Date:</td>
		                        <td><input type="text" name="candidate_approval_date" value="<?= $candidate_approval_date; ?>" class="form-control" width="5"></td>
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
		                        <td>Maximum Student Council Candidates :</td>
		                        <td><input type="number" name="default_password" value="<?= $student_council_amount; ?>" min="1" max="50" class="form-control"></td>
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



