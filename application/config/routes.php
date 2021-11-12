<?php
defined('BASEPATH') or exit('No direct script access allowed');

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
$route['default_controller'] = 'home';

// LOGIN
$route['login'] = 'user/login';
$route['admin'] = 'user/login';
$route['obat'] = 'Obat';

// LOGOUT
$route['logout'] = 'user/logout';
$route['access_denied'] = 'user/access_denied';

// ADMIN
$route['admin'] = 'user/admin';

// TRANSAKSI
$route['terbit_masalah'] = 'Transaksi/terbit_masalah';
$route['tambah_pengerjaan'] = 'Transaksi/tambah_pengerjaan';
$route['pengerjaan_tim'] = 'Transaksi/pengerjaan_tim';
$route['daftar_on_going/(:any)'] = 'Transaksi/detail_pengerjaan_on_going/$1';
$route['daftar_completed/(:any)'] = 'Transaksi/detail_pengerjaan_completed/$1';
$route['detail/(:any)'] = 'Transaksi/detail_pengerjaan/$1';

// Laporan
$route['laporan'] = 'Transaksi/laporan_permintaan';

// API LOGIN
$route['api/login'] = 'api/login/aksi_login';

// API TIM
$route['api/daftar_tim'] = 'api/tim/daftar_tim';

// API MERK
$route['api/daftar_merk'] = 'api/merk/daftar_merk';

// API MATERIAL
$route['api/daftar_material'] = 'api/material/daftar_material';

// API DIAMETER
$route['api/daftar_diameter'] = 'api/diameter/daftar_diameter';

// API PERMINTAAN
$route['api/daftar_permintaan'] = 'api/permintaan/daftar_permintaan';
$route['api/daftar_selesai'] = 'api/permintaan/daftar_selesai';
$route['api/detail_permintaan'] = 'api/permintaan/detail_permintaan';
$route['api/input_permintaan'] = 'api/permintaan/input_permintaan';


$route['api'] = 'api/testapi';
$route['api/tim'] = 'api/testapi/tim';


$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
