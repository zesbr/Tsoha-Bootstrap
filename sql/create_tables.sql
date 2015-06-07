
-- Turnausvaiheeseen kuuluva ryhmä joukkueita
CREATE TABLE Groups (
	id SERIAL PRIMARY KEY,
	title VARCHAR(64) NOT NULL
);

-- Teams eli joukkueet ovat pelaajista koostuvia ja jotain maata edustavia jalkapallojoukkueita
CREATE TABLE Teams (
	id SERIAL PRIMARY KEY,
	name VARCHAR(64) UNIQUE NOT NULL,
	code VARCHAR(3) UNIQUE NOT NULL,
	group_id INTEGER REFERENCES Groups(id)
);

-- Players eli pelaajat ovat jalkapallojoukkueessa pelaavia urheilijoita
CREATE TABLE Players ( 
	id SERIAL PRIMARY KEY,
	team_id INTEGER REFERENCES Teams(id),
	firstname VARCHAR(64) NOT NULL,
	lastname VARCHAR(64) NOT NULL,
	birthday DATE NOT NULL,
	nationality VARCHAR(64) NOT NULL, 
	squadnumber INTEGER NOT NULL,
	position VARCHAR(3) NOT NULL,
	is_injured BOOLEAN DEFAULT false,
	is_suspended BOOLEAN DEFAULT false,
	club VARCHAR(64)
);

-- Stages eli vaiheet ovat turnauksen eri vaiheita esim. "Knock-out phase"
CREATE TABLE Stages (
	id SERIAL PRIMARY KEY,
	name VARCHAR(64) NOT NULL
);

-- Stadiums eli stadionit ovat urheiluareenoja, joilla pelataan otteluita
CREATE TABLE Stadiums (
	id SERIAL PRIMARY KEY,
	name VARCHAR(64) NOT NULL,
	city VARCHAR(64) NOT NULL
);

-- Matches eli ottelut ovat otteluita kahden joukkueen välillä
CREATE TABLE Matches ( 
	id SERIAL PRIMARY KEY,
	stage_id INTEGER REFERENCES Stages(id), 
	home_id INTEGER REFERENCES Teams(id),
	away_id INTEGER REFERENCES Teams(id),
	kickoff TIMESTAMP NOT NULL,
	stadium_id INTEGER REFERENCES Stadiums(id)
);

-- Goals eli maalit ovat pelaajan ottelussa tekemiä maaleja
CREATE TABLE Goals (
	id SERIAL PRIMARY KEY,
	match_id INTEGER REFERENCES Matches(id),
	player_id INTEGER REFERENCES Players(id),
	minute INTEGER NOT NULL,
	is_owngoal BOOLEAN DEFAULT false NOT NULL,
	from_penalty BOOLEAN DEFAULT false NOT NULL
);

-- Users eli käyttäjät ovat sovelluksen rekisteröityneitä käyttäjiä
CREATE TABLE Users (
	id SERIAL PRIMARY KEY,
	username VARCHAR(64) UNIQUE NOT NULL,
	password_hash VARCHAR(255) NOT NULL,
	password_salt VARCHAR(64) NOT NULL,
	email VARCHAR(255) UNIQUE NOT NULL,
	firstname VARCHAR(64) NOT NULL,
	lastname VARCHAR(64) NOT NULL,
	is_admin BOOLEAN DEFAULT false NOT NULL,
	is_locked BOOLEAN DEFAULT false NOT NULL,
	joined_on TIMESTAMP NOT NULL,
	edited_on TIMESTAMP NOT NULL,
	last_login TIMESTAMP
);

-- Bets eli vedot ovat käyttäjien omistamia veikkauksia ottelun lopputuloksesta
CREATE TABLE Bets (
	id SERIAL PRIMARY KEY,
	user_id INTEGER REFERENCES Users(id),
	match_id INTEGER REFERENCES Matches(id),
	home_score INTEGER NOT NULL,
	away_score INTEGER NOT NULL,
	points_earned INTEGER NOT NULL,
	created_on TIMESTAMP NOT NULL,
	edited_on TIMESTAMP NOT NULL
);

-- Communities eli yhteisöt ovat ryhmiä, jotka muodostuvat jäsenyyden omaavista käyttäjistä
CREATE TABLE Communities (
	id SERIAL PRIMARY KEY,
	name VARCHAR(64) NOT NULL,
	description TEXT NOT NULL,
	created_on TIMESTAMP NOT NULL,
	edited_on TIMESTAMP NOT NULL,
	is_private BOOLEAN NOT NULL
);

-- Memberships eli jäsenyydet ovat käyttäjien jäsenyyksiä jossain ryhmissä
CREATE TABLE Memberships (
	id SERIAL PRIMARY KEY,
	user_id INTEGER REFERENCES Users(id),
	community_id INTEGER REFERENCES Communities(id),
	joined_on TIMESTAMP,
	is_admin BOOLEAN DEFAULT false NOT NULL
);

-- Requests eli pyynnöt ovat käyttäjän lähettämiä jäsenyyspyyntöjä yhteisön ylläpitäjille
CREATE TABLE Requests (
	community_id INTEGER REFERENCES Communities(id),
	sent_from INTEGER REFERENCES Users(id),
	created_on TIMESTAMP NOT NULL,
	is_read BOOLEAN NOT NULL,
	is_accepted BOOLEAN NOT NULL,
	PRIMARY KEY (community_id, sent_from)
);

-- Inivitations eli kutsut ovat yhteisön ylläpitäjän lähettämiä jäsenyyskutsuja käyttäjälle
CREATE TABLE Invitations (
	community_id INTEGER REFERENCES Communities(id),
	sent_from INTEGER REFERENCES Users(id),
	sent_to INTEGER REFERENCES Users(id),
	created_on TIMESTAMP NOT NULL,
	is_read BOOLEAN NOT NULL,
	is_accepted BOOLEAN NOT NULL,
	PRIMARY KEY (community_id, sent_from, sent_to)
);