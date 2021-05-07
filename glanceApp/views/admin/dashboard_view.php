<!DOCTYPE html>
<html>
   <head>
      <meta charset="UTF-8">
      <title><?php echo $title;?></title>
      <?php $this->load->view('admin/common/meta_tags'); ?>
      <?php $this->load->view('admin/common/before_head_close'); ?>
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
               <h1> Dashboard</h1>
            </section>
            <!-- Main content -->
            <section class="content">
              <div class="row">
                <div class="col-md-4">
                  <div class="card-front dashboard-red dashboard-shadow">
                    <div class="card-content">
                      <h4>Total no of User</h4>
                    </div>
                    <div class="card-back">
                      <div class="card-actions">
                        <h3><?php echo $member_count; ?></h3>
                      </div>
                       <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/9487/trans.png" alt="Cost Pie">
                    </div>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="card-front dashboard-yellow dashboard-shadow">
                    <div class="card-content">
                      <h4>Total no.of user registered today</h4>
                    </div>
                    <div class="card-back">
                      <div class="card-actions">
                        <h3><?php echo $today_registered_count; ?></h3>
                      </div>
                       <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/9487/trans.png" alt="Cost Pie">
                    </div>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="card-front dashboard-green dashboard-shadow">
                    <div class="card-content">
                      <h4>Total no.of verified profiles</h4>
                    </div>
                    <div class="card-back">
                      <div class="card-actions">
                        <h3><?php echo $verified_user; ?></h3>
                      </div>
                       <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/9487/trans.png" alt="Cost Pie">
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-10 col-md-offset-1" style="margin-top: 30px">
                    <div class="panel dashboard-shadow">
                      <div class="panel-body">
                        <h2>Registered Users</h2>
                      <div class="table-responsive">
                        <table id="example1" class="table table-bordered table-striped">
                          <thead>
                            <tr>
                              <!-- <th>Id</th> -->
                              <th>Registered Date</th>
                              <th>Name</th>
                              <th>Email</th>
                              <th>Gender</th>
                              <th>City</th>
                              <th>Country</th>
                              <th>Marital status</th>
                              <th>Phone</th>
                            </tr>
                          </thead>
                          <tbody id="sect">
                            <?php if($registered_members): foreach($registered_members as $registered_member): ?>
                            <tr>
                              <td><?php echo date_formats($registered_member->dated, 'd M, Y');?> </td>
                              <td><?php echo $registered_member->name;?></td>
                              <td><?php echo $registered_member->email;?></td>
                              <td><?php echo $registered_member->gender;?></td>
                              <td><?php echo $registered_member->city;?></td>
                              <td><?php echo $registered_member->country;?></td>
                              <td><?php echo $registered_member->marital_status;?></td>
                              <td><?php echo $registered_member->phone;?></td>
                            </tr>
                            <?php endforeach; endif;?>
                          </tbody>
                        </table>
                      </div>
                    </div>
                    </div>
                  </div>
                </div>
              <!--  <table width="700" border="0" align="center">
                  <tr>
                     <td width="210">&nbsp;</td>
                     <td width="205">&nbsp;</td>
                     <td width="197">&nbsp;</td>
                  </tr>
                  <tr>
                     <td align="center">
                        <img src="<?php echo base_url();?>glancePublic/images/admin_images/view_profile.png" /><br />
                        <a href="<?php echo base_url().'admin/profiles_lists';?>">View All Profiles</a>
                     </td>
                     <td align="center"><img src="<?php echo base_url();?>glancePublic/images/admin_images/cms.png" alt="" /><br />
                        <a href="<?php echo base_url().'admin/pages_manage';?>">Manage CMS</a>
                     </td>
                     <td align="center"><img src="<?php echo base_url();?>glancePublic/images/admin_images/msg.png" alt="" /><br />
                        <a href="<?php echo base_url().'admin/all_messages';?>">Manage User Messages</a>
                     </td>
                  </tr>
                  <tr>
                     <td>&nbsp;</td>
                     <td>&nbsp;</td>
                     <td>&nbsp;</td>
                  </tr>
                  <tr>
                     <td align="center"><img src="<?php echo base_url();?>glancePublic/images/admin_images/search.png" alt="" /><br />
                        <a href="<?php echo base_url().'admin/search_profile_name';?>">Search Profiles</a>
                     </td>
                     <td align="center"><img src="<?php echo base_url();?>glancePublic/images/admin_images/logout.png" alt="" /><br />
                        <a href="<?php echo base_url().'admin/home/logout';?>">Logout</a>
                     </td>
                     <td>&nbsp;</td>
                  </tr>
                  <tr>
                     <td>&nbsp;</td>
                     <td>&nbsp;</td>
                     <td>&nbsp;</td>
                  </tr>
               </table> -->
            </section>
            <!-- /.content --> 
         </aside>
         <!-- /.right-side --> 
      </div>
      <!-- ./wrapper -->
   </body>
</html>
