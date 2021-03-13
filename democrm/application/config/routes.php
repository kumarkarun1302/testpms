<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['contacts'] = 'dashboard/contacts';

$route['sales_view'] = 'dashboard/sales_view';
$route['sales_add'] = 'dashboard/sales_add';
$route['sales_edit/(:any)'] = 'dashboard/sales_add/$1';


$route['leads'] = 'dashboard/leads';
$route['add_leads'] = 'dashboard/leads_add_frm';

$route['leads_edit/(:any)'] = 'dashboard/leads_add_frm/$1';


$route['invoice'] = 'dashboard/invoice';

$route['default_controller'] = 'login';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
