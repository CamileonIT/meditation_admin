<!DOCTYPE html>
<html>
   <head>
      <meta name="author" content="">
      <meta name="description" content="">
      <meta http-equiv="Content-Type"content="text/html;charset=UTF-8"/>
      <meta name="viewport"content="width=device-width, initial-scale=1.0">
      <title>Music App | Admin</title>
      <link rel="icon" href="<?=base_url()?>assets/images/1.png" type="image/x-icon">
      <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" >
      <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Quicksand:500,700" rel="stylesheet">
      <link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/css/bootstrap.min.css">
      <link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/css/waves.min.css" >
      <link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/css/feather.css">
      <link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/css/font-awesome.min.css">
      <link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/css/dataTables.bootstrap4.min.css">
      <link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/css/buttons.dataTables.min.css">
      <link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/css/responsive.bootstrap4.min.css">
      <link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/css/sweetalert.css" >
      <link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/css/pages.css">
      <link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/css/style.css">
      <style>
         table#no-border td {
         border-width: 0px;
         padding: 3px;
         }
      </style>
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
               <img alt="Music App" src="<?=base_url()?>assets/images/logo.png">
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
                        <li class="active pcoded-trigger">
                           <a href="javascript:void(0)" class="waves-effect waves-dark">
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
                           <i class="fa fa-music bg-c-blue"></i>
                           <div class="d-inline" id="main_header">
                              <h5>Musics</h5>
                           </div>
                        </div>
                     </div>
                     <div class="col-lg-4">
                        <button type="button" class="btn pull-right btn-primary btn-rounded" onclick="location.href='<?=base_url()?>admin/uploadMusic';" style="margin-top: 10px" >Upload New Music</button>
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
                                 <div class="col-sm-12 col-xl-11 col-lg-11 m-b-30 pull-left">
                                    <div class="row">
                                       <div class="col-sm-12 col-xl-3 col-lg-3">
                                          <label class="control-label pull-left mb-0"> Category</label><br>
                                          <select id="categories" class="form-control" style="margin-top: 10px;">
                                             <option val="">All Categories</option>
                                             <?php foreach($categories as $category){
                                                ?>
                                             <option val="<?php echo $category->category_id?>"><?php echo $category->category_name?></option>
                                             <?php } ?>
                                          </select>
                                       </div>
                                 <!--      <div class="col-sm-12 col-xl-3 col-lg-3">-->
                                 <!--         <label class="control-label pull-left mb-0"> Artist</label><br>-->
                                 <!--         <select id="artists" class="form-control " style="margin-top: 10px;">-->
                                 <!--            <option val="">All Artists</option>-->
                                 <!--            <?php foreach($artists as $artist){?>-->
                                 <!--            <option val="<?php echo $artist->artist_id?>"><?php echo $artist->artist_name?></option>-->
                                 <!--            <?php } ?>-->
                                 <!--         </select>-->
                                 <!--      </div>-->
                                 <!--      <div class="col-sm-12 col-xl-3 col-lg-3">-->
                                 <!--         <label class="control-label pull-left mb-0">Album</label><br>-->
                                 <!--         <select id="albums" class="form-control " style="margin-top: 10px;">-->
                                 <!--            <option val="">All Albums</option>-->
                                 <!--            <?php foreach($albums as $album){?>-->
                                 <!--            <option val="<?php echo $album->album_id?>"><?php echo $album->album_name?></option>-->
                                 <!--            <?php } ?>-->
                                 <!--         </select>-->
                                 <!--      </div>-->
                                 <!--      <div class="col-sm-12 col-xl-3 col-lg-3">-->
                                 <!--         <label class="control-label pull-left mb-0"> Movie</label><br>-->
                                 <!--         <select id="movies" class="form-control " style="margin-top: 10px;">-->
                                 <!--            <option val="">All Movies</option>-->
                                 <!--            <?php foreach($movies as $movie){?>-->
                                 <!--            <option val="<?php echo $movie->movie_id?>"><?php echo $movie->movie_name?></option>-->
                                 <!--            <?php } ?>-->
                                 <!--         </select>-->
                                 <!--      </div>-->
                                 <!--   </div>-->
                                 <!--</div>-->
                                 <div class="col-sm-12 col-xl-1 col-lg-1 m-b-30 pull-right">
                                    <button type="button" class="btn btn-info btn-rounded " id="showMusic" style="margin: 10px 0" ><i class="fa fa-search"></i></button>
                                 </div>
                                 <div class="dt-responsive table-responsive">
                                    <table id="footer-search" class="excel-bg table table-bordered nowrap">
                                       <thead>
                                          <tr>
                                             <th>#</th>
                                             <th class="video_name">Name</th>
                                             <th>musics</th>
                                             <th>Duration</th>
                                             <th>Likes</th>
                                             <th>Status</th>
                                             <th>Action</th>
                                          </tr>
                                       </thead>
                                       <tfoot>
                                          <tr>
                                             <th style="width: 60px">#</th>
                                             <th>Name</th>
                                             <th style="width: 100px;">Image</th>
                                             <th style="width: 40px;">Duration</th>
                                             <th style="width: 40px;">Likes</th>
                                             <th style="width: 40px;">Status</th>
                                             <th style="width: 30px;"></th>
                                          </tr>
                                       </tfoot>
                                       <tbody style="text-align: center;" id="invoice_api">
                                          <input  type="text" style="display: none;" class="userhidden" id="userhidden">
                                          <?php $i=0;
                                             foreach($musics as $music) { 
                                                $i++;
                                               ?>
                                          <tr>
                                             <td><?php echo $i; ?></td>
                                             <td style="text-align : left;">
                                                <?php echo "<b>". wordwrap($music->music_title,40,"</br>")."</b>"; ?>
                                                <table id="no-border" style="margin-top : 10px">
                                                   <?php if($music->category_name !=''){
                                                      ?>
                                                   <tr>
                                                      <td>Category</td>
                                                      <td>:  <?php echo $music->category_name ?></td>
                                                   </tr>
                                                   
                                                   
                                                   <?php } ?>
                                                </table>
                                             </td>
                                             <td>
                                                <a href="<?php echo base_url().$music->music_file ?>" target="_blank" style="cursor: pointer;">
                                                <img  class="shadow_img" src='<?php echo base_url($music->music_image);?>' style="width:130px; box-shadow: 0 1px 3px rgba(0, 0, 0, 0.12), 0 1px 2px rgba(0, 0, 0, 0.24)">
                                                </a>
                                             </td>
                                             <td style="line-height: 30px;">
                                                <?php echo $music->music_duration;
                                                   if($music->music_size !='')
                                                        echo '<br>('.$music->music_size.')'?>
                                             </td>
                                             <td>
                                                <span class="pcoded-badge label label-danger"><?php echo $music->likes?>&nbsp;<i class="fa fa-heart" aria-hidden="false"></i></span>
                                             </td>
                                             <td>
                                                <div class="custom-control custom-switch">
                                                   <input type="checkbox" class="custom-control-input" id='customSwitch<?php echo $music->music_id?>' <?php echo ($music->music_status=="ENABLE") ? "checked" : "" ?> onchange="var status='<?php echo $music->music_status ?>'; var id =<?php echo $music->music_id?>; $.post('<?php echo base_url();?>admin/changeMusicStatus',{id,status},function(data){location.reload();});">
                                                   <label class="custom-control-label" for='customSwitch<?php echo $music->music_id?>'></label>
                                                </div>
                                             </td>
                                             <td>
                                                <a href="<?php echo base_url().$music->music_file ?>" target="_blank" style="cursor: pointer;">
                                                <span class="pcoded-badge label label-primary"><i class="fa fa-music"></i></span>
                                                </a>
                                                <a class="delete_music" id="<?php echo $music->music_id?>" style="cursor: pointer;">
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
   <!--<script type="text/javascript" src="<?=base_url()?>assets/js/ckin.js"></script>-->
   <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
   <script type="text/javascript">
      $(document).ready(function(){
        $('#errormsg').hide();
        $('#successmsg').hide();
        $('.loader-bg').hide();
        
        $('#showMusic').click(function(){
            $('.loader-bg').show();
            var cat_id=$('#categories').find(':selected').attr('val');
            var artist_id=$('#artists').find(':selected').attr('val');
            var album_id=$('#albums').find(':selected').attr('val');
            var movie_id=$('#movies').find(':selected').attr('val');
            
            var playlist_id=$.urlParam('playlist');
       
            window.location.replace('?playlist='+playlist_id+'&category='+cat_id+'&artist='+artist_id+'&album='+album_id+'&movie='+movie_id);
        });
      
      $.urlParam = function(name){
          
         var results = new RegExp('[\?&]' + name + '=([^&#]*)').exec(window.location.href);
         if(results)
            return results[1] ;
        else 
            return 0;
      }
      $('select#categories option[val ="'+$.urlParam('category')+'"]').attr('selected','');
      $('select#artists option[val ="'+$.urlParam('artist')+'"]').attr('selected','');
      $('select#albums option[val ="'+$.urlParam('album')+'"]').attr('selected','');
      $('select#movies option[val ="'+$.urlParam('movie')+'"]').attr('selected','');
      
          !function($) {
        "use strict";
        var SweetAlert = function() {};
        SweetAlert.prototype.init = function() {
          //Warning Message
          $('.delete_music').click(function(){
              var id= $(this).attr('id');
      
            swal({   
              title: "Are you sure?",   
              text: "You will not be able to recover this Music Record and Data!",   
              type: "warning",   
              showCancelButton: true,   
              confirmButtonColor: "#DD6B55",   
              confirmButtonText: "Yes, delete it!",   
              closeOnConfirm: false 
            }, 
            function(){
              
              var dataString =  "music_id=" + id ;
              $.ajax({
                type: "POST",
                url: "<?php echo base_url();?>admin/deleteMusic",
                data: dataString,
                cache: false,
                success: function(data)
                {
                     swal("Deleted!", "Book has been deleted.", "success")
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