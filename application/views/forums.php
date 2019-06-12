

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
	                    <img class="img-circle img-bordered-sm" src="<?= base_url(); ?>assets/img/avatardefault.png" alt="user image" >
	                  </div>
	                  <div class="product-info">
	                    <a href="javascript:void(0)" class="product-title"><?= character_limiter($notice['title'], 22); ?>
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
          		<div class="box-body">

		        <div class="callout callout-info">
		          <h4>Tip!</h4>
		          <p>Add the layout-top-nav class to the body tag to get this layout. This feature can also be used with a sidebar!</p>
		        </div> 

				<ul class="products-list product-list-in-box">
	                <li class="item">
	                  <div class="product-img">
	                    <a href=""> <img src="http://waforapp.wuletaw/assets/img/default-50x50.gif" class="img img-circle" alt="Product Image"></a>
 					  </div>
	                  <div class="product-info">
	                    <a href="javascript:void(0)" class="product-title">How do we change the profile picture of this system?
	                      <span class="label label-warning pull-right">$1800</span></a>
	                    <span class="product-description">
	                          Samsung 32" 1080p 60Hz LED Smart HDTV.
	                        </span>
	                  </div>
	                </li>
	                <!-- /.item -->
	                <li class="item">
	                  <div class="product-img">
	                    <img src="http://waforapp.wuletaw/assets/img/default-50x50.gif" class="img img-circle" alt="Product Image">
	                  </div>
	                  <div class="product-info">
	                    <a href="javascript:void(0)" class="product-title">Where do we add the layout-top-nav class to the body tag to get this layout?
	                      <span class="label label-info pull-right">$700</span></a>
	                    <span class="product-description">
	                          26" Mongoose Dolomite Men's 7-speed, Navy Blue.
	                        </span>
	                  </div>
	                </li>
	                <!-- /.item -->
	                <li class="item">
	                  <div class="product-img">
	                    <img src="http://waforapp.wuletaw/assets/img/default-50x50.gif" class="img img-circle" alt="Product Image">
	                  </div>
	                  <div class="product-info">
	                    <a href="javascript:void(0)" class="product-title">How does this feature can be used with another feature? <span class="label label-danger pull-right">$350</span></a>
	                    <span class="product-description">
	                          Xbox One Console Bundle with Halo Master Chief Collection.
	                        </span>
	                  </div>
	                </li>
	                <!-- /.item -->
	                <li class="item">
	                  <div class="product-img">
	                    <img src="http://waforapp.wuletaw/assets/img/default-50x50.gif" class="img img-circle" alt="Product Image">
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
           	</div>
		</div>




	  </div>




      </section>
      <!-- /.content -->



