<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
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
         <!--Recent Profiles Start-->
         <div class="innerPageswrap">
            <div class="container">
               <div class="row">
                  <div class="col-md-6 col-md-offset-3 col-sm-6 col-sm-offset-3">
                     <div class="userccount">
                        <div class="err"><?php echo $msg;?></div>
                        <h1>Forgot Password</h1>
                        <form name="login_form" id="login_form" method="post" action="<?php echo base_url().'user/forgot';?>">
                           <div class="formpanel">
                              <div class="formrow">
                                 <label>Email Address</label>
                                 <input type="text" class="form-control" name="email" id="email" value="<?php echo set_value('email');?>"  />
                                 <?php echo form_error('email', '<div class="error"><span>', '</span></div>'); ?>
                              </div>                                                     
                           <input type="submit" class="btn" name="" value="Retrieve Password" />
                           </div>
                           <div class="formrow margin-t-20" align="center">
                              <a class="" href="<?php echo base_url();?>user/login">Login</a>
                           </div>
                           <div class="clear"></div>                           
                        </form>
                     </div>
                  </div>
               </div>
               <div class="row margin-t-20" align="center"> 
                  <div class="col-md-6 col-md-offset-3 col-sm-6 col-sm-offset-3">
                     <a class="btn blue-bg" href="<?php echo base_url();?>">New User Sign Up</a>
                  </div>
               </div>
               <div class="signupWrp"></div>
               <div class="clear"></div>
            </div>
         </div>
         <!--Recent Profiles Endt-->
         <?php $this->load->view('common/footer'); ?>
      </div>
      <!--/Site Wraper End-->
      <?php $this->load->view('common/before_body_close'); ?>
   </body>
</html>