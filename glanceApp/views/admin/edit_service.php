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
               <h1>
                  Edit Service<!--<small>advanced tables</small>--> 
               </h1>
            </section>
            <!-- Main content -->
            <section class="content">
               <div class="row">
                  <div class="col-xs-12">
                     <div class="panel dashboard-shadow">
                        <div class="panel-body">
                           <div class="box-header">
                              <div style="font-size:11px; color:#060;">
                                 <?php
                                    if($this->session->flashdata('msg')):
                                    ?>
                                 <?php 
                                    echo $this->session->flashdata('msg');
                                    endif; 
                                     
                                    ?>
                              </div>
                           </div>
                           <!-- /.box-header -->
                           <form action="<?php echo base_url()."admin/home/upadate_service" ?>" method="post">
                              <div class="row">
                                 <div class="col-md-8">
                                    <div class="row margin-t-20">
                                       <div class="col-md-6">
                                          <label>Service Name</label>
                                       </div>
                                       <div class="col-md-6">
                                          <input class="form-control" type="text" name="service" id="service" value="<?php echo $service_array->service ?>">
                                       </div>
                                    </div>
                                    <div class="row margin-t-20">
                                       <div class="col-md-6">
                                          <label>Order</label>
                                       </div>
                                       <div class="col-md-6">
                                         <input class="form-control" type="text" name="service_order" id="service_order" value="<?php echo $service_array->service_order ?>">
                                       </div>
                                    </div>
                                     <div class="row margin-t-20">
                                       <div class="col-md-6">
                                          <label>status</label>
                                       </div>
                                       <div class="col-md-6">
                                          <?php if($service_array->status !=0){
                                             $status_aprove="checked";
                                                }else{
                                                  $status_unprove="checked";
                                                }
                                             ?>
                                          <input  type="radio" name="status" id="status" value="1" <?php echo $status_aprove ?> ><span class="padding-rt">Approved</span>
                                          <input type="radio" name="status" id="status" value="0" <?php echo $status_unprove ?>><span>Unapproved</span>
                                       </div>
                                    </div>
                                    <div class="row margin-t-20" align="center">
                                       <input type="hidden" name="cms_id" id="cms_id" value="<?php echo $cms_id;?>">
                                       <input type="submit" class="btn btn-primary" value="Submit" />
                                    </div>
                                 </div>
                              </div>
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