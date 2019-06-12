


<section class="content">





  	<div class="row">





		<div class="col-md-4 col-sm-4">
			<div class="box">
	            <div class="box-header with-border">
	              <h3 class="box-title">Latest Forums</h3>

	              <div class="box-tools pull-right">
	                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
	                </button>
	              </div>
	            </div>
	            <!-- /.box-header -->
	            <div class="box-body">
	              <ul class="products-list product-list-in-box">
	                <li class="item">
	                  <div class="product-img">
	                    <img src="<?= base_url(); ?>assets/img/default-50x50.gif" class="img img-circle" alt="Product Image">
	                  </div>
	                  <div class="product-info">
	                    <a href="javascript:void(0)" class="product-title">Samsung TV
	                      <span class="label label-warning pull-right">$1800</span></a>
	                    <span class="product-description">
	                          Samsung 32" 1080p 60Hz LED Smart HDTV.
	                        </span>
	                  </div>
	                </li>
	                <!-- /.item -->
	                <li class="item">
	                  <div class="product-img">
	                    <img src="<?= base_url(); ?>assets/img/default-50x50.gif" alt="Product Image">
	                  </div>
	                  <div class="product-info">
	                    <a href="javascript:void(0)" class="product-title">Bicycle
	                      <span class="label label-info pull-right">$700</span></a>
	                    <span class="product-description">
	                          26" Mongoose Dolomite Men's 7-speed, Navy Blue.
	                        </span>
	                  </div>
	                </li>
	                <!-- /.item -->
	                <li class="item">
	                  <div class="product-img">
	                    <img src="<?= base_url(); ?>assets/img/default-50x50.gif" class="img img-circle" alt="Product Image">
	                  </div>
	                  <div class="product-info">
	                    <a href="javascript:void(0)" class="product-title">Xbox One <span class="label label-danger pull-right">$350</span></a>
	                    <span class="product-description">
	                          Xbox One Console Bundle with Halo Master Chief Collection.
	                        </span>
	                  </div>
	                </li>
	                <!-- /.item -->
	                <li class="item">
	                  <div class="product-img">
	                    <img src="<?= base_url(); ?>assets/img/default-50x50.gif" alt="Product Image">
	                  </div>
	                  <div class="product-info">
	                    <a href="javascript:void(0)" class="product-title">PlayStation 4
	                      <span class="label label-success pull-right">$399</span></a>
	                    <span class="product-description">
	                          PlayStation 4 500GB Console (PS4)
	                        </span>
	                  </div>
	                </li>
	                <!-- /.item -->
	              </ul>
	            </div>
	            <!-- /.box-body -->
	            <div class="box-footer text-center">
	              <a href="#" class="uppercase">View All Forums</a>
	            </div>
	            <!-- /.box-footer -->
	          </div>
          </div>





        <div class="col-md-8 col-sm-8">
          	<div class="box" style="border-radius: 0; padding-top: 8px;">
          		<div class="box-body">
	                <!-- Post -->
	                <?php foreach ($notices as $notice) { ?>
	                <div class="post">
	                  <div class="user-block">
	                    <img class="img-circle img-bordered-sm" src="<?= base_url(); ?>assets/img/profile_pictures/<?= $notice['avatar']; ?>" alt="user image">
	                        <span class="username">
	                          <a href="#"><?= $notice['first_name']." ".$notice['middle_name']; ?></a>
	                        </span>
	                    <span class="description"><?= $notice['user_type']; ?> - <?= $notice['date_posted']; ?></span>
	                  </div>
	                  <!-- /.user-block -->
	                  <h5><a href="<?= base_url(); ?>welcome/notice/<?= $notice['nid']; ?>"><?= word_limiter($notice['title'], 30); ?></a></h5>
	                  <p>
	                    <?= word_limiter($notice['content'], 50); ?>
	                  </p>
	                  <ul class="list-inline">
	                    <li><a href="#" class="link-black text-sm"><i class="fa fa-thumbs-o-up margin-r-5"></i> Like</a>
	                    </li>
	                    <li class="pull-right">
	                      <a href="#" class="link-black text-sm"><i class="fa fa-comments-o margin-r-5"></i> Comments
	                        (5)</a></li>
	                  </ul>

	                  <form method="POST" action="<?= base_url(); ?>welcome/comment" class="form-horizontal" <?php if($this->session->userdata('is_logged_in') != "TRUE") echo "hidden"; ?>>
	                    <div class="form-group margin-bottom-none">
	                      <input type="text" name="nid" value="<?= $notice['nid']; ?>" hidden>
	                      <div class="col-sm-10">
	                        <input class="form-control input-sm" name="comment_content" placeholder="Comment" >
	                      </div>
	                      <div class="col-sm-2">
	                        <button type="submit" class="btn btn-info pull-right btn-block btn-sm">Comment</button>
	                      </div>
	                    </div>
	                  </form>
	                </div>
	                <!-- /.post -->
	                <?php } ?>


	                <!-- Post -->
	                <div class="post">
	                  <div class="user-block">
	                    <img class="img-circle img-bordered-sm" src="<?= base_url(); ?>assets/img/avatar.png" alt="User Image">
	                        <span class="username">
	                          <a href="#">Adam Jones</a>
	                          <a href="#" class="pull-right btn-box-tool"><i class="fa fa-times"></i></a>
	                        </span>
	                    <span class="description">Posted 5 photos - 5 days ago</span>
	                  </div>
	                  <!-- /.user-block -->
	                  <div class="row margin-bottom">
	                    <div class="col-sm-6">
	                      <img class="img-responsive" src="<?= base_url(); ?>assets/img/photo2.jpg" alt="Photo">
	                    </div>
	                    <!-- /.col -->
	                    <div class="col-sm-6">
	                      <div class="row">
	                        <div class="col-sm-6">
	                          <img class="img-responsive" src="<?= base_url(); ?>assets/img/photo2.jpg" alt="Photo">
	                          <br>
	                          <img class="img-responsive" src="<?= base_url(); ?>assets/img/photo9.jpg" alt="Photo">
	                        </div>
	                        <!-- /.col -->
	                        <div class="col-sm-6">
	                          <img class="img-responsive" src="<?= base_url(); ?>assets/img/photo1.jpg" alt="Photo">
	                          <br>
	                          <img class="img-responsive" src="<?= base_url(); ?>assets/img/photo4.jpg" alt="Photo">
	                        </div>
	                        <!-- /.col -->
	                      </div>
	                      <!-- /.row -->
	                    </div>
	                    <!-- /.col -->
	                  </div>
	                  <!-- /.row -->

	                  <ul class="list-inline">
	                    <li><a href="#" class="link-black text-sm"><i class="fa fa-share margin-r-5"></i> Share</a></li>
	                    <li><a href="#" class="link-black text-sm"><i class="fa fa-thumbs-o-up margin-r-5"></i> Like</a>
	                    </li>
	                    <li class="pull-right">
	                      <a href="#" class="link-black text-sm"><i class="fa fa-comments-o margin-r-5"></i> Comments
	                        (5)</a></li>
	                  </ul>

	                  <input class="form-control input-sm" type="text" placeholder="Type a comment">
	                </div>
	                <!-- /.post -->
           		</div>
           	</div>
		</div>




	  </div>




      </section>
      <!-- /.content -->



