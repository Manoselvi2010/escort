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
        <div class="col-md-9 col-sm-8">
          <div class="profileWrap">
        <h1>Favourites</h1>
        <div class="requestrecieve">
          <ul class="featuredListing row">
            <?php
        if($record_set):
          foreach($record_set as $row ):
            if($row->photo)
                $image_thumb = base_url().'glancePublic/uploads/member_images/thumb_'.$row->photo;
              else
                $image_thumb = base_url().'glancePublic/images/no-image.jpg';
        ?>
            <li class="col-md-6">
              <div class="profileBox">
              <div class="imgbox"><img src="<?php echo $image_thumb;?>" alt="" /></div>
              <div class="profileInfo">
                <h2><a href="<?php echo base_url(); ?>profile/<?php echo $row->username; ?>" title="<?php echo $row->name;?>"><?php echo $row->name;?></a></h2>
                 <?php if(isset($row->phone) && !empty($row->phone)){?>
                    <p><i class="fa fa-play" aria-hidden="true"></i>Phone: <?php echo $row->phone;?></p>
                <?php } if(isset($row->gender) && !empty($row->gender)){?>
                     <p><i class="fa fa-play" aria-hidden="true"></i>Gender: <?php echo $row->gender;?></p>
                <?php }  if(isset($row->dob) && !empty($row->dob)){?>
                     <p><i class="fa fa-play" aria-hidden="true"></i>Age: <?php echo count_years($row->dob,date("Y-m-d"));?></p>
                <?php }  if(isset($row->height) && !empty($row->height)){?>
                    <p><i class="fa fa-play" aria-hidden="true"></i>Height: <?php echo $row->height;?> cm</p>
                <?php } if(isset($row->weight) && !empty($row->weight)){?>
                    <p><i class="fa fa-play" aria-hidden="true"></i>Weight: <?php echo $row->weight;?> kg</p>
                 <?php } if(isset($row->breast_size) && !empty($row->breast_size)){?>
                    <p><i class="fa fa-play" aria-hidden="true"></i>Breast size: <?php echo $row->breast_size;?></p>
                <?php } if(isset($row->one_hour_apartment) && !empty($row->one_hour_apartment)){?><p><i class="fa fa-play" aria-hidden="true"></i>1hour: <?php echo $row->one_hour_apartment;?></p>
                <?php } if(isset($row->two_hours_apartment) && !empty($row->two_hours_apartment)){?><p><i class="fa fa-play" aria-hidden="true"></i>2hour: <?php echo $row->two_hours_apartment;?></p>
                <?php } if(isset($row->country) && !empty($row->country)){?>
                       <p><i class="fa fa-play" aria-hidden="true"></i>Country: <?php echo $row->city;?>, <?php echo $row->country;?></p>     
                <?php } ?>
                        
                <div class="reqbtns"> <a href="<?php echo base_url(); ?>friends/unfavourite/<?php echo my_encrypt($row->id); ?>" class="chatbtn" title="Accept this Request">Un-Favourite</a></div>  
              </div>
              <div class="clearfix"></div>
              </div>
            </li>
            <?php endforeach; else:?> 
        <div class="err">No Record found</div>
      <?php endif;?>
          </ul>
        </div>
        <div class="clearfix"></div>
      </div>
      </div>
    
    <div class="col-md-3 col-sm-4">
    <!--Right Col Start-->
    <?php $this->load->view('common/profile_right_side');?>
    </div>
  </div>
  <!--Recent Profiles Endt-->
  </div>
  </div>
  
  <?php $this->load->view('common/footer'); ?>
</div>
<!--/Site Wraper End-->
<?php $this->load->view('common/before_body_close'); ?>
</body>
</html>
