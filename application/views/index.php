<!DOCTYPE html>
<html>
   <head>
      <?php include('includes/logo.php');?>
      
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
         <?php include('includes/topbar.php');?>
            
            <div class="pcoded-main-container">
               <div class="pcoded-wrapper">
                  <?php include('includes/sidebar.php');?>
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
                                    <div class="col-sm-12 col-lg-4 col-md-4 col-xl-4">
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
                                    <div class="col-sm-12 col-lg-4 col-md-4 col-xl-4">
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
                                    <div class="col-sm-12 col-lg-4 col-md-4 col-xl-4">
                                       <div class="card prod-p-card card-green">
                                          <div class="card-body">
                                             <a href="<?=base_url()?>admin/category">
                                                <div class="row align-items-center m-b-30">
                                                   <div class="col">
                                                      <h6 class="m-b-5 text-white">Total Categories</h6>
                                                      <h3 class="m-b-0 f-w-700 text-white"><?php echo $category_count?></h3>
                                                   </div>
                                                   <div class="col-auto">
                                                      <i class="fa fa-address-book text-c-light-blue f-18"></i>
                                                   </div>
                                                </div>
                                                <p class="m-b-0 text-white"><span class="label label-light-blue m-r-10"><b><?php echo $current_month_category_count?></b></span>From This Month</p>
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
                                                         <?php if($music->category_name !=''){?>
                                                         <span style="display:block;padding: 1px 0;">Category : <b><?php echo ucwords($music->category_name)?> </b></span>
                                                         <?php }
                                                           
                                                            ?>
                                                         
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
                                                         <?php if($music->category_name !=''){?>
                                                         <span style="display:block;padding: 1px 0;">Category : <b><?php echo ucwords($music->category_name)?> </b></span>
                                                         <?php }
                                                            
                                                            ?>
                                                         
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