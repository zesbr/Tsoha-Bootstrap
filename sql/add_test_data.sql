
-- Groups
-- ----------------------------------------------------------------------------
-- 1: Group A
INSERT INTO Groups (title) VALUES (
	'Group A'
);

-- 2: Group B
INSERT INTO Groups (title) VALUES (
	'Group B'
);

-- 3: Group C
INSERT INTO Groups (title) VALUES (
	'Group C'
);

-- Teams
-- ----------------------------------------------------------------------------
-- 1: Argentina
INSERT INTO Teams (name, code, group_id) VALUES (
	'Argentina', 
	'ARG',
	2
);

-- 2: Bolivia
INSERT INTO Teams (name, code, group_id) VALUES (
	'Bolivia', 
	'BOL',
	1
);

-- 3: Brazil
INSERT INTO Teams (name, code, group_id) VALUES (
	'Brazil', 
	'BRA',
	3
);

-- 4: Chile
INSERT INTO Teams (name, code, group_id) VALUES (
	'Chile', 
	'CHI',
	1
);

-- 5: Colombia
INSERT INTO Teams (name, code, group_id) VALUES (
	'Colombia', 
	'COL',
	3
);

-- 6: Ecuador
INSERT INTO Teams (name, code, group_id) VALUES (
	'Ecuador', 
	'ECU',
	1
);

-- 7: Jamaica
INSERT INTO Teams (name, code, group_id) VALUES (
	'Jamaica', 
	'JAM',
	2
);

-- 8: Mexico
INSERT INTO Teams (name, code, group_id) VALUES (
	'Mexico', 
	'MEX',
	1
);

-- 9: Paraguay
INSERT INTO Teams (name, code, group_id) VALUES (
	'Paraguay', 
	'PAR',
	2
);

-- 10: Peru
INSERT INTO Teams (name, code, group_id) VALUES (
	'Peru', 
	'PER',
	3
);

-- 11: Uruguay
INSERT INTO Teams (name, code, group_id) VALUES (
	'Uruguay', 
	'URU',
	2
);

-- 12: Venezuela
INSERT INTO Teams (name, code, group_id) VALUES (
	'Venezuela', 
	'VEN',
	3
);


-- Players
-- ----------------------------------------------------------------------------
-- 8: Team Mexico
INSERT INTO Players (team_id, firstname, lastname, dateofbirth, nationality, squadnumber, position, is_injured, is_suspended, club) VALUES (8, 'José de Jesús', 'Corona', '1981-01-26', 'Mexico', 1, 'GK', false, false, 'Mexico Cruz Azul');
INSERT INTO Players (team_id, firstname, lastname, dateofbirth, nationality, squadnumber, position, is_injured, is_suspended, club) VALUES (8, 'Hugo', 'Ayala', '1987-03-31', 'Mexico', 2, 'DF', false, false, 'Mexico UANL');
INSERT INTO Players (team_id, firstname, lastname, dateofbirth, nationality, squadnumber, position, is_injured, is_suspended, club) VALUES (8, 'George', 'Corral', '1990-07-18', 'Mexico', 3, 'DF', false, false, 'Mexico Querétaro');
INSERT INTO Players (team_id, firstname, lastname, dateofbirth, nationality, squadnumber, position, is_injured, is_suspended, club) VALUES (8, 'Rafael', 'Márquez', '1979-02-13', 'Mexico', 4, 'DF', false, false, 'Italy Verona');
INSERT INTO Players (team_id, firstname, lastname, dateofbirth, nationality, squadnumber, position, is_injured, is_suspended, club) VALUES (8, 'Carlos', 'Salcedo', '1993-09-29', 'Mexico', 5, 'DF', false, false, 'Mexico Guadalajara');
INSERT INTO Players (team_id, firstname, lastname, dateofbirth, nationality, squadnumber, position, is_injured, is_suspended, club) VALUES (8, 'Javier', 'Güemez', '1991-10-17', 'Mexico', 6, 'MF', false, false, 'Mexico Tijuana');
INSERT INTO Players (team_id, firstname, lastname, dateofbirth, nationality, squadnumber, position, is_injured, is_suspended, club) VALUES (8, 'Jesús Manuel', 'Corona', '1993-01-06', 'Mexico', 7, 'MF', false, false, 'Netherlands Twente');
INSERT INTO Players (team_id, firstname, lastname, dateofbirth, nationality, squadnumber, position, is_injured, is_suspended, club) VALUES (8, 'Marco', 'Fabián', '1989-07-21', 'Mexico', 8, 'MF', false, false, 'Mexico Guadalajara');
INSERT INTO Players (team_id, firstname, lastname, dateofbirth, nationality, squadnumber, position, is_injured, is_suspended, club) VALUES (8, 'Raúl', 'Jiménez', '1991-05-05', 'Mexico', 9, 'FW', false, false, 'Spain Atlético Madrid');
INSERT INTO Players (team_id, firstname, lastname, dateofbirth, nationality, squadnumber, position, is_injured, is_suspended, club) VALUES (8, 'Luis', 'Montes', '1986-05-15', 'Mexico', 10, 'MF', false, false, 'Mexico León');
INSERT INTO Players (team_id, firstname, lastname, dateofbirth, nationality, squadnumber, position, is_injured, is_suspended, club) VALUES (8, 'Javier', 'Aquino', '1990-02-11', 'Mexico', 11, 'MF', false, false, 'Spain Rayo Vallecano');
INSERT INTO Players (team_id, firstname, lastname, dateofbirth, nationality, squadnumber, position, is_injured, is_suspended, club) VALUES (8, 'Alfredo', 'Talavera', '1982-09-18', 'Mexico', 12, 'GK', false, false, 'Mexico Toluca');
INSERT INTO Players (team_id, firstname, lastname, dateofbirth, nationality, squadnumber, position, is_injured, is_suspended, club) VALUES (8, 'Melitón', 'Hernández', '1982-10-15', 'Mexico', 13, 'GK', false, false, 'Mexico Veracruz');
INSERT INTO Players (team_id, firstname, lastname, dateofbirth, nationality, squadnumber, position, is_injured, is_suspended, club) VALUES (8, 'Miguel Ángel', 'Herrera', '1989-04-03', 'Mexico', 14, 'DF', false, false, 'Mexico Pachuca');
INSERT INTO Players (team_id, firstname, lastname, dateofbirth, nationality, squadnumber, position, is_injured, is_suspended, club) VALUES (8, 'Gerardo', 'Flores', '1986-02-05', 'Mexico', 15, 'DF', false, false, 'Mexico Cruz Azul');
INSERT INTO Players (team_id, firstname, lastname, dateofbirth, nationality, squadnumber, position, is_injured, is_suspended, club) VALUES (8, 'Adrián', 'Aldrete', '1988-06-14', 'Mexico', 16, 'DF', false, false, 'Mexico Santos Laguna');
INSERT INTO Players (team_id, firstname, lastname, dateofbirth, nationality, squadnumber, position, is_injured, is_suspended, club) VALUES (8, 'Mario', 'Osuna', '1988-08-20', 'Mexico', 17, 'MF', false, false, 'Mexico Querétaro');
INSERT INTO Players (team_id, firstname, lastname, dateofbirth, nationality, squadnumber, position, is_injured, is_suspended, club) VALUES (8, 'Juan Carlos', 'Medina', '1983-08-22', 'Mexico', 18, 'MF', false, false, 'Mexico Atlas');
INSERT INTO Players (team_id, firstname, lastname, dateofbirth, nationality, squadnumber, position, is_injured, is_suspended, club) VALUES (8, 'Enrique', 'Esqueda', '1988-04-19', 'Mexico', 19, 'FW', false, false, 'Mexico UANL');
INSERT INTO Players (team_id, firstname, lastname, dateofbirth, nationality, squadnumber, position, is_injured, is_suspended, club) VALUES (8, 'Eduardo', 'Herrera', '1988-07-25', 'Mexico', 20, 'FW', false, false, 'Mexico UNAM');
INSERT INTO Players (team_id, firstname, lastname, dateofbirth, nationality, squadnumber, position, is_injured, is_suspended, club) VALUES (8, 'Julio', 'Domínguez', '1987-11-08', 'Mexico', 21, 'DF', false, false, 'Mexico Cruz Azul');
INSERT INTO Players (team_id, firstname, lastname, dateofbirth, nationality, squadnumber, position, is_injured, is_suspended, club) VALUES (8, 'Efraín', 'Velarde', '1986-04-15', 'Mexico', 22, 'DF', false, false, 'Mexico Monterrey');
INSERT INTO Players (team_id, firstname, lastname, dateofbirth, nationality, squadnumber, position, is_injured, is_suspended, club) VALUES (8, 'Vicente Matías', 'Vuoso', '1981-11-03', 'Mexico', 23, 'FW', false, false, 'Mexico Chiapas');


-- Stages
-- ----------------------------------------------------------------------------
-- 1: Group Stage
INSERT INTO Stages (name) VALUES (
	'Group Stage'
);

-- 2: Quarter-Finals
INSERT INTO Stages (name) VALUES (
	'Quarter-Finals'
);

-- 3: Semi-Finals
INSERT INTO Stages (name) VALUES (
	'Semi-Finals'
);

-- 4: 3rd Place Final
INSERT INTO Stages (name) VALUES (
	'3rd Place Final'
);

-- 5: Final
INSERT INTO Stages (name) VALUES (
	'Final'
);

-- Stadiums
-- ----------------------------------------------------------------------------
-- 1: Estadio Nacional Julio Martínez Prádanos, Santiago de Chile
INSERT INTO Stadiums (name, city) VALUES (
	'Estadio Nacional Julio Martínez Prádanos', 
	'Santiago de Chile'
);

-- 2: Estadio Sausalito, Viña del Mar
INSERT INTO Stadiums (name, city) VALUES (
	'Estadio Sausalito', 
	'Viña del Mar'
);

-- 3: Estadio Regional Calvo y Bascuñán, Antofagasta
INSERT INTO Stadiums (name, city) VALUES (
	'Estadio Regional Calvo y Bascuñán', 
	'Antofagasta'
);

-- 4: Estadio La Portada de La Serena, La Serena
INSERT INTO Stadiums (name, city) VALUES (
	'Estadio La Portada de La Serena', 
	'La Serena'
);

-- 5: Estadio El Teniente, Rancagua
INSERT INTO Stadiums (name, city) VALUES (
	'Estadio El Teniente', 
	'Rancagua'
);

-- 6: Estadio Municipal Bicentenario Germán Becker, Temuco
INSERT INTO Stadiums (name, city) VALUES (
	'Estadio Municipal Bicentenario Germán Becker', 
	'Temuco'
);

-- 7: Estadio Elías Figueroa Brander, Valparaíso
INSERT INTO Stadiums (name, city) VALUES (
	'Estadio Elías Figueroa Brander', 
	'Valparaíso'
);

-- 8: Estadio Monumental David Arellano, Santiago de Chile
INSERT INTO Stadiums (name, city) VALUES (
	'Estadio Monumental David Arellano', 
	'Santiago de Chile'
);

-- 9: Estadio Municipal Alcaldesa Ester Roa Rebolledo, Concepción
INSERT INTO Stadiums (name, city) VALUES (
	'Estadio Municipal Alcaldesa Ester Roa Rebolledo', 
	'Concepción'
);

-- Matches
-- ----------------------------------------------------------------------------
-- Fixture 1
INSERT INTO Matches (stage_id, home, away, kickoff, stadium_id) VALUES ( 
	1, -- Group Stage
	4, -- 4: Chile
	6, -- 6: Ecuador
	'2015-06-11 20:30:00',
	1 -- Estadio Nacional Julio Martínez Prádanos, Santiago de Chile
);

-- Fixture 2
INSERT INTO Matches (stage_id, home, away, kickoff, stadium_id) VALUES ( 
	1, -- Group Stage
	8, -- 8: Mexico
	2, -- 2: Bolivia
	'2015-06-12 20:30:00',
	2 -- Estadio Sausalito, Viña del Mar
);

-- Fixture 7
INSERT INTO Matches (stage_id, home, away, kickoff, stadium_id) VALUES ( 
	1, -- Group Stage
	6, -- 6: Ecuador
	2, -- 2: Bolivia
	'2015-06-15 18:00:00',
	7 -- 7: Estadio Elías Figueroa Brander, Valparaíso
);

-- Fixture 8
INSERT INTO Matches (stage_id, home, away, kickoff, stadium_id) VALUES ( 
	1, -- Group Stage
	4, -- 4: Chile
	8, -- 8: Mexico
	'2015-06-15 20:30:00',
	1 -- 1: Estadio Nacional Julio Martínez Prádanos, Santiago de Chile
);
/*
-- Goals
-- ----------------------------------------------------------------------------
INSERT INTO Goals (match_id, player_id, minute, is_owngoal, from_penalty) VALUES (
	-- TODO
);
*/

-- Users
-- ----------------------------------------------------------------------------
INSERT INTO Users (username, password_hash, password_salt, email, firstname, lastname, is_admin, joined_on, last_login) VALUES (
	'admin',
	'',
	'',
	'admin@test.com',
	'System',
	'Administrator',
	true,
	'2015-01-01 00:00:00',
	'2015-01-01 00:00:00'
);

INSERT INTO Users (username, password_hash, password_salt, email, firstname, lastname, is_admin, joined_on, last_login) VALUES (
	'zesbr',
	'',
	'',
	'zesbr@test.com',
	'Jesper',
	'Ruuth',
	false,
	'2015-01-01 00:00:00',
	'2015-01-01 00:00:00'
);
/*
-- Bets
-- ----------------------------------------------------------------------------
INSERT INTO Bets (user_id, match_id, homescore, awayscore, points_earned, created_on, edited_on) VALUES (
	-- TODO
);

-- Communities
-- ----------------------------------------------------------------------------
INSERT INTO Communities (name, created_on, is_private, is_open) VALUES (
	-- TODO
);

-- Memberships
-- ----------------------------------------------------------------------------
INSERT INTO Memberships (user_id, community_id, joined_on, is_admin) VALUES (
	-- TODO
);

-- Requests
-- ----------------------------------------------------------------------------
INSERT INTO Requests (community_id, sent_by, created_on, is_read, is_accepted) VALUES (
	-- TODO
);

-- Invitations
-- ----------------------------------------------------------------------------
INSERT INTO Invitations (community_id, sent_by, sebt_to, created_on, is_read, is_accepted) VALUES (
	-- TODO
);
*/