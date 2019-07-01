<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Election
        <small>The whole election proccess.</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?= base_url(); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active"><i class="fa fa-archive"></i>  Election</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">



		<div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Election</h3>
            </div>
            <div class="box-body">
            	
	          		<?php if(date('Y-m-d') < $election['candidate_selection_start_date']) { ?>           	
	          			<div class="callout">
				          <h4>Election!</h4>
				          <p>Election Process not started yet. The Election candidate selection date is at <?= $election['candidate_selection_start_date']; ?></p>
				        </div> 

	          		<?php } else if(date('Y-m-d') > $election['candidate_selection_start_date'] && date('Y-m-d') < $election['candidate_advertisement_start_date']) { ?>         

				        <?php if($this->session->flashdata('success')) { ?>
				          <div class="callout callout-info">
				              <?php echo $this->session->flashdata('success'); ?>
				          </div>
				        <?php } else if($this->session->flashdata('error')) { ?>
				          <div class="callout callout-error">
				              <?php echo $this->session->flashdata('error'); ?>
				          </div>
				        <?php } ?>


						<form method="POST" action="<?= base_url(); ?>student_council/add_candidate">	
							<div class="col-md-6">
			                	<select id="candidate" name="user_id" class="form-control" style="width: 100%;">

				                  		<?php foreach($pre_candidates as $pre_candidate) { ?>
			                  		<option value="<?= $pre_candidate['id']?>"><?= $pre_candidate['first_name'].' '.$pre_candidate['middle_name']; ?></option>
			                  		<?php } ?>
			                	</select>
			                </div>
			                <div>
			                	<button type="submit" class="btn btn-primary"><i class="fa fa-plus"></i></button>
			                </div>	
			            </form>
						<hr>

				        <?php if(!$candidates) { echo "No Record Found in the Database."; } else { ?>
				          <table id="example2" class="table table-bordered table-hover">
				              <thead>
				                <tr>
				                  <th>ID Number</th>
				                  <th>Name</th>
				                  <th>Action</th>
				                </tr>
				              </thead>
				              <tbody>

				              <?php foreach($candidates as $student) { ?>

				                <tr>
				                  <td><a href="#"><?= $student['id_number']; ?></a></td>
				                  <td><?= $student['first_name']." ".$student['middle_name']; ?></td>
				                  <td>
				                    <a href="<?= base_url(); ?>student_council/remove_candidate/<?= $student['id']; ?>" class="btn btn-xs btn-danger"><i class="fa fa-minus"></i></a>
				                  </td>
				                </tr>        

				              <?php } ?>

				              </tbody>
				          </table>
				          <?php } ?>
				        </div>





	          		<?php } else if(date('Y-m-d') > $election['candidate_advertisement_start_date'] && date('Y-m-d') < $election['election_start_date']) { ?>  
				            <h4>Election!</h4>
					          <p>Elected candidates advertising themselves till the election date which is <?= $election['election_start_date']; ?></p>
					        </div> 
		           			<div class="box-body no-padding">		                  
		           			  <ul class="users-list clearfix">
			                  	<?php foreach($candidates as $cndt) { ?>
			                    <li>
			                      <img src="<?= base_url(); ?>assets/img/profile_pictures/<?= $cndt['avatar'];?>" alt="User Image">
			                      <a class="users-list-name" href="#"><?= $cndt['first_name']." ".$cndt['middle_name']; ?></a>
			                    </li>
			                    <?php } ?>
			                  </ul>
			                  <!-- /.users-list -->
			                </div><hr>



					<?php } ?>


            </div>
          </div>






    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
