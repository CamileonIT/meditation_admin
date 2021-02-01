<!DOCTYPE html>
<html>
   <head>
      <?php include('includes/logo.php');?>
      
      <link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/css/bootstrap.min.css">
      <link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/css/waves.min.css">
      <link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/css/feather.css">
      <link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/css/font-awesome.min.css">
      <link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/css/dataTables.bootstrap4.min.css">
      <link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/css/buttons.dataTables.min.css">
      <link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/css/responsive.bootstrap4.min.css">
      <link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/css/style.css">
      <link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/css/sweetalert.css">
      <link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/css/pages.css">
   </head>
   <body>
      <div class="loader-bg">
         <div class="loader-bar"></div>
      </div>
      <div id="pcoded" class="pcoded">
      <div class="pcoded-overlay-box"></div>
      <div class="pcoded-container navbar-wrapper">
      <?php include('includes/topbar.php');?>
      
      <div class="pcoded-main-container">
         <div class="pcoded-wrapper">
            <?php include('includes/sidebar.php');?>
            
            <div class="pcoded-content">
               <div class="page-header card">
                  <div class="row align-items-end">
                     <div class="col-lg-8">
                        <div class="page-header-title">
                           <i class="fa fa-send-o bg-c-blue"></i>
                           <div class="d-inline" id="main_header">
                              <h5>Notification Settings</h5>
                           </div>
                        </div>
                     </div>
                     <div class="col-lg-4">
                        <div class="page-header-breadcrumb">
                           <ul class=" breadcrumb breadcrumb-title" id="page_list">
                              <li class="breadcrumb-item">
                                 <a href="<?=base_url()?>admin/dashboard"><i class="fa fa-dashboard"></i></a>
                                 / Notification Settings
                              </li>
                           </ul>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="pcoded-inner-content">
                  <div class="main-body">
                     <div class="page-wrapper">
                        <div class="page-body">
                           <?php if($flash_msg=$this->session->flashdata('flash_msg')) echo $flash_msg;?>
                           <div class="card">
                              <div class="card-block">
                                 
                                 
                                 <form action="<?=base_url()?>admin/editsettings/notification" name="notification_settings" method="post" class="form form-horizontal" enctype="multipart/form-data">
                      <div class="form-group">
                         <label class="col-md-12 control-label">OneSignal App ID  : </label>
                         <div class="col-md-12">
                            <input type="text" name="onesignal_app_id" id="onesignal_app_id" value="<?php echo $settings_row['onesignal_app_id'];?>" placeholder="Your OneSignal App ID" class="form-control">
                         </div>
                         
                      </div>
                      <br>
                      <div class="form-group">
                         <label class="col-md-12 control-label">OneSignal Rest Key : </label>
                         <div class="col-md-12">
                            <input type="text" name="onesignal_rest_key" id="onesignal_rest_key" value="<?php echo $settings_row['onesignal_rest_key'];?>" placeholder="Your OneSignal Rest Key" class="form-control">
                         </div>
                         
                      </div>
                      <br>&nbsp;<br>
                      <div class="col-md-12"><center><button type="submit"  class="btn btn-primary">Save</button></center>
                      </div>
                    </form>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </body>
   <script type="text/javascript" src="<?=base_url()?>assets/js/jquery.min.js"></script>
   <script type="text/javascript" src="<?=base_url()?>assets/js/jquery-ui.min.js"></script>
   <script type="text/javascript" src="<?=base_url()?>assets/js/bootstrap.min.js"></script>
   <script type="text/javascript" src="<?=base_url()?>assets/js/waves.min.js"></script>
   <script type="text/javascript" src="<?=base_url()?>assets/js/jquery.slimscroll.js"></script>
   <script type="text/javascript" src="<?=base_url()?>assets/js/jquery.dataTables.min.js"></script>
   <script type="text/javascript" src="<?=base_url()?>assets/js/dataTables.buttons.min.js"></script>
   <script type="text/javascript" src="<?=base_url()?>assets/js/dataTables.keyTable.min.js"></script>
   <script type="text/javascript" src="<?=base_url()?>assets/js/dataTables.bootstrap4.min.js"></script>
   <script type="text/javascript" src="<?=base_url()?>assets/js/dataTables.responsive.min.js"></script>
   <script type="text/javascript" src="<?=base_url()?>assets/js/responsive.bootstrap4.min.js"></script>
   <script type="text/javascript" src="<?=base_url()?>assets/js/data-table-custom.js"></script>
   <script type="text/javascript" src="<?=base_url()?>assets/js/key-table-custom.js"></script>
   <script type="text/javascript" src="<?=base_url()?>assets/js/pcoded.min.js"></script>
   <script type="text/javascript" src="<?=base_url()?>assets/js/vertical-layout.min.js"></script>
   <script type="text/javascript" src="<?=base_url()?>assets/js/script.js"></script>
   <script type="text/javascript" src="<?=base_url()?>assets/js/sweetalert.min.js"></script>
   
</html>