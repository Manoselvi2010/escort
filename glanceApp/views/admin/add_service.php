<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $title;?></title>
<?php $this->load->view('admin/common/meta_tags'); ?>
<?php $this->load->view('admin/common/before_head_close'); ?>
</head>
<body class="skin-blue">
<?php $this->load->view('admin/common/after_body_open'); ?>
<?php $this->load->view('admin/common/header'); ?>
<div class="wrapper row-offcanvas row-offcanvas-left"> 
	<?php $this->load->view('admin/common/left_side'); ?>
  <!-- Right side column. Contains the navbar and content of the page -->
  <aside class="right-side"> 
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1> Add Service<!--<small>advanced tables</small>--> 
      </h1>
    </section>
    
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <div style="font-size:11px; color:#060;">
			  <?php
            	if($this->session->flashdata('msg')):
				?>
               <?php 
					echo $this->session->flashdata('msg');
				endif;	
			  ?>
            </div>
            </div>
            <!-- /.box-header -->
            <form action="<?php echo base_url()."admin/home/add_service" ?>" method="post">
            <table width="100%" border="0">
              <tr>
                <td width="19%" align="right" valign="top"><strong>Service Name:</strong>&nbsp;</td>
                 <td><input style="width:500px;" type="text" name="service" id="service" value="">
                </td>
              </tr>
              <tr>
                <td width="19%" align="right" valign="top"><strong>order</strong>&nbsp;</td>
                 <td><input style="width:500px;" type="text" name="service_order" id="service_order" value="">
                </td>
              </tr>
               <tr>
                <td height="36" align="right" valign="top"><strong>Status</strong></td>
                <td><input style="width:500px;" type="radio" name="status" id="status" value="1">approved
                  <input style="width:500px;" type="radio" name="status" id="status" value="0">unapproved
                </td>
              </tr>
               
               
              <tr>
                <td align="right" valign="top">&nbsp;</td>
                <td><input type="hidden" name="cms_id" id="cms_id" value="<?php echo $cms_id;?>">
                <input type="submit" class="btn btn-primary" value="Submit" /></td>
              </tr>
            </table>
			</form>
            
            <!-- /.box-body --> 
          </div>
          <!-- /.box --> 
          
          <!-- /.box --> 
        </div>
      </div>
    </section>
    <!-- /.content --> 
  </aside>
  <!-- /.right-side --> 
</div>
<!-- ./wrapper -->
</body>
</html>
