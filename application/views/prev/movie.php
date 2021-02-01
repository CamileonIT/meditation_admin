<!DOCTYPE html>
<html>
   <head>
      <meta name="movie" content="">
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
                        <li class="active pcoded-trigger">
                           <a href="javascript:void(0)" class="waves-effect waves-dark">
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
                           <i class="fa fa fa-vcard bg-c-blue"></i>
                           <div class="d-inline" id="main_header">
                              <h5>Movie</h5>
                           </div>
                        </div>
                     </div>
                     <div class="col-lg-4">
                        <div class="page-header-breadcrumb">
                           <ul class=" breadcrumb breadcrumb-title" id="page_list">
                              <li class="breadcrumb-item">
                                 <a href="<?=base_url()?>admin/dashboard"><i class="fa fa-dashboard"></i></a>
                                 / Movie
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
                                 <button type="button" class="btn pull-right btn-info btn-rounded" style="margin-bottom: 10px" data-toggle="modal" data-target="#add-category">Add Movie</button>
                                 <div id="add-category" class="modal fade in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                       <div class="modal-content">
                                          <form id="addmovie" action="<?=base_url()?>admin/addListItem/movie" method="post" class="form-horizontal form-material" enctype="multipart/form-data">
                                             <div class="modal-header">
                                                <h4 class="modal-title" id="myModalLabel">Add New Movie</h4>
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                             </div>
                                             <div class="modal-body">
                                                <div class="form-body">
                                                   <div class="row p-t-20">
                                                      <div class="col-md-12">
                                                         <div class="form-group">
                                                            <label class="control-label">Movie Name <span class="required">*</span> :</label>
                                                            <input type="text" id="name" name="movie_name" class="form-control" placeholder=" Name" required value="">
                                                         </div>
                                                      </div>
                                                                </div>
                                                   <div class="row">
                                                      <div class="col-md-12">
                                                         <div class="form-group">
                                                            <label class="control-label">Movie Year <span class="required">*</span></label>
                                                            <select name="movie_year" class="form-control input-sm col-sm-12" required="">
                                                             <option value="">-</option>   
                                                             <?php 
                                                            
                                                             for($i =date('Y');$i>= 1950 ; $i--){
                                                                 echo "here";
                                                            echo "<option value=".$i.">".$i."</option>"; 
                                                               
                                                             }
                                                             ?>
                                                            </select>
                                                         </div>
                                                      </div>
                                                                </div>
                                                   <div class="row" >
                                                      <div class="col-md-12">
                                                         <div class="form-group">
                                                            <label for="wlocation2" class=" col-form-label"> Movie Description :</label>
                                                            <div class="fallback">
                                                               <textarea name="movie_description" type="text" class="form-control"></textarea>
                                                            </div>
                                                         </div>
                                                      </div>
                                                   </div>
                                                   <div class="row" >
                                                      <div class="col-md-12">
                                                         <div class="form-group">
                                                            <label for="wlocation2" class=" col-form-label"> Movie Image (Size - 140 *140) <span class="required">*</span> : </label> 
                                                            <div class="fallback">
                                                               <input name="movie_image" type="file" accept=".png, .jpg, .jpeg" class="upload_img" required/>
                                                            </div>
                                                         </div>
                                                      </div>
                                                   </div>
                                                </div>
                                             </div>
                                             <div class="modal-footer">
                                                <button type="submit" class="btn btn-success upload_submit" > Add</button>
                                                <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Cancel</button>
                                             </div>
                                          </form>
                                       </div>
                                       <!-- /.modal-content -->
                                    </div>
                                    <!-- /.modal-dialog -->
                                 </div>
                                 <div id="edit-movie" class="modal fade in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                       <div class="modal-content">
                                          <form id="editmovie" action="<?=base_url()?>admin/editListItem/movie" method="post" class="form-horizontal form-material" enctype="multipart/form-data">
                                             <div class="modal-header">
                                                <h4 class="modal-title" id="myModalLabel">Edit Movie</h4>
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                             </div>
                                             <div class="modal-body">
                                                <div class="form-body">
                                                   <div class="row">
                                                      <div class="col-md-12">
                                                         <div class="form-group">
                                                            <label class="control-label">Movie Name <span class="required">*</span> :</label>
                                                            <input type="hidden" id="edit_id" name="movie_id" class="form-control">
                                                            <input type="text" id="edit_name" name="movie_name" class="form-control" placeholder=" Name" required>
                                                         </div>
                                                      </div>
                                                   </div>
                                                   <div class="row">
                                                      <div class="col-md-12">
                                                         <div class="form-group">
                                                            <label class="control-label">Movie Year <span class="required">*</span></label>
                                                            <select name="movie_year" id="edit_year" class="form-control input-sm col-sm-12" required="">
                                                             <option value="">-</option>   
                                                             <?php 
                                                            
                                                             for($i =date('Y');$i>= 1950 ; $i--){
                                                                 echo "here";
                                                            echo "<option value=".$i.">".$i."</option>"; 
                                                               
                                                             }
                                                             ?>
                                                            </select>
                                                         </div>
                                                      </div>
                                                                </div>
                                                   <div class="row" >
                                                      <div class="col-md-12">
                                                         <div class="form-group">
                                                            <label for="wlocation2" class=" col-form-label"> Movie Description :</label>
                                                            <div class="fallback">
                                                               <textarea id="edit_description" name="movie_description" type="text" class="form-control"></textarea>
                                                            </div>
                                                         </div>
                                                      </div>
                                                   </div>
                                                   <div class="row" >
                                                      <div class="col-md-12">
                                                         <div class="form-group">
                                                            <label for="wlocation2" class=" col-form-label"> Current Movie Image :</label>
                                                            <div class="fallback">
                                                               <img id="edit_image"  style="width: 65px">
                                                            </div>
                                                         </div>
                                                      </div>
                                                   </div>
                                                   <div class="row" >
                                                      <div class="col-md-12">
                                                         <div class="form-group">
                                                                <label for="wlocation2" class=" col-form-label"> Edit Movie Image (Size - 140 *140) :</label>
                                                            <div class="fallback">
                                                              <input name="movie_image" type="file" class="upload_img" accept=".png, .jpg, .jpeg"/>
                                                            </div>
                                                         </div>
                                                      </div>
                                                   </div>
                                                </div>
                                             </div>
                                             <div class="modal-footer">
                                                <button type="submit" class="btn btn-success upload_submit" > Save</button>
                                                <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Cancel</button>
                                             </div>
                                          </form>
                                       </div>
                                       <!-- /.modal-content -->
                                    </div>
                                    <!-- /.modal-dialog -->
                                 </div>
                                 <div class="dt-responsive table-responsive">
                                    <table id="footer-search" class="excel-bg table table-bordered nowrap">
                                       <thead>
                                          <tr>
                                             <th>#</th>
                                             <th>Name</th>
                                             <th>Image</th>
                                             <th>Year</th>
                                             <th>Description</th>
                                             <th>Musics</th>
                                             <th>Likes</th>
                                             <th>Status</th>
                                             <th>Action</th>
                                          </tr>
                                       </thead>
                                       <tfoot>
                                          <tr>
                                             <th>#</th>
                                             <th>Name</th>
                                             <th>Image</th>
                                             <th>Year</th>
                                             <th>Description</th>
                                             <th>Musics</th>
                                             <th>Likes</th>
                                             <th>Status</th>
                                             <th></th>
                                          </tr>
                                       </tfoot>
                                       <tbody style="text-align: center; vertical-align : middle" id="invoice_api">
                                          <input  type="text" style="display: none;" class="userhidden" id="userhidden">
                                          <?php $i=0; 
                                          foreach($movie as $mov) { $i++; 
                                             ?>
                                          <tr>
                                             <td><?php echo  $i; ?></td>
                                             <td><?php echo $mov->movie_name ?></td>
                                             <td>
                                                <img src='<?php echo base_url($mov->movie_image)?>' style="width: 80px; border: 1px solid #7b7b7b; ">
                                             </td>
                                             <td><?php echo $mov->movie_year ?></td>
                                             <td> 
                                             <?php echo wordwrap($mov->movie_description,40,"</br>"); ?>
                                             
                                             </td>
                                             <td>
                                                <a href="<?=base_url()?>admin/musics?movie=<?php echo $mov->movie_id?>">
                                                    
                                                <span class="pcoded-badge label label-info"><?php echo $mov->musics ?></span>
                                                </a>
                                             </td>
                                             <td>
                                                   <span class="pcoded-badge label label-danger"><?php echo $mov->likes?>&nbsp;<i class="fa fa-heart" aria-hidden="false"></i></span>
                                                </td>
                                             <td>
                                               
                                                <div class="custom-control custom-switch m-t-5">
                                               <input type="checkbox" class="custom-control-input" id='customSwitch<?php echo  $mov->movie_id?>' <?php echo ($mov->movie_status=="ENABLE") ? "checked" : "" ?> onchange="var status='<?php echo $mov->movie_status ?>'; var id =<?php echo  $mov->movie_id?>; $.post('<?php echo base_url();?>admin/changeListStatus/movie',{id,status},function(data){$('.loader-bg').css('display','block');location.reload();});">
                                               <label class="custom-control-label" for='customSwitch<?php echo  $mov->movie_id?>'></label>
                                             </div>
                                                
                                             </td>
                                             <td><a data-toggle="modal" class="edit_movie" data-target="#edit-movie" id="<?php echo $mov->movie_id.'|'.$mov->movie_name.'|'.base_url($mov->movie_image).'|'.$mov->movie_year .'|'.$mov->movie_description?>" stovieyle="mcursor: pointer;">
                                                <span class="pcoded-badge label label-primary"><i class="fa fa-edit"></i></span>
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
           
          $('.edit_movie').click(function(){
            var id = $(this).attr('id');
            var result = id.split("|");
            var movie_id = result[0];
            var name = result[1];
            var image= result[2];
            var year= result[3];
            var description= result[4];
            console.log(image);
            $('#edit_id').attr('value',movie_id);
            $('#edit_name').attr('value',name);
            $('#edit_image').attr('src',image+'?version=<?php echo rand(0,1000)?>');
             $("#edit_year").val(year).find("option[value=" + year +"]").attr('selected', true);
            $('#edit_description').val(description);
          });
          
    });
   </script>
</html>