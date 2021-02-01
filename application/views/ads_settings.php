<!DOCTYPE html>
<html>
   <head>
      <meta name="author" content="">
      <meta name="description" content="">
      <meta http-equiv="Content-Type"content="text/html;charset=UTF-8"/>
      <meta name="viewport"content="width=device-width, initial-scale=1.0">
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
                           <i class="fa fa-buysellads bg-c-blue"></i>
                           <div class="d-inline" id="main_header">
                              <h5>Ads Settings</h5>
                           </div>
                        </div>
                     </div>
                     <div class="col-lg-4">
                        <div class="page-header-breadcrumb">
                           <ul class=" breadcrumb breadcrumb-title" id="page_list">
                              <li class="breadcrumb-item">
                                 <a href="<?=base_url()?>admin/dashboard"><i class="fa fa-dashboard"></i></a>
                                 / Ads Settings
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
                                 <form action="<?=base_url()?>admin/editsettings/ads" name="ads_settings" method="post" class="form form-horizontal" enctype="multipart/form-data">
                      <div class="form-group">
                         <label class="col-md-12 control-label"><b>Publisher ID  : </b></label>
                         <div class="col-md-12">
                            <input type="text" name="publisher_id" id="publisher_id" value="<?php echo $settings_row['publisher_id'];?>" class="form-control">
                         </div>
                         <br>
                      </div>
                      <div class="col-md-7">
                         <div class="banner_ads_block">
                            <div class="banner_ad_item">
                               <label class="control-label"><b>Banner Ads  : </b></label>                                  
                            </div>
                            <div class="col-md-12">
                               <div class="form-group">
                                  <label class="col-md-12 control-label">Banner Ad : </label>
                                  <div class="col-md-12">
                                     <select name="banner_ad" id="banner_ad" class="form-control fill col-sm-12">
                                        <option value="true" <?php if($settings_row['banner_ad']=='true'){?>selected<?php }?>>True</option>
                                        <option value="false" <?php if($settings_row['banner_ad']=='false'){?>selected<?php }?>>False</option>
                                     </select>
                                  </div>
                               </div>
                               <div class="form-group">
                                  <label class="col-md-12 control-label mr_bottom20">Banner ID  : </label>
                                  <div class="col-md-12">
                                     <input type="text" name="banner_ad_id" id="banner_ad_id" value="<?php echo $settings_row['banner_ad_id'];?>" class="form-control">
                                  </div>
                               </div>
                            </div>
                         </div>
                      </div>
                      <br>
                      <div class="col-md-7">
                         <div class="interstital_ads_block">
                            <div class="interstital_ad_item">
                               <label class="control-label">
                                <b>Interstital Ads  : </b></label>                   
                            </div>
                            <div class="col-md-12">
                               <div class="form-group">
                                  <label class="col-md-12 control-label">Interstital : </label>
                                  <div class="col-md-12">
                                     <select name="interstital_ad" id="interstital_ad" class="form-control fill col-sm-12">
                                        <option value="true" <?php if($settings_row['interstital_ad']=='true'){?>selected<?php }?>>True</option>
                                        <option value="false" <?php if($settings_row['interstital_ad']=='false'){?>selected<?php }?>>False</option>
                                     </select>
                                  </div>
                               </div>
                               <div class="form-group   ">
                                  <label class="col-md-12 control-label mr_bottom20">Interstital ID  : </label>
                                  <div class="col-md-12">
                                     <input type="text" name="interstital_ad_id" id="interstital_ad_id" value="<?php echo $settings_row['interstital_ad_id'];?>" class="form-control">
                                  </div>
                               </div>
                               <br>
                               <div class="form-group m-b-20">
                                  <label class="col-md-12 control-label mr_bottom20">Interstital Clicks  : </label>
                                  <div class="col-md-12">
                                     <input type="number" name="interstital_ad_click" id="interstital_ad_click" value="<?php echo $settings_row['interstital_ad_click'];?>" class="form-control">
                                     <br>&nbsp;
                                     <br>
                                  </div>
                               </div>
                                             
                            </div>
                         </div>
                      </div>
                      
                      <div class="col-md-7"><center><button type="submit"  class="btn btn-primary">Save</button></center>
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