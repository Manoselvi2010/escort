<?php
  $base_url= base_url();  
  $current_url = current_url();
  if($current_url==$base_url."admin/dashboard"){$active1="active";}else{$active1="";}
  if($current_url==$base_url."admin/profiles_lists"){$active2="active";}else{$active2="";}
  if($current_url==$base_url."admin/all_messages"){$active3="active";}else{$active3="";}
  if($current_url==$base_url."admin/email_templates"){$active4="active";}else{$active4="";}
  if($current_url==$base_url."admin/pages_manage"){$active5="active";}else{$active5="";}
  if($current_url==$base_url."admin/ads"){$active6="active";}else{$active6="";}
  if($current_url==$base_url."admin/home/update_pass"){$active7="active";}else{$active7="";}
  if($current_url==$base_url."admin/home/service"){$active8="active";}else{$active8="";}
  if($current_url==$base_url."admin/home/subservice"){$active9="active";}else{$active9="";}
  if($current_url==$base_url."admin/home/setting"){$active10="active";}else{$active10="";}
  if($current_url==$base_url."admin/home/logout"){$active11="active";}else{$active11="";}
?>
<aside class="left-side sidebar-offcanvas"> 
  <section class="sidebar"> 
    <ul class="sidebar-menu">
      <li class="<?php echo $active1; ?>"><a href="<?php echo base_url();?>admin/dashboard">
        <i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>
      <li class="<?php echo $active2; ?>"><a href="<?php echo base_url().'admin/profiles_lists';?>"><i class="fa fa-users" aria-hidden="true"></i> <span>Manage User Profiles</span></a></li>
      <!-- <li> <a href="<?php echo base_url().'admin/search_profile_name';?>"> <span>Search Profile By Name</span> </a> </li>
      <li> <a href="<?php echo base_url().'admin/search_profile_email';?>"> <span>Search Profile By Email</span> </a> </li>
      <li> <a href="<?php echo base_url().'admin/search_profile_location';?>"> <span>Search Profile By Location</span> </a> </li>  -->
      <li class="<?php echo $active3; ?>"><a href="<?php echo base_url().'admin/all_messages';?>"><i class="fa fa-comments" aria-hidden="true"></i> <span>Manage User's Messages</span></a></li>
     <!--  <li class="<?php echo $active4; ?>"><a href="<?php echo base_url().'admin/email_templates';?>"><i class="fa fa-envelope" aria-hidden="true"></i> <span>Manage Email Templates</span></a></li> -->
      <li class="<?php echo $active5; ?>"><a href="<?php echo base_url().'admin/pages_manage';?>"><i class="fa fa-adn" aria-hidden="true"></i> <span>Manage CMS</span></a></li>
      <li class="<?php echo $active6; ?>"><a href="<?php echo base_url().'admin/ads';?>"><i class="fa fa-adn" aria-hidden="true"></i> <span>Manage Ads</span></a></li>
      <li class="<?php echo $active7; ?>"><a href="<?php echo base_url().'admin/home/update_pass';?>"><i class="fa fa-key" aria-hidden="true"></i> <span>Change Password</span></a></li>
	    <li class="<?php echo $active8; ?>"><a href="<?php echo base_url().'admin/home/service';?>"><i class="fa fa-adn" aria-hidden="true"></i> <span>Service</span></a> </li>
	    <li class="<?php echo $active9; ?>"><a href="<?php echo base_url().'admin/home/subservice';?>"><i class="fa fa-subscript" aria-hidden="true"></i> <span>Subservice</span></a></li>
	    <li class="<?php echo $active10; ?>"><a href="<?php echo base_url().'admin/home/setting';?>"><i class="fa fa-adn" aria-hidden="true"></i> <span>Settings</span></a></li>
      <li class="<?php echo $active11; ?>"><a href="<?php echo base_url().'admin/home/logout';?>"><i class="fa fa-sign-out" aria-hidden="true"></i> <span>Logout</span></a></li>
    </ul>
  </section>
</aside>
