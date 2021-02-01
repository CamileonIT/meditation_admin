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
                                    <h5>App Home Screen</h5>
                                 </div>
                              </div>
                           </div>
                           <div class="col-lg-4">
                              <div class="page-header-breadcrumb">
                                 <ul class=" breadcrumb breadcrumb-title" id="page_list">
                                    <li class="breadcrumb-item">
                                       <a href="<?=base_url()?>admin/dashboard"><i class="fa fa-dashboard"></i></a>
                                       / App Home Screen
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
                                       <div id="edit-component" class="modal fade in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                          <div class="modal-dialog">
                                             <div class="modal-content">
                                                <form id="newsms" action="<?=base_url()?>admin/editHomeComponent" method="post" class="form-horizontal form-material" enctype="multipart/form-data">
                                                   <div class="modal-header">
                                                      <h4 class="modal-title" id="myModalLabel">Edit Component</h4>
                                                      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                   </div>
                                                   <div class="modal-body">
                                                      <div class="form-body">
                                                         <div class="row">
                                                            <div class="col-md-12">
                                                               <div class="form-group">
                                                                  <label class="control-label">Component Name</label>
                                                                  <input type="hidden" id="edit_id" name="id" class="form-control">
                                                                  <input type="text" id="edit_name" name="edit_name" class="form-control" placeholder=" Name" readonly >
                                                               </div>
                                                            </div>
                                                         </div>
                                                         <div class="row" >
                                                            <div class="col-md-12">
                                                               <div class="form-group">
                                                                  <label class="control-label"> Components Description</label>
                                                                  <div class="fallback">
                                                                     <textarea type="text" id="edit_description" name="edit_description" class="form-control" placeholder=" Description" ></textarea>
                                                                  </div>
                                                               </div>
                                                            </div>
                                                         </div>
                                                         <div class="row" >
                                                            <div class="col-md-12">
                                                               <div class="form-group">
                                                                  <label class="control-label"> Display Items Count</label>
                                                                  <div class="fallback">
                                                                     <input type="text" id="edit_display_count" name="display_count" class="form-control" placeholder=" No. of Item " >
                                                                  </div>
                                                               </div>
                                                            </div>
                                                         </div>
                                                         <div class="row" >
                                                            <div class="col-md-12">
                                                               <div class="form-group">
                                                                  <label class="control-label"> Components Display Order</label>
                                                                  <div class="fallback">
                                                                     <input type="text" id="edit_order" name="edit_order" class="form-control" placeholder="Display Order" >
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
                                                   <th>Order</th>
                                                   <th>Name</th>
                                                   <th>Description</th>
                                                   <th>Disp. Items</th>
                                                   <th>Status</th>
                                                   <th>Action</th>
                                                </tr>
                                             </thead>
                                             <tfoot>
                                                <tr>
                                                   <th>Order</th>
                                                   <th>Name</th>
                                                   <th>Description</th>
                                                   <th>Disp. Items</th>
                                                   <th>Status</th>
                                                   <th>Action</th>
                                                </tr>
                                             </tfoot>
                                             <tbody style="text-align: center;">
                                                <input  type="text" style="display: none;" class="userhidden" id="userhidden">
                                                <?php $i=0; 
                                                   foreach($home_components as $component) { $i++; 
                                                      ?>
                                                <tr id="<?php echo  $i; ?>" style="line-height: 25px;">
                                                   <td><?php echo $component->home_components_order?></td>
                                                   <td><?php echo $component->home_components_name ?></td>
                                                   <td>
                                                      <?php echo wordwrap($component->home_components_description,35,"</br>"); ?>
                                                   </td>
                                                   <td><?php echo $component->home_components_item_display_count?></td>
                                                   <td>
                                                      <div class="custom-control custom-switch m-t-5">
                                                         <input type="checkbox" class="custom-control-input" id='customSwitch<?php echo  $component->home_components_id?>' <?php echo ($component->home_components_status=="ENABLE") ? "checked" : "" ?> onchange="var home_components_status='<?php echo ($component->home_components_status) == 'ENABLE' ? 'DISABLE' : 'ENABLE' ?>'; var home_components_id =<?php echo  $component->home_components_id?>; $.post('<?php echo base_url();?>admin/changeComponentStatus',{home_components_id,home_components_status},function(data){$('.loader-bg').css('display','block');location.reload();});">
                                                         <label class="custom-control-label" for='customSwitch<?php echo  $component->home_components_id?>'></label>
                                                      </div>
                                                   </td>
                                                   <td><a data-toggle="modal" data-target="#edit-component" class="edit_com" id="<?php echo $component->home_components_id.'|'.$component->home_components_name.'|'.$component->home_components_description.'|'.$component->home_components_item_display_count.'|'.$component->home_components_order?>" style="cursor: pointer;">
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
          $('.edit_com').click(function(){
            var id = $(this).attr('id');
            var result = id.split("|");
            var cat_id = result[0];
            var name = result[1];
            var description= result[2];
            var display_count= result[3];
            var order= result[4];
            $('#edit_id').attr('value',cat_id);
            $('#edit_name').attr('value',name);
            $('#edit_description').text(description);
            $('#edit_display_count').attr('value',display_count);
            $('#edit_order').attr('value',order);
            
          });
          
      });
   </script>
</html>