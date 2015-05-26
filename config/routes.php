<?php

$routes->get('/', function() {
	HomeController::index();
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
	HomeController::index();
});

// Team routes

$routes->get('/teams', function() {
	TeamController::index();
});

$routes->get('/team/:id', function($id){
	TeamController::show($id);
});

// TODO: Lisää reitit joukkueen nimen ja lyhenteen perusteella

// Match routse
$routes->get('/matches', function() {
	MatchController::index();
});

// Player routes
$routes->get('/players', function() {
	PlayerController::index();
});

$routes->get('/players/:id', function($id){
	PlayerController::show($id);
});