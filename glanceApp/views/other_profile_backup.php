<!--  <body>
      <?php $this->load->view('common/after_body_open'); ?>
      <div class="siteWraper">
         <?php $this->load->view('common/header'); ?>
         <div class="innerPageswrap">
            <div class="container">
               <div class="row">
                  <div class="col-md-9">
                     <div class="profilebgcol">
                        <div class="profileWrap">
                           <h1><?php echo ($row->name=='')?$this->session->userdata('username'):$row->name;?></h1>
                           <?php 
                              if($this->session->userdata('is_user_login')) {
                                            
                                $data2['username'] = $row->username;
                                $data2['msg_show'] = $msg_setting;
                                $data2['gallery_show'] = $gallery_setting;
                                $this->load->view('common/actions.php',$data2);
                              }
                              ?>
                           <div class="row">
                              <div class="col-md-6">
                                 <h2>Personal info</h2>
                                 <ul class="infoList">
                                    <li>
                                       <div class="label">Full Name:</div>
                                       <div class="inftxt"><?php echo $row->name;?></div>
                                       <div class="clear"></div>
                                    </li>
                                    <li>
                                       <div class="label">Relationship status:</div>
                                       <div class="inftxt"><?php echo $row->relationship_status;?></div>
                                       <div class="clear"></div>
                                    </li>
                                    <?php if($email_setting):?>
                                    <li>
                                       <div class="label">Email:</div>
                                       <div class="inftxt"><?php echo $row->email;?></div>
                                       <div class="clear"></div>
                                    </li>
                                    <?php endif;?>
                                    <?php if($phone_setting):?>
                                    <li>
                                       <div class="label">Phone:</div>
                                       <div class="inftxt"><?php echo $row->phone;?></div>
                                       <div class="clear"></div>
                                    </li>
                                    <?php endif;?>
                                    <li>
                                       <div class="label">Gender:</div>
                                       <div class="inftxt"><?php echo $row->gender;?></div>
                                       <div class="clear"></div>
                                    </li>
                                    <li>
                                       <div class="label">Marital Status:</div>
                                       <div class="inftxt"><?php echo $row->marital_status;?></div>
                                       <div class="clear"></div>
                                    </li>
                                    <?php if($dob_setting):?>
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
                                       <div class="label">Smoking:</div>
                                       <div class="inftxt"><?php echo $row->smoking;?></div>
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
                                    </li>
                                    <?php if($location_setting):?>
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
                                 </ul>
                              </div>
                              <div class="col-md-6">
                                 <h2>Looking For</h2>
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
                                 </ul>
                              </div>
                           </div>
                           <div class="row">
                              <div class="col-md-5">
                                 <div class="pofilePic">
                                    <div class="picBox"><img src="<?php echo ($row->photo)?base_url().'glancePublic/uploads/member_images/'.$row->photo:base_url().'glancePublic/images/no-image.jpg';?>" /></div>
                                    <div class="ratebox">
                                       <div class="rateint">
                                          <div class="ratelabel">Total Views :</div>
                                          <div class="ratevalue"><?php echo $profile_views;?></div>
                                          <div class="clear"></div>
                                       </div>
                                    </div>
                                    <div class="aboutme">
                                       <h2>About Me</h2>
                                       <p><?php echo $row->about_me;?></p>
                                    </div>
                                 </div>
                              </div>
                              <div class="col-md-7">
                                 <div class="pofileDetail">
                                    <div class="commentsWrap">
                                       <div class="clear"></div>
                                       <div class="totalComment"><a href="#">View comments</a></div>
                                       <ul class="commentsList" id="comment_all">
                                          <?php
                                             if($comment_row) {
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
                                          if($comment_setting):
                                          if($this->session->userdata('username')) {
                                          ?>
                                       <div class="postbox">
                                          <textarea id="comments" class="form-control"></textarea>
                                          <input type="button" value="Post" onclick="postComments()" />
                                          <input type="hidden" name="to_user" id="to_user" value="<?php echo $row->username;?>">
                                       </div>
                                       <?php  
                                          }
                                          endif;   
                                          ?>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="col-md-3">
                     <?php $this->load->view('common/profile_right_side');?>
                  </div>
               </div>
            </div>
         </div>
         <?php $this->load->view('common/footer'); ?>
      </div>
      <?php $this->load->view('common/before_body_close'); ?>
  </body> -->