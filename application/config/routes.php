<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'Home';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['adminsystem']='admin/dashboard/index';
$route['adminsystem/admin']='admin/auth/admin';
$route['website/indonesia']='admin/website/indonesia';
$route['website/english']='admin/website/english';
$route['password/(:any)']='member/auth/forgot/$1';
$route['forgotpassword']='member/auth/forgot';

$route['adminsystem/website']='admin/home/index';
$route['adminsystem/website/about']='admin/home/about';
$route['adminsystem/website/layanan']='admin/home/layanan';
$route['adminsystem/website/portofolio']='admin/home/portofolio';
$route['adminsystem/website/team']='admin/home/team';
$route['adminsystem/website/partner']='admin/home/partner';
$route['adminsystem/website/kontak']='admin/home/kontak';
$route['adminsystem/website/footer']='admin/home/footer';

$route['adminsystem/project']='admin/project/index';
$route['adminsystem/member']='admin/member/index';
$route['adminsystem/member/export']='admin/member/export';
$route['adminsystem/order']='order/index';
$route['adminsystem/order/(:any)']='order/show/$1';
$route['adminsystem/order/komisi/(:any)']='order/komisi/$1';
$route['adminsystem/order/komisi/upline/(:any)']='order/komisi_upline/$1';
$route['adminsystem/order/komisi/export/(:any)']='order/export_komisi/$1';
$route['adminsystem/order/komisi/export_perupline/(:any)']='order/export_komisi_perupline/$1';
$route['adminsystem/order/export/(:any)']='order/export/$1';
$route['adminsystem/profile']='admin/profile/index';

$route['adminsystem/login']='admin/auth/index';
$route['login']='member/auth';
$route['member']='member/member_area/index';
$route['member/profile']='member/profile/index';
$route['member/buy']='project/index';
$route['member/riwayat']='project/riwayat';
$route['member/komisi']='komisi/index';
$route['member/network']='komisi/network';
$route['referral/(:any)']='home/index/$1';