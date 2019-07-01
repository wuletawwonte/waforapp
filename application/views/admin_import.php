<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Import
        <small>Import Students here</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?= base_url(); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Import</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

          <?php if($this->session->flashdata('success')) { ?>
            <div class="callout callout-info">
                <?php echo $this->session->flashdata('success'); ?>
            </div>
          <?php } else if($this->session->flashdata('error')) { ?>
            <div class="callout callout-error">
                <?php echo $this->session->flashdata('error'); ?>
            </div>
          <?php } ?>


      <form action="<?php echo base_url();?>admin/uploadData" method="post" enctype="multipart/form-data">
          Upload excel file : 
          <input type="file" name="uploadFile" value="" /><br><br>
          <input type="submit" name="submit" value="Upload" />
      </form>


    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
