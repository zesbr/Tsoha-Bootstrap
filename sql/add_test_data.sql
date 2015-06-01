
INSERT INTO Groups (title) VALUES ('Group A');

INSERT INTO Teams (name, code, group_id) 
	VALUES ('Chile', 'CHI', 1);
INSERT INTO Teams (name, code, group_id) 
	VALUES ('Ecuador', 'ECU', 1);
INSERT INTO Teams (name, code, group_id) 
	VALUES ('Mexico', 'MEX', 1);
INSERT INTO Teams (name, code, group_id) 
	VALUES ('Bolivia', 'BOL', 1);

INSERT INTO Players (team_id, firstname, lastname, dateofbirth, nationality, squadnumber, position, is_injured, is_suspended, club) 
	VALUES (1, 'Test', 'Player', '1980-01-01', 'Chile', 1, 'ST', false, false, 'Free Agent');
INSERT INTO Players (team_id, firstname, lastname, dateofbirth, nationality, squadnumber, position, is_injured, is_suspended, club) 
	VALUES (2, 'Test', 'Player', '1980-01-01', 'Ecuador', 1, 'ST', false, false, 'Free Agent');
INSERT INTO Players (team_id, firstname, lastname, dateofbirth, nationality, squadnumber, position, is_injured, is_suspended, club) 
	VALUES (3, 'Test', 'Player', '1980-01-01', 'Mexico', 1, 'ST', false, false, 'Free Agent');
INSERT INTO Players (team_id, firstname, lastname, dateofbirth, nationality, squadnumber, position, is_injured, is_suspended, club) 
	VALUES (4, 'Test', 'Player', '1980-01-01', 'Bolivia', 1, 'ST', false, false, 'Free Agent');

INSERT INTO Stages (name) 
	VALUES ('Group Stage');

INSERT INTO Stadiums (name, city) 
	VALUES ('Estadio Nacional Julio Martínez Prádanos', 'Santiago de Chile');

INSERT INTO Matches (stage_id, home, away, kickoff, stadium_id) 
	VALUES (1, 1, 2, '2015-05-24 00:00:00', 1);

	INSERT INTO Goals (match_id, player_id, minute, is_owngoal, from_penalty) 
		VALUES (1, 1, 1, false, false);
	INSERT INTO Goals (match_id, player_id, minute, is_owngoal, from_penalty) 
		VALUES (1, 1, 1, false, false);
	INSERT INTO Goals (match_id, player_id, minute, is_owngoal, from_penalty) 
		VALUES (1, 1, 1, false, false);

INSERT INTO Matches (stage_id, home, away, kickoff, stadium_id) 
	VALUES (1, 3, 4, '2015-05-24 00:00:00', 1);

	INSERT INTO Goals (match_id, player_id, minute, is_owngoal, from_penalty) 
		VALUES (2, 4, 1, false, false);

INSERT INTO Matches (stage_id, home, away, kickoff, stadium_id) 
	VALUES (1, 1, 3, '2015-05-31 00:00:00', 1);

	INSERT INTO Goals (match_id, player_id, minute, is_owngoal, from_penalty) 
		VALUES (3, 1, 1, false, false);
	INSERT INTO Goals (match_id, player_id, minute, is_owngoal, from_penalty) 
		VALUES (3, 1, 1, false, false);
	INSERT INTO Goals (match_id, player_id, minute, is_owngoal, from_penalty) 
		VALUES (3, 3, 1, true, false);

INSERT INTO Matches (stage_id, home, away, kickoff, stadium_id)
	VALUES (1, 2, 4, '2015-05-31 00:00:00', 1);

INSERT INTO Matches (stage_id, home, away, kickoff, stadium_id) 
	VALUES (1, 1, 4, '2015-06-07 00:00:00', 1);
	
INSERT INTO Matches (stage_id, home, away, kickoff, stadium_id) 
	VALUES (1, 2, 3, '2015-06-07 00:00:00', 1);

-- TEAM 			GP 	W 	D 	L 	GF 	GA 	PTS
-- --------------------------------------------
-- 1: Chile			2 	2	0 	0 	6 	0 	3
-- 4: Bolivia		2 	1 	1	0	1 	0	4
-- 2: Ecuador		2  	0 	1 	1 	0 	3 	1
-- 3: Mexico		2 	0 	0 	2 	0 	4 	0 	

INSERT INTO Users (username, password_hash, password_salt, email, firstname, lastname, is_admin, joined_on, last_login) 
	VALUES ('admin', '', '', 'admin@test.com', 'System', 'Administrator', true, '2015-01-01 00:00:00', '2015-01-01 00:00:00');

INSERT INTO Users (username, password_hash, password_salt, email, firstname, lastname, is_admin, joined_on, last_login) 
	VALUES ('zesbr', '', '', 'zesbr@test.com', 'Jesper', 'Ruuth', false, '2015-01-01 00:00:00', '2015-01-01 00:00:00');

INSERT INTO Communities (name, created_on, is_private, is_open) 
	VALUES ('Test Community 1', '2015-01-01 00:00:00', false, true);

INSERT INTO Communities (name, created_on, is_private, is_open) 
	VALUES ('Test Community 2', '2015-01-01 00:00:00', false, true);

INSERT INTO Memberships (user_id, community_id, joined_on, is_admin) 
	VALUES (1, 1, '2015-01-01 00:00:00', true);

INSERT INTO Memberships (user_id, community_id, joined_on, is_admin) 
	VALUES (2, 2, '2015-01-01 00:00:00', true);