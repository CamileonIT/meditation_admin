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
                     <a href="<?php echo base_url()?>admin">
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
                              <li class="active pcoded-trigger">
                                 <a href="javascript:void(0)" class="waves-effect waves-dark">
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
                                 <i class="fa fa-dashboard bg-c-blue"></i>
                                 <div class="d-inline" id="main_header">
                                    <h5>Dashboard</h5>
                                 </div>
                              </div>
                           </div>
                           <div class="col-lg-4">
                              <div class="page-header-breadcrumb">
                                 <ul class=" breadcrumb breadcrumb-title" id="page_list">
                                    <li class="breadcrumb-item">
                                       <a href="<?=base_url()?>admin/dashboard"><i class="fa fa-dashboard"></i></a>
                                       / Dashboard
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
                                 <div class="row">
                                    <div class="col-sm-12 col-lg-3 col-md-3 col-xl-3">
                                       <div class="card prod-p-card card-red">
                                          <div class="card-body">
                                             <a href="<?=base_url()?>admin/users">
                                                <div class="row align-items-center m-b-30">
                                                   <div class="col">
                                                      <h6 class="m-b-5 text-white">Total Users</h6>
                                                      <h3 class="m-b-0 f-w-700 text-white"><?php echo $user_count?></h3>
                                                   </div>
                                                   <div class="col-auto">
                                                      <i class="fa fa-users text-c-purple f-18"></i>
                                                   </div>
                                                </div>
                                                <p class="m-b-0 text-white"><span class="label label-purple m-r-10"><b><?php echo $current_month_user_count?></b></span>From This Month</p>
                                             </a>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="col-sm-12 col-lg-3 col-md-3 col-xl-3">
                                       <div class="card prod-p-card card-blue">
                                          <div class="card-body">
                                             <a href="<?=base_url()?>admin/musics">
                                                <div class="row align-items-center m-b-30">
                                                   <div class="col">
                                                      <h6 class="m-b-5 text-white">Total Musics</h6>
                                                      <h3 class="m-b-0 f-w-700 text-white"><?php echo $music_count?></h3>
                                                   </div>
                                                   <div class="col-auto">
                                                      <i class="fa fa-music text-c-dark-blue f-18"></i>
                                                   </div>
                                                </div>
                                                <p class="m-b-0 text-white"><span class="label label-blue m-r-10"><b><?php echo $current_month_music_count?></b></span>From This Month</p>
                                             </a>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="col-sm-12 col-lg-3 col-md-3 col-xl-3">
                                       <div class="card prod-p-card card-green">
                                          <div class="card-body">
                                             <a href="<?=base_url()?>admin/list/artist">
                                                <div class="row align-items-center m-b-30">
                                                   <div class="col">
                                                      <h6 class="m-b-5 text-white">Total Artists</h6>
                                                      <h3 class="m-b-0 f-w-700 text-white"><?php echo $artist_count?></h3>
                                                   </div>
                                                   <div class="col-auto">
                                                      <i class="fa fa-address-book text-c-light-blue f-18"></i>
                                                   </div>
                                                </div>
                                                <p class="m-b-0 text-white"><span class="label label-light-blue m-r-10"><b><?php echo $current_month_artist_count?></b></span>From This Month</p>
                                             </a>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="col-sm-12 col-lg-3 col-md-3 col-xl-3">
                                       <div class="card prod-p-card card-yellow">
                                          <div class="card-body">
                                             <a href="<?=base_url()?>admin/list/album">
                                                <div class="row align-items-center m-b-30">
                                                   <div class="col">
                                                      <h6 class="m-b-5 text-white">Total Albums</h6>
                                                      <h3 class="m-b-0 f-w-700 text-white"><?php echo $album_count?></h3>
                                                   </div>
                                                   <div class="col-auto">
                                                      <i class="fa fa-address-card-o text-c-aqua f-18"></i>
                                                   </div>
                                                </div>
                                                <p class="m-b-0 text-white"><span class="label label-aqua m-r-10"><b><?php echo $current_month_album_count?></b></span>From This Month</p>
                                             </a>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                                       <div class="card latest-update-card">
                                          <div class="card-header">
                                             <h5>Latest Music</h5>
                                             <div class="card-header-right">
                                                <ul class="list-unstyled card-option" style="width: 30px;">
                                                   <li class="first-opt" style=""><i class="feather open-card-option icon-chevron-left"></i></li>
                                                   <li><i class="feather icon-maximize full-card"></i></li>
                                                   <li><i class="feather icon-minus minimize-card"></i></li>
                                                   <li><i class="feather open-card-option icon-chevron-left"></i></li>
                                                </ul>
                                             </div>
                                          </div>
                                          <div class="card-block">
                                             <?php if(!empty($latest_musics)){ foreach($latest_musics as $music){?>
                                             <div class="latest-update-box">
                                                <div class="row p-t-15 p-b-15">
                                                   <div class="col-auto text-right update-meta p-r-0">
                                                      <a href="<?php echo base_url().'uploads/music/'.$music->music_file ?>" target="_blank" style="cursor: pointer;">
                                                      <img src="<?=base_url()?>uploads/music/image/<?php echo $music->music_image?>" style="width:100px; height:100px" alt="image" class="img-40 align-top m-r-15 update-icon ">
                                                      </a>
                                                   </div>
                                                   <div class="col p-l-5">
                                                      <h6><?php echo str_word_count($music->music_title) > 10 ? implode(' ', array_slice(explode(' ', $music->music_title), 0, 10))."..." : $music->music_title;    ?></h6>
                                                      <p class="text-muted m-b-0">
                                                         <?php if($music->artist_name !=''){?>
                                                         <span style="display:block;padding: 1px 0;">Artist : <b><?php echo ucwords($music->artist_name)?> </b></span>
                                                         <?php }
                                                            if($music->album_name !=''){
                                                            ?>
                                                         <span style="display:block;padding: 1px 0;">Album : <b><?php echo ucwords($music->album_name)?> </b></span>
                                                         <?php }
                                                            if($music->movie_name !=''){
                                                            ?>
                                                         <span style="display:block;padding: 1px 0;">Movie : <b><?php echo ucwords($music->movie_name)?> </b></span>
                                                         <?php }?>
                                                      </p>
                                                   </div>
                                                </div>
                                             </div>
                                             <?php } } else {
                                                echo "<br><h6>No Item is in list yet!</h6>";
                                                }?>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                                       <div class="card latest-update-card">
                                          <div class="card-header">
                                             <h5>Most Favourite Music</h5>
                                             <div class="card-header-right">
                                                <ul class="list-unstyled card-option" style="width: 30px;">
                                                   <li class="first-opt" style=""><i class="feather open-card-option icon-chevron-left"></i></li>
                                                   <li><i class="feather icon-maximize full-card"></i></li>
                                                   <li><i class="feather icon-minus minimize-card"></i></li>
                                                   <li><i class="feather open-card-option icon-chevron-left"></i></li>
                                                </ul>
                                             </div>
                                          </div>
                                          <div class="card-block">
                                             <?php if(!empty($favoutite_musics)){ foreach($favoutite_musics as $music){?>
                                             <div class="latest-update-box">
                                                <div class="row p-t-15 p-b-15">
                                                   <div class="col-auto text-right update-meta p-r-0">
                                                      <a href="<?php echo base_url().'uploads/music/'.$music->music_file ?>" target="_blank" style="cursor: pointer;">
                                                      <img src="<?=base_url()?>uploads/music/image/<?php echo $music->music_image?>" style="width:100px; height:100px" alt="image" class="img-40 align-top m-r-15 update-icon "></a>
                                                   </div>
                                                   <div class="col p-l-5">
                                                      <h6><?php echo str_word_count($music->music_title) > 10 ? implode(' ', array_slice(explode(' ', $music->music_title), 0, 10))."..." : $music->music_title;    ?><span class="pcoded-badge label label-danger" style="margin-left: 10px;"><?php echo $music->likedCount?>&nbsp;<i class="fa fa-heart" aria-hidden="false"></i></span></h6>
                                                      <p class="text-muted m-b-0">
                                                         <?php if($music->artist_name !=''){?>
                                                         <span style="display:block;padding: 1px 0;">Artist : <b><?php echo ucwords($music->artist_name)?> </b></span>
                                                         <?php }
                                                            if($music->album_name !=''){
                                                            ?>
                                                         <span style="display:block;padding: 1px 0;">Album : <b><?php echo ucwords($music->album_name)?> </b></span>
                                                         <?php }
                                                            if($music->movie_name !=''){
                                                            ?>
                                                         <span style="display:block;padding: 1px 0;">Movie : <b><?php echo ucwords($music->movie_name)?> </b></span>
                                                         <?php }?>
                                                      </p>
                                                   </div>
                                                </div>
                                             </div>
                                             <?php } } else {
                                                echo "<br><h6>No Item is in list yet!</h6>";
                                                }?>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div id="styleSelector">
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </body>
   <script type="text/javascript" src="<?php echo base_url()?>assets/js/jquery.min.js"></script>
   <script type="text/javascript" src="<?php echo base_url()?>assets/js/bootstrap.min.js"></script>
   <script type="text/javascript" src="<?php echo base_url()?>assets/js/waves.min.js"></script>
   <script type="text/javascript" src="<?php echo base_url()?>assets/js/jquery.slimscroll.js"></script>
   <script type="text/javascript" src="<?php echo base_url()?>assets/js/pcoded.min.js"></script>
   <script type="text/javascript" src="<?php echo base_url()?>assets/js/vertical-layout.min.js"></script>
   <script type="text/javascript" src="<?php echo base_url()?>assets/js/script.js"></script>
</html>