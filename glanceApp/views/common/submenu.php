 <nav class="navbar navbar-default submenu" id="w3-collapse">
  <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#search_profile_menu" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <i class="fa fa-caret-square-o-down font-white" aria-hidden="true"></i>
      </button>                     
     <li class="visible-xs search-menu "><a>Menu</a></li>
   </div>
   <div class="collapse navbar-collapse" id="search_profile_menu">
      <ul class="nav navbar-nav">                                             
         <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Intimate services <span class="caret"></span></a>
            <ul class="dropdown-menu">
                <?php 
                  foreach($services as $service) {
                   $service_id  = $service->ID;
                    ?>
               <li class="menu-bold-font"><?php echo $service->service ?></li>
               <?php 
                  $subservices = $this->subservice_model->get_service_id($service_id);
                              
                  foreach($subservices as $subservice){ ?>
               <li><a href="<?php echo base_url();?>searchfriend?subservices=<?php echo $subservice->ID ?>"><?php echo $subservice->subservice ?></a></li>
               <?php } } ?>                              
            </ul>
         </li>
         <li><a href="<?php echo base_url();?>searchfriend?search=new">New</a></li>
         <li><a href="<?php echo base_url();?>searchfriend?search=verified">Verifed</a></li>
         <li><a href="<?php echo base_url();?>searchfriend?search=female">Girls</a></li>
         <li><a href="<?php echo base_url();?>searchfriend?search=male">Male</a></li>
         <li><a href="<?php echo base_url();?>searchfriend?search=Transsexual">Transsexual</a></li>
      </ul>                     
   </div>
</nav>