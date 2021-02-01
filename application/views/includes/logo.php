<?php $settings = $this->db->get('settings')->row();

?>
<meta name="author" content="">
<meta name="description" content="">
<meta http-equiv="Content-Type"content="text/html;charset=UTF-8"/>
<meta name="viewport"content="width=device-width, initial-scale=1.0">
<title><?php echo $settings->app_name?></title>
<link rel="icon" href="<?=base_url()?>assets/images/<?php echo $settings->app_logo?>" type="image/x-icon">
<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Quicksand:500,700" rel="stylesheet">