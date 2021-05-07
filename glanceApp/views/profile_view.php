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
         <div class="innerPageswrap">
            <!--Recent Profiles Start-->
            <div class="container">
               <!--Recent Profiles Start-->
               <div class="row">
                  <div class="col-md-3">                    
                     <?php 
                      
                        if($row->photo)
                           $image = base_url().'glancePublic/uploads/member_images/'.$row->photo;
                        else
                           $image = base_url().'glancePublic/images/no-image.jpg';
                     ?>
                    <img class="profileview-img" src="<?php echo $image;?>" /> 
                  </div>
                   <div class="col-md-9">
                     <div class="profilebgcol">
                        <div class="profileWrap">
                           <h1><?php echo ($row->name=='')?$this->session->userdata('username'):$row->name;?></h1>
                           <!-- $this->load->view('common/actions.php'); -->
                           <div class="aboutme">
                             
                              <p><?php echo $row->about_me;?></p>
                           </div>
                           <div class="clear"></div>
                           <!--Personal Detail-->
                           <div class="row margin-t-20">
                              <div class="col-md-6">
                                 <h1 style="font-size: 20px;">Main information</h1>
                                 <?php if(isset($val->phone) && !empty($val->phone)){?>
                                    <div class="row">
                                       <div class="col-md-12" style="margin-top: 15px">
                                          <button class="btn pink-color-btn"><i class="fa fa-phone" aria-hidden="true" style="padding-right: 10px"></i><strong><?php echo $val->phone;?></strong></button>
                                       </div>
                                    </div>
                                 <?php } ?>
                                 <ul class="infoList">
                                    <li>
                                       <div class="label">Age:</div>
                                       <?php if(isset($row->dob) && !empty($row->dob)){?>
                                          <div class="inftxt"><?php echo count_years($row->dob,date("Y-m-d"));?> yrs</div>
                                       <?php } ?>
                                       <div class="clear"></div>
                                    </li>
                                    <li>
                                       <div class="label">Breast Type:</div>
                                       <div class="inftxt"><?php echo $row->breast_type;?></div>
                                       <div class="clear"></div>
                                    </li>
                                    <li>
                                       <div class="label">Weight (kg):</div>
                                       <div class="inftxt"><?php echo $row->weight;?></div>
                                       <div class="clear"></div>
                                    </li>
                                    <li>
                                       <div class="label">Height (cm):</div>
                                       <div class="inftxt"><?php echo $row->height;?></div>
                                       <div class="clear"></div>
                                    </li>
                                    <!-- <li>
                                          <div class="label">Relationship status:</div>
                                          <div class="inftxt"><?php echo $row->relationship_status;?></div>
                                          <div class="clear"></div>
                                       </li>
                                       <?php if(@$email_setting):?>
                                       <li>
                                          <div class="label">Email:</div>
                                          <div class="inftxt"><?php echo $row->email;?></div>
                                          <div class="clear"></div>
                                       </li>
                                    <?php endif;?> 
                                    <?php if(@$phone_setting):?>
                                    <li>
                                       <div class="label">Phone:</div>
                                       <div class="inftxt"><?php echo $row->phone;?></div>
                                       <div class="clear"></div>
                                    </li> 
                                    <?php endif;?> -->
                                    <li>
                                       <div class="label">Hair color:</div>
                                       <div class="inftxt"><?php echo $row->hair_color;?></div>
                                       <div class="clear"></div>
                                    </li>
                                    <li>
                                       <div class="label">Sexuality:</div>
                                       <div class="inftxt"><?php echo $row->sexuality;?></div>
                                       <div class="clear"></div>
                                    </li>
                                    <li>
                                       <div class="label">Gender:</div>
                                       <div class="inftxt"><?php echo $row->gender;?></div>
                                       <div class="clear"></div>
                                    </li>
                                    <li>
                                       <div class="label">Appearance:</div>
                                       <div class="inftxt"><?php echo $row->appearance;?></div>
                                       <div class="clear"></div>
                                    </li>
                                    <!-- <li>
                                       <div class="label">Marital Status:</div>
                                       <div class="inftxt"><?php echo $row->marital_status;?></div>
                                       <div class="clear"></div>
                                    </li> 
                                    <?php if(@$dob_setting):?>
                                    <li>
                                       <div class="label">Date Of Birth:</div>
                                       <div class="inftxt"><?php echo date("F d, Y",strtotime($row->dob));?></div>
                                       <div class="clear"></div>
                                    </li>
                                    <?php endif;?> 
                                    <li>
                                       <div class="label">Life Style:</div>
                                       <div class="inftxt"><?php echo $row->life_style;?></div>
                                       <div class="clear"></div>
                                    </li>
                                   
                                    <li>
                                       <div class="label">Drinking:</div>
                                       <div class="inftxt"><?php echo $row->drinking;?></div>
                                       <div class="clear"></div>
                                    </li>
                                    <li>
                                       <div class="label">Education:</div>
                                       <div class="inftxt"><?php echo $row->education;?></div>
                                       <div class="clear"></div>
                                    </li> -->
                                    <?php if(@$location_setting):?>
                                    <li>
                                       <div class="label">Country:</div>
                                       <div class="inftxt"><?php echo $row->country;?></div>
                                       <div class="clear"></div>
                                    </li>
                                    <li>
                                       <div class="label">City:</div>
                                       <div class="inftxt"><?php echo $row->city;?></div>
                                       <div class="clear"></div>
                                    </li>
                                    <?php endif;?>
                                    <li>
                                       <div class="label">Language:</div>
                                       <div class="inftxt"><?php echo $row->member_language;?></div>
                                       <div class="clear"></div>
                                    </li> 
                                     <li>
                                       <div class="label">Are you smoker:</div>
                                       <div class="inftxt"><?php echo $row->smoker;?></div>
                                       <div class="clear"></div>
                                    </li>
                                 </ul>
                              </div>
                              <div class="col-md-6">
                                 <!-- <h2>Looking For</h2>
                                 <ul class="infoList">
                                    <li>
                                       <div class="label">Looking For:</div>
                                       <div class="inftxt"><?php echo $row->looking_for;?></div>
                                       <div class="clear"></div>
                                    </li>
                                    <li>
                                       <div class="label">Age Between</div>
                                       <div class="inftxt"><?php echo $row->looking_age_from;?> to <?php echo $row->looking_age_to;?></div>
                                       <div class="clear"></div>
                                    </li>
                                    <li>
                                       <div class="label">Marital Status:</div>
                                       <div class="inftxt"><?php echo $row->looking_marital_status;?></div>
                                       <div class="clear"></div>
                                    </li>
                                    <li>
                                       <div class="label">Country:</div>
                                       <div class="inftxt"><?php echo $row->looking_country;?></div>
                                       <div class="clear"></div>
                                    </li>
                                    <li>
                                       <div class="label">City:</div>
                                       <div class="inftxt"><?php echo $row->looking_city;?></div>
                                       <div class="clear"></div>
                                    </li>
                                 </ul> -->
                                 <table class="table  table-hover">
                                    <thead>
                                       <tr>
                                          <td></td>
                                          <td class="font-blue">Apartment</td>
                                          <td class="font-blue">Outcall</td>
                                          <td></td>
                                       </tr>
                                    </thead>
                                    <tbody>
                                       <tr>
                                          <td>1 hour</td>
                                          <td><?php echo $row->looking_city;?></td>
                                          <td><?php echo $row->looking_city;?></td>
                                          <td>USD</td>
                                       </tr>
                                       <tr>
                                          <td>2 hour</td>
                                          <td><?php echo $row->one_hour_apartment;?></td>
                                          <td><?php echo $row->two_hours_apartment;?></td>
                                          <td>USD</td>
                                       </tr>
                                       <tr>
                                          <td>Night price</td>
                                          <td><?php echo $row->one_hour_outcall;?></td>
                                          <td><?php echo $row->two_hours_outcall;?></td>
                                          <td>USD</td>
                                       </tr>
                                    </tbody>
                                 </table>
                              </div>
                           </div>
                           <h1 style="font-size: 20px">Service</h1>
                           <div class="col-md-12">
                              <?php
                                 foreach($member_services as $member_service)
                                 {
                                    foreach($services as $service)
                                    {
                                       if($member_service->member_service_id==$service->ID)
                                       {
                                          $service_id  = $service->ID;
                              ?>
                                 <div class="col-md-3">
                                    <label class="edit-profile-checkbox"><?php echo $service->service ?></label><br>
                                    <?php  
                                       $subservices = $this->member_model->get_profile_sub_service($service_id);
                                       foreach($subservices as $subservice){
                                         $member_id            = $this->session->userdata('member_id');
                                         $service_id           = $subservice->service_id;
                                         $subservice_id        = $subservice->ID;
                                         $subservice_selected  = $this->member_model->is_service_already_exists($member_id,$service_id,$subservice_id);
                                          if($member_service->member_subservice_id==$subservice->ID){
                                             echo $subservice->subservice 
                                    ?>
                                    </br> 
                                    <?php }else{ ?>
                                       <span class="profile-line"><?php echo $subservice->subservice ?></span>
                                       </br> 
                                    <?php } } ?>
                                 </div>
                              <?php } } }?> 
                              </br>       
                              <div class="clear"></div>
                              <style type="text/css">
                                 .profile-line{
                                    text-decoration: line-through;
                                 }
                              </style>
                           </div>
                           <div class="row">
                              <div class="col-md-12 margin-t-20">
                                 <h1 style="font-size: 20px">Similar profile</h1>
                                 <ul class="featuredListing row" >
                                    <?php foreach($member_cities as $member_city) { ?>
                                       <li class="col-md-6 col-sm-6" style="margin-top: 20px">
                                          <div class="profileBox">
                                             <div class="imgbox"> 
                                                <?php 
                                                   if($member_city->photo){
                                                   ?>
                                                      <img src="<?php echo base_url(); ?>glancePublic/uploads/member_images/<?php echo $member_city->photo; ?>" /> 
                                                      <?php 
                                                      }
                                                   else{
                                                    ?>
                                                      <img class="img-contain" src="<?php echo base_url(); ?>glancePublic/images/no-image.jpg" /> 
                                                   <?php 
                                                } ?>
                                             </div>      
                                             <div class="profileInfo">
                                                 <h1><a href="<?php echo base_url(); ?>profile/<?php echo $member_city->username; ?>"><?php echo $member_city->name;?></a></h1>
                                                 <?php if(isset($member_city->phone)){?>
                                                     <p><i class="fa fa-play" aria-hidden="true"></i>Phone:</p>
                                                 <?php } if(isset($member_city->gender) && !empty($member_city->gender)){?>
                                                     <p><i class="fa fa-play" aria-hidden="true"></i>Gender: <?php echo $member_city->gender;?></p>
                                                 <?php }  if(isset($member_city->dob) && !empty($member_city->dob)){?>
                                                     <p><i class="fa fa-play" aria-hidden="true"></i>Age: <?php echo count_years($member_city->dob,date("Y-m-d"));?> yrs</p>
                                                 <?php }  if(isset($member_city->height) && !empty($member_city->height)){?>
                                                     <p><i class="fa fa-play" aria-hidden="true"></i>Height: <?php echo $member_city->height;?> cm</p>
                                                 <?php } if(isset($member_city->weight) && !empty($member_city->weight)){?>
                                                     <p><i class="fa fa-play" aria-hidden="true"></i>Weight: <?php echo $member_city->weight;?> kg</p>
                                                <?php } if(isset($member_city->one_hour_apartment) && !empty($member_city->one_hour_apartment)){?><p><i class="fa fa-play" aria-hidden="true"></i>1hour: <?php echo $member_city->one_hour_apartment;?></p>
                                                <?php } if(isset($member_city->two_hours_apartment) && !empty($member_city->two_hours_apartment)){?><p><i class="fa fa-play" aria-hidden="true"></i>2hour: <?php echo $member_city->two_hours_apartment;?></p>
                                                  <?php } if(isset($member_city->breast_size) && !empty($member_city->breast_size)){?>
                                                     <p><i class="fa fa-play" aria-hidden="true"></i>Breast size: <?php echo $member_city->breast_size;?></p>
                                                 <?php } if(isset($member_city->country) && !empty($member_city->country)){?>
                                                     <p><i class="fa fa-play" aria-hidden="true"></i>Country: <?php echo $member_city->country;?></p>
                                                 <?php } ?>
                                                 <!-- <p><i class="fa fa-map-marker" aria-hidden="true"></i> <?php echo $member_city->one_hour_apartment;?></p> -->
                                             </div>
                                             <div class="row " align="right">
                                                <div class="col-md-12">
                                                   <a href="<?php echo base_url(); ?>profile/<?php echo $member_city->username; ?>" class="btn pink-color-btn">Detail</a>

                                                </div>
                                             </div>
                                             <div class="clear"></div>
                                         </div>

                                       </li>
                                    <?php } ?>
                                 </ul>
                              </div>
                           </div>
                           <div class="row">
                              <div class="col-md-12">
                                 <div class="pofileDetail">
                                    <div class="commentsWrap">
                                       <div class="clear"></div>
                                       <h1 style="font-size: 20px">View Comments</h1>
                                       <ul class="commentsList" id="comment_all">
                                          <?php
                                             if(@$comment_row) {
                                              foreach($comment_row as $commentDetail) {
                                                if($commentDetail->photo)
                                                      $image_thumb = base_url().'glancePublic/uploads/member_images/thumb_'.$commentDetail->photo;
                                                    else
                                                      $image_thumb = base_url().'glancePublic/images/no-image.jpg';
                                             ?>
                                          <li id="row_<?php echo $commentDetail->comment_id;?>">
                                             <div class="maincomnt">
                                                <div class="userpic"><img src="<?php echo $image_thumb;?>" alt="<?php echo $commentDetail->name; ?>" /></div>
                                                <div class="usercomnt">
                                                   <a href="<?php echo base_url(); ?>profile/<?php echo $commentDetail->username; ?>" class="userlink" title="<?php echo $commentDetail->name; ?>"><?php echo $commentDetail->name; ?></a>
                                                   <p><?php echo $commentDetail->comments;?></p>
                                                   <div class="timerep">
                                                      <span>[ <?php echo dateDiff(date("Y-m-d H:i:s"),$commentDetail->date_comment).' ago';?> ]</span> 
                                                      <?php
                                                        
                                                          if($commentDetail->username==$this->session->userdata('username')){
                                                         ?>
                                                      <span style="float:right"><a href="javascript:delete_comment(<?php echo $commentDetail->comment_id;?>)" class="text text-danger">Delete</a></span>
                                                      <?php } ?>
                                                   </div>
                                                </div>
                                                <div class="clear"></div>
                                             </div>
                                          </li>
                                          <?php 
                                             }
                                             }
                                             ?>
                                       </ul>
                                       
                                       <?php
                                          if($this->session->userdata('username')) {
                                          ?>
                                       <div class="postbox">
                                          <textarea id="comments" class="form-control"></textarea>
                                          <input type="button" value="Post" onclick="postComments()" />
                                          <input type="hidden" name="to_user" id="to_user" value="<?php echo $row->username;?>">
                                       </div>
                                       <?php  } ?>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <!--Recent Profiles Endt-->
         <?php $this->load->view('common/footer'); ?>
      </div>
      <!--/Site Wraper End-->
      <?php $this->load->view('common/before_body_close'); ?>
   </body>
</html>
