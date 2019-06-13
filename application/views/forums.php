

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
	                    <a href="<?= base_url(); ?>welcome/notice/<?= $notice['nid'];?>" class="product-title"><?= character_limiter($notice['title'], 22); ?>
	                      <span class="label label-warning pull-right">$1800</span></a>
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
          		<div class="box-header">
          			<h3 class="box-title">Top Questions</h3>
          		
  					<a href="<?= base_url(); ?>welcome/ask_question_view" class="btn btn-lg btn-info pull-right" <?php if($this->session->userdata('is_logged_in') != "TRUE") { ?> data-toggle="tooltip" title="Login first!" disabled <?php } ?> >Ask Question</a>        		
          		</div>
          		<div class="box-body">

		        <div class="callout">
		          <h4>Tip!</h4>
		          <p>Add the layout-top-nav class to the body tag to get this layout. This feature can also be used with a sidebar!</p>
		        </div> 

				<ul class="products-list product-list-in-box">
					<?php foreach($forums as $forum) { ?>
	                <li class="item">
	                  <div class="product-img">
	                    <a href=""> <img src="http://waforapp.wuletaw/assets/img/default-50x50.gif" class="img img-circle" alt="Product Image"></a>
 					  </div>
	                  <div class="product-info">
	                    <a href="<?= base_url(); ?>welcome/forum_details/<?= $forum['fid']; ?>" class="product-title"><?= $forum['forum_question']; ?>
	                      <span class="label label-warning pull-right">$1800</span></a>
	                    <span class="product-description">
	                          Samsung 32" 1080p 60Hz LED Smart HDTV.
	                        </span>
	                  </div>
	                </li>
	                <?php } ?>
	                <!-- /.item -->
	              </ul>


           		</div>
           	</div>
		</div>




	  </div>




      </section>
      <!-- /.content -->



