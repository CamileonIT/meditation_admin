<?php
defined('BASEPATH') OR exit('No direct script access allowed');


$route['default_controller'] = 'login';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['/'] = 'login';
$route['my-stripe'] = "StripeSecCon";
$route['stripePost']['post'] = "StripeSecCon/stripePost";
$route['admin/dashboard'] = "Admin";