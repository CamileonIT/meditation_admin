<nav class="navbar header-navbar pcoded-header">
   <div class="navbar-wrapper">
      <div class="navbar-logo">
         <a href="<?=base_url()?>admin">
         <img alt="Music App" src="<?=base_url()?>/assets/images/logo.png">
         &nbsp;         &nbsp;
         <span><?php echo $settings->app_name?></span>
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