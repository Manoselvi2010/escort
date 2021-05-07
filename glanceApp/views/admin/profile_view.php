<!DOCTYPE html>
<html>
   <head>
      <meta charset="UTF-8">
      <title><?php echo $title;?></title>
      <?php $this->load->view('admin/common/meta_tags'); ?>
      <?php $this->load->view('admin/common/before_head_close'); ?>
      <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
      <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.13/datatables.min.css"/>
      <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.13/datatables.min.js"></script> 
   </head>
   <body class="skin-blue">
      <?php $this->load->view('admin/common/after_body_open'); ?>
      <?php $this->load->view('admin/common/header'); ?>
      <div class="wrapper row-offcanvas row-offcanvas-left">
         <?php $this->load->view('admin/common/left_side'); ?>
         <!-- Right side column. Contains the navbar and content of the page -->
         <aside class="right-side">
            <!-- Content Header (Page header) -->
            <section class="content-header">
               <h1>
                  Profile Management 
                  <!--<small>advanced tables</small>--> 
               </h1>
            </section>
            <!-- Main content -->
            <section class="content">
               <div class="row">
                  <div class="col-xs-12">
                     <div class="panel dashboard-shadow">
                        <div class="panel-body">
                        <div class="box-header">
                           <h3 class="box-title">All Profiles</h3>
                        </div>
                          <?php
                             if($this->session->flashdata('msg')):
                             ?>
                          <div style="color:#009933;font-size:12px;"><?php echo $this->session->flashdata('msg');?></div>
                          <br />
                          <?php
                             endif;
                             ?>  
                          <div class="table-responsive">
                             <table id="member_table" class="table table-bordered table-hover">
                                <thead>
                                   <tr>
                                      <th><strong>Date Added</strong></th>
                                      <th><strong>Name</strong></th>
                                      <th><strong>Email</strong></th>
                                      <th><strong>Username</strong></th>
                                      <th><strong>Status</strong></th>
                                      <th><strong>Action</strong></th>
                                   </tr>
                                </thead>
                                <?php
                                   $i=0;
                                            if($profiles_view):
                                    foreach($profiles_view as $profile) {
                                   
                                   $class = ($i%2==0)?'row':'row1';
                                   if($profile->sts == 'active') {
                                    
                                    $stsConvert = 'inactive';
                                   } else {
                                    
                                    $stsConvert = 'active';
                                   }
                                        if($profile->verified_user == 1) {
                                          $vertifed_status =0;
                                          
                                          $verified_user = 'vertified user';
                                        } else {
                                           $vertifed_status =1;
                                          $verified_user = 'unvertified user';
                                        }
                                   
                                   ?>
                                <tr>
                                   <td><?php echo date('d-m-Y',strtotime($profile->dated));?></td>
                                   <td><?php echo $profile->name;?></td>
                                   <td><?php echo $profile->email;?></td>
                                   <td><?php echo $profile->username;?></td>
                                   <td><?php echo ucwords($profile->sts);?></td>
                                   <td>
                                    <div class="col-md-1">
                                      <a href="<?php echo base_url().'profile/'.$profile->username;?>" ><i class="fa fa-eye" aria-hidden="true"></i></a>
                                    </div>
                                    <div class="col-md-1">
                                      <!-- <a href="<?php echo base_url().'admin/edit_profile_admin/edit_profile_detail/'.$profile->username;?>"><i class="fa fa-pencil" aria-hidden="true"></i></a> -->
                                    </div>
                                    <div class="col-md-1">
                                      <a href="<?php echo base_url().'admin/profile_detail/profile_delete/'.$profile->id;?>" onclick="if(confirm('Do you want to delete profile?')){ return true; } else {return false;} "><i class="fa fa-trash-o pink-color" aria-hidden="true"></i></a>
                                    </div>
                                    <div class="col-md-4">
                                      <a class="btn-pink inactive-profile" href="<?php echo base_url().'admin/profile_detail/profile_sts/'.$profile->id.'/'.$stsConvert;?>"><?php echo ucwords($stsConvert);?> Profile</a>
                                    </div>
                                    <div class="col-md-5">
                                      <a href="<?php echo base_url().'admin/profile_detail/profile_vertified/'.$profile->id.'/'.$vertifed_status;?>"><?php echo ucwords($verified_user);?> Profile</a>
                                    </div>
                                    <!--<a href="<?php echo base_url().'admin/all_user_freinds/friend_list/'.$profile->id;?>">View Friends List</a> -->
                                   </td>
                                </tr>
                                <?php
                                   $i++;
                                   }
                                            endif;
                                            ?>
                                <tfoot>
                                </tfoot>
                             </table>
                          </div>
                      </div>
                        <!-- /.box-body --> 
                     </div>
                     <!-- /.box --> 
                     <!-- /.box --> 
                  </div>
               </div>
            </section>
            <!-- /.content --> 
         </aside>
         <!-- /.right-side --> 
      </div>
      <!-- ./wrapper -->
   </body>
</html>
<script type="text/javascript">
   $(document).ready(function() {
       $('#member_table').DataTable();
   });
</script>