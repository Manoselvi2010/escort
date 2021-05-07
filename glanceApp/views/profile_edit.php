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
      <script>
         $(function() {
           $( "#dob" ).datepicker();
         });
         
      </script>
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
   </head>
   <body>
      <?php $this->load->view('common/after_body_open'); ?>
      <!--Site Wraper Start-->
      <div class="siteWraper">
         <?php $this->load->view('common/header'); ?>
         <link href="https://cdn.jsdelivr.net/npm/select2@4.0.12/dist/css/select2.min.css" rel="stylesheet" />
         <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.12/css/select2.min.css" rel="stylesheet">
         </link>
         <script src="https://cdn.jsdelivr.net/npm/select2@4.0.12/dist/js/select2.min.js"></script>    
         <div class="innerPageswrap">
            <!--Recent Profiles Start-->
            <div class="container">
               <form name="edit_form" id="edit_form" method="post" action="<?php echo base_url().'edit_profile';?>" enctype="multipart/form-data">
                  <!--Recent Profiles Start-->
                  <div class="row">
                     <div class="col-md-4">
                        <div class="userccount">
                           <h1>Edit Profile</h1>
                           <div class="formpanel">
                              <div class="formrow">
                                 <label>Full Name</label>
                                 <input type="text" name="name" id="name" class="form-control" value="<?php echo $row->name;?>" />
                                 <?php echo form_error('name', '<div class="error"><span>', '</span></div>'); ?>
                                 <div class="clear"></div>
                              </div>
                              <div class="formrow">
                                 <label>Country</label>
                                 <input type="text" name="country" id="txtPlaces" class="form-control" value="<?php echo $row->country;?>" />
                                 <div class="clear"></div>
                              </div>
                              <div class="formrow">
                                 <label>Gender</label>
                                 <select name="gender" id="gender" class="form-control">
                                    <option value="Male" <?php echo is_selected($row->gender,'Male');?>>Male</option>
                                    <option value="Female" <?php echo is_selected($row->gender,'Female');?>>Female</option>
                                    <option value="Female" <?php echo is_selected($row->gender,'Transsexual');?>>Transsexual</option>
                                 </select>
                              </div>
                                 <div class="formrow">
                                 <label>Sexuality</label>
                                 <select name="sexuality" id="sexuality" class="form-control">
                                    <option value="Straight" <?php echo is_selected($row->sexuality,'Straight');?>>Straight</option>
                                    <option value="Bisexual" <?php echo is_selected($row->sexuality,'Bisexual');?>>Bisexual</option>
                                    <option value="Lesbian" <?php echo is_selected($row->sexuality,'Lesbian');?>>Lesbian</option>
                                    <option value="Gay" <?php echo is_selected($row->sexuality,'Gay');?>>Gay</option>
                                 </select>
                              </div>
                              <div class="formrow">
                                 <label>phone</label>
                                 <input type="text" name="phone_number" id="phone_number" class="form-control" value="<?php echo $row->phone_number;?>" />
                                 <?php echo form_error('phone', '<div class="error"><span>', '</span></div>'); ?>
                                 <div class="clear"></div>
                              </div>
                              <div class="formrow">
                                 <label>Addtional info to the phone number</label>
                                 <input type="text" name="additional_number" id="additional_number" class="form-control" value="<?php echo $row->additional_number;?>" />
                                 <?php echo form_error('phone', '<div class="error"><span>', '</span></div>'); ?>
                                 <div class="clear"></div>
                              </div>
                              <div class="formrow">
                                 <label>Phone apps</label>
                                 <select name="phone_app" id="phone_app" class="form-control">
                                    <option value="" <?php echo is_selected($row->phone_app,'');?>>select</option>
                                    <option value="Whatsapp" <?php echo is_selected($row->phone_app,'Whatsapp');?>>Whatsapp</option>
                                    <option value="Viber" <?php echo is_selected($row->phone_app,'Viber');?>>Viber</option>
                                    <option value="Telegram Messenger" <?php echo is_selected($row->phone_app,'Telegram Messenger');?>>Telegram Messenger</option>
                                    <option value="Facebook Messenger" <?php echo is_selected($row->phone_app,'Facebook Messenger');?>>Facebook Messenger</option>
                                 </select>
                                 <div class="clear"></div>
                              </div>
                              <div class="formrow">
                                 <label>Age</label>
                                 <input type="text" name="age" id="age" class="form-control" value="<?php echo $row->age;?>" />
                                 <?php echo form_error('age', '<div class="error"><span>', '</span></div>'); ?>
                                 <div class="clear"></div>
                              </div>
                              <div class="formrow">
                                 <label>Height (cm)</label>
                                 <input type="text" name="height" id="height" class="form-control" value="<?php echo $row->height;?>" />
                                 <?php echo form_error('height', '<div class="error"><span>', '</span></div>'); ?>
                                 <div class="clear"></div>
                              </div>
                              <div class="formrow">
                                 <label>Weight (kg)</label>
                                 <input type="text" name="weight" id="height" class="form-control" value="<?php echo $row->weight;?>" />
                                 <?php echo form_error('weight', '<div class="error"><span>', '</span></div>'); ?>
                                 <div class="clear"></div>
                              </div>
                              <div class="formrow">
                                 <label>Clothes size</label>
                                 <input type="text" name="clothes_size" id="clothes_size" class="form-control" value="<?php echo $row->clothes_size;?>" />
                                 <?php echo form_error('clothes_size', '<div class="error"><span>', '</span></div>'); ?>
                                 <div class="clear"></div>
                              </div>
                              <div class="formrow">
                                 <label>Appearance</label>
                                 <select name="apperance" id="apperance" class="form-control">
                                    <option value="" <?php echo is_selected($row->appearance,'');?>>Select</option>
                                    <option value="Arab" <?php echo is_selected($row->appearance,'Arab');?>>Arab</option>
                                    <option value="Asian" <?php echo is_selected($row->appearance,'Asian');?>>Asian</option>
                                    <option value="Caucasian" <?php echo is_selected($row->appearance,'Caucasian');?>>Caucasian</option>
                                    <option value="Ebony" <?php echo is_selected($row->appearance,'Ebony');?>>Ebony</option>
                                    <option value="Latina" <?php echo is_selected($row->appearance,'Latina');?>>Latina</option>
                                 </select>
                                 <div class="clear"></div>
                              </div>
                              <div class="formrow">
                                 <label>Chest, waist, hips</label>
                                 <input type="text" name="chest_waist_hips" id="chest_waist_hips" class="form-control" value="<?php echo $row->chest_waist_hips;?>" />
                                 <?php echo form_error('weight', '<div class="error"><span>', '</span></div>'); ?>
                                 <div class="clear"></div>
                                 <div class="clear"></div>
                              </div>
                              <div class="formrow">
                                 <label>Breast size</label>
                                 <select name="breast_size" id="breast_size" class="form-control">
                                    <option value="" <?php echo is_selected($row->breast_size,'');?>>select</option>
                                    <option value="AA" <?php echo is_selected($row->breast_size,'AA');?>>AA</option>
                                    <option value="A" <?php echo is_selected($row->breast_size,'A');?>>A</option>
                                    <option value="B" <?php echo is_selected($row->breast_size,'B');?>>B</option>
                                    <option value="C" <?php echo is_selected($row->breast_size,'C');?>>C</option>
                                    <option value="D" <?php echo is_selected($row->breast_size,'D');?>>D</option>
                                    <option value="E" <?php echo is_selected($row->breast_size,'E');?>>E</option>
                                    <option value="F" <?php echo is_selected($row->breast_size,'F');?>>F</option>
                                 </select>
                                 <div class="clear"></div>
                              </div>
                              <div class="formrow">
                                 <label>Breast type</label>
                                 <select name="breast_type" id="breast_type" class="form-control">
                                    <option value="" <?php echo is_selected($row->breast_type,'');?>>select</option>
                                    <option value="Natural" <?php echo is_selected($row->breast_type,'Natural');?>>Natural</option>
                                    <option value="Silicone" <?php echo is_selected($row->breast_type,'Silicone');?>>Silicone</option>
                                 </select>
                                 <div class="clear"></div>
                              </div>
                              <div class="formrow">
                                 <label>Hair color</label>
                                 <select name="hair_color" id="hair_color" class="form-control">
                                    <option value="" <?php echo is_selected($row->hair_color,'');?>>Select</option>
                                    <option value="Blonde" <?php echo is_selected($row->hair_color,'Blonde');?>>Blonde</option>
                                    <option value="Brown" <?php echo is_selected($row->hair_color,'Brown');?>>Brown</option>
                                    <option value="Black" <?php echo is_selected($row->hair_color,'Black');?>>Black</option>
                                    <option value="Red" <?php echo is_selected($row->hair_color,'Red');?>>Red</option>
                                    <option value="Other" <?php echo is_selected($row->hair_color,'Other');?>>Other</option>
                                 </select>
                                 <div class="clear"></div>
                              </div>
                              <div class="formrow">
                                 <label>Eyes color</label>
                                 <select name="eyes_color" id="eyes_color" class="form-control">
                                    <option value="" <?php echo is_selected($row->eyes_color,'');?>>select</option>
                                    <option value="Blue" <?php echo is_selected($row->eyes_color,'Blue');?>>Blue</option>
                                    <option value="Gray" <?php echo is_selected($row->eyes_color,'Gray');?>>Gray</option>
                                    <option value="Brown" <?php echo is_selected($row->eyes_color,'Brown');?>>Brown</option>
                                    <option value="Green" <?php echo is_selected($row->eyes_color,'Green');?>>Green</option>
                                 </select>
                                 <div class="clear"></div>
                              </div>
                              <div class="formrow">
                                 <label>Intimate haircut</label>
                                 <select name="haircut" id="haircut" class="form-control">
                                    <option value="" <?php echo is_selected($row->haircut,'');?>>select</option>
                                    <option value="Shaved" <?php echo is_selected($row->haircut,'Shaved');?>>Shaved</option>
                                    <option value="Not shaved" <?php echo is_selected($row->haircut,'Not shaved');?>>Not shaved</option>
                                    <option value="Partially" <?php echo is_selected($row->haircut,'Partially');?>>Partially</option>
                                 </select>
                                 <div class="clear"></div>
                              </div>
                              <div class="formrow">
                                 <label>Are you a smoker</label>
                                 <select name="smoker" id="smoker" class="form-control">
                                    <option value="" <?php echo is_selected($row->smoker,'');?>>Select</option>
                                    <option value="Yes" <?php echo is_selected($row->smoker,'Yes');?>>Yes</option>
                                    <option value="No" <?php echo is_selected($row->smoker,'No');?>>No</option>
                                    <option value="For the company" <?php echo is_selected($row->smoker,'For the company');?>>For the company</option>
                                 </select>
                                 <div class="clear"></div>
                              </div>
                              <div class="formrow">
                                 <label>Web-site</label>
                                 <input type="text" name="web_site" id="web_site" class="form-control" value="<?php echo $row->web_site;?>" />
                                 <?php echo form_error('web_site', '<div class="error"><span>', '</span></div>'); ?>
                                 <div class="clear"></div>
                                 <div class="clear"></div>
                              </div>
                              <div class="formrow">
                                 <label>About me *</label>
                                 <textarea name="about_me" id="about_me" class="form-control">
                                  <?php echo $row->about_me  ?></textarea>
                                 <?php echo form_error('about_me', '<div class="error"><span>', '</span></div>'); ?>
                                 <div class="clear"></div>
                                 <div class="clear"></div>
                              </div>
                              <div class="formrow">
                                 <select id="member_language" name="member_language[]" class="mdb-select md-form" multiple>
                                    <option value="" disabled selected>Choose your Language</option>
                                    <option value="Arabic">Arabic</option>
                                    <option value="Czech">Czech</option>
                                    <option value="Danish">Danish</option>
                                    <option value="English">English</option>
                                    <option value="Farsi">Farsi</option>
                                    <option value="French">French</option>
                                    <option value="German">German</option>
                                    <option value="Greek">Greek</option>
                                    <option value="Italian">Italian</option>
                                    <option value="Persian">Persian</option>
                                    <option value="Polish">Polish</option>
                                    <option value="Russian">Russian</option>
                                    <option value="Spanish">Spanish</option>
                                    <option value="Thai">Thai</option>
                                 </select>
                                 <script>
                                    // Material Select Initialization
                                    $(document).ready(function() {
                                    $("#country_select").select2({
                                    maximumSelectionLength: 5
                                    });
                                    });
                                    
                                    
                                          
                                 </script> 
                                 <?php echo form_error('country_select', '<div class="error"><span>', '</span></div>'); ?>
                                 <div class="clear"></div>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="col-md-5">
                        <div class="userccount">
                           <div class="formpanel">
                              <div class="col-sm-6">
                                 <div class="formrow">
                                    <label>1 hour in apartment</label>
                                    <input type="text" name="one_hour_apartment" id="one_hour_apartment" class="form-control" value="<?php echo $row->one_hour_apartment;?>" />
                                    <?php echo form_error('one_hour_aparment', '<div class="error"><span>', '</span></div>'); ?>
                                    <div class="clear"></div>
                                    <div class="clear"></div>
                                 </div>
                                 <div class="formrow">
                                    <label>2 hours in apartment</label>
                                    <input type="text" name="two_hour_apartment" id="two_hour_apartment" class="form-control" value="<?php echo $row->two_hours_apartment;?>" />
                                    <?php echo form_error('two_hour_aparment', '<div class="error"><span>', '</span></div>'); ?>
                                    <div class="clear"></div>
                                    <div class="clear"></div>
                                 </div>
                                 <div class="formrow">
                                    <label>Night in apartment</label>
                                    <input type="text" name="night_hour_apartment" id="night_hour_apartment" class="form-control" value="<?php echo $row->night_apartment;?>" />
                                    <?php echo form_error('night_hour_aparment', '<div class="error"><span>', '</span></div>'); ?>
                                    <div class="clear"></div>
                                    <div class="clear"></div>
                                 </div>
                                 <div class="formrow">
                                    <?php 
                                       $appartment_checked="";
                                       if($row->in_appartment !=0)
                                       {
                                        $appartment_checked="checked";
                                       }
                                        ?>
                                    <input type="checkbox" name="apartment" id="apartment" value="1"  <?php echo $appartment_checked ?>><span class="padding-lt-5">Apartment</span>
                                 </div>
                              </div>
                              <div class="col-sm-6">
                                 <div class="formrow">
                                    <label>1hour outcall</label>
                                    <input type="text" name="one_hour_outcall" id="one_hour_outcall" class="form-control" value="<?php echo $row->one_hour_outcall;?>" />
                                    <?php echo form_error('weight', '<div class="error"><span>', '</span></div>'); ?>
                                    <div class="clear"></div>
                                    <div class="clear"></div>
                                 </div>
                                 <div class="formrow">
                                    <label>2 hours outcall</label>
                                    <input type="text" name="two_hour_outcall" id="two_hour_outcall" class="form-control" value="<?php echo $row->two_hours_outcall;?>" />
                                    <?php echo form_error('weight', '<div class="error"><span>', '</span></div>'); ?>
                                    <div class="clear"></div>
                                    <div class="clear"></div>
                                 </div>
                                 <div class="formrow">
                                    <label>Night outcall</label>
                                    <input type="text" name="night_hour_outcall" id="night_hour_outcall" class="form-control" value="<?php echo $row->night_outcall;?>" />
                                    <?php echo form_error('weight', '<div class="error"><span>', '</span></div>'); ?>
                                    <div class="clear"></div>
                                    <div class="clear"></div>
                                 </div>
                                 <div class="formrow">
                                    <?php 
                                       $outcall_checked="";
                                       if($row->in_outcall !=0)
                                       {
                                        $outcall_checked="checked";
                                       }
                                        ?>
                                    <input type="checkbox" name="outcall" id="outcall" class="padding-lt-5" value="1" <?php echo $outcall_checked ?>><span class="padding-lt-5">Outcall</span>
                                 </div>
                              </div>
                              <div class="formrow">
                                 <label>Profile photo</label>
                                 <input type="file" name="photo" id="photo" class="form-control">
                              </div>
                              
                              <div class="formrow">
                                 <label>Verification photo</label>
                                 <input type="file" name="photo_vertification" id="photo_vertification" class="form-control">
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="col-md-3">
                        <div class="userccount">
                           <div class="">
                              <div class="formrow">
                                 <?php
                                    foreach($services as $service){
                                      $service_id  = $service->ID;
                                    
                                    ?>

                                 <label class="edit-profile-checkbox"><?php echo $service->service ?></label><br>
                                 <?php  
                                    $subservices = $this->subservice_model->get_service_id($service_id);
                                                
                                    foreach($subservices as $subservice){
                                      $member_id            = $this->session->userdata('member_id');
                                      $service_id           = $subservice->service_id;
                                      $subservice_id        = $subservice->ID;
                                      $subservice_selected  = $this->member_model->is_service_already_exists($member_id,$service_id,$subservice_id);
                                    
                                      if($subservice_selected >1)
                                      {
                                        $selected ="checked";
                                      }else{
                                    
                                        $selected ="";
                                      }
                                    
                                    ?>
                                 <input type="checkbox" name="subservices[]" id="<?php echo $subservice->subservice ?>" value="<?php echo $subservice->service_id ?>-<?php echo $subservice->ID ?>" <?php echo $selected; ?> class=""><span class="padding-lt-5"><?php echo $subservice->subservice ?></span>
                                 </br> 
                                 <?php } } ?> 
                                 </br>       
                                 <div class="clear"></div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="buttonBox">
                     <input type="submit" name="" value="Save Information" />
                  </div>
               </form>
            </div>
         </div>
         <!--Recent Profiles Endt-->
         <?php $this->load->view('common/footer'); ?>
      </div>
      <!--/Site Wraper End-->
      <?php $this->load->view('common/before_body_close'); ?>
   </body>
</html>