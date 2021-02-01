<!DOCTYPE html>
<html>
   <head>
      <?php include('includes/logo.php');?>
      
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
      <?php include('includes/topbar.php');?>
      
      <div class="pcoded-main-container">
         <div class="pcoded-wrapper">
            <?php include('includes/sidebar.php');?>
            
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
                                                   
                                                   <div class="col-sm-12 col-xl-6 col-lg-6 col-md-6 m-b-30 float-left">
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