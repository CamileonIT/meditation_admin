<!DOCTYPE html>
<html>
   <head>
      <?php include('includes/logo.php');?>
      
      <link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/css/bootstrap.min.css">
      <link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/css/waves.min.css">
      <link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/css/feather.css">
      <link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/css/font-awesome.min.css">
      <link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/css/style.css">

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
                           <i class="fa fa-send bg-c-blue"></i>
                           <div class="d-inline" id="main_header">
                              <h5>Send Notification</h5>
                           </div>
                        </div>
                     </div>
                     <div class="col-lg-4">
                        <div class="page-header-breadcrumb">
                           <ul class=" breadcrumb breadcrumb-title" id="page_list">
                              <li class="breadcrumb-item">
                                 <a href="<?=base_url()?>admin/dashboard"><i class="fa fa-dashboard"></i></a>
                                 / Send Notification
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
                                 <form  action="<?=base_url()?>admin/send_noti_process" method="post" class="form-horizontal form-material" enctype="multipart/form-data" id="upload_form">
                                    <div class="modal-body">
                                       <div class="form-body">
                                          <div class="row" >
                                             <div class="col-md-12">
                                                <div class="form-group">
                                                   <div class="col-sm-12 col-xl-8 col-lg-7 col-md-6 m-b-30" style="float: left">
                                                      <label class="control-label pull-left"> Choose Type</label>
                                                      <select name="categories" class="form-control input-sm fill col-sm-12" required="" id="not_type">
                                                         <option value="1">Simple Notification</option>
                                                         <option value="2">Image Notification</option>
                                                      </select>
                                                      <br><br>
                                                      <label>Title</label>
                                                      <input class="form-control" type="text" value="" id="title" name="title"/>
                                                      <br><br>
                                                      <label>Message</label>
                                                      <textarea rows="4" class="form-control" id="msg" name="message" ></textarea>
                                                      <div class="sec imgupload" style="display: none">
                                                         <br/><label>Choose Image</label><br/>
                                                         <!-- <input style="width:75%" id="add-file" placeholder="Choose File"class="form-control" disabled="disabled" /> -->
                                                         <div class="fileUpload btn btn-primary btn-md">
                                                            <span>Upload Photo</span>
                                                            <input  id="uploadBtn" type="file" name="not_image" class="upload_image_btn" />
                                                         </div>
                                                         <br/>
                                                         <img id="myImg" style="max-width: 435px;max-height:250px;display: none;
                                                             margin: 15px;" src="" alt="your image" />
                                                         
                                                      </div>
                                                   </div>
                                                   <div class="col-sm-12 col-xl-4 col-lg-5 col-md-6 m-b-30" style="float: right">
                                                      <div class="simple_mokup offset1" >
                                                         <img src="<?=base_url()?>/assets/images/simple.png"/>
                                                      </div>
                                                      <div class="dialoge_mokup offset1" style="display: none;">
                                                         <img src="<?=base_url()?>/assets/images/dialog_push.png"/>
                                                      </div>
                                                      
                                                   </div>
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="text-center m-t-20">
                                       <button class="btn btn-primary" onclick="$('#upload_form').submit();"  >Send Notification</button>
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
   <script type="text/javascript" src="<?=base_url()?>assets/js/pcoded.min.js"></script>
   <script type="text/javascript" src="<?=base_url()?>assets/js/jquery.slimscroll.js"></script>
   <script type="text/javascript" src="<?=base_url()?>assets/js/vertical-layout.min.js"></script>
   <script type="text/javascript" src="<?=base_url()?>assets/js/script.js"></script>
   <script type="text/javascript" src="<?=base_url()?>assets/js/notification.js"></script>
</html>