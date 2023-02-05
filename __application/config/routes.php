<?php defined('BASEPATH') or exit('No direct script access allowed');

$route['default_controller'] = 'backendxx';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

//Routing Global
$route['xboxend'] = 'backendxx';
$route['login-app'] = 'login/loginnya';
$route['logout-app'] = 'login/logoutnya';

$route['register-app'] = 'login/register_app';

$route['backoffice-grid/(:any)'] = 'backendxx/get_grid/$1';
$route['backoffice-grid-report/(:any)'] = 'backendxx/get_grid_report/$1';
$route['backoffice-getdatachart'] = 'backendxx/get_chart';
$route['backoffice-status/(:any)'] = 'backendxx/set_flag/$1';
$route['backoffice-form/(:any)'] = 'backendxx/get_form/$1';
$route['backoffice-data/(:any)'] = 'backendxx/getdata/$1';
$route['backoffice-data/(:any)/(:any)'] = 'backendxx/getdata/$1/$2';
$route['backoffice-display/(:any)'] = 'backendxx/getdisplay/$1';
$route['backoffice-report/(:any)/(:any)'] = 'backendxx/get_report/$1/$2';
$route['backoffice-simpan/(:any)'] = 'backendxx/simpandata/$1';
$route['backoffice-getmodul/(:any)/(:any)'] = 'backendxx/modul/$1/$2';

$route['backoffice-cetak/(:any)/(:any)'] = 'backendxx/cetak/$1/$2';
$route['backoffice-cetak/(:any)/(:any)/(:any)'] = 'backendxx/cetak/$1/$2/$3';
//End Routing Global

// Routing Frontend
$route['order'] = 'backendxx/modul/order';
$route['invoice'] = 'backendxx/modul/invoice';

$route['penjual'] = 'user/modul/penjual';
$route['detail_penjual/(:any)'] = 'user/modul/detail_penjual/$1';

$route['pembeli'] = 'user/modul/pembeli';
$route['detail_pembeli/(:any)'] = 'user/modul/detail_pembeli/$1';

$route['transaksi_berlangsung'] = 'backendxx/modul/transaksi_berlangsung';
$route['transaksi_selesai'] = 'backendxx/modul/transaksi_selesai';

$route['bjsdigital-data/(:any)'] = 'backendxx/getdata/$1';
$route['bjsdigital-data/(:any)/(:any)'] = 'backendxx/getdata/$1/$2';

$route['onanmedia-data/(:any)'] = 'user/getdata/$1';
$route['onanmedia-data/(:any)/(:any)'] = 'user/getdata/$1/$2';
// End Routing Frontend
