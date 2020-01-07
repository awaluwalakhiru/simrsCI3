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
|    example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|    https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|    $route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|    $route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|    $route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:    my-controller/index    -> my_controller/index
|        my-controller/my-method    -> my_controller/my_method
 */
$route['default_controller']   = 'auth/login_v';
$route['404_override']         = 'error404/error404_v';
$route['translate_uri_dashes'] = false;

// Route untuk auth
$route['auth']          = 'auth/login_v';
$route['auth/masuk']    = 'auth/login';
$route['auth/daftar_v'] = 'auth/register_v';
$route['auth/daftar']   = 'auth/register';
$route['auth/balik_v']  = 'auth/reset_v';
$route['auth/balik']    = 'auth/reset';
$route['auth/lupa_v']   = 'auth/forget_v';
$route['auth/lupa']     = 'auth/forget';
$route['auth/keluar']     = 'auth/logout';

// route dashboard
$route['beranda'] = 'dashboard/data';
$route['beranda/daftar'] = 'dashboard/list';

// route dokter
$route['dokter'] = 'dokter/dokter_v';
$route['dokter/tambah_v'] = 'dokter/add_v';
$route['dokter/tambah'] = 'dokter/add';
$route['dokter/edit_v/(:any)'] = 'dokter/update_v/$1';
$route['dokter/edit'] = 'dokter/update';
$route['dokter/hapus'] = 'dokter/delete';

// route pasien
$route['pasien'] = 'pasien/pasien_v';
$route['pasien/tambah_v'] = 'pasien/add_v';
$route['pasien/tambah'] = 'pasien/add';
$route['pasien/semua'] = 'pasien/all_pasien';
$route['pasien/edit_v/(:any)'] = 'pasien/update_v/$1';
$route['pasien/edit'] = 'pasien/update';
$route['pasien/hapus/(:any)'] = 'pasien/delete/$1';
$route['pasien/ambil_v'] = 'pasien/import_v';
$route['pasien/ambil'] = 'pasien/import';


// route obat
$route['obat'] = 'obat/obat_v';
$route['obat/semua'] = 'obat/all_obat';
$route['obat/tambah_v'] = 'obat/add_v';
$route['obat/tambah'] = 'obat/add';
$route['obat/edit_v/(:any)'] = 'obat/update_v/$1';
$route['obat/edit'] = 'obat/update';
$route['obat/hapus/(:any)'] = 'obat/delete/$1';

// route poliklinik
$route['poliklinik'] = 'poliklinik/poliklinik_v';
$route['poliklinik/jumlah_v'] = 'poliklinik/add_count';
$route['poliklinik/tambah_v'] = 'poliklinik/add_v';
$route['poliklinik/tambah'] = 'poliklinik/add';
$route['poliklinik/edit_v'] = 'poliklinik/update_v';
$route['poliklinik/edit'] = 'poliklinik/update';
$route['poliklinik/hapus'] = 'poliklinik/delete';

// route rekam medis
$route['rekam'] = 'rekam/rekam_v';
$route['rekam/tambah_v'] = 'rekam/add_v';
$route['rekam/tambah'] = 'rekam/add';
$route['rekam/hapus/(:any)'] = 'rekam/delete/$1';
$route['rekam/edit_v/(:any)'] = 'rekam/update_v/$1';
$route['rekam/edit'] = 'rekam/update';
$route['rekam'] = 'rekam/rekam_v';

// route user
$route['user/bio'] = 'user/profile';
$route['user/atur'] = 'user/settings';
$route['user/edit'] = 'user/update';


// route kredit
$route['kredit'] = 'kredit/created';
