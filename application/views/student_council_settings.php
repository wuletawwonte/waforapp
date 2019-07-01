<script type="text/javascript" src="<?= base_url('assets/plugins/jquery.inputmask.js'); ?>"></script>
<script type="text/javascript" src="<?= base_url('assets/plugins/jquery.inputmask.date.extensions.js'); ?>"></script>



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

      <?php if($this->session->flashdata('success')) { ?>
          <div class="callout callout-info">
              <?php echo $this->session->flashdata('success'); ?>
          </div>
      <?php } else if($this->session->flashdata('error')) { ?>
          <div class="callout callout-error">
              <?php echo $this->session->flashdata('error'); ?>
          </div>
      <?php } ?>


		        <div class="callout">
		            Today: <?= date('Y-m-d');?>
		        </div>


		            <div class="table-responsive">
		                <table class="table table-hover">

			                <thead>
								<tr>
									<th>Setting</th>
									<th>Value</th>
									<th>Current Value</th>
								</tr>			                	
			                </thead>
		                    <tbody>

		                    <tr>
		                        <td>Maximum Student Candidate Count:</td>
		                        <td>
		                        	<form method="post" action="<?= base_url(); ?>student_council/save_setting">
				                        <input type="text" name="name" value="student_council_candidate_amount" hidden>
				                        <div class="input-group input-group-md">
							                <input type="number" class="form-control" min="<?= $election_date['student_council_amount'];?>" name="value" value="<?= $election_date['student_council_candidate_amount']; ?>">
							                    <span class="input-group-btn">
							                      <button type="submit" class="btn btn-info btn-flat">Save!</button>
							                    </span>
							            </div>
						            </form>
					            </td>
		                        <td><?= $election_date['student_council_candidate_amount'];?> </td>
		                    </tr>

		                    <tr>
		                        <td>Candidate Selection Start Date:</td>
		                        <td>
		                        	<form method="post" action="<?= base_url(); ?>student_council/save_setting">
				                        <input type="text" name="name" value="candidate_selection_start_date" hidden>
				                        <div class="input-group input-group-md">
							                <input type="text" class="inputmasked form-control" data-inputmask="'alias': 'yyyy-mm-dd'" name="value" value="<?= date('Y'); ?>" data-mask>
							                    <span class="input-group-btn">
							                      <button type="submit" class="btn btn-info btn-flat">Save!</button>
							                    </span>
							            </div>
						            </form>
					            </td>
		                        <td><?= $election_date['candidate_selection_start_date'];?> </td>
		                    </tr>

		                    <tr>
		                        <td>Candidate Selection End Date:</td>
		                        <td>
		                        	<form method="post" action="<?= base_url(); ?>student_council/save_setting">		                        
				                        <input type="text" name="name" value="candidate_selection_end_date" hidden>
				                        <div class="input-group input-group-md">
							                <input type="text" class="inputmasked form-control" data-inputmask="'alias': 'yyyy-mm-dd'" name="value" value="<?= date('Y'); ?>" data-mask>
							                    <span class="input-group-btn">
							                      <button type="submit" class="btn btn-info btn-flat">Save!</button>
							                    </span>
							            </div>
							        </form>
		                        </td>
		                        <td><?= $election_date['candidate_selection_end_date'];?> </td>
		                    </tr>
		                    
		                    <tr>
		                        <td>Candidate Advertisement Start Date:</td>
		                        <td>
		                        	<form method="post" action="<?= base_url(); ?>student_council/save_setting">	
				                        <input type="text" name="name" value="candidate_advertisement_start_date" hidden>		                        		                        
				                        <div class="input-group input-group-md">
							                <input type="text" class="inputmasked form-control" data-inputmask="'alias': 'yyyy-mm-dd'" name="value" value="<?= date('Y'); ?>" data-mask>
							                    <span class="input-group-btn">
							                      <button type="submit" class="btn btn-info btn-flat">Save!</button>
							                    </span>
							            </div>
							        </form>    
		                        </td>
		                        <td><?= $election_date['candidate_advertisement_start_date'];?> </td>
		                    </tr>

		                    <tr>
		                        <td>Election Start Date:</td>
		                        <td>
		                        	<form method="post" action="<?= base_url(); ?>student_council/save_setting">
				                        <input type="text" name="name" value="election_start_date" hidden>		                        		                        
				                        <div class="input-group input-group-md">
							                <input type="text" class="inputmasked form-control" data-inputmask="'alias': 'yyyy-mm-dd'" name="value" value="<?= date('Y'); ?>" data-mask>
							                    <span class="input-group-btn">
							                      <button type="submit" class="btn btn-info btn-flat">Save!</button>
							                    </span>
							            </div>
							        </form>
		                        </td>
		                        <td><?= $election_date['election_start_date'];?> </td>		                        		                              
		                    </tr>

		                    <tr>
		                        <td>Election End Date:</td>
		                        <td>
		                        	<form method="post" action="<?= base_url(); ?>student_council/save_setting">		                        
				                        <input type="text" name="name" value="election_end_date" hidden>		                        		                        
				                        <div class="input-group input-group-md">
							                <input type="text" class="inputmasked form-control" data-inputmask="'alias': 'yyyy-mm-dd'" name="value" value="<?= date('Y'); ?>" data-mask>
							                    <span class="input-group-btn">
							                      <button type="submit" class="btn btn-info btn-flat">Save!</button>
							                    </span>
							            </div>
							        </form>
		                        </td>		                              
		                        <td><?= $election_date['election_end_date'];?> </td>		                        		                              
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

<script type="text/javascript">
$(function() {
	$(".inputmasked").inputmask(); 
});
</script>