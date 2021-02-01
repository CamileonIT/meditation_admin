<nav class="pcoded-navbar">
   <div class="nav-list">
      <div class="pcoded-inner-navbar main-menu">
         <ul class="pcoded-item pcoded-left-item">
             <li class="<?php if($page == 'index'){ echo 'active pcoded-trigger';}?> ">
               <a href="<?=base_url()?>admin/index" class="waves-effect waves-dark">
               <span class="pcoded-micon"><i class="fa fa-dashboard"></i></span>
               <span class="pcoded-mtext">Dashboard</span>
               </a>
            </li>
            <li class="<?php if($page == 'category'){ echo 'active pcoded-trigger';}?>">
               <a href="<?=base_url()?>admin/category" class="waves-effect waves-dark">
               <span class="pcoded-micon">
               <i class="fa fa-th-list"></i>
               </span>
               <span class="pcoded-mtext">Category</span>
               </a>
            </li>

            <li class="<?php if($page == 'music'){ echo 'active pcoded-trigger';}?>">
               <a href="<?=base_url()?>admin/musics" class="waves-effect waves-dark">
               <span class="pcoded-micon">
               <i class="fa fa-music"></i>
               </span>
               <span class="pcoded-mtext">Music List</span>
               </a>
            </li>
            <li class="<?php if($page == 'upload_music'){ echo 'active pcoded-trigger';}?>">
               <a href="<?=base_url()?>admin/uploadMusic" class="waves-effect waves-dark">
               <span class="pcoded-micon">
               <i class="fa fa-upload"></i>
               </span>
               <span class="pcoded-mtext">Upload Music</span>
               </a>
            </li>
            <li class="<?php if($page == 'user'){ echo 'active pcoded-trigger';}?>">
               <a href="<?=base_url()?>admin/users" class="waves-effect waves-dark">
               <span class="pcoded-micon">
               <i class="fa fa-users"></i>
               </span>
               <span class="pcoded-mtext">Users</span>
               </a>
            </li>
            
            <li class="pcoded-hasmenu  <?php if($page == 'settings'){echo 'pcoded-trigger';}?>">
               <a href="javascript:void(0)" class="waves-effect waves-dark">
               <span class="pcoded-micon">
               <i class="fa fa-cogs"></i>
               </span>
               <span class="pcoded-mtext">Settings</span>
               </a>
               <ul class="pcoded-submenu"  <?php if($page == 'settings'){echo 'style="display:block"';}?>>
                  <li class=" <?php if($page == 'settings'){if($settings_type == 'apphomescreen') echo 'active'; } ?>">
                     <a href="<?=base_url()?>admin/settings?type=apphomescreen" class="waves-effect waves-dark">
                     <span class="pcoded-mtext">App Home Screen</span>
                     </a>
                  </li>
                  
                  <li class=" <?php if($page == 'settings'){if($settings_type == 'notification') echo 'active';}?>">
                     <a href="<?=base_url()?>admin/settings?type=notification" class="waves-effect waves-dark">
                     <span class="pcoded-mtext">Notification</span>
                     </a>
                  </li>
                  <li class=" <?php if($page == 'settings') {if($settings_type == 'ads') echo 'active';}?>">
                     <a href="<?=base_url()?>admin/settings?type=ads" class="waves-effect waves-dark">
                     <span class="pcoded-mtext">Ads</span>
                     </a>
                  </li>
                  
               </ul>
            </li>
            <li class="<?php if($page == 'send_notification'){ echo 'active pcoded-trigger';}?>">
               <a href="<?=base_url()?>admin/sendNotification" class="waves-effect waves-dark">
               <span class="pcoded-micon">
               <i class="fa fa-send"></i>
               </span>
               <span class="pcoded-mtext">Send Notification</span>
               </a>
            </li>
            <li class="<?php if($page == 'api_list'){ echo 'active pcoded-trigger';}?>">
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