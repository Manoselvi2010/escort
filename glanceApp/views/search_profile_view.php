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
      <script type="text/javascript" src='https://maps.google.com/maps/api/js?key=AIzaSyAlBu8MsC7jxJ68rpRR722Ojl_HQiWpnhQ&sensor=false&libraries=places'></script>
      <script type="text/javascript">
         google.maps.event.addDomListener(window, 'load', function () {
             var places = new google.maps.places.Autocomplete(document.getElementById('txtPlaces'));
             google.maps.event.addListener(places, 'place_changed', function () {
                 var place = places.getPlace();
                 var address = place.formatted_address;
                 var latitude = place.geometry.location.lat();
                 var longitude = place.geometry.location.lng();
             });
         });
      </script>
      <script>
         $(document).ready(function(){
            $("#filter_option").click(function(){
               $("#filter_content").toggle();
           });
         });
      </script>
   </head>
   <body>
      <?php $this->load->view('common/header'); ?>
      <?php $this->load->view('common/after_body_open'); ?>
      <!--Site Wraper Start-->
      <div class="innerPageswrap">
         <div class="container">
            <!-- menu -->
            <div class="row " align="right">
               <div class="col-md-12">
                  <button class="btn pink-color-btn" id="filter_option">Filter <i class="fa fa-filter" aria-hidden="true"></i></button>
               </div>
            </div>
            <div class="row margin-t-20" id="filter_content" align="left">
               <div class="col-md-12"> 
                  <form action="<?php echo base_url();?>searchfriend" method="post">
                     <div class="userccount">
                        <h2>Search Profile</h2>
                        <div class="formpanel">
                           <div class="row">                              
                              <div class="formrow col-md-2 col-sm-3 col-xs-12 padding-lt-rt-5">
                                 <label class="col-md-12 col-sm-12 col-xs-12 padding-lt-rt-5">Height</label>
                                 <div class="col-md-6 col-sm-6 col-xs-6 padding-lt-rt-5">
                                    <input type="text" name="height_min" id="height_min" class="form-control" placeholder="Min" value="<?php echo $postdata['height_min']; ?>">
                                 </div>
                                 <div class="col-md-6 col-sm-6 col-xs-6 padding-lt-rt-5">
                                    <input type="text" name="height_max" id="height_max" class="form-control" placeholder="Max" value="<?php echo $postdata['height_max']; ?>">
                                 </div>
                              </div>
                              <div class="formrow col-md-2 col-sm-3 col-xs-12 padding-lt-rt-5">
                                 <label class="col-md-12 col-sm-12 col-xs-12 padding-lt-rt-5">Weight</label>
                                    <div class="col-md-6 col-sm-6 col-xs-6 padding-lt-rt-5">
                                       <input type="text" name="weight_min" id="weight_min" class="form-control" placeholder="Min" value="<?php echo $postdata['weight_min']; ?>">
                                    </div>
                                    <div class="col-md-6 col-sm-6 col-xs-6 padding-lt-rt-5">
                                       <input type="text" name="weight_max" id="weight_max" class="form-control" placeholder="Max" value="<?php echo $postdata['weight_max']; ?>">
                                    </div>
                              </div>
                              <div class="formrow col-md-2 col-sm-3 col-xs-12 padding-lt-rt-5">
                                 <label class="col-md-12 col-sm-12 col-xs-12 padding-lt-rt-5">1hour price</label>
                                    <div class="col-md-6 col-sm-6 col-xs-6 padding-lt-rt-5">
                                       <input type="text" name="one_hour_min_price" id="one_hour_min_price" class="form-control" placeholder="Min" value="<?php echo $one_hour_min_price ?>">
                                    </div>
                                    <div class="col-md-6 col-sm-6 col-xs-6 padding-lt-rt-5">
                                       <input type="text" name="one_hour_max_price" id="one_hour_max_price" class="form-control" placeholder="Max" value="<?php echo $one_hour_max_price; ?>">  
                                    </div>
                              </div>
                              <div class="formrow col-md-2 col-sm-3 col-xs-12 padding-lt-rt-5">
                                 <label class="col-md-12 col-sm-12 col-xs-12 padding-lt-rt-5">2hours price</label>
                                 <div class="col-md-6 col-sm-6 col-xs-6 padding-lt-rt-5">
                                    <input type="text" name="two_hour_min_price" id="two_hour_min_price" class="form-control" placeholder="Min" value="<?php echo $two_hour_min_price; ?>">
                                 </div>
                                 <div class="col-md-6 col-sm-6 col-xs-6 padding-lt-rt-5">
                                    <input type="text" name="two_hour_max_price" id="two_hour_max_price" class="form-control" placeholder="Max" value="<?php echo $two_hour_max_price; ?>"> 
                                 </div>
                              </div>
                              <div class="formrow col-md-2 col-sm-3 col-xs-12 padding-lt-rt-5">
                                 <label class="col-md-12 col-sm-12 col-xs-12 padding-lt-rt-5">Age</label>
                                 <div class="col-md-6 col-sm-6 col-xs-6 padding-lt-rt-5">
                                    <select class="form-control" name="age_frm">
                                       <option value="" selected="selected">min</option>
                                       <?php for($p=18;$p<=50;$p++):
                                          $selected="";
                                          if($postdata['age_frm'] == $p)
                                          {
                                            $selected="selected";
                                          }
                                          ?>
                                       <option value="<?php echo $p;?>" <?phg echo $selected; ?> ><?php echo $p;?></option>
                                       <?php endfor ?>
                                    </select>
                                 </div>
                                 <div class="col-md-6 col-sm-6 col-xs-6 padding-lt-rt-5">
                                    <select class="form-control" name="age_to">
                                       <option value="" selected="selected">Max</option>
                                       <?php for($k=18;$k<=50;$k++):
                                          if($postdata['age_to'] == $k)
                                          {
                                            $selected="selected";
                                          }
                                          
                                          ?>
                                       <option value="<?php echo $k;?>" <?phg echo $selected; ?>><?php echo $k;?></option>
                                       <?php endfor; ?>
                                    </select>
                                 </div>
                              </div>
                              <div class="formrow col-md-2 col-sm-3 padding-lt-rt-5">
                                 <label class="col-md-12 col-sm-12 padding-lt-rt-5">Looking For</label>
                                 <div class="col-md-12 col-sm-12 padding-lt-rt-5">
                                    <select name="gender" id="gender" class="form-control">
                                       <option value="" selected="selected">Gender</option>
                                       <option value="male"<?php if($fields =='male') {?> selected <?php } ?>>Male</option>
                                       <option value="female"<?php if($fields =='female') {?> selected <?php } ?>>Female</option>
                                       <option value="Transsexual"<?php if($fields =='Transsexual') {?> selected <?php } ?>>Transsexual</option>
                                    </select>
                                 </div>
                              </div>                              
                              <div class="formrow col-md-2 col-sm-3 padding-lt-rt-5">
                                 <div class="col-md-12 col-sm-12 padding-lt-rt-5">
                                    <label>Breast Size</label>
                                    <select class="form-control" name="breast_size">
                                       <option value="" selected="selected"></option>
                                       <option value="AA" <?php if($postdata['breast_size'] == 'AA'){?>selected <?php } ?>>AA</option>
                                       <option value="A"<?php if($postdata['breast_size'] == 'A'){?>selected <?php } ?>>A</option>
                                       <option value="B"<?php if($postdata['breast_size'] == 'B'){?>selected <?php } ?> >B</option>
                                       <option value="C" <?php if($postdata['breast_size'] == 'C'){?>selected <?php } ?>>C</option>
                                       <option value="D" <?php if($postdata['breast_size'] == 'D'){?>selected <?php } ?>>D</option>
                                       <option value="E" <?php if($postdata['breast_size'] == 'E'){?>selected <?php } ?>>E</option>
                                       <option value="F" <?php if($postdata['breast_size'] == 'F'){?>selected <?php } ?>>F</option>
                                    </select>
                                 </div>
                              </div>
                              <div class="formrow col-md-2 col-sm-3 padding-lt-rt-5">
                                 <div class="col-md-12 col-sm-12 padding-lt-rt-5">
                                    <label>Hair Colour</label>
                                    <select class="form-control" name="hair_color">
                                       <option value="" selected="selected"></option>
                                       <option value="Blonde" <?php if($postdata['hair_color'] == 'Blonde'){?>selected <?php } ?>>Blonde</option>
                                       <option value="Brown" <?php if($postdata['hair_color'] == 'Brown'){?>selected <?php } ?>>Brown</option>
                                       <option value="Black" <?php if($postdata['hair_color'] == 'Black'){?>selected <?php } ?>>Black</option>
                                       <option value="Red" <?php if($postdata['hair_color'] == 'Red'){?>selected <?php } ?>>Red</option>
                                       <option value="Other" <?php if($postdata['hair_color'] == 'Other'){?>selected <?php } ?>>Other</option>
                                    </select>
                                 </div>
                              </div>
                          <!--  </div>     -->
                           <!-- <div class="row">     -->                   
                              <div class="formrow col-md-2 col-sm-3 padding-lt-rt-5">
                                 <label class="col-md-12 col-sm-12 padding-lt-rt-5">Sort by</label>
                                 <div class="col-md-12 col-sm-12 padding-lt-rt-5">
                                    <select class="form-control" name="sort">
                                       <option value="" selected="selected"></option>
                                       <option value="new"<?php if($fields =='new') {?> selected <?php } ?>>New</option>
                                       <option value="verified" <?php if($fields =='verified') {?> selected <?php } ?>>Verfied</option>
                                    </select>
                                 </div>
                              </div>
							   <div class="formrow col-md-2 col-sm-3 padding-lt-rt-5">
                                 <label class="col-md-12 col-sm-12 padding-lt-rt-5">Services<label>
                                 <div class="col-md-12 col-sm-12 padding-lt-rt-5">
                                    <select class="form-control" name="sort">
                                       <option value=""></option>
									   
									     <?php foreach($services as $service){ 
													
										 ?>
                                       <option value="" disabled><b><?php echo  $service->service ?></b></option>
									   <?php $subservices	=$this->subservice_model->get_service_id($service->ID);
									   
									   foreach($subservices as $subservice){
										   ?>
                                       <option value="<?php echo $subservice->ID ?>" <?php if($subservice_id == $subservice->ID) {?> selected <?php } ?>><?php echo $subservice->subservice ?></option>
										 <?php } } ?>
									
									</select>
                                 </div>
                              </div>
                              <div class="formrow col-md-3 col-sm-3 padding-lt-rt-5">
                                 <label class="col-md-12 col-sm-12 padding-lt-rt-5">City</label>
                                 <div class="col-md-12 col-sm-12 padding-lt-rt-5">
                                    <input type="text" name="country" id="txtPlaces" class="form-control" value="<?php echo $country?>">
                                 </div>
                              </div>
                           </div>
                           <div class="buttonBox">
                              <input type="submit" value="Search" />
                           </div>
                        </div>
                     </div>
                  </form>
               </div>
            </div>
            <div class="innerPageswrap">
               <div class="container">
                  <div class="row">
                     <div class="col-md-12">
                        <div class="profileWrap">
                           <h1>Search Result</h1>
                           <span class="onlinelast"><?php echo($search_row)?count($search_row):'0';?> Profiles Found</span>
                           <div class="searchResult">
                              <ul class="featuredListing">
                                 <?php
                                    $this->load->model('friend_model');
                                    
                                    if($search_row) {
                                      foreach($search_row as $searchDetail) {
										
                                    ?>
									
                                 <li class="col-md-4">
                                    <div class="profileBox">
                                       <div class="imgbox"><a href="<?php echo base_url(); ?>profile/<?php echo $searchDetail->username; ?>"><img src="<?php echo ($searchDetail->photo)?base_url().'glancePublic/uploads/member_images/'.$searchDetail->photo:base_url().'glancePublic/images/no-image.jpg';?>" alt="<?php echo $searchDetail->name?>" /></a></div>
                                       <div class="profileInfo">
                                          <h2><a href="<?php echo base_url(); ?>profile/<?php echo $searchDetail->username; ?>" title="<?php echo $searchDetail->name?>"><?php echo $searchDetail->name?></a></h2>
                                          <?php if(isset($searchDetail->phone)){?>
                                             <p><i class="fa fa-play" aria-hidden="true"></i>Phone: <?php echo $searchDetail->phone;?></p>
                                          <?php } if(isset($searchDetail->gender) && !empty($searchDetail->gender)){ ?>
                                             <p><i class="fa fa-play" aria-hidden="true"></i>Gender:  <?php echo $searchDetail->gender;?></p>
                                          <?php } if(isset($searchDetail->age) && !empty($searchDetail->age)){ ?>
                                             <p><i class="fa fa-play" aria-hidden="true"></i>Age: <?php echo $searchDetail->age;?> yrs</p>
                                          <?php } if(isset($searchDetail->height) && !empty($searchDetail->height)){ ?>
                                             <p><i class="fa fa-play" aria-hidden="true"></i>Height: <?php echo $searchDetail->height;?> cm</p>
                                          <?php } if(isset($searchDetail->weight) && !empty($searchDetail->weight)){?>
                                             <p><i class="fa fa-play" aria-hidden="true"></i>Weight: <?php echo $searchDetail->weight;?> kg</p>
                                          <?php } if(isset($searchDetail->breast_size) && !empty($searchDetail->breast_size)){?>
                                             <p><i class="fa fa-play" aria-hidden="true"></i>Breast size: <?php echo $searchDetail->breast_size;?></p>
                                          <?php } if(isset($searchDetail->one_hour_apartment) && !empty($searchDetail->one_hour_apartment)){?><p><i class="fa fa-play" aria-hidden="true"></i>1hour: <?php echo $searchDetail->one_hour_apartment;?></p>
                                          <?php } if(isset($searchDetail->two_hours_apartment) && !empty($searchDetail->two_hours_apartment)){?><p><i class="fa fa-play" aria-hidden="true"></i>2hour: <?php echo $searchDetail->two_hours_apartment;?></p>
                                          <?php } if(isset($searchDetail->city) && !empty($searchDetail->country)){ ?>
                                             <p><i class="fa fa-play" aria-hidden="true"></i>Country: <?php echo $searchDetail->city;?></p>
                                          <?php } ?>
										   
                                          <?php
										 
                                             /*$isFriend = 0;
                                             if($this->session->userdata('username')) {
                                               $isFriend = $this->friend_model->isfriends($this->session->userdata('member_id'),$searchDetail->id);
                                             }
                                             if(!$isFriend) { 
                                                           ?>
                                          <a href="<?php echo base_url(); ?>friends/send_friend_request/<?php echo my_encrypt($searchDetail->id); ?>" class="chatbtn" title="Send Friend Request">Add Friend</a> 
                                          <?php
                                             /* } */
                                             if($this->session->userdata('username')) {
                                             ?>
                                          <a href="javascript:;" onclick="setRecieverSession('<?php echo $searchDetail->username;?>')" class="chatbtn" title="Send Message"> Message</a>
                                          <?php
                                             }
                                             ?>
                                          <div class="clearfix"></div>
                                       </div>
                                    </div>
                                 </li>
                                 <?php
                                    }
                                    }
                                    ?>    
                              </ul>
                           </div>
                           <div class="clear"></div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <?php $this->load->view('common/footer'); ?>
      </div>
      <!--/Site Wraper End-->
      <?php $this->load->view('common/before_body_close'); ?>
   </body>
</html>
