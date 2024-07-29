<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/sampel', 'Home::inputData');
$routes->get('/home', 'Decision::index');
$routes->get('/predict/dt', 'Home::predict');
$routes->get('/predict/nb', 'Home::predictNb');

$routes->get('/api', 'Ajax::index');
$routes->post('/api/siswa', 'Ajax::postSiswa');
$routes->get('/api/siswa', 'Ajax::getSiswa');
$routes->delete('/api/siswa/(:num)', 'Ajax::deleteSiswa/$1');

$routes->post('/api/nilai/siswa', 'Ajax::addNilaiSiswa');
$routes->get('/api/nilai/siswa/(:num)', 'Ajax::getNilaiSiswa/$1');
$routes->get('/api/nilai', 'Ajax::getallNilaiSiswa');

$routes->post('/api/label', 'Ajax::postLabel');
$routes->get('/api/label', 'Ajax::getLabel');
$routes->delete('/api/label/(:num)', 'Ajax::deleteLabel/$1');

$routes->post('/api/sampel', 'Ajax::postSampel');
$routes->get('/api/sampel', 'Ajax::getSampel');
$routes->delete('/api/sampel/(:num)', 'Ajax::deleteSampel/$1');

$routes->get('/api/train/dtree', 'Ajax::getPredictDt');
$routes->get('/api/train/nb', 'Ajax::getPredictNb');
$routes->get('/api/test', 'Ajax::getTest');