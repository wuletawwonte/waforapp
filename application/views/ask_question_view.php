

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
          	<div class="box" style="border-radius: 0; padding-top: 8px;">
				<form method="POST" action="<?= base_url(); ?>welcome/post_question">
	          		<div class="box-header">
	          			<h3 class="box-title">Ask Questions</h3>
	          		</div>
	          		<div class="box-body">

						<div class="form-group">
		                  <label>Textarea</label>
		                  <textarea class="form-control" name="forum_question" rows="3" placeholder="Enter ..."></textarea>
		                </div>

	           		</div>
	           		<div class="box-footer">
	           			<a href="<?= base_url(); ?>welcome/forums" class="btn btn-default">Cancel</a>
		                <button type="submit" class="btn btn-info pull-right">Save</button>
	           		</div>
           		</form>
           	</div>
		</div>




	  </div>




      </section>
      <!-- /.content -->

