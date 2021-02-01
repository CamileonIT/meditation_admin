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
      <?php include('includes/topbar.php');?>
      
      <div class="pcoded-main-container">
         <div class="pcoded-wrapper">
            <?php include('includes/sidebar.php');?>
            <div class="pcoded-content">
               <div class="page-header card">
                  <div class="row align-items-end">
                     <div class="col-lg-8">
                        <div class="page-header-title">
                           <i class="fa fa-th-list bg-c-blue"></i>
                           <div class="d-inline" id="main_header">
                              <h5>Category</h5>
                           </div>
                        </div>
                     </div>
                     <div class="col-lg-4">
                        <div class="page-header-breadcrumb">
                           <ul class=" breadcrumb breadcrumb-title" id="page_list">
                              <li class="breadcrumb-item">
                                 <a href="<?=base_url()?>admin/dashboard"><i class="fa fa-dashboard"></i></a>
                                 / Category
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
                                 <button type="button" class="btn pull-right btn-info btn-rounded" style="margin-bottom: 10px" data-toggle="modal" data-target="#add-category">Add Category</button>
                                 <div id="add-category" class="modal fade in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                       <div class="modal-content">
                                          <form id="newsms" action="<?=base_url()?>admin/addCategory" method="post" class="form-horizontal form-material" enctype="multipart/form-data">
                                             <div class="modal-header">
                                                <h4 class="modal-title" id="myModalLabel">Add New Category</h4>
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                             </div>
                                             <div class="modal-body">
                                                <div class="form-body">
                                                   <div class="row p-t-20">
                                                      <div class="col-md-12">
                                                         <div class="form-group">
                                                            <label class="control-label">Category Name</label>
                                                            <input type="text" id="name" name="category_name" class="form-control" placeholder=" Name" required value="">
                                                         </div>
                                                      </div>
                                                   </div>
                                                   <div class="row" >
                                                      <div class="col-md-12">
                                                         <div class="form-group">
                                                            <label for="wlocation2" class=" col-form-label"> Add Icon :</label>
                                                            <div class="fallback">
                                                               <input  name="category_icon" type="file"  />
                                                            </div>
                                                         </div>
                                                      </div>
                                                   
                                                   </div>
                                                   <div class="row" >
                                                      <div class="col-md-12">
                                                         <div class="form-group">
                                                            <label for="wlocation2" class=" col-form-label"> Add Banner :</label>
                                                            <div class="fallback">
                                                               <input  name="category_banner" type="file"  />
                                                            </div>
                                                         </div>
                                                      </div>
                                                   
                                                   </div>
                                                </div>
                                             </div>
                                             <div class="modal-footer">
                                                <button type="submit" class="btn btn-success upload_submit"> Add</button>
                                                <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Cancel</button>
                                             </div>
                                          </form>
                                       </div>
                                       <!-- /.modal-content -->
                                    </div>
                                    <!-- /.modal-dialog -->
                                 </div>
                                 <div id="edit-category" class="modal fade in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                       <div class="modal-content">
                                          <form id="newsms" action="<?=base_url()?>admin/editCategory" method="post" class="form-horizontal form-material" enctype="multipart/form-data">
                                             <div class="modal-header">
                                                <h4 class="modal-title" id="myModalLabel">Edit Category</h4>
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                             </div>
                                             <div class="modal-body">
                                                <div class="form-body">
                                                   <div class="row p-t-20">
                                                      <div class="col-md-12">
                                                         <div class="form-group">
                                                            <label class="control-label"> Name</label>
                                                            <input type="hidden" id="edit_id" name="id" class="form-control"  
                                                            >
                                                            <input  type="text" id="edit_name" name="name" class="form-control" placeholder=" Name" readonly>
                                                         </div>
                                                      </div>
                                                   </div>
                                                   <div class="row" >
                                                      <div class="col-md-6">
                                                         <div class="form-group">
                                                            <label for="wlocation2" class=" col-form-label"> Current Icon :</label>
                                                            <div class="fallback">
                                                               <img id="edit_icon"  style="width: 50px">
                                                            </div>
                                                         </div>
                                                      </div>
                                                      <div class="col-md-6">
                                                         <div class="form-group">
                                                            <label for="wlocation2" class=" col-form-label"> Edit Icon :</label>
                                                            <div class="fallback">
                                                               <input  name="category_icon" type="file"  />
                                                            </div>
                                                         </div>
                                                      </div>
                                                   </div>
                                                   
                                                   <div class="row" >
                                                      <div class="col-md-6">
                                                         <div class="form-group">
                                                            <label for="wlocation2" class=" col-form-label"> Current Banner :</label>
                                                            <div class="fallback">
                                                               <img id="edit_banner"  style="width: 100px">
                                                            </div>
                                                         </div>
                                                      </div>
                                                      <div class="col-md-6">
                                                         <div class="form-group">
                                                            <label for="wlocation2" class=" col-form-label"> Edit Banner :</label>
                                                            <div class="fallback">
                                                               <input  name="category_banner" type="file"  />
                                                            </div>
                                                         </div>
                                                      </div>
                                                   </div>
                                                   
                                                </div>
                                             </div>
                                             <div class="modal-footer">
                                                <button type="submit" class="btn btn-success upload_submit"> Save</button>
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
                                          <tr style="background-color : #ECF5FF">
                                             <th style="width: 25px">#</th>
                                             <th>Name</th>
                                             <th>Image</th>
                                             <th>Banner</th>
                                             <th>Musics</th>
                                             <th>Status</th>
                                             <th>In Slider</th>
                                             <th>Action</th>
                                          </tr>
                                       </thead>
                                       <tfoot>
                                          <tr>
                                             <th>#</th>
                                             <th>Name</th>
                                             <th>Image</th>
                                             <th>Banner</th>
                                             <th>Musics</th>
                                             <th>Status</th>
                                             <th>In Slider</th>
                                             <th></th>
                                          </tr>
                                       </tfoot>
                                       <tbody style="text-align: center;">
                                          <input  type="text" style="display: none;" class="userhidden" id="userhidden">
                                          <?php $i=0; 
                                             foreach($category as $cat) { $i++; 
                                                ?>
                                          <tr id="<?php echo  $i; ?>" style="line-height: 25px;">
                                             <td><?php echo  $i; ?></td>
                                             <td><?php echo $cat->category_name ?></td>
                                             <td>
                                                <img src='<?php echo base_url().'/'.$cat->category_icon?>' style="width: 65px">
                                             </td>
                                             <td>
                                                <?php if($cat->category_banner != ''){?>
                                                <img src='<?php echo base_url().'uploads/category/banner/'.$cat->category_banner?>' style="width: 150px">
                                             <?php } ?>
                                             </td>
                                             <td>
                                                <a href="<?=base_url()?>admin/musics?category=<?php echo $cat->category_id?>">
                                                <span class="pcoded-badge label label-info"><?php echo $cat->musics ?></span>
                                                </a>
                                             </td>
                                             <td>
                                               <div class="custom-control custom-switch m-t-5">
                                               <input type="checkbox" class="custom-control-input" id='customSwitch<?php echo  $cat->category_id?>' <?php echo ($cat->category_status=="ENABLE") ? "checked" : "" ?> onchange="var status='<?php echo $cat->category_status ?>'; var id =<?php echo  $cat->category_id?>; $.post('<?php echo base_url();?>admin/changeListStatus/category',{id,status},function(data){$('.loader-bg').css('display','block');location.reload();});">
                                               <label class="custom-control-label" for='customSwitch<?php echo  $cat->category_id?>'></label>
                                             </div>
                                                
                                             </td>

                                             <td>
                                               <div class="custom-control custom-switch m-t-5">
                                               <input type="checkbox" class="custom-control-input" id='customSwitchSlider<?php echo  $cat->category_id?>' <?php echo ($cat->category_is_in_slider=="ENABLE") ? "checked" : "" ?> onchange="var slider_status='<?php echo $cat->category_is_in_slider ?>'; var id =<?php echo  $cat->category_id?>; $.post('<?php echo base_url();?>admin/changeCategorySliderStatus',{id,slider_status},function(data){$('.loader-bg').css('display','block');location.reload();});">
                                               <label class="custom-control-label" for='customSwitchSlider<?php echo  $cat->category_id?>'></label>
                                             </div>
                                                
                                             </td>
                                             <td><a data-toggle="modal" data-target="#edit-category" class="edit_cat" id="<?php echo $cat->category_id.'|'.$cat->category_name.'|'.$cat->category_icon.'|'.$cat->category_banner?>" style="cursor: pointer;">
                                                <span class="pcoded-badge label label-primary"><i class="fa fa-edit"></i></span>
                                                </a>
                                                <a class="delete_cat" id="<?php echo $cat->category_id?>" style="cursor: pointer;">
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
      </div>
    </div>
   </body>
   <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
   <script type="text/javascript" src="//cdn.datatables.net/1.10.7/js/jquery.dataTables.min.js"></script>
   <script type="text/javascript" src="//code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
   <script type="text/javascript" src="<?=base_url()?>assets/js/bootstrap.min.js"></script>
   <script type="text/javascript" src="<?=base_url()?>assets/js/waves.min.js"></script>
   <script type="text/javascript" src="<?=base_url()?>assets/js/jquery.slimscroll.js"></script>
   <script type="text/javascript" src="<?=base_url()?>assets/js/jquery.dataTables.min.js"></script>
   <script type="text/javascript" src="<?=base_url()?>assets/js/dataTables.buttons.min.js"></script>
   <script type="text/javascript" src="<?=base_url()?>assets/js/dataTables.keyTable.min.js"></script>
   <script type="text/javascript" src="<?=base_url()?>assets/js/dataTables.bootstrap4.min.js"></script>
   <script type="text/javascript" src="<?=base_url()?>assets/js/dataTables.responsive.min.js"></script>
   <script type="text/javascript" src="//mpryvkin.github.io/jquery-datatables-row-reordering/1.2.2/jquery.dataTables.rowReordering.js"></script>
   <script type="text/javascript" src="<?=base_url()?>assets/js/responsive.bootstrap4.min.js"></script>
   <script type="text/javascript" src="<?=base_url()?>assets/js/data-table-custom.js"></script>
   <script type="text/javascript" src="<?=base_url()?>assets/js/key-table-custom.js"></script>
   <script type="text/javascript" src="<?=base_url()?>assets/js/pcoded.min.js"></script>
   <script type="text/javascript" src="<?=base_url()?>assets/js/vertical-layout.min.js"></script>
   <script type="text/javascript" src="<?=base_url()?>assets/js/script.js"></script>
   <script type="text/javascript" src="<?=base_url()?>assets/js/sweetalert.min.js"></script>
   <script type="text/javascript">
      $(document).ready(function(){
          $('.edit_cat').click(function(){
            var id = $(this).attr('id');
            var result = id.split("|");
            var cat_id = result[0];
            var name = result[1];
            var icon= result[2];
            var banner= result[3];
            var base_url = '<?php echo base_url();?>';
            

            $('#edit_id').attr('value',cat_id);
            $('#edit_name').attr('value',name);
            $('#edit_icon').attr('src',base_url+icon);
            if(banner != '')
               $('#edit_banner').attr('src',base_url+'uploads/category/banner/'+banner);
          });
          
          !function($) {
          "use strict";
          var SweetAlert = function() {};
          SweetAlert.prototype.init = function() {
          $('.delete_cat').click(function(){
              var id= $(this).attr('id');
            swal({   
              title: "Are you sure?",   
              text: "You will not be able to recover this Categories Record and Categories Music Record!",   
              type: "warning",   
              showCancelButton: true,   
              confirmButtonColor: "#DD6B55",   
              confirmButtonText: "Yes, delete it!",   
              closeOnConfirm: false 
            }, 
            function(){
              var dataString =  "cat_id=" + id ;
              $.ajax({
                type: "POST",
                url: "<?php echo base_url();?>admin/deleteCategory",
                data: dataString,
                cache: false,
                success: function(data)
                { 
                     swal("Deleted!", "Category Record has been deleted.", "success"); 
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