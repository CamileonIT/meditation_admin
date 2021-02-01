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
                           <i class="fa fa-users bg-c-blue"></i>
                           <div class="d-inline" id="main_header">
                              <h5>Users</h5>
                           </div>
                        </div>
                     </div>
                     <div class="col-lg-4">
                        <div class="page-header-breadcrumb">
                           <ul class=" breadcrumb breadcrumb-title" id="page_list">
                              <li class="breadcrumb-item">
                                 <a href="<?=base_url()?>admin"><i class="fa fa-dashboard"></i></a>
                                 / Users
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
                                 <div class="dt-responsive table-responsive">
                                    <table id="footer-search" class="excel-bg table table-bordered nowrap">
                                       <thead>
                                          <tr>
                                             <th style="width : 40px">Id</th>
                                             <th>Name</th>
                                             <th>Image</th>
                                             <th>Email</th>
                                             <th>Playlists</th>
                                          </tr>
                                       </thead>
                                       <tfoot>
                                          <tr>
                                             <th>Id</th>
                                             <th>Name</th>
                                             <th>Image</th>
                                             <th>Email</th>
                                             <th>Playlists</th>
                                          </tr>
                                       </tfoot>
                                       <tbody style="text-align: center;" id="invoice_api">
                                          <input  type="text" style="display: none;" class="userhidden" id="userhidden">
                                          <?php ; 
                                           foreach($users as $user) {
                                           ; 
                                             ?>
                                          <tr>
                                             <td><?php echo  $user->user_id; ?></td>
                                             <td><?php echo $user->user_name ?></td>
                                             <td>
                                                <?php if($user->user_profile_pic != ''){?>
                                                <img src='<?php echo base_url("uploads/user/".$user->user_profile_pic)?>' style="width: 65px;height: 65px; border-radius: 50%">
                                                <?php } ?></td>
                                             <td><?php echo $user->user_email;?></td>
                                             <td>
                                            <?php foreach($user->playlists as $playlist){?>     
                                                 <a href="<?=base_url()?>admin/musics?playlist=<?php echo $playlist->user_playlist_id?>" class="btn btn-success waves-effect waves-light btn-mini m-10" style="font-size:14px">
                                                     <?php echo $playlist->user_playlist_name?>
                                                     <span class="badge"><?php echo $playlist->playlist_music_count?></span>
                                                
                                                </a>
                                                <br>
                                            <?php } ?>
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
</html>