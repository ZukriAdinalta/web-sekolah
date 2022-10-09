<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->group('/', function($routes){
    $routes->get('/', 'Home::index');
    $routes->get('/home', 'Home::berita');
    $routes->get('/', 'Home::index');
    $routes->get('/', 'Home::index');
});
$routes->group('/', function($routes) {
    $routes->get('admin', 'Admin::index');
});
$routes->group('/', function($routes) {
    $routes->get('mapel', 'Mapel::index');
    $routes->get('mapel/edit/(:num)', 'Mapel::edit');
    $routes->get('/mapel/delete/(:num)', 'Mapel::delete/$1');
});
$routes->group('/', function($routes) {
    $routes->get('guru', 'Guru::index');
    $routes->get('guru/add', 'Guru::add');
    $routes->get('guru/edit/(:num)', 'Guru::edit/$1');
    $routes->get('/guru/delete/(:num)', 'Guru::delete/$1');
});
$routes->group('/', function($routes) {
    $routes->get('siswa', 'Siswa::index');
    $routes->get('siswa/add', 'Siswa::add');
    $routes->get('siswa/edit/(:num)', 'Siswa::edit/$1');
    $routes->get('/siswa/delete/(:num)', 'Siswa::delete/$1');
});

$routes->group('/', function($routes) {
    $routes->get('sekolah/visiMisi/(:num)', 'Sekolah::visiMisi/$1');
    $routes->get('sekolah/Sejarah/(:num)', 'Sekolah::visiMisi/$1');
    $routes->get('sekolah/Organisasi/(:num)', 'Sekolah::visiMisi/$1');
});

$routes->group('/', function($routes) {
    $routes->get('pengumuman', 'Pengumuman::index');
    $routes->get('pengumuman/add', 'Pengumuman::add');
    $routes->get('pengumuman/edit/(:segment)', 'Pengumuman::edit/$1');
    $routes->get('/pengumuman/delete/(:num)', 'Pengumuman::delete/$1');
});
$routes->group('/', function($routes) {
    $routes->get('berita', 'Berita::index');
    $routes->get('berita/add', 'Berita::add');
    $routes->get('berita/edit/(:segment)', 'Berita::edit/$1');
    $routes->get('/berita/delete/(:num)', 'Berita::delete/$1');
});
$routes->group('/', function($routes) {
    $routes->get('prestasi', 'Prestasi::index');
    $routes->get('prestasi/add', 'Prestasi::add');
    $routes->get('prestasi/edit/(:segment)', 'Prestasi::edit/$1');
    $routes->get('/prestasi/delete/(:num)', 'Prestasi::delete/$1');
});
$routes->group('/', function($routes) {
    $routes->get('down', 'Down::index');
    $routes->post('down/add/(:num)', 'Down::add/$1');
    $routes->post('down/edit/(:num)', 'Down::edit/$1');
    $routes->get('down/delete/(:num)', 'Down::delete/$1');
});
$routes->group('/', function($routes) {
    $routes->get('gallery', 'gallery::index');
    $routes->post('gallery/add/(:num)', 'gallery::add/$1');
    $routes->post('gallery/edit/(:num)', 'gallery::edit/$1');
    $routes->get('gallery/delete/(:num)', 'gallery::delete/$1');
});
$routes->group('/', function($routes) {
    $routes->get('foto/index/(:num)', 'foto::index/$1/$2');
    $routes->post('foto/add/(:num)', 'foto::add/$1');
    $routes->post('foto/edit/(:num)', 'foto::edit/$1');
    $routes->get('foto/delete/(:num)', 'foto::delete/$1');
});
$routes->group('/', function($routes) {
    $routes->get('slide', 'slide::index');
    $routes->post('slide/add/(:num)', 'slide::add/$1');
    $routes->post('slide/edit/(:num)', 'slide::edit/$1');
    $routes->get('slide/delete/(:num)', 'slide::delete/$1');
});



/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}