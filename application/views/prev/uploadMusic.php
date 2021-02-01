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
      <link rel="stylesheet" type="text/css" href="<?=base_url()?>/assets/css/bootstrap.min.css">
      <link rel="stylesheet" type="text/css" href="<?=base_url()?>/assets/css/waves.min.css" >
      <link rel="stylesheet" type="text/css" href="<?=base_url()?>/assets/css/feather.css">
      <link rel="stylesheet" type="text/css" href="<?=base_url()?>/assets/css/icofont.css">
      <link rel="stylesheet" type="text/css" href="<?=base_url()?>/assets/css/font-awesome.min.css">
      <link rel="stylesheet" type="text/css" href="<?=base_url()?>/assets/css/style.css">
      <link rel="stylesheet" type="text/css" href="<?=base_url()?>/assets/css/widget.css">
      <link rel="stylesheet" type="text/css" href="<?=base_url()?>/assets/css/pages.css">
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
                        <li class="active pcoded-trigger">
                           <a href="javascript:void(0);" class="waves-effect waves-dark">
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
                        <li>
                           <a href="<?=base_url()?>admin/bannerSlider" class="waves-effect waves-dark">
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
                           <i class="fa fa-upload bg-c-blue"></i>
                           <div class="d-inline" id="main_header">
                              <h5>Upload Music</h5>
                           </div>
                        </div>
                     </div>
                     <div class="col-lg-4">
                        <div class="page-header-breadcrumb">
                           <ul class=" breadcrumb breadcrumb-title" id="page_list">
                              <li class="breadcrumb-item">
                                 <a href="<?=base_url()?>admin"><i class="fa fa-dashboard"></i></a>
                                 /
                                 <a href="<?=base_url()?>admin/musics">Musics</i></a>
                                 /
                                 Upload Music
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
                                 <form id="upload_form" action="<?=base_url()?>admin/upload_process" method="post" class="form-horizontal form-material" enctype="multipart/form-data">
                                    <div class="modal-body">
                                       <div class="form-body">
                                          <div class="row" >
                                             <div class="col-md-12">
                                                <div class="form-group">
                                                   <!-- <div class="col-sm-12 col-xl-6 col-lg-6 col-md-6 m-b-30 float-left">-->
                                                      <!--<br><br>-->
                                                   <!--   <label class="control-label pull-left"> Choose Artist<span class="required">*</span> :</label>-->
                                                   <!--   <select name="artist_id" class="form-control input-sm fill col-sm-12" required="">-->
                                                   <!--      <option></option>-->
                                                   <!--      <?php foreach($artists as $artist){?>-->
                                                   <!--      <option value="<?php echo $artist->artist_id?>"><?php echo $artist->artist_name?></option>-->
                                                   <!--      <?php } ?>-->
                                                   <!--   </select>-->
                                                   <!--</div>-->
                                                   <div class="col-sm-12 col-xl-6 col-lg-6 col-md-6 m-b-30 float-right">
                                                      <label class="control-label pull-left"> Choose Category :</label>
                                                      <select name="category_id" class="form-control input-sm fill col-sm-12" >
                                                         <option></option>
                                                         <?php foreach($categories as $cat){?>
                                                         <option value="<?php echo $cat->category_id?>"><?php echo $cat->category_name?></option>
                                                         <?php } ?>
                                                      </select>
                                                   </div>
                                                   
                                                   <!--<div class="col-sm-12 col-xl-6 col-lg-6 col-md-6 m-b-30 float-left">-->
                                                   <!--   <label class="control-label pull-left"> Choose Album</label>-->
                                                   <!--   <select name="album_id" class="form-control input-sm fill col-sm-12" >-->
                                                   <!--      <option></option>-->
                                                   <!--      <?php foreach($albums as $album){?>-->
                                                   <!--      <option value="<?php echo $album->album_id?>"><?php echo $album->album_name?></option>-->
                                                   <!--      <?php } ?>-->
                                                   <!--   </select>-->
                                                   <!--</div>-->
                                                   <!--<div class="col-sm-12 col-xl-6 col-lg-6 col-md-6 m-b-30 float-right">-->
                                                      <!--<br><br>-->
                                                   <!--   <label class="control-label pull-left"> Choose Movie</label>-->
                                                   <!--   <select name="movie_id" class="form-control input-sm fill col-sm-12" >-->
                                                   <!--      <option></option>-->
                                                   <!--      <?php foreach($movies as $movie){?>-->
                                                   <!--      <option value="<?php echo $movie->movie_id?>"><?php echo $movie->movie_name?></option>-->
                                                   <!--      <?php } ?>-->
                                                   <!--   </select>-->
                                                   <!--</div>-->
                                                   <div class="col-sm-12 col-xl-12 col-lg-12 col-md-12 m-b-30 float-left">
                                                      <label for="wlocation2" class=" col-form-label"> Music Title <span class="required">*</span>  :</label>
                                                      <input type="text" name="music_title"  class="form-control" required>
                                                   </div>
                                                   
                                                   <div class="col-sm-12 col-xl-6 col-lg-6 col-md-6 m-b-30 float-left">
                                                      <label for="wlocation2" class=" col-form-label"> Music File<span class="required">*</span> (mp3 | wav) :</label><br>
                                                      <input id="music" name="music_file" type="file" class="upload_music" accept=".mp3, .wav, .jpeg" required/>
                                                      <input type="hidden" name ="music_duration" id="hidden_duration">
                                                   </div>
                                                   <div class="col-sm-12 col-xl-6 col-lg-6 col-md-6 m-b-30 float-right">
                                                      <label for="wlocation2" class=" col-form-label"> Preview Image<span class="required">*</span> (jpg | png) :</label><br>
                                                      <input name="music_image" type="file" class="upload_img" accept=".png, .jpg, .jpeg" id="music_image" required/>
                                                   </div>
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="text-center m-t-20">
                                       <button type="submit" class="btn btn-primary upload_submit" >Upload Now</button>
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
   <script type="text/javascript" src="<?=base_url()?>assets/js/popper.min.js"></script>
   <script type="text/javascript" src="<?=base_url()?>assets/js/bootstrap.min.js"></script>
   <script type="text/javascript" src="<?=base_url()?>assets/js/waves.min.js"></script>
   <script type="text/javascript" src="<?=base_url()?>assets/js/jquery.slimscroll.js"></script>
   <script type="text/javascript" src="<?=base_url()?>assets/js/pcoded.min.js"></script>
   <script type="text/javascript" src="<?=base_url()?>assets/js/vertical-layout.min.js"></script>
   <script type="text/javascript" src="<?=base_url()?>assets/js/script.js"></script>
   <script type="text/javascript">
      $(document).ready(function(){
           $('.loader-bg').hide();
             
            
            
           
        
      });
      
    //   var myVideos = [];

window.URL = window.URL || window.webkitURL;

document.getElementById('music').onchange = setFileInfo;

function setFileInfo() {
  var files = this.files;
  var video = document.createElement('video');
  video.preload = 'metadata';

  video.onloadedmetadata = function() {
    window.URL.revokeObjectURL(video.src);
    var duration = Math.floor(video.duration);
    $('#hidden_duration').val(duration);
    
  }

  video.src = URL.createObjectURL(files[0]);;
}


   </script>
</html>