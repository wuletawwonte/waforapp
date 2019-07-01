
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
	                <?php foreach($latest_notices as $ntc) { ?>
	                <li class="item">
	                  <div class="product-img">
	                    <img class="img-circle img-bordered-sm" src="<?= base_url(); ?>assets/img/profile_pictures/<?= $ntc['avatar']; ?>" alt="user image" >
	                  </div>
	                  <div class="product-info">
	                    <a href="<?= base_url(); ?>welcome/notice/<?= $ntc['nid'];?>" class="product-title"><?= character_limiter($ntc['title'], 22); ?></a>
	                    <span class="product-description">
	                          <?= $ntc['first_name']." ".$ntc['middle_name']; ?>
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
          		<div class="box-body">
	                <!-- Post -->
	                <div class="post">
	                  <div class="user-block">
	                    <img class="img-circle img-bordered-sm" src="<?= base_url(); ?>assets/img/profile_pictures/<?= $notice['avatar']; ?>" alt="user image">
	                        <span class="username">
	                          <a href="#"><?= $notice['first_name']." ".$notice['middle_name']; ?></a>
	                        </span>
	                    <span class="description"><?= $notice['user_type']; ?> - <?= $notice['date_posted']; ?></span>
	                  </div>
	                  <!-- /.user-block -->
	                  <h5><a href="<?= base_url(); ?>welcome/notice/<?= $notice['nid']; ?>"><?= $notice['title']; ?></a></h5>
	                  <p>
	                    <?= $notice['content']; ?>
	                  </p>
	                  <ul class="list-inline">
	                    <li><a href="#" class="link-black text-sm"><i class="fa fa-thumbs-o-up margin-r-5"></i> Like</a>
	                    </li>
	                    <li class="pull-right">
	                      <a href="#" class="link-black text-sm"><i class="fa fa-comments-o margin-r-5"></i> Comments
	                        (5)</a></li>
	                  </ul>



	                <?php foreach($comments as $comment) { ?>
					<div class="direct-chat-msg">
                      <div class="direct-chat-info clearfix">
                        <span class="direct-chat-name pull-left"><?= $comment['first_name'].' '.$comment['middle_name'];?></span>
                        <span class="direct-chat-timestamp pull-right"><?= $comment['date_commented']; ?></span>
                      </div>
                      <!-- /.direct-chat-info -->
                      <img class="direct-chat-img" src="<?= base_url(); ?>assets/img/profile_pictures/<?= $comment['avatar']; ?>" alt="message user image">
                      <!-- /.direct-chat-img -->
                      <div class="direct-chat-text">
                      	<?= $comment['comment_content']; ?>
                      </div>
                      <!-- /.direct-chat-text -->
                    </div>
                    <?php } ?>




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


           		</div>
           	</div>
		</div>




	  </div>




      </section>
      <!-- /.content -->



