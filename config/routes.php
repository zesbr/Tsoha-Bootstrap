<?php

$routes->get('/', function() {
	HomeController::index();
});

/*** Components ***/
$routes->get('/components', function() {
	ComponentController::index();
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
$routes->get('/match/new', function() {
	MatchController::create();
});
$routes->get('/match/show/:id', function($id) {
	MatchController::show($id);
});
$routes->get('/match/edit/:id', function($id) {
	MatchController::edit($id);
});
$routes->get('/match/:id', function($id) {
	MatchController::show($id);
});
$routes->put('/match', function(){
	MatchController::update();
});
$routes->put('/match/confirm', function(){
	MatchController::confirm();
});
$routes->delete('/match/goals', function(){
	MatchController::delete_goals();
});



/*** Goals ***/
$routes->get('/goals', function() {
	GoalController::index();
});
$routes->get('/goal/new/:id', function($id){
	GoalController::create($id);
});
$routes->get('/goal/edit/:id', function($id){
	GoalController::edit($id);
});
$routes->get('/goal/:id', function($id){
	GoalController::show($id);
});
$routes->post('/goal', function(){
	GoalController::save();
});
$routes->put('/goal', function(){
	GoalController::update();
});
$routes->delete('/goal', function(){
	GoalController::delete();
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
$routes->put('/user/lock', function(){
	UserController::toggle_lock();
});;
$routes->delete('/user', function(){
	UserController::delete();
});



/*** Bets ***/

$routes->get('/bets', function() {
	BetController::index();
});

$routes->get('/match/:id/bet/new', function($id) {
	BetController::create($id);
});
$routes->get('/match/:id/bet/edit', function($id) {
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
$routes->post('/membership', function(){
	MembershipController::save();
});
$routes->put('/membership', function(){
	MembershipController::update();
});
$routes->delete('/membership', function(){
	MembershipController::delete();
});


/*** TODO **/
$routes->get('/leaderboards', function(){
	LeaderboardController::index();
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