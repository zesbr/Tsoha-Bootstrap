<?php

$routes->get('/', function() {
	HelloWorldController::index();
});

$routes->get('/hiekkalaatikko', function() {
	HelloWorldController::sandbox();
});

$routes->get('/list', function() {
	HelloWorldController::show();
});

$routes->get('/edit', function() {
	HelloWorldController::edit();
});

$routes->get('/test', function() {
	HelloWorldController::test();
});
