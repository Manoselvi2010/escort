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
               <h1>Service Management</h1>
               <!--<small>advanced tables</small>--> 
            </section>
            <!-- Main content -->
            <section class="content">
               <div class="row">
                  <div class="col-xs-12">
                     <div class="panel dashboard-shadow">
                        <div class="panel-body">
                           <div class="box-header">
                              <div class="col-md-6">
                                 <h3 class="box-title">All Service</h3>
                              </div>
                              <div class="col-md-6" style="text-align: right;margin-top: 5px;">
                                 <a href="<?php echo base_url().'admin/home/add_service'?>" class="btn btn-primary">Add Service</a>
                              </div>
                           </div>
                           <?php if($this->session->flashdata('msg')): ?>
                           <div style="color:#009933;font-size:12px;"><?php echo $this->session->flashdata('msg');?></div>
                           <br />
                           <?php endif; ?>  
                           <div class="table-responsive">
                              <table id="service_table" class="table table-bordered table-hover">
                                 <thead>
                                    <tr>
                                       <th><strong>service order</strong></th>
                                       <th><strong>service</strong></th>
                                       <th><strong>service status</strong></th>
                                       <th><strong>Action</strong></th>
                                    </tr>
                                 </thead>
                                 <?php
                                    $i=0;
                                             if($service_details):
                                     foreach($service_details as $service_detail) {
                                           if($service_detail->status !=0){
                                             $status ="approved";
                                    
                                           }else{
                                    
                                             $status ="unapproved";
                                           }
                                    
                                    
                                    ?>
                                 <tr>
                                    <td><?php echo $service_detail->service_order;?></td>
                                    <td><?php echo $service_detail->service;?></td>
                                    <td><?php echo $status;?></td>
                                    <td>
                                       <a href="<?php echo base_url(); ?>admin/home/edit_service/<?php echo  $service_detail->ID;?>"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                                       <?php /*<a href="<?php echo base_url().'admin/all_user_freinds/friend_list/'.$profile->id;?>">View Friends List</a>*/?>
                                       <a href="<?php echo base_url().'admin/home/delete_service/'.$service_detail->ID;?>" onclick="if(confirm('Do you want to delete profile?')){ return true; } else {return false;} "><i class="padding-lt-7 fa fa-trash-o pink-color" aria-hidden="true"></i></a>
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
     $('#service_table').DataTable();
   });
</script>