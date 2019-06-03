<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['admin/room-edit/(:any)'] = 'admin/editroom/$1';
$route['admin/flaw-edit/(:any)'] = 'admin/editflaw/$1';

$route['admin/comp-view/(:any)'] = 'admin/viewcomp/$1';

$route['default_controller'] = 'admin/login';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
