

<section class="content">

  	<div class="row">

		<div class="col-md-4 col-sm-4">
			<div class="box">
	            <div class="box-header with-border">
	              <h3 class="box-title">Latest Notices</h3>

	              <div class="box-tools pull-right">
	                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
	                </button>
	              </div>
	            </div>
	            <!-- /.box-header -->
	            <div class="box-body">
	              <ul class="products-list product-list-in-box">
	                <?php foreach($latest_notices as $notice) { ?>
	                <li class="item">
	                  <div class="product-img">
	                    <img class="img-circle img-bordered-sm" src="<?= base_url(); ?>assets/img/profile_pictures/<?= $notice['avatar']; ?>" alt="user image" >
	                  </div>
	                  <div class="product-info">
	                    <a href="<?= base_url(); ?>welcome/notice/<?= $notice['nid'];?>" class="product-title"><?= character_limiter($notice['title'], 22); ?></a>
	                    <span class="product-description">
	                          <?= $notice['first_name']." ".$notice['middle_name']; ?>
	                        </span>
	                  </div>
	                </li>
	                <?php } ?>

	              </ul>
	            </div>
	            <!-- /.box-body -->
	            <div class="box-footer text-center">
	              <a href="<?= base_url(); ?>" class="uppercase">View All Notices</a>
	            </div>
	            <!-- /.box-footer -->
	          </div>
          </div>



        <div class="col-md-8 col-sm-8">

	        <?php if($this->session->flashdata('success')) { ?>
	          <div class="callout callout-info">
	              <?php echo $this->session->flashdata('success'); ?>
	          </div>
	        <?php } else if($this->session->flashdata('error')) { ?>
	          <div class="callout callout-error">
	              <?php echo $this->session->flashdata('error'); ?>
	          </div>
	        <?php } ?>

          	<div class="box" style="border-radius: 0; padding-top: 8px;">
           		<div class="box-body">
	          		<?php if(date('Y-m-d') < $election['candidate_selection_start_date']) { ?>           	
	          			<div class="callout">
				          <h4>Election!</h4>
				          <p>Election Process not started yet. The Election candidate selection date is at <?= $election['candidate_selection_start_date']; ?></p>
				        </div> 

	          		<?php } else if(date('Y-m-d') > $election['candidate_selection_start_date'] && date('y-m-d') < $election['candidate_selection_end_date']) { ?>           		
						<div class="col-md-12" >
				          <!-- Widget: user widget style 1 -->
				          <div class="box box-widget widget-user">
				            <!-- Add the bg color to the header using any of the bg-* classes -->
				            <div class="widget-user-header bg-aqua-active" style="background: url('../assets/img/photo6.jpg') center center;">
				              <h3 class="widget-user-username"><?= $this->session->userdata('name'); ?></h3>
				              <h5 class="widget-user-desc"><?= $this->session->userdata('user_type'); ?></h5>
				            </div>
				            <div class="widget-user-image">
				              <img class="img-circle" src="<?= base_url(); ?>assets/img/profile_pictures/<?= $this->session->userdata('avatar'); ?>" alt="User Avatar" style="height: 90px;">
				            </div>
				            <div class="box-footer">
				              <div class="row">


				              </div>
				              <!-- /.row -->
				            <div class="box-body">


				              <strong> Election</strong><br>
				              <p class="text-muted">Send Request for becoming Student Council Candidate.</p>

				              <a href="<?php echo base_url(); ?>welcome/request_candidate" class="btn btn-info">Confirm</a>
				              <a href="<?php echo base_url(); ?>welcome/cancel_request_candidate" class="btn">Cancel</a>

				            </div>
				            </div>
				          </div>
				          <!-- /.widget-user -->
				        </div>
	           		<?php } else if(date('Y-m-d') > $election['candidate_selection_start_date'] && date('y-m-d') < $election['candidate_selection_end_date']) { }   ?>
           		</div>           		
           	</div>
		</div>




	  </div>




      </section>
      <!-- /.content -->



