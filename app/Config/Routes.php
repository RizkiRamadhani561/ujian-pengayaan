<?php
use CodeIgniter\Router\RouteCollection;
/** @var RouteCollection $routes */
$routes->setDefaultNamespace('App\\Controllers');
$routes->setDefaultController('Auth');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(false);
$routes->get('/','Auth::index');
$routes->get('login','Auth::index');
$routes->post('login','Auth::attempt');
$routes->get('logout','Auth::logout',['filter'=>'auth']);
$routes->group('', ['filter'=>'auth'], static function(RouteCollection $routes): void {
 $routes->get('dashboard','Clinic::dashboard');
$routes->get('data/(:segment)/baru','Clinic::create/$1');
$routes->post('data/(:segment)/simpan','Clinic::store/$1');
$routes->get('data/(:segment)/(:segment)/edit','Clinic::edit/$1/$2');
$routes->post('data/(:segment)/(:segment)/update','Clinic::update/$1/$2');
$routes->post('data/(:segment)/(:segment)/hapus','Clinic::delete/$1/$2');
$routes->get('data/(:segment)/(:segment)','Clinic::show/$1/$2');
$routes->get('data/(:segment)','Clinic::index/$1');
$routes->get('reports','Clinic::report/berobat');
$routes->get('reports/export/(:segment)','Clinic::export/$1');
$routes->get('reports/(:segment)','Clinic::report/$1');
});
