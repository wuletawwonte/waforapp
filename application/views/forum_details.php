

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

	              <?php foreach($forums as $frm) { ?>
	                <li class="item">
	                  <div class="product-img">
	                    <img src="<?= base_url(); ?>assets/img/default-50x50.gif" class="img img-circle" alt="Product Image">
	                  </div>
	                  <div class="product-info">
	                    <a href="<?= base_url(); ?>welcome/forum_details/<?= $frm['fid']; ?>" class="product-title"><?= word_limiter($frm['forum_question'], 7); ?></a>
	                    <span class="product-description">
	                          Samsung 32" 1080p 60Hz LED Smart HDTV.
	                        </span>
	                  </div>
	                </li>
	                <!-- /.item -->
	                <?php } ?>

	              </ul>
	            </div>
	            <!-- /.box-body -->
	            <div class="box-footer text-center">
	              <a href="<?= base_url(); ?>welcome/forums" class="uppercase">View All Forums</a>
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
	                <!-- Post -->
	                <div class="post">
	                  <div class="user-block">
	                    <img class="img-circle img-bordered-sm" src="<?= base_url(); ?>assets/img/profile_pictures/<?= $forum['avatar']; ?>" alt="user image">
	                        <span class="username">
	                          <a href="#"><?= $forum['first_name']." ".$forum['middle_name']; ?></a>
	                        </span>
	                    <span class="description"><?= $forum['user_type']; ?> - <?= $forum['date_asked']; ?></span>
	                  </div>
	                  <!-- /.user-block -->
	                  <p>
	                    <?= $forum['forum_question']; ?>
	                  </p>
	                  <ul class="list-inline">
	                    <li><a href="#" class="link-black text-sm"><i class="fa fa-thumbs-o-up margin-r-5"></i> Like</a>
	                    </li>
	                    <li class="pull-right">
	                      <a href="#" class="link-black text-sm"><i class="fa fa-comments-o margin-r-5"></i> Comments
	                        (5)</a></li>
	                  </ul>

						<div class="box-footer box-comments" style="">
						  <?php foreach($answers as $answer) { ?>
			              <div class="box-comment">
			                <!-- User image -->
			                <img class="img-circle img-sm" src="<?= base_url(); ?>assets/img/profile_pictures/<?= $answer['avatar']; ?>" alt="User Image">

			                <div class="comment-text">
			                      <span class="username">
			                        <?= $answer['first_name']." ".$answer['middle_name']; ?>
			                        <span class="text-muted pull-right"><?= $answer['date_answered']; ?></span>
			                      </span><!-- /.username -->
			                      <?= $answer['answer_content']; ?>
			                </div>
			                <!-- /.comment-text -->
			                <?php } ?>
			              </div>
			              <!-- /.box-comment -->
			            </div>
			            <?php if($this->session->userdata('is_logged_in') == "FALSE") { ?>
			            <div class="box-footer">
                          <form action="<?= base_url(); ?>welcome/answer_forum_question" method="post">
                          	<input type="text" name="fid" value="<?= $forum['fid']; ?>" hidden>
                            <img class="img-responsive img-circle img-sm" src="<?= base_url(); ?>assets/img/profile_pictures/<?= $this->session->userdata('avatar'); ?>" alt="Alt Text">
                            <!-- .img-push is used to add margin to elements next to floating images -->
                            <div class="img-push">
                              <input type="text" class="form-control input-sm" name="answer_content" placeholder="Press enter to post comment">
                              <button type="submit" class="btn btn-sm btn-primary">Answer</button>
                            </div>
                          </form>
                        </div>			            
                        <?php } ?>
					</div>
				</div>
			</div>
		</div>

	  </div>




      </section>
      <!-- /.content -->



<script type="text/javascript">
	


</script>