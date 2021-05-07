<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $title;?></title>
<link rel="icon" type="image/x-icon" href="<?php echo base_url();?>glancePublic/images/fav-icon.png" />
<?php $this->load->view('common/meta_tags'); ?>
<?php $this->load->view('common/before_head_close'); ?>
</head>
<body>
<?php $this->load->view('common/after_body_open'); ?>
<!--Site Wraper Start-->
<div class="siteWraper">
  <?php $this->load->view('common/header'); ?>
  
 
  <div class="innerPageswrap">
  <!--Start-->
  	<div class="container"> 
    <!--Recent Profiles Start-->
    
    <div class="row">
  	<div class="col-md-6 col-md-offset-3">
       <div class="userccount">
      <h1>Change Password</h1>
      <form name="pass_form" id="pass_form" method="post" action="">
      	<div class="formpanel">
        <div class="formrow">
        <label>New Password</label>
        <input type="password" name="password" id="password" class="form-control" />
        <?php echo form_error('password', '<div class="error"><span>', '</span></div>'); ?>
        </div>
        
        <div class="formrow">
        <label>Confirm Password</label>
        <input type="password" name="con_password" id="con_password" class="form-control"  />
        <?php echo form_error('con_password', '<div class="error"><span>', '</span></div>'); ?>
        </div>
        <div class="buttonBox">
        <input type="submit" name="" value="Change" />
        </div>
        </div>
      </form>
      </div>
    </div>
    </div>
    
   
  </div>
  <!--End-->
  </div>
  
  
  <?php $this->load->view('common/footer'); ?>
</div>
<!--/Site Wraper End-->
<?php $this->load->view('common/before_body_close'); ?>
</body>
</html>
