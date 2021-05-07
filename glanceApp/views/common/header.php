<!-- Old Header -->
<!-- <div class="header">
  <div class="container">
        <a style="float: left" href="<?php echo base_url(); ?>" class="left"><img src="<?php echo base_url(); ?>glancePublic/images/logo.png" alt="" class="header-logo" /></a>      
        <div class="navigationwrape">
            <div class="navbar navbar-default" role="navigation">
                <div class="navbar-header">
                  <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#header_menu"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
                </div>
                <div class="navbar-collapse collapse" id="header_menu">
                  <ul class="nav navbar-nav">
                    <li><a href="<?php echo base_url(); ?>about">About</a></li>
                    <li><a href="<?php echo base_url(); ?>search_profile">Search Profile</a></li>
                    <?php if(!$this->session->userdata('username')) {?>
                    <li><a href="<?php echo base_url('register'); ?>">Signup</a></li>
                    <li><a href="<?php echo base_url('user/login'); ?>">Login</a></li>
                    <?php } ?>
                    <li><a href="<?php echo base_url(); ?>contact">Contact</a></li>
                  </ul>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>      
        <div class="clearfix"></div>
    </div>
</div>  -->

<!-- New Header -->
<nav class="common-header navbar navbar-default">
   <div class="container-fluid">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#main-header" aria-expanded="false">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="<?php echo base_url(); ?>"><img src="<?php echo base_url(); ?>glancePublic/images/logo.png" alt="" class="header-logo" /></a>
      </div>
      <div class="collapse navbar-collapse" id="main-header">
        <div class="col-md-6 col-sm-4 header-padding-none" style="margin-top: 8px">
            <ul class="nav navbar-nav common-header-city">            
                <input type="text" name="country" id="txtPlaces" placeholder="Search a location..." class="form-control countryname">
            </ul>
            <!-- <span class="col-md-12 col-sm-12 header-padding-none font-12 common-header-city">See escort in other cities</span> -->
        </div>
        <ul class="nav navbar-nav navbar-right">            
            <li class="dropdown margin-t-10">
               <!-- <a href="#" class="dropdown-toggle header-font-color" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-lock" aria-hidden="true"></i> Personal Cabinet </a>
               <ul class="dropdown-menu">
                  <li><a href="#">Action</a></li>                 
                  <li role="separator" class="divider"></li>
                  <li><a href="#">Separated link</a></li>
               </ul> -->
               <a href="<?php echo base_url().'user/login';?>" class="dropdown-toggle header-font-color"><i class="fa fa-lock" aria-hidden="true"></i> Personal Cabinet </a>
            </li>
        </ul>
      </div>
   </div>
</nav>

<div class="searchpopup" id="searchFriend">
  <div class="contentpoup">
    <h6>Search Friend</h6>
    <form action="<?php echo base_url();?>searchfriend" method="post">
      <div class="advsearchwrp">
        <div class="advbox">
          <label>Looking For</label>
          <select name="gender" id="gender">
          	<option value="" selected="selected">Gender</option>
            <option value="male">Male</option>
            <option value="female">Female</option>
          </select>
          <div class="clear"></div>
        </div>
        <div class="advbox">
          <label>Age Between</label>
          <select class="age" name="age_frm">
          <option value="" selected="selected">Age From</option>
            <?php for($p=18;$p<=50;$p++):?>
            <option value="<?php echo $p;?>"><?php echo $p;?></option>
            <?php endfor ?>
          </select>
          <b>to</b>
          <select class="age" name="age_to">
          <option value="" selected="selected">Age To</option>
            <?php for($k=18;$k<=50;$k++):?>
            <option value="<?php echo $k;?>"><?php echo $k;?></option>
            <?php endfor; ?>
          </select>
          <div class="clear"></div>
        </div>
        <div class="advbox">
          <label>Name</label>
          <input type="text" name="full_name" class="formField" />
          <div class="clear"></div>
        </div>
        <div class="advbox">
          <label>Email Address</label>
          <input type="text" name="email" id="email" class="formField" />
          <div class="clear"></div>
        </div>
        <div class="advbox">
          <label>Marital Status</label>
          <select name="martial_status">
          <option value="" selected="selected">Marital Status</option>
            <option value="Never Married" selected="">Never Married</option>
            <option value="Married but looking">Married but looking</option>
            <option value="Divorced">Divorced</option>
            <option value="Widowed">Widowed</option>
            <option value="Separated">Separated</option>
          </select>
          <div class="clear"></div>
        </div>
        <div class="advbox">
          <label>Smoking</label>
          <select name="smoking" class="bdoption">
          <option value="" selected="selected">Smoking</option>
            <option value="No">No</option>
            <option value="Yes">Yes</option>
          </select>
          <div class="clear"></div>
        </div>
       
        <div class="advbox">
          <label>City:</label>
          <input type="text" name="city" class="formField">
          <div class="clear"></div>
        </div>
        <div class="clear"></div>
        <div class="buttonBox">
          <input type="submit" value="Search" />
          <a href="javascript:void(0);" onclick="document.getElementById('searchFriend').style.display='none';document.getElementById('searchfade').style.display='none'">Close</a></div>
      </div>
    </form>
  </div>
</div>
<!--/Header Section End--> 
<?php

$data['services']	=$this->service_model->get_all_profiles(50,0);
 $this->load->view('common/submenu',$data); ?>
<?php if($this->session->userdata('is_user_login')):?>
  <?php
    $base_url= base_url();  
    $current_url = current_url();
    $profile_name =$this->session->userdata('username');
    $url_profile_name= $this->uri->segment(2);
    $url_profile= $this->uri->segment(1);
    if($url_profile=="profile")
    {
      if($profile_name==$url_profile_name){ 
        $this->load->view('common/logged_in_bar'); 
      }
    }else{
      $this->load->view('common/logged_in_bar'); 
    }
  
  endif;?>
<script>

$('.countryname').on("change",function() { //LISTENER FOR BUTTON CLICK BASED ON ID button ON THE PHP PAGE
    var name = $('.countryname').val();
	var base_url ='<?php echo base_url() ?>';
	window.location.href = base_url+"searchfriend?country="+name; 
	
	
});

</script>  
