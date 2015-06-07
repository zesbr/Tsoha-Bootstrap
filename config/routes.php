<?php

$routes->get('/', function() {
	HomeController::index();
});

/*** Groups ***/
$routes->get('/groups', function() {
	GroupController::index();
});
$routes->get('/group/:id', function($id) {
	GroupController::show($id);
});

/*** Stages ***/
$routes->get('/stages', function() {
	StageController::index();
});
$routes->get('/stage/:id', function($id) {
	StageController::show($id);
});

/*** Stadiums ***/
$routes->get('/stadiums', function() {
	StadiumController::index();
});
$routes->get('/stadium/:id', function($id) {
	StadiumController::show($id);
});

/*** Teams ***/
$routes->get('/teams', function() {
	TeamController::index();
});
$routes->get('/team/:id', function($id){
	TeamController::show($id);
});

/*** Player ***/
$routes->get('/players', function() {
	PlayerController::index();
});
$routes->get('/player/:id', function($id){
	PlayerController::show($id);
});

/*** Matches ***/
$routes->get('/matches', function() {
	MatchController::index();
});
$routes->get('/match/:id', function($id) {
	MatchController::show($id);
});

/*** Goals ***/
$routes->get('/goals', function() {
	GoalController::index();
});
$routes->get('/goal/:id', function($id){
	GoalController::show($id);
});

/*** Users ***/
$routes->get('/users', function(){
	UserController::index();
});
$routes->get('/user/:id', function($id){
	UserController::show($id);
});
$routes->get('/registration', function(){
	UserController::create();
});
$routes->get('/user/edit/:id', function($id){
	UserController::edit($id);
});
$routes->post('/registration', function(){
	UserController::save();
});
$routes->put('/user', function(){
	UserController::update();
});
$routes->delete('/user', function(){
	UserController::delete();
});



/*** Bets ***/
$routes->get('/bets', function() {
	BetController::index();
});
$routes->get('/bet/new/:id', function($id) {
	BetController::create($id);
});
$routes->get('/bet/edit/:id', function($id) {
	BetController::edit($id);
});
$routes->get('/bet/:id', function($id) {
	BetController::show($id);
});
$routes->post('/bet', function() {
	BetController::save();
});
$routes->put('/bet', function() {
	BetController::update();
});
$routes->delete('/bet', function() {
	BetController::delete();
});



/*** Communities ***/
$routes->get('/communities', function(){
	CommunityController::index();
});
$routes->get('/communities/new', function(){
	CommunityController::create();
});
$routes->get('/community/:id', function($id){
	CommunityController::show($id);
});
$routes->get('/community/edit/:id', function($id){
	CommunityController::edit($id);
});
$routes->post('/community', function(){
	CommunityController::save();
});
$routes->put('/community', function(){
	CommunityController::update();
});
$routes->delete('/community', function(){
	CommunityController::delete();
});


/*** Memberships **/
$routes->get('/memberships', function(){
	MembershipController::index();
});
$routes->get('/membership/:id', function($id){
	MembershipController::show($id);
});

/*** Sessions ***/
$routes->get('/login', function(){
	SessionController::login();
});
$routes->get('/logout', function(){
	SessionController::logout();
});
$routes->post('/login', function(){
	SessionController::handle_login();
});

