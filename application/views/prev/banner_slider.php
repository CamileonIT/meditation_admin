<!DOCTYPE html>
<html>
   <head>
      <meta name="author" content="">
      <meta name="description" content="">
      <meta http-equiv="Content-Type"content="text/html;charset=UTF-8"/>
      <meta name="viewport"content="width=device-width, initial-scale=1.0">
      <title>Music App | Admin</title>
      <link rel="icon" href="<?=base_url()?>assets/images/1.png" type="image/x-icon">
      <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" rel="stylesheet">
      <link href="https://fonts.googleapis.com/css?family=Quicksand:500,700" rel="stylesheet">
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
      <nav class="navbar header-navbar pcoded-header">
         <div class="navbar-wrapper">
            <div class="navbar-logo">
               <a href="<?=base_url()?>admin">
               <img alt="Music App" src="<?=base_url()?>/assets/images/logo.png">
               </a>
               <a class="mobile-menu" id="mobile-collapse" href="#!">
               <i class="feather icon-menu icon-toggle-right"></i>
               </a>
               <a class="mobile-options waves-effect waves-light">
               <i class="feather icon-more-horizontal"></i>
               </a>
            </div>
            <div class="navbar-container container-fluid">
               <ul class="nav-left">
                  <li>
                     <a href="javascript:toggleFullScreen()" class="waves-effect waves-light">
                     <i class="full-screen feather icon-maximize"></i>
                     </a>
                  </li>
               </ul>
               <ul class="nav-right">
                  <li class="user-profile header-notification">
                     <div class="dropdown-primary dropdown">
                        <div class="dropdown-toggle" data-toggle="dropdown">
                           Welcome <b><?php echo $this->session->userdata('admin_name');?></b>
                           <i class="fa fa-caret-down"></i>
                        </div>
                        <ul class="show-notification profile-notification dropdown-menu" data-dropdown-in="fadeIn" data-dropdown-out="fadeOut">
                           <li>
                              <a href="<?=base_url()?>admin/change_password">
                              <i class="feather icon-settings"></i> Change Password
                              </a>
                           </li>
                           <li>
                              <a href="<?=base_url()?>admin/logout">
                              <i class="feather icon-log-out"></i> Logout
                              </a>
                           </li>
                        </ul>
                     </div>
                  </li>
               </ul>
            </div>
         </div>
      </nav>
      <div class="pcoded-main-container">
         <div class="pcoded-wrapper">
            <nav class="pcoded-navbar">
               <div class="nav-list">
                  <div class="pcoded-inner-navbar main-menu">
                     <ul class="pcoded-item pcoded-left-item">
                        <li>
                           <a href="<?=base_url()?>admin" class="waves-effect waves-dark">
                           <span class="pcoded-micon"><i class="fa fa-dashboard"></i></span>
                           <span class="pcoded-mtext">Dashboard</span>
                           </a>
                        </li>
                        <li>
                           <a href="<?=base_url()?>admin/category" class="waves-effect waves-dark">
                           <span class="pcoded-micon">
                           <i class="fa fa-th-list"></i>
                           </span>
                           <span class="pcoded-mtext">Category</span>
                           </a>
                        </li>
                        <li>
                           <a href="<?=base_url()?>admin/list/artist" class="waves-effect waves-dark">
                           <span class="pcoded-micon">
                           <i class="fa fa-address-book"></i>
                           </span>
                           <span class="pcoded-mtext">Artist</span>
                           </a>
                        </li>
                        <li>
                           <a href="<?=base_url()?>admin/list/album" class="waves-effect waves-dark">
                           <span class="pcoded-micon">
                           <i class="fa fa-address-card-o"></i>
                           </span>
                           <span class="pcoded-mtext">Album</span>
                           </a>
                        </li>
                        <li>
                           <a href="<?=base_url()?>admin/list/movie" class="waves-effect waves-dark">
                           <span class="pcoded-micon">
                           <i class="fa fa-file-movie-o"></i>
                           </span>
                           <span class="pcoded-mtext">Movie</span>
                           </a>
                        </li>
                        <li>
                           <a href="<?=base_url()?>admin/musics" class="waves-effect waves-dark">
                           <span class="pcoded-micon">
                           <i class="fa fa-music"></i>
                           </span>
                           <span class="pcoded-mtext">Music List</span>
                           </a>
                        </li>
                        <li>
                           <a href="<?=base_url()?>admin/uploadMusic" class="waves-effect waves-dark">
                           <span class="pcoded-micon">
                           <i class="fa fa-upload"></i>
                           </span>
                           <span class="pcoded-mtext">Upload Music</span>
                           </a>
                        </li>
                        <li>
                           <a href="<?=base_url()?>admin/users" class="waves-effect waves-dark">
                           <span class="pcoded-micon">
                           <i class="fa fa-users"></i>
                           </span>
                           <span class="pcoded-mtext">Users</span>
                           </a>
                        </li>
                        <li class="active pcoded-trigger">
                           <a href="javascript:void(0)" class="waves-effect waves-dark">
                           <span class="pcoded-micon">
                           <i class="fa fa-image"></i>
                           </span>
                           <span class="pcoded-mtext">App Banner Slider</span>
                           </a>
                        </li>
                        <li class="pcoded-hasmenu">
                           <a href="javascript:void(0)" class="waves-effect waves-dark">
                           <span class="pcoded-micon">
                           <i class="fa fa-cogs"></i>
                           </span>
                           <span class="pcoded-mtext">Settings</span>
                           </a>
                           <ul class="pcoded-submenu">
                              <li class=" ">
                                 <a href="<?=base_url()?>admin/settings?type=apphomescreen" class="waves-effect waves-dark">
                                 <span class="pcoded-mtext">App Home Screen</span>
                                 </a>
                              </li>
                              <li class=" ">
                                 <a href="<?=base_url()?>admin/settings?type=package" class="waves-effect waves-dark">
                                 <span class="pcoded-mtext">Packages</span>
                                 </a>
                              </li>
                              <li class=" ">
                                 <a href="<?=base_url()?>admin/settings?type=notification" class="waves-effect waves-dark">
                                 <span class="pcoded-mtext">Notification</span>
                                 </a>
                              </li>
                              <li class=" ">
                                 <a href="<?=base_url()?>admin/settings?type=ads" class="waves-effect waves-dark">
                                 <span class="pcoded-mtext">Ads</span>
                                 </a>
                              </li>
                              <li class=" ">
                                 <a href="<?=base_url()?>admin/settings?type=payments" class="waves-effect waves-dark">
                                 <span class="pcoded-mtext">Payment Methods</span>
                                 </a>
                              </li>
                           </ul>
                        </li>
                        <li>
                           <a href="<?=base_url()?>admin/sendNotification" class="waves-effect waves-dark">
                           <span class="pcoded-micon">
                           <i class="fa fa-send"></i>
                           </span>
                           <span class="pcoded-mtext">Send Notification</span>
                           </a>
                        </li>
                        <li>
                           <a href="<?=base_url()?>admin/apiList" class="waves-effect waves-dark">
                           <span class="pcoded-micon">
                           <i class="fa fa-list"></i>
                           </span>
                           <span class="pcoded-mtext">API List</span>
                           </a>
                        </li>
                     </ul>
                  </div>
               </div>
            </nav>
            <div class="pcoded-content">
               <div class="page-header card">
                  <div class="row align-items-end">
                     <div class="col-lg-8">
                        <div class="page-header-title">
                           <i class="fa fa fa-image bg-c-blue"></i>
                           <div class="d-inline" id="main_header">
                              <h5>App Banner Slider</h5>
                           </div>
                        </div>
                     </div>
                     <div class="col-lg-4">
                        <div class="page-header-breadcrumb">
                           <ul class=" breadcrumb breadcrumb-title" id="page_list">
                              <li class="breadcrumb-item">
                                 <a href="<?=base_url()?>admin/dashboard"><i class="fa fa-dashboard"></i></a>
                                 /App Banner Slider
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
                                 <button onclick="location.href= '<?=base_url()?>admin/banner/add' " type="button" class="btn pull-right btn-info btn-rounded" style="margin-bottom: 10px" >Add Banner</button>
                                 
                                 <div class="dt-responsive table-responsive">
                                    <table id="footer-search" class="excel-bg table table-bordered nowrap">
                                       <thead>
                                          <tr>
                                             <th>#</th>
                                             <th>Image</th>
                                             <th>Index Of Display</th>
                                             <th>Status</th>
                                             <th>Action</th>
                                          </tr>
                                       </thead>
                                       <tfoot>
                                          <tr>
                                             <th>#</th>
                                             <th>Image</th>
                                             <th>Index</th>
                                             <th>Status</th>
                                             <th></th>
                                          </tr>
                                       </tfoot>
                                       <tbody style="text-align: center;" id="invoice_api">
                                          <input  type="text" style="display: none;" class="userhidden" id="userhidden">
                                          <?php $i=0; 
                                          foreach($banners as $banner) { $i++; 
                                             ?>
                                          <tr>
                                             <td><?php echo  $i; ?></td>
                                             
                                             <td>
                                                <img src='<?php echo base_url().$banner->banner_slider_image?>' style="width: 200px;height: 110px;">
                                             </td>
                                             <td>
                                                <?php echo $banner->banner_slider_order; ?>
                                             </td>
                                             <td>
                                                
                                                <div class="custom-control custom-switch m-t-5">
                                               <input type="checkbox" class="custom-control-input" id='customSwitch<?php echo  $banner->banner_slider_id?>' <?php echo ($banner->banner_slider_status=="ENABLE") ? "checked" : "" ?> onchange="var status='<?php echo $banner->banner_slider_status ?>'; var id =<?php echo  $banner->banner_slider_id?>; $.post('<?php echo base_url();?>admin/changeBannerStatus',{id,status},function(data){location.reload();});">
                                               <label class="custom-control-label" for='customSwitch<?php echo  $banner->banner_slider_id?>'></label>
                                             </div>
                                                
                                             </td>
                                             <td>
                                                <a class="view_banner" href="<?=base_url()?>admin/banner/view/<?php echo $banner->banner_slider_id?>" target="_blank" id="<?php echo $banner->banner_slider_id?>" style="cursor: pointer;">
                                                <span class="pcoded-badge label label-success"><i class="fa fa-search-plus"></i></span>
                                                </a> 
                                                 
                                                 <a  class="edit_banner" href="<?=base_url()?>admin/banner/edit/<?php echo $banner->banner_slider_id?>" target="_blank" id="<?php echo $banner->banner_slider_id?>" style="cursor: pointer;">
                                                <span class="pcoded-badge label label-primary"><i class="fa fa-edit"></i></span>
                                                </a>
                                                
                                                <a class="delete_banner" id="<?php echo $banner->banner_slider_id?>" style="cursor: pointer;">
                                                <span class="pcoded-badge label label-danger"><i class="fa fa-trash"></i></span>
                                                </a>
                                                
                                                
                                                
                                             </td>
                                          </tr>
                                          <?php } ?> 
                                       </tbody>
                                    </table>
                                 </div>
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
   <script type="text/javascript">
      $(document).ready(function(){
          $('.edit_banner').click(function(){
            var id = $(this).attr('id'); 
            var result = id.split("|");
            var id = result[0];
            var index = result[1];
            var image= result[2];
            $('#edit_id').attr('value',id);
            $('#edit_index').attr('value',index);
            $('#edit_image').attr('src',image);
          });
         
         
         !function($) {
        "use strict";
        var SweetAlert = function() {};
        SweetAlert.prototype.init = function() {
          //Warning Message
          $('.delete_banner').click(function(){
              var id= $(this).attr('id');
      
            swal({   
              title: "Are you sure?",   
              text: "You will not be able to recover this Banner Record and Data!",   
              type: "warning",   
              showCancelButton: true,   
              confirmButtonColor: "#DD6B55",   
              confirmButtonText: "Yes, delete it!",   
              closeOnConfirm: false 
            }, 
            function(){
              
              var dataString =  "banner_id=" + id ;
              $.ajax({
                type: "POST",
                url: "<?php echo base_url();?>admin/deleteBanner",
                data: dataString,
                cache: false,
                success: function(data)
                {
                     swal("Deleted!", "Banner has been deleted.", "success")
                } 
              });
              setTimeout((function() {
                window.location.reload();
              }), 2000);
            });
      
            $(".confirm").click(function(){
            });
          });
        },
        //init
        $.SweetAlert = new SweetAlert, $.SweetAlert.Constructor = SweetAlert
      }(window.jQuery),
      
      //initializing 
      function($) {
          "use strict";
          $.SweetAlert.init()
      }(window.jQuery); 
    });
   </script>
</html>