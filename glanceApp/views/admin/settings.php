<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
   <head>
      <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
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
               <h1> Settings</h1>
            </section>
            <?php
               if($this->session->flashdata('msg')):
               ?>
            <div style="color:#009933;font-size:12px;"><?php echo $this->session->flashdata('msg');?></div>
            <br />
            <?php
               endif;
               ?>  
            <!-- Main content -->
            <section class="content">
               <div class="row">
                  <div class="col-xs-12">
                     <div class="panel dashboard-shadow">
                        <div class="panel-body">
                           
                           <!-- /.box-header -->
                           <form action="<?php echo base_url().'admin/home/update_settings';?>" method="post">
                              <div class="row margin-t-20">
                                 <div class="col-md-8">
                                    <div class="row">
                                       <div class="col-md-6">
                                          <label>Google APIKey</label>
                                       </div>
                                       <div class="col-md-6">
                                          <input type="text" name="google_api" id="google_api"  class="form-control" value="<?php echo $setting_details[0]->google_api; ?>">
                                       </div>
                                    </div>
                                    <div class="margin-t-20" align="center">
                                       <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                 </div>
                              </div>
                              <!-- <table width="500" border="0" align="center">
                                 <tr>
                                    <td width="132">Google APIKey</td>
                                    <input type="hidden" name="setting_id" id="setting_id"  class="form-control" value="<?php echo $setting_details[0]->ID; ?>">
                                    <td width="358"><input type="text" name="google_api" id="google_api"  class="form-control" value="<?php echo $setting_details[0]->google_api; ?>"></td>
                                 </tr>
                                 <tr>
                                    <td>&nbsp;</td>
                                    <td><button type="submit" class="btn btn-primary">Submit</button></td>
                                 </tr>
                              </table> -->
                           </form>
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