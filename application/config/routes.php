<?php
defined('BASEPATH') OR exit('Akses langsung tidak diizinkan.');

$route['default_controller'] = 'gambar';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['gambar'] = 'gambar/index';
$route['gambar/tambah'] = 'gambar/tambah';
$route['gambar/simpan'] = 'gambar/simpan';
$route['gambar/detail/(:num)'] = 'gambar/detail/$1';
$route['gambar/edit/(:num)'] = 'gambar/edit/$1';
$route['gambar/update/(:num)'] = 'gambar/update/$1';
$route['gambar/hapus/(:num)'] = 'gambar/hapus/$1';
