
INSERT INTO Groups (title) 
	VALUES ('Lohko A');

INSERT INTO Teams (name, code, group_id) 
	VALUES ('Chile', 'CHI', 1);
INSERT INTO Teams (name, code, group_id) 
	VALUES ('Ecuador', 'ECU', 1);
INSERT INTO Teams (name, code, group_id) 
	VALUES ('Meksiko', 'MEX', 1);
INSERT INTO Teams (name, code, group_id) 
	VALUES ('Bolivia', 'BOL', 1);

INSERT INTO Players (team_id, firstname, lastname, birthday, nationality, squadnumber, position, is_injured, is_suspended, club) 
	VALUES (1, 'Test', 'Player', '1980-01-01', 'Chile', 1, 'ST', false, false, 'Free Agent');
INSERT INTO Players (team_id, firstname, lastname, birthday, nationality, squadnumber, position, is_injured, is_suspended, club) 
	VALUES (2, 'Test', 'Player', '1980-01-01', 'Ecuador', 1, 'ST', false, false, 'Free Agent');
INSERT INTO Players (team_id, firstname, lastname, birthday, nationality, squadnumber, position, is_injured, is_suspended, club) 
	VALUES (3, 'Test', 'Player', '1980-01-01', 'Mexico', 1, 'ST', false, false, 'Free Agent');
INSERT INTO Players (team_id, firstname, lastname, birthday, nationality, squadnumber, position, is_injured, is_suspended, club) 
	VALUES (4, 'Test', 'Player', '1980-01-01', 'Bolivia', 1, 'ST', false, false, 'Free Agent');

INSERT INTO Stages (name) 
	VALUES ('Lohkovaihe');

INSERT INTO Stadiums (name, city) 
	VALUES ('Estadio Nacional Julio Martínez Prádanos', 'Santiago de Chile');

INSERT INTO Matches (stage_id, home_id, away_id, kickoff, stadium_id) 
	VALUES (1, 1, 2, '2015-05-24 00:00:00', 1);

	INSERT INTO Goals (match_id, player_id, minute, is_owngoal, from_penalty) 
		VALUES (1, 1, 1, false, false);
	INSERT INTO Goals (match_id, player_id, minute, is_owngoal, from_penalty) 
		VALUES (1, 1, 1, false, false);
	INSERT INTO Goals (match_id, player_id, minute, is_owngoal, from_penalty) 
		VALUES (1, 1, 1, false, false);

INSERT INTO Matches (stage_id, home_id, away_id, kickoff, stadium_id) 
	VALUES (1, 3, 4, '2015-05-24 00:00:00', 1);

	INSERT INTO Goals (match_id, player_id, minute, is_owngoal, from_penalty) 
		VALUES (2, 4, 1, false, false);

INSERT INTO Matches (stage_id, home_id, away_id, kickoff, stadium_id) 
	VALUES (1, 1, 3, '2015-05-31 00:00:00', 1);

	INSERT INTO Goals (match_id, player_id, minute, is_owngoal, from_penalty) 
		VALUES (3, 1, 1, false, false);
	INSERT INTO Goals (match_id, player_id, minute, is_owngoal, from_penalty) 
		VALUES (3, 1, 1, false, false);
	INSERT INTO Goals (match_id, player_id, minute, is_owngoal, from_penalty) 
		VALUES (3, 3, 1, true, false);

INSERT INTO Matches (stage_id, home_id, away_id, kickoff, stadium_id)
	VALUES (1, 2, 4, '2015-05-31 00:00:00', 1);

INSERT INTO Matches (stage_id, home_id, away_id, kickoff, stadium_id) 
	VALUES (1, 1, 4, '2015-06-11 00:00:00', 1);
	
INSERT INTO Matches (stage_id, home_id, away_id, kickoff, stadium_id) 
	VALUES (1, 2, 3, '2015-06-11 00:00:00', 1);

-- TEAM 			GP 	W 	D 	L 	GF 	GA 	PTS
-- --------------------------------------------
-- 1: Chile			2 	2	0 	0 	6 	0 	3
-- 4: Bolivia		2 	1 	1	0	1 	0	4
-- 2: Ecuador		2  	0 	1 	1 	0 	3 	1
-- 3: Mexico		2 	0 	0 	2 	0 	4 	0 	

-- Password: asdf
INSERT INTO Users (username, password_hash, password_salt, email, firstname, lastname, is_admin, is_locked, joined_on, edited_on, last_login) 
	VALUES ('admin', 'Z9NjSFGpSWL8U', 'Z9Bg13gRAmt3', 'admin@test.com', 'System', 'Administrator', true, false, '2015-01-01 00:00:00', '2015-01-01 00:00:00', '2015-01-01 00:00:00');

-- Password: asdf
INSERT INTO Users (username, password_hash, password_salt, email, firstname, lastname, is_admin, is_locked, joined_on, edited_on, last_login) 
	VALUES ('zesbr', 'Z9NjSFGpSWL8U', ' Z9Bg13gRAmt3', 'zesbr@test.com', 'Jesper', 'Ruuth', false, false, '2015-01-01 00:00:00', '2015-01-01 00:00:00', '2015-01-01 00:00:00');

INSERT INTO Communities (name, description, created_on, edited_on, is_private) 
	VALUES ('Test Community 1', 'Testi', '2015-01-01 00:00:00', '2015-01-01 00:00:00', false);

INSERT INTO Communities (name, description, created_on, edited_on, is_private) 
	VALUES ('Test Community 2', 'Tämä on testiyhteisö', '2015-01-01 00:00:00', '2015-01-01 00:00:00', false);

INSERT INTO Memberships (user_id, community_id, joined_on, is_admin) 
	VALUES (1, 1, '2015-01-01 00:00:00', true);

INSERT INTO Memberships (user_id, community_id, joined_on, is_admin) 
	VALUES (2, 2, '2015-01-01 00:00:00', true);

INSERT INTO Bets (user_id, match_id, home_score, away_score, points_earned, created_on, edited_on)
	VALUES (1, 1, 3, 0, 0, '2014-01-01 00:00:00', '2014-01-01 00:00:00');

INSERT INTO Bets (user_id, match_id, home_score, away_score, points_earned, created_on, edited_on)
	VALUES (1, 2, 0, 0, 0, '2014-01-01 00:00:00', '2014-01-01 00:00:00');

INSERT INTO Bets (user_id, match_id, home_score, away_score, points_earned, created_on, edited_on)
	VALUES (1, 3, 1, 0, 0, '2014-01-01 00:00:00', '2014-01-01 00:00:00');

INSERT INTO Bets (user_id, match_id, home_score, away_score, points_earned, created_on, edited_on)
	VALUES (2, 1, 2, 1, 0, '2014-01-01 00:00:00', '2014-01-01 00:00:00');

INSERT INTO Bets (user_id, match_id, home_score, away_score, points_earned, created_on, edited_on)
	VALUES (2, 2, 3, 1, 0, '2014-01-01 00:00:00', '2014-01-01 00:00:00');
