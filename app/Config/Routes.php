<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
	require SYSTEMPATH . 'Config/Routes.php';
}

/**
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

/**
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.


// CI4 akan membuat jalur dengan metode requisenya get (pengetikan di url)
// dengan alamat / , / = route atau baseurl localhost/8080
// jadi jika ada yg mengakses routenya maka panggil conttroller home
// dengan method index
// $routes->get('/', 'Home::index');
// jika ingin memimpa method index pada class tertentu bisa menggunaka
// routes contoh $routes->add('/coba', 'Coba::Coba'); maka method yang akan
// terpanggil adlaah method coba tapi lebih aman jika menggunakan get
// menjadi $routes->get('/coba', 'Coba::coba');

// bisa juga langsung function menggunakan close ur, dimana parameter keduanya
// diubah menjadi sebuah function jika alamat tersebut tidak ingin masuk ke
// controller
// contoh $routes->get('/coba', function (){ echo "hello world!"});

// percobaan saat ini menuju Coba controller dengan method Myname
// tapi saat mengakses tidak harus diketikan dulu methodnya
// jadi pengennya langsung memasukan parameternya
// caranya:
// dengan method get dan jika ada user yang menuliskan /coba/
// cara mengambilnya dengan menggunakan placeholder atau template untuk mentyimpan nilai
// dengan lambang (:any) any disini dapat apasaja berupa string,angka, character apapun itu
// arahkan ke controller coba dengan method myName
// tapi nilai nya tidak akan masuk dulu karena harus dimasukan dulu kedalam sebuah method yang
// dituju cara memasukan nilai any kedalam methodnya dengan menggnukan $1, $1 disini adalah
// nilai any atau placeholder ke 1 atau pertama kali muncul atau :any
// :any untuk apapun :num untuk int dan :segment selain slash :alpha hanyan alphabet
// :alphanum hanya alphabet dan num karakter tidak masuk
$routes->get('/Coba/(:any)/(:num)', 'Coba::myName/$1/$2');
// routes diatas akan menjadi sebuah permasalahan karena method yang harusnya bisa diakses
// menjadi tidak bisa diakses maka solusinya adalah membuat sebuah routes baru
$routes->get('/Coba/index', 'Coba::index');
$routes->get('/Coba/myName', 'Coba::myName');
$routes->get('/Users', 'Admin\Users::index'); //untuk jika masuk ke file terlebih dahulu

$routes->get('/', 'Pages::index');

// dokumentasi CodeIgniter 4
$routes->get('/Documentation', 'Home::index');

// routes comic

$routes->get('/Comics/addaNewComic', 'Comics::addaNewComic');
$routes->get('/Comics/(:segment)', 'Comics::detail/$1');


/**
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
