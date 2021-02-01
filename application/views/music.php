<!DOCTYPE html>
<html>
   <head>
      <?php include('includes/logo.php');?>
      
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
      <?php include('includes/topbar.php');?>
      
      <div class="pcoded-main-container">
         <div class="pcoded-wrapper">
            <?php include('includes/sidebar.php');?>
            
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
            
            var playlist_id=$.urlParam('playlist');
       
            window.location.replace('?playlist='+playlist_id+'&category='+cat_id);
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