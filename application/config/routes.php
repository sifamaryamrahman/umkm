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
|	https://codeigniter.com/userguide3/general/routing.html
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
$route['default_controller'] = 'welcome';
$route['auth/register/save'] = 'auth/register/save';
$route['umkm/dashboard'] = 'Dashboard/dashboard';
$route['umkm/pengguna'] = 'Dashboard/pengguna';
$route['umkm/pengguna1'] = 'Dashboard/pengguna1';
$route['umkm/profil'] = 'Dashboard/profil';
$route['umkm/menunggu'] = 'Dashboard/menunggu';
$route['umkm/pemilik_umkm'] = 'Dashboard/pemilik_umkm';
$route['umkm/data_umkm'] = 'Dashboard/dataumkm';
$route['umkm/kategori'] = 'Dashboard/kategori';
$route['umkm/kategori1'] = 'Dashboard/kategori1';
$route['umkm/platform'] = 'Dashboard/platform';
$route['umkm/platform1'] = 'Dashboard/platform1';
$route['umkm/produk'] = 'Dashboard/produk';
$route['umkm/produk1_menunggu'] = 'Dashboard/produk1_menunggu';
$route['umkm/produk1_disetujui'] = 'Dashboard/produk1_disetujui';
$route['head'] = 'Umkm/report';
$route['umkm/nav'] = 'Dashboard/nav';
$route['umkm/promosi'] = 'Dashboard/promosi';
$route['umkm/promosi1'] = 'Dashboard/promosi1';
$route['/index'] = 'Dashboard/index';
$route['all'] = 'Dashboard/all';
$route['filter'] = 'Dashboard/filter';
$route['umkm/umkm_report'] = 'Umkm/report';
$route['detail/(:num)'] = 'Dashboard/detail/$1';
$route['pumkm/(:any)'] = 'Dashboard/pumkm/$1';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
