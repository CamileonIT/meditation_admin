<!DOCTYPE html>
<html style="height : 100%;">
   <head>
      <meta name="author" content="">
      <meta name="description" content="">
      <meta http-equiv="Content-Type"content="text/html;charset=UTF-8"/>
      <meta name="viewport"content="width=device-width, initial-scale=1.0">
      <title>Music App | Login</title>
      <link rel="icon" href="<?=base_url()?>/assets/images/1.png" type="image/x-icon">
      <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" rel="stylesheet">
      <link href="https://fonts.googleapis.com/css?family=Quicksand:500,700" rel="stylesheet">
      <link rel="stylesheet" type="text/css" href="<?=base_url()?>/assets/css/bootstrap.min.css">
      <link rel="stylesheet" type="text/css" href="<?=base_url()?>/assets/css/waves.min.css" >
      <link rel="stylesheet" type="text/css" href="<?=base_url()?>/assets/css/feather.css">
      <link rel="stylesheet" type="text/css" href="<?=base_url()?>/assets/css/themify-icons.css">
      <link rel="stylesheet" type="text/css" href="<?=base_url()?>/assets/css/icofont.css">
      <link rel="stylesheet" type="text/css" href="<?=base_url()?>/assets/css/font-awesome.min.css">
      <link rel="stylesheet" type="text/css" href="<?=base_url()?>/assets/css/style.css">
      <link rel="stylesheet" type="text/css" href="<?=base_url()?>/assets/css/widget.css">
      <link rel="stylesheet" type="text/css" href="<?=base_url()?>/assets/css/pages.css">
   </head>
   <body themebg-pattern="theme6" >
      <section class="login-block">
         <div class="container-fluid">
            <div class="row">
               <div class="col-sm-12">
                  <form class="md-float-material form-material" action="<?=base_url()?>login/loginprocess" method="post">
                     <div class="text-center">
                        <h3><img alt="Music App" src="<?=base_url()?>/assets/images/logo.png"></h3>
                     </div>
                     <div class="auth-box card">
                        <div class="card-block">
                           <div class="row m-b-20">
                              <div class="col-md-12">
                                 <h3 class="text-center txt-primary">Sign In</h3>
                              </div>
                           </div>
                           <?php if($this->session->flashdata('error')){ ?>
                           <div id="error"  class="alert alert-danger background-danger">
                              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                              <i class="icofont icofont-close-line-circled text-white"></i>
                              </button>
                              <strong>Error!</strong>  <span id="error_msg">Incorrect Username or Password.</span>
                           </div>
                           <?php } ?>
                           <div class="form-group form-primary">
                              <input type="text" name="user_name" id="user_name" class="form-control" required>
                              <span class="form-bar"></span>
                              <label class="float-label">User Name</label>
                           </div>
                           <div class="form-group form-primary">
                              <input type="password" name="password" id="pass" class="form-control" required="">
                              <span class="form-bar"></span>
                              <label class="float-label">Password</label>
                           </div>
                           <div class="row m-t-25 text-left">
                              <div class="col-12">
                                 <div class="forgot-phone text-right float-right">
                                    <a href="auth-reset-password.html" class="text-right f-w-600"> Forgot Password?</a>
                                 </div>
                              </div>
                           </div>
                           <div class="row m-t-30">
                              <div class="col-md-12">
                                 <button type="submit" class="btn btn-login btn-md btn-block waves-effect text-center m-b-20">LOGIN</button>
                              </div>
                           </div>
                        </div>
                     </div>
                  </form>
               </div>
            </div>
         </div>
      </section>
      <script type="text/javascript" src="<?=base_url()?>/assets/js/jquery.min.js"></script>
      <script type="text/javascript" src="<?=base_url()?>/assets/js/jquery-ui.min.js"></script>
      <script type="text/javascript" src="<?=base_url()?>/assets/js/popper.min.js"></script>
      <script type="text/javascript" src="<?=base_url()?>/assets/js/bootstrap.min.js"></script>
      <script type="text/javascript" src="<?=base_url()?>/assets/js/waves.min.js"></script>
      <script type="text/javascript" src="<?=base_url()?>/assets/js/jquery.slimscroll.js"></script>
      <script type="text/javascript" src="<?=base_url()?>/assets/js/modernizr.js"></script>
      <script type="text/javascript" src="<?=base_url()?>/assets/js/css-scrollbars.js"></script>
      <script type="text/javascript" src="<?=base_url()?>/assets/js/common-pages.js"></script>
   </body>
</html>