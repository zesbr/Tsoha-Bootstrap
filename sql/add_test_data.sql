

-- Lohkot
-- ----------------------------------------------------------------------------
-- 1: Lohko A
INSERT INTO Groups (title) VALUES (
	'Lohko A'
);

-- 2: Lohko B
INSERT INTO Groups (title) VALUES (
	'Lohko B'
);

-- 3: Group C
INSERT INTO Groups (title) VALUES (
	'Lohko C'
);

-- Valmentajat
-- ----------------------------------------------------------------------------
-- 1: Argentiina
INSERT INTO coaches(firstname,lastname,birthday,nationality) VALUES ('Gerardo','Martino','1962-11-20','Argentiina');

-- 2: Bolivia
INSERT INTO coaches(firstname,lastname,birthday,nationality) VALUES ('Mauricio','Soria','1966-06-01','Bolivia');

-- 3: Brasilia
INSERT INTO coaches(firstname,lastname,birthday,nationality) VALUES ('Dunga','','1963-10-31','Brasilia');

-- 4: Chile
INSERT INTO coaches(firstname,lastname,birthday,nationality) VALUES ('Jorge','Sampaoli','1960-03-13','Argentiina');

-- 5: Kolumbia
INSERT INTO coaches(firstname,lastname,birthday,nationality) VALUES ('José','Pékerman','1949-09-03','Argentiina');

-- 6: Ecuador
INSERT INTO coaches(firstname,lastname,birthday,nationality) VALUES ('Gustavo','Quinteros','1965-02-15','Bolivia');

-- 7: Jamaika
INSERT INTO coaches(firstname,lastname,birthday,nationality) VALUES ('Winfried','Schäfer','1950-01-10','Saksa');

-- 8: Meksiko
INSERT INTO coaches(firstname,lastname,birthday,nationality) VALUES ('Miguel','Herrera','1968-03-18','Meksiko');

-- 9: Paraguay
INSERT INTO coaches(firstname,lastname,birthday,nationality) VALUES ('Ramón','Díaz','1959-08-29','Argentiina');

-- 10: Peru
INSERT INTO coaches(firstname,lastname,birthday,nationality) VALUES ('Ricardo','Gareca','1958-02-10','Argentiina');

-- 11: Uruguay
INSERT INTO coaches(firstname,lastname,birthday,nationality) VALUES ('Óscar','Tabárez','1947-03-03','Uruguay');

-- 12: Venezuela
INSERT INTO coaches(firstname,lastname,birthday,nationality) VALUES ('Noel','Sanvicente','1964-12-21','Venezuela');


-- Joukkueet
-- ----------------------------------------------------------------------------
-- 1: Argentiina
INSERT INTO Teams (name, code, group_id, head_coach_id) VALUES (
	'Argentiina', 
	'ARG',
	2,
	1
);

-- 2: Bolivia
INSERT INTO Teams (name, code, group_id, head_coach_id) VALUES (
	'Bolivia', 
	'BOL',
	1,
	2
);

-- 3: Brasilia
INSERT INTO Teams (name, code, group_id, head_coach_id) VALUES (
	'Brasilia', 
	'BRA',
	3,
	3
);

-- 4: Chile
INSERT INTO Teams (name, code, group_id, head_coach_id) VALUES (
	'Chile', 
	'CHI',
	1,
	4
);

-- 5: Kolumbia
INSERT INTO Teams (name, code, group_id, head_coach_id) VALUES (
	'Kolumbia', 
	'COL',
	3,
	5
);

-- 6: Ecuador
INSERT INTO Teams (name, code, group_id, head_coach_id) VALUES (
	'Ecuador', 
	'ECU',
	1,
	6
);

-- 7: Jamaika
INSERT INTO Teams (name, code, group_id, head_coach_id) VALUES (
	'Jamaika', 
	'JAM',
	2,
	7
);

-- 8: Meksiko
INSERT INTO Teams (name, code, group_id, head_coach_id) VALUES (
	'Meksiko', 
	'MEX',
	1,
	8
);

-- 9: Paraguay
INSERT INTO Teams (name, code, group_id, head_coach_id) VALUES (
	'Paraguay', 
	'PAR',
	2,
	9
);

-- 10: Peru
INSERT INTO Teams (name, code, group_id, head_coach_id) VALUES (
	'Peru', 
	'PER',
	3,
	10
);

-- 11: Uruguay
INSERT INTO Teams (name, code, group_id, head_coach_id) VALUES (
	'Uruguay', 
	'URU',
	2,
	11
);

-- 12: Venezuela
INSERT INTO Teams (name, code, group_id, head_coach_id) VALUES (
	'Venezuela', 
	'VEN',
	3,
	12
);

-- Pelaajat
-- ----------------------------------------------------------------------------
-- 1: Argentiina
INSERT INTO players(team_id,firstname,lastname,birthday,nationality,squadnumber,position,caps,goals,is_injured,is_suspended,club) VALUES (1,'Sergio','Romero','1987-02-22','Argentiina',1,'GK',58,0,FALSE,FALSE,'Sampdoria');
INSERT INTO players(team_id,firstname,lastname,birthday,nationality,squadnumber,position,caps,goals,is_injured,is_suspended,club) VALUES (1,'Ezequiel','Garay','1986-10-10','Argentiina',2,'DF',26,0,FALSE,FALSE,'Zenit');
INSERT INTO players(team_id,firstname,lastname,birthday,nationality,squadnumber,position,caps,goals,is_injured,is_suspended,club) VALUES (1,'Facundo','Roncaglia','1987-02-10','Argentiina',3,'DF',4,0,FALSE,FALSE,'Genoa');
INSERT INTO players(team_id,firstname,lastname,birthday,nationality,squadnumber,position,caps,goals,is_injured,is_suspended,club) VALUES (1,'Pablo','Zabaleta','1985-01-16','Argentiina',4,'DF',48,0,FALSE,FALSE,'Manchester City');
INSERT INTO players(team_id,firstname,lastname,birthday,nationality,squadnumber,position,caps,goals,is_injured,is_suspended,club) VALUES (1,'Fernando','Gago','1986-04-10','Argentiina',5,'MF',57,0,FALSE,FALSE,'Boca Juniors');
INSERT INTO players(team_id,firstname,lastname,birthday,nationality,squadnumber,position,caps,goals,is_injured,is_suspended,club) VALUES (1,'Lucas','Biglia','1986-01-30','Argentiina',6,'MF',28,0,FALSE,FALSE,'Lazio');
INSERT INTO players(team_id,firstname,lastname,birthday,nationality,squadnumber,position,caps,goals,is_injured,is_suspended,club) VALUES (1,'Ángel di','María','1988-02-14','Argentiina',7,'MF',59,11,FALSE,FALSE,'Manchester United');
INSERT INTO players(team_id,firstname,lastname,birthday,nationality,squadnumber,position,caps,goals,is_injured,is_suspended,club) VALUES (1,'Roberto','Pereyra','1991-01-07','Argentiina',8,'MF',6,0,FALSE,FALSE,'Juventus');
INSERT INTO players(team_id,firstname,lastname,birthday,nationality,squadnumber,position,caps,goals,is_injured,is_suspended,club) VALUES (1,'Gonzalo','Higuaín','1987-12-10','Argentiina',9,'FW',47,23,FALSE,FALSE,'Napoli');
INSERT INTO players(team_id,firstname,lastname,birthday,nationality,squadnumber,position,caps,goals,is_injured,is_suspended,club) VALUES (1,'Lionel','Messi','1987-06-24','Argentiina',10,'FW',97,45,FALSE,FALSE,'Barcelona');
INSERT INTO players(team_id,firstname,lastname,birthday,nationality,squadnumber,position,caps,goals,is_injured,is_suspended,club) VALUES (1,'Sergio','Agüero','1988-06-02','Argentiina',11,'FW',60,23,FALSE,FALSE,'Manchester City');
INSERT INTO players(team_id,firstname,lastname,birthday,nationality,squadnumber,position,caps,goals,is_injured,is_suspended,club) VALUES (1,'Nahuel','Guzmán','1986-02-10','Argentiina',12,'GK',3,0,FALSE,FALSE,'UANL');
INSERT INTO players(team_id,firstname,lastname,birthday,nationality,squadnumber,position,caps,goals,is_injured,is_suspended,club) VALUES (1,'Milton','Casco','1988-04-11','Argentiina',13,'DF',0,0,FALSE,FALSE,'Newell''s Old Boys');
INSERT INTO players(team_id,firstname,lastname,birthday,nationality,squadnumber,position,caps,goals,is_injured,is_suspended,club) VALUES (1,'Javier','Mascherano','1984-06-08','Argentiina',14,'MF',111,3,FALSE,FALSE,'Barcelona');
INSERT INTO players(team_id,firstname,lastname,birthday,nationality,squadnumber,position,caps,goals,is_injured,is_suspended,club) VALUES (1,'Martín','Demichelis','1980-12-20','Argentiina',15,'DF',44,2,FALSE,FALSE,'Manchester City');
INSERT INTO players(team_id,firstname,lastname,birthday,nationality,squadnumber,position,caps,goals,is_injured,is_suspended,club) VALUES (1,'Marcos','Rojo','1990-03-20','Argentiina',16,'DF',31,1,FALSE,FALSE,'Manchester United');
INSERT INTO players(team_id,firstname,lastname,birthday,nationality,squadnumber,position,caps,goals,is_injured,is_suspended,club) VALUES (1,'Nicolás','Otamendi','1988-02-12','Argentiina',17,'DF',19,1,FALSE,FALSE,'Valencia');
INSERT INTO players(team_id,firstname,lastname,birthday,nationality,squadnumber,position,caps,goals,is_injured,is_suspended,club) VALUES (1,'Carlos','Tevez','1984-02-07','Argentiina',18,'FW',68,13,FALSE,FALSE,'Juventus');
INSERT INTO players(team_id,firstname,lastname,birthday,nationality,squadnumber,position,caps,goals,is_injured,is_suspended,club) VALUES (1,'Éver','Banega','1988-06-29','Argentiina',19,'MF',28,4,FALSE,FALSE,'Sevilla');
INSERT INTO players(team_id,firstname,lastname,birthday,nationality,squadnumber,position,caps,goals,is_injured,is_suspended,club) VALUES (1,'Érik','Lamela','1992-03-04','Argentiina',20,'MF',10,1,FALSE,FALSE,'Tottenham Hotspur');
INSERT INTO players(team_id,firstname,lastname,birthday,nationality,squadnumber,position,caps,goals,is_injured,is_suspended,club) VALUES (1,'Javier','Pastore','1989-06-20','Argentiina',21,'MF',18,1,FALSE,FALSE,'Paris Saint-Germain');
INSERT INTO players(team_id,firstname,lastname,birthday,nationality,squadnumber,position,caps,goals,is_injured,is_suspended,club) VALUES (1,'Ezequiel','Lavezzi','1985-05-03','Argentiina',22,'FW',39,4,FALSE,FALSE,'Paris Saint-Germain');
INSERT INTO players(team_id,firstname,lastname,birthday,nationality,squadnumber,position,caps,goals,is_injured,is_suspended,club) VALUES (1,'Mariano','Andújar','1983-07-30','Argentiina',23,'GK',11,0,FALSE,FALSE,'Napoli');

-- 2: Bolivia
INSERT INTO players(team_id,firstname,lastname,birthday,nationality,squadnumber,position,caps,goals,is_injured,is_suspended,club) VALUES (2,'Romel','Quiñónez','1992-06-25','Bolivia',1,'GK',7,0,FALSE,FALSE,'Bolívar');
INSERT INTO players(team_id,firstname,lastname,birthday,nationality,squadnumber,position,caps,goals,is_injured,is_suspended,club) VALUES (2,'Miguel','Hurtado','1985-07-04','Bolivia',2,'DF',2,0,FALSE,FALSE,'Blooming');
INSERT INTO players(team_id,firstname,lastname,birthday,nationality,squadnumber,position,caps,goals,is_injured,is_suspended,club) VALUES (2,'Alejandro','Chumacero','1991-04-22','Bolivia',3,'MF',21,1,FALSE,FALSE,'The Strongest');
INSERT INTO players(team_id,firstname,lastname,birthday,nationality,squadnumber,position,caps,goals,is_injured,is_suspended,club) VALUES (2,'Leonel','Morales','1988-09-02','Bolivia',4,'DF',2,0,FALSE,FALSE,'Blooming');
INSERT INTO players(team_id,firstname,lastname,birthday,nationality,squadnumber,position,caps,goals,is_injured,is_suspended,club) VALUES (2,'Ronald','Eguino','1988-02-20','Bolivia',5,'DF',8,0,FALSE,FALSE,'Bolívar');
INSERT INTO players(team_id,firstname,lastname,birthday,nationality,squadnumber,position,caps,goals,is_injured,is_suspended,club) VALUES (2,'Danny','Bejarano','1994-01-03','Bolivia',6,'MF',8,0,FALSE,FALSE,'Oriente Petrolero');
INSERT INTO players(team_id,firstname,lastname,birthday,nationality,squadnumber,position,caps,goals,is_injured,is_suspended,club) VALUES (2,'Alcides','Peña','1989-01-14','Bolivia',7,'FW',15,1,FALSE,FALSE,'Oriente Petrolero');
INSERT INTO players(team_id,firstname,lastname,birthday,nationality,squadnumber,position,caps,goals,is_injured,is_suspended,club) VALUES (2,'Martin','Smedberg-Dalence','1984-05-10','Bolivia',8,'MF',1,0,FALSE,FALSE,'IFK Göteborg');
INSERT INTO players(team_id,firstname,lastname,birthday,nationality,squadnumber,position,caps,goals,is_injured,is_suspended,club) VALUES (2,'Marcelo Martins','Moreno','1987-06-18','Bolivia',9,'FW',49,12,FALSE,FALSE,'Changchun Yatai');
INSERT INTO players(team_id,firstname,lastname,birthday,nationality,squadnumber,position,caps,goals,is_injured,is_suspended,club) VALUES (2,'Pablo','Escobar','1979-02-23','Bolivia',10,'FW',16,3,FALSE,FALSE,'The Strongest');
INSERT INTO players(team_id,firstname,lastname,birthday,nationality,squadnumber,position,caps,goals,is_injured,is_suspended,club) VALUES (2,'Damián','Lizio','1989-06-30','Bolivia',11,'MF',2,1,FALSE,FALSE,'O''Higgins');
INSERT INTO players(team_id,firstname,lastname,birthday,nationality,squadnumber,position,caps,goals,is_injured,is_suspended,club) VALUES (2,'José','Peñarrieta','1988-11-18','Bolivia',12,'GK',0,0,FALSE,FALSE,'Petrolero Yacuiba');
INSERT INTO players(team_id,firstname,lastname,birthday,nationality,squadnumber,position,caps,goals,is_injured,is_suspended,club) VALUES (2,'Damir','Miranda','1985-10-06','Bolivia',13,'MF',4,0,FALSE,FALSE,'Bolívar');
INSERT INTO players(team_id,firstname,lastname,birthday,nationality,squadnumber,position,caps,goals,is_injured,is_suspended,club) VALUES (2,'Edemir','Rodríguez','1984-10-21','Bolivia',14,'DF',16,0,FALSE,FALSE,'Bolívar');
INSERT INTO players(team_id,firstname,lastname,birthday,nationality,squadnumber,position,caps,goals,is_injured,is_suspended,club) VALUES (2,'Sebastián','Gamarra','1997-01-15','Bolivia',15,'MF',0,0,FALSE,FALSE,'Milan');
INSERT INTO players(team_id,firstname,lastname,birthday,nationality,squadnumber,position,caps,goals,is_injured,is_suspended,club) VALUES (2,'Ronald','Raldes','1981-04-20','Bolivia',16,'DF',81,1,FALSE,FALSE,'Oriente Petrolero');
INSERT INTO players(team_id,firstname,lastname,birthday,nationality,squadnumber,position,caps,goals,is_injured,is_suspended,club) VALUES (2,'Marvin','Bejarano','1988-03-06','Bolivia',17,'DF',20,0,FALSE,FALSE,'Oriente Petrolero');
INSERT INTO players(team_id,firstname,lastname,birthday,nationality,squadnumber,position,caps,goals,is_injured,is_suspended,club) VALUES (2,'Ricardo','Pedriel','1987-09-01','Bolivia',18,'FW',15,3,FALSE,FALSE,'Mersin İdmanyurdu');
INSERT INTO players(team_id,firstname,lastname,birthday,nationality,squadnumber,position,caps,goals,is_injured,is_suspended,club) VALUES (2,'Wálter','Veizaga','1986-04-22','Bolivia',19,'MF',10,0,FALSE,FALSE,'The Strongest');
INSERT INTO players(team_id,firstname,lastname,birthday,nationality,squadnumber,position,caps,goals,is_injured,is_suspended,club) VALUES (2,'Jhasmani','Campos','1988-05-10','Bolivia',20,'MF',27,2,FALSE,FALSE,'Bolívar');
INSERT INTO players(team_id,firstname,lastname,birthday,nationality,squadnumber,position,caps,goals,is_injured,is_suspended,club) VALUES (2,'Cristian','Coimbra','1989-09-11','Bolivia',21,'DF',0,0,FALSE,FALSE,'Blooming');
INSERT INTO players(team_id,firstname,lastname,birthday,nationality,squadnumber,position,caps,goals,is_injured,is_suspended,club) VALUES (2,'Edward','Zenteno','1984-12-05','Bolivia',22,'DF',15,0,FALSE,FALSE,'Jorge Wilstermann');
INSERT INTO players(team_id,firstname,lastname,birthday,nationality,squadnumber,position,caps,goals,is_injured,is_suspended,club) VALUES (2,'Hugo','Suárez','1982-02-07','Bolivia',23,'GK',12,0,FALSE,FALSE,'Blooming');

-- 3: Brasilia
INSERT INTO players(team_id,firstname,lastname,birthday,nationality,squadnumber,position,caps,goals,is_injured,is_suspended,club) VALUES (3,'Jefferson','','1983-01-02','Brasilia',1,'GK',16,0,FALSE,FALSE,'Botafogo');
INSERT INTO players(team_id,firstname,lastname,birthday,nationality,squadnumber,position,caps,goals,is_injured,is_suspended,club) VALUES (3,'Daniel','Alves','1983-05-06','Brasilia',2,'DF',79,6,FALSE,FALSE,'FC Barcelona');
INSERT INTO players(team_id,firstname,lastname,birthday,nationality,squadnumber,position,caps,goals,is_injured,is_suspended,club) VALUES (3,'Miranda','','1984-09-07','Brasilia',3,'DF',15,0,FALSE,FALSE,'Atlético de Madrid');
INSERT INTO players(team_id,firstname,lastname,birthday,nationality,squadnumber,position,caps,goals,is_injured,is_suspended,club) VALUES (3,'David','Luiz','1987-04-22','Brasilia',4,'DF',47,3,FALSE,FALSE,'Paris Saint-Germain');
INSERT INTO players(team_id,firstname,lastname,birthday,nationality,squadnumber,position,caps,goals,is_injured,is_suspended,club) VALUES (3,'Fernandinho','','1985-05-04','Brasilia',5,'MF',14,2,FALSE,FALSE,'Manchester City');
INSERT INTO players(team_id,firstname,lastname,birthday,nationality,squadnumber,position,caps,goals,is_injured,is_suspended,club) VALUES (3,'Filipe','Luís','1985-08-09','Brasilia',6,'DF',12,0,FALSE,FALSE,'Chelsea');
INSERT INTO players(team_id,firstname,lastname,birthday,nationality,squadnumber,position,caps,goals,is_injured,is_suspended,club) VALUES (3,'Douglas','Costa','1990-09-14','Brasilia',7,'MF',4,0,FALSE,FALSE,'Shakhtar Donetsk');
INSERT INTO players(team_id,firstname,lastname,birthday,nationality,squadnumber,position,caps,goals,is_injured,is_suspended,club) VALUES (3,'Elias','','1985-05-16','Brasilia',8,'MF',19,0,FALSE,FALSE,'Corinthians');
INSERT INTO players(team_id,firstname,lastname,birthday,nationality,squadnumber,position,caps,goals,is_injured,is_suspended,club) VALUES (3,'Diego','Tardelli','1985-05-10','Brasilia',9,'FW',9,3,FALSE,FALSE,'Shandong Luneng Taishan');
INSERT INTO players(team_id,firstname,lastname,birthday,nationality,squadnumber,position,caps,goals,is_injured,is_suspended,club) VALUES (3,'Neymar','','1992-02-05','Brasilia',10,'FW',62,43,FALSE,FALSE,'Barcelona');
INSERT INTO players(team_id,firstname,lastname,birthday,nationality,squadnumber,position,caps,goals,is_injured,is_suspended,club) VALUES (3,'Roberto','Firmino','1991-10-02','Brasilia',11,'MF',4,2,FALSE,FALSE,'Hoffenheim');
INSERT INTO players(team_id,firstname,lastname,birthday,nationality,squadnumber,position,caps,goals,is_injured,is_suspended,club) VALUES (3,'Neto','','1989-07-19','Brasilia',12,'GK',0,0,FALSE,FALSE,'Fiorentina');
INSERT INTO players(team_id,firstname,lastname,birthday,nationality,squadnumber,position,caps,goals,is_injured,is_suspended,club) VALUES (3,'Marquinhos','','1994-05-14','Brasilia',13,'DF',4,0,FALSE,FALSE,'Paris Saint-Germain');
INSERT INTO players(team_id,firstname,lastname,birthday,nationality,squadnumber,position,caps,goals,is_injured,is_suspended,club) VALUES (3,'Thiago','Silva','1984-09-22','Brasilia',14,'DF',54,3,FALSE,FALSE,'Paris Saint-Germain');
INSERT INTO players(team_id,firstname,lastname,birthday,nationality,squadnumber,position,caps,goals,is_injured,is_suspended,club) VALUES (3,'Geferson','','1994-05-13','Brasilia',15,'DF',0,0,FALSE,FALSE,'Internacional');
INSERT INTO players(team_id,firstname,lastname,birthday,nationality,squadnumber,position,caps,goals,is_injured,is_suspended,club) VALUES (3,'Fabinho','','1993-10-23','Brasilia',16,'DF',0,0,FALSE,FALSE,'Monaco');
INSERT INTO players(team_id,firstname,lastname,birthday,nationality,squadnumber,position,caps,goals,is_injured,is_suspended,club) VALUES (3,'Fred','','1993-03-05','Brasilia',17,'MF',2,0,FALSE,FALSE,'Shakhtar Donetsk');
INSERT INTO players(team_id,firstname,lastname,birthday,nationality,squadnumber,position,caps,goals,is_injured,is_suspended,club) VALUES (3,'Everton','Ribeiro','1989-04-10','Brasilia',18,'MF',3,0,FALSE,FALSE,'Al-Ahli');
INSERT INTO players(team_id,firstname,lastname,birthday,nationality,squadnumber,position,caps,goals,is_injured,is_suspended,club) VALUES (3,'Willian','','1988-08-09','Brasilia',19,'MF',20,4,FALSE,FALSE,'Chelsea');
INSERT INTO players(team_id,firstname,lastname,birthday,nationality,squadnumber,position,caps,goals,is_injured,is_suspended,club) VALUES (3,'Robinho','','1984-01-25','Brasilia',20,'FW',96,27,FALSE,FALSE,'Santos');
INSERT INTO players(team_id,firstname,lastname,birthday,nationality,squadnumber,position,caps,goals,is_injured,is_suspended,club) VALUES (3,'Philippe','Coutinho','1992-06-12','Brasilia',21,'MF',6,1,FALSE,FALSE,'Liverpool');
INSERT INTO players(team_id,firstname,lastname,birthday,nationality,squadnumber,position,caps,goals,is_injured,is_suspended,club) VALUES (3,'Casemiro','','1992-02-23','Brasilia',22,'MF',7,0,FALSE,FALSE,'Real Madrid');
INSERT INTO players(team_id,firstname,lastname,birthday,nationality,squadnumber,position,caps,goals,is_injured,is_suspended,club) VALUES (3,'Marcelo','Grohe','1987-01-13','Brasilia',23,'GK',0,0,FALSE,FALSE,'Grêmio');

-- 4: Chile
INSERT INTO players(team_id,firstname,lastname,birthday,nationality,squadnumber,position,caps,goals,is_injured,is_suspended,club) VALUES (4,'Claudio','Bravo','1983-04-13','Chile',1,'GK',89,0,FALSE,FALSE,'Barcelona');
INSERT INTO players(team_id,firstname,lastname,birthday,nationality,squadnumber,position,caps,goals,is_injured,is_suspended,club) VALUES (4,'Eugenio','Mena','1988-07-18','Chile',2,'DF',34,3,FALSE,FALSE,'Cruzeiro');
INSERT INTO players(team_id,firstname,lastname,birthday,nationality,squadnumber,position,caps,goals,is_injured,is_suspended,club) VALUES (4,'Miiko','Albornoz','1990-11-30','Chile',3,'DF',5,1,FALSE,FALSE,'Hannover 96');
INSERT INTO players(team_id,firstname,lastname,birthday,nationality,squadnumber,position,caps,goals,is_injured,is_suspended,club) VALUES (4,'Mauricio','Isla','1988-06-12','Chile',4,'DF',59,2,FALSE,FALSE,'Juventus');
INSERT INTO players(team_id,firstname,lastname,birthday,nationality,squadnumber,position,caps,goals,is_injured,is_suspended,club) VALUES (4,'Francisco','Silva','1986-02-11','Chile',5,'MF',17,0,FALSE,FALSE,'Club Brugge');
INSERT INTO players(team_id,firstname,lastname,birthday,nationality,squadnumber,position,caps,goals,is_injured,is_suspended,club) VALUES (4,'David','Pizarro','1979-09-11','Chile',6,'MF',41,2,FALSE,FALSE,'Fiorentina');
INSERT INTO players(team_id,firstname,lastname,birthday,nationality,squadnumber,position,caps,goals,is_injured,is_suspended,club) VALUES (4,'Alexis','Sánchez','1988-12-19','Chile',7,'FW',79,26,FALSE,FALSE,'Arsenal');
INSERT INTO players(team_id,firstname,lastname,birthday,nationality,squadnumber,position,caps,goals,is_injured,is_suspended,club) VALUES (4,'Arturo','Vidal','1987-05-22','Chile',8,'MF',63,9,FALSE,FALSE,'Juventus');
INSERT INTO players(team_id,firstname,lastname,birthday,nationality,squadnumber,position,caps,goals,is_injured,is_suspended,club) VALUES (4,'Mauricio','Pinilla','1984-02-04','Chile',9,'FW',33,6,FALSE,FALSE,'Atalanta');
INSERT INTO players(team_id,firstname,lastname,birthday,nationality,squadnumber,position,caps,goals,is_injured,is_suspended,club) VALUES (4,'Jorge','Valdivia','1983-10-19','Chile',10,'MF',61,6,FALSE,FALSE,'Palmeiras');
INSERT INTO players(team_id,firstname,lastname,birthday,nationality,squadnumber,position,caps,goals,is_injured,is_suspended,club) VALUES (4,'Eduardo','Vargas','1989-11-20','Chile',11,'FW',41,18,FALSE,FALSE,'Napoli');
INSERT INTO players(team_id,firstname,lastname,birthday,nationality,squadnumber,position,caps,goals,is_injured,is_suspended,club) VALUES (4,'Paulo','Garcés','1984-08-02','Chile',12,'GK',1,0,FALSE,FALSE,'Colo-Colo');
INSERT INTO players(team_id,firstname,lastname,birthday,nationality,squadnumber,position,caps,goals,is_injured,is_suspended,club) VALUES (4,'José','Rojas','1983-06-03','Chile',13,'DF',23,1,FALSE,FALSE,'Universidad de Chile');
INSERT INTO players(team_id,firstname,lastname,birthday,nationality,squadnumber,position,caps,goals,is_injured,is_suspended,club) VALUES (4,'Matías','Fernández','1986-05-15','Chile',14,'MF',62,14,FALSE,FALSE,'Fiorentina');
INSERT INTO players(team_id,firstname,lastname,birthday,nationality,squadnumber,position,caps,goals,is_injured,is_suspended,club) VALUES (4,'Jean','Beausejour','1984-06-03','Chile',15,'MF',65,6,FALSE,FALSE,'Colo-Colo');
INSERT INTO players(team_id,firstname,lastname,birthday,nationality,squadnumber,position,caps,goals,is_injured,is_suspended,club) VALUES (4,'Felipe','Gutiérrez','1990-10-08','Chile',16,'MF',22,1,FALSE,FALSE,'Twente');
INSERT INTO players(team_id,firstname,lastname,birthday,nationality,squadnumber,position,caps,goals,is_injured,is_suspended,club) VALUES (4,'Gary','Medel','1987-08-03','Chile',17,'DF',73,6,FALSE,FALSE,'Inter Milan');
INSERT INTO players(team_id,firstname,lastname,birthday,nationality,squadnumber,position,caps,goals,is_injured,is_suspended,club) VALUES (4,'Gonzalo','Jara','1985-08-29','Chile',18,'DF',75,3,FALSE,FALSE,'Mainz 05');
INSERT INTO players(team_id,firstname,lastname,birthday,nationality,squadnumber,position,caps,goals,is_injured,is_suspended,club) VALUES (4,'José Pedro','Fuenzalida','1985-02-22','Chile',19,'MF',26,1,FALSE,FALSE,'Boca Juniors');
INSERT INTO players(team_id,firstname,lastname,birthday,nationality,squadnumber,position,caps,goals,is_injured,is_suspended,club) VALUES (4,'Charles','Aránguiz','1989-04-17','Chile',20,'MF',33,4,FALSE,FALSE,'Internacional');
INSERT INTO players(team_id,firstname,lastname,birthday,nationality,squadnumber,position,caps,goals,is_injured,is_suspended,club) VALUES (4,'Marcelo','Díaz','1986-12-30','Chile',21,'MF',31,1,FALSE,FALSE,'Hamburger SV');
INSERT INTO players(team_id,firstname,lastname,birthday,nationality,squadnumber,position,caps,goals,is_injured,is_suspended,club) VALUES (4,'Ángelo','Henríquez','1994-04-13','Chile',22,'FW',5,2,FALSE,FALSE,'Manchester United');
INSERT INTO players(team_id,firstname,lastname,birthday,nationality,squadnumber,position,caps,goals,is_injured,is_suspended,club) VALUES (4,'Johnny','Herrera','1981-05-09','Chile',23,'GK',11,0,FALSE,FALSE,'Universidad de Chile');
INSERT INTO players(team_id,firstname,lastname,birthday,nationality,squadnumber,position,caps,goals,is_injured,is_suspended,club) VALUES (5,'David','Ospina','1988-08-31','Kolumbia',1,'GK',52,0,FALSE,FALSE,'Arsenal');

-- 5: Kolumbia
INSERT INTO players(team_id,firstname,lastname,birthday,nationality,squadnumber,position,caps,goals,is_injured,is_suspended,club) VALUES (5,'Cristián','Zapata','1986-09-30','Kolumbia',2,'DF',31,0,FALSE,FALSE,'Milan');
INSERT INTO players(team_id,firstname,lastname,birthday,nationality,squadnumber,position,caps,goals,is_injured,is_suspended,club) VALUES (5,'Pedro','Franco','1991-04-23','Kolumbia',3,'DF',4,0,FALSE,FALSE,'Beşiktaş');
INSERT INTO players(team_id,firstname,lastname,birthday,nationality,squadnumber,position,caps,goals,is_injured,is_suspended,club) VALUES (5,'Santiago','Arias','1992-01-13','Kolumbia',4,'DF',14,0,FALSE,FALSE,'PSV');
INSERT INTO players(team_id,firstname,lastname,birthday,nationality,squadnumber,position,caps,goals,is_injured,is_suspended,club) VALUES (5,'Edwin','Valencia','1985-03-29','Kolumbia',5,'MF',15,0,FALSE,FALSE,'Santos');
INSERT INTO players(team_id,firstname,lastname,birthday,nationality,squadnumber,position,caps,goals,is_injured,is_suspended,club) VALUES (5,'Carlos','Sánchez','1986-02-06','Kolumbia',6,'MF',54,0,FALSE,FALSE,'Aston Villa');
INSERT INTO players(team_id,firstname,lastname,birthday,nationality,squadnumber,position,caps,goals,is_injured,is_suspended,club) VALUES (5,'Pablo','Armero','1986-11-02','Kolumbia',7,'DF',63,2,FALSE,FALSE,'Flamengo');
INSERT INTO players(team_id,firstname,lastname,birthday,nationality,squadnumber,position,caps,goals,is_injured,is_suspended,club) VALUES (5,'Edwin','Cardona','1992-12-08','Kolumbia',8,'MF',4,1,FALSE,FALSE,'Monterrey');
INSERT INTO players(team_id,firstname,lastname,birthday,nationality,squadnumber,position,caps,goals,is_injured,is_suspended,club) VALUES (5,'Radamel','Falcao','1986-02-10','Kolumbia',9,'FW',56,24,FALSE,FALSE,'Monaco');
INSERT INTO players(team_id,firstname,lastname,birthday,nationality,squadnumber,position,caps,goals,is_injured,is_suspended,club) VALUES (5,'James','Rodríguez','1991-07-12','Kolumbia',10,'MF',32,12,FALSE,FALSE,'Real Madrid');
INSERT INTO players(team_id,firstname,lastname,birthday,nationality,squadnumber,position,caps,goals,is_injured,is_suspended,club) VALUES (5,'Juan','Cuadrado','1988-05-26','Kolumbia',11,'MF',39,5,FALSE,FALSE,'Chelsea');
INSERT INTO players(team_id,firstname,lastname,birthday,nationality,squadnumber,position,caps,goals,is_injured,is_suspended,club) VALUES (5,'Camilo','Vargas','1989-09-01','Kolumbia',12,'GK',4,0,FALSE,FALSE,'Atlético Nacional');
INSERT INTO players(team_id,firstname,lastname,birthday,nationality,squadnumber,position,caps,goals,is_injured,is_suspended,club) VALUES (5,'Darwin','Andrade','1991-02-11','Kolumbia',13,'DF',2,0,FALSE,FALSE,'Standard Liège');
INSERT INTO players(team_id,firstname,lastname,birthday,nationality,squadnumber,position,caps,goals,is_injured,is_suspended,club) VALUES (5,'Carlos','Valdés','1985-05-22','Kolumbia',14,'DF',16,2,FALSE,FALSE,'Nacional');
INSERT INTO players(team_id,firstname,lastname,birthday,nationality,squadnumber,position,caps,goals,is_injured,is_suspended,club) VALUES (5,'Alexander','Mejía','1988-09-07','Kolumbia',15,'MF',17,0,FALSE,FALSE,'Monterrey');
INSERT INTO players(team_id,firstname,lastname,birthday,nationality,squadnumber,position,caps,goals,is_injured,is_suspended,club) VALUES (5,'Víctor','Ibarbo','1990-05-19','Kolumbia',16,'FW',12,1,FALSE,FALSE,'Roma');
INSERT INTO players(team_id,firstname,lastname,birthday,nationality,squadnumber,position,caps,goals,is_injured,is_suspended,club) VALUES (5,'Carlos','Bacca','1986-09-08','Kolumbia',17,'FW',17,7,FALSE,FALSE,'Sevilla');
INSERT INTO players(team_id,firstname,lastname,birthday,nationality,squadnumber,position,caps,goals,is_injured,is_suspended,club) VALUES (5,'Juan Camilo','Zúñiga','1985-12-14','Kolumbia',18,'DF',58,1,FALSE,FALSE,'Napoli');
INSERT INTO players(team_id,firstname,lastname,birthday,nationality,squadnumber,position,caps,goals,is_injured,is_suspended,club) VALUES (5,'Teófilo','Gutiérrez','1985-05-28','Kolumbia',19,'FW',38,14,FALSE,FALSE,'River Plate');
INSERT INTO players(team_id,firstname,lastname,birthday,nationality,squadnumber,position,caps,goals,is_injured,is_suspended,club) VALUES (5,'Luis','Muriel','1991-04-18','Kolumbia',20,'FW',5,1,FALSE,FALSE,'Sampdoria');
INSERT INTO players(team_id,firstname,lastname,birthday,nationality,squadnumber,position,caps,goals,is_injured,is_suspended,club) VALUES (5,'Jackson','Martínez','1986-10-03','Kolumbia',21,'FW',35,10,FALSE,FALSE,'Porto');
INSERT INTO players(team_id,firstname,lastname,birthday,nationality,squadnumber,position,caps,goals,is_injured,is_suspended,club) VALUES (5,'Jeison','Murillo','1992-05-27','Kolumbia',22,'DF',5,0,FALSE,FALSE,'Granada');
INSERT INTO players(team_id,firstname,lastname,birthday,nationality,squadnumber,position,caps,goals,is_injured,is_suspended,club) VALUES (5,'Cristian','Bonilla','1993-06-02','Kolumbia',23,'GK',0,0,FALSE,FALSE,'La Equidad');

-- 6: Ecuadro
INSERT INTO players(team_id,firstname,lastname,birthday,nationality,squadnumber,position,caps,goals,is_injured,is_suspended,club) VALUES (6,'Librado','Azcona','1984-01-18','Ecuador',1,'GK',0,0,FALSE,FALSE,'Independiente del Valle');
INSERT INTO players(team_id,firstname,lastname,birthday,nationality,squadnumber,position,caps,goals,is_injured,is_suspended,club) VALUES (6,'Arturo','Mina','1990-10-08','Ecuador',2,'DF',2,0,FALSE,FALSE,'Independiente del Valle');
INSERT INTO players(team_id,firstname,lastname,birthday,nationality,squadnumber,position,caps,goals,is_injured,is_suspended,club) VALUES (6,'Frickson','Erazo','1988-05-05','Ecuador',3,'DF',46,1,FALSE,FALSE,'Grêmio');
INSERT INTO players(team_id,firstname,lastname,birthday,nationality,squadnumber,position,caps,goals,is_injured,is_suspended,club) VALUES (6,'Juan Carlos','Paredes','1987-07-08','Ecuador',4,'DF',47,0,FALSE,FALSE,'Watford');
INSERT INTO players(team_id,firstname,lastname,birthday,nationality,squadnumber,position,caps,goals,is_injured,is_suspended,club) VALUES (6,'Renato','Ibarra','1991-01-20','Ecuador',5,'MF',23,0,FALSE,FALSE,'Vitesse');
INSERT INTO players(team_id,firstname,lastname,birthday,nationality,squadnumber,position,caps,goals,is_injured,is_suspended,club) VALUES (6,'Christian','Noboa','1985-04-09','Ecuador',6,'MF',51,3,FALSE,FALSE,'PAOK');
INSERT INTO players(team_id,firstname,lastname,birthday,nationality,squadnumber,position,caps,goals,is_injured,is_suspended,club) VALUES (6,'Jefferson','Montero','1989-09-01','Ecuador',7,'MF',44,8,FALSE,FALSE,'Swansea City');
INSERT INTO players(team_id,firstname,lastname,birthday,nationality,squadnumber,position,caps,goals,is_injured,is_suspended,club) VALUES (6,'Miller','Bolaños','1990-06-01','Ecuador',8,'FW',2,1,FALSE,FALSE,'Emelec');
INSERT INTO players(team_id,firstname,lastname,birthday,nationality,squadnumber,position,caps,goals,is_injured,is_suspended,club) VALUES (6,'Fidel','Martínez','1990-02-15','Ecuador',9,'FW',12,2,FALSE,FALSE,'U. de G.');
INSERT INTO players(team_id,firstname,lastname,birthday,nationality,squadnumber,position,caps,goals,is_injured,is_suspended,club) VALUES (6,'Walter','Ayoví','1979-08-11','Ecuador',10,'DF',99,8,FALSE,FALSE,'Pachuca');
INSERT INTO players(team_id,firstname,lastname,birthday,nationality,squadnumber,position,caps,goals,is_injured,is_suspended,club) VALUES (6,'Juan','Cazares','1992-04-03','Ecuador',11,'MF',3,1,FALSE,FALSE,'Banfield');
INSERT INTO players(team_id,firstname,lastname,birthday,nationality,squadnumber,position,caps,goals,is_injured,is_suspended,club) VALUES (6,'Esteban','Dreer','1981-11-11','Ecuador',12,'GK',0,0,FALSE,FALSE,'Emelec');
INSERT INTO players(team_id,firstname,lastname,birthday,nationality,squadnumber,position,caps,goals,is_injured,is_suspended,club) VALUES (6,'Enner','Valencia','1989-11-04','Ecuador',13,'FW',17,11,FALSE,FALSE,'West Ham United');
INSERT INTO players(team_id,firstname,lastname,birthday,nationality,squadnumber,position,caps,goals,is_injured,is_suspended,club) VALUES (6,'Osbaldo','Lastra','1983-08-10','Ecuador',14,'MF',2,0,FALSE,FALSE,'Emelec');
INSERT INTO players(team_id,firstname,lastname,birthday,nationality,squadnumber,position,caps,goals,is_injured,is_suspended,club) VALUES (6,'Pedro','Quiñónez','1986-03-04','Ecuador',15,'MF',11,0,FALSE,FALSE,'Emelec');
INSERT INTO players(team_id,firstname,lastname,birthday,nationality,squadnumber,position,caps,goals,is_injured,is_suspended,club) VALUES (6,'Mario','Pineida','1992-07-06','Ecuador',16,'DF',2,0,FALSE,FALSE,'Independiente del Valle');
INSERT INTO players(team_id,firstname,lastname,birthday,nationality,squadnumber,position,caps,goals,is_injured,is_suspended,club) VALUES (6,'Daniel','Angulo','1986-11-16','Ecuador',17,'FW',0,0,FALSE,FALSE,'Independiente del Valle');
INSERT INTO players(team_id,firstname,lastname,birthday,nationality,squadnumber,position,caps,goals,is_injured,is_suspended,club) VALUES (6,'Óscar','Bagüí','1982-12-10','Ecuador',18,'DF',21,0,FALSE,FALSE,'Emelec');
INSERT INTO players(team_id,firstname,lastname,birthday,nationality,squadnumber,position,caps,goals,is_injured,is_suspended,club) VALUES (6,'Pedro','Larrea','1986-05-21','Ecuador',19,'MF',0,0,FALSE,FALSE,'LDU Loja');
INSERT INTO players(team_id,firstname,lastname,birthday,nationality,squadnumber,position,caps,goals,is_injured,is_suspended,club) VALUES (6,'John','Narváez','1991-06-12','Ecuador',20,'DF',0,0,FALSE,FALSE,'Emelec');
INSERT INTO players(team_id,firstname,lastname,birthday,nationality,squadnumber,position,caps,goals,is_injured,is_suspended,club) VALUES (6,'Gabriel','Achilier','1985-03-23','Ecuador',21,'DF',25,0,FALSE,FALSE,'Emelec');
INSERT INTO players(team_id,firstname,lastname,birthday,nationality,squadnumber,position,caps,goals,is_injured,is_suspended,club) VALUES (6,'Jonathan','González','1995-03-07','Ecuador',22,'MF',2,0,FALSE,FALSE,'U. de G.');
INSERT INTO players(team_id,firstname,lastname,birthday,nationality,squadnumber,position,caps,goals,is_injured,is_suspended,club) VALUES (6,'Alexander','Domínguez','1987-06-05','Ecuador',23,'GK',25,0,FALSE,FALSE,'LDU Quito');

-- 7: Jamaika
INSERT INTO players(team_id,firstname,lastname,birthday,nationality,squadnumber,position,caps,goals,is_injured,is_suspended,club) VALUES (7,'Duwayne','Kerr','1987-02-16','Jamaika',1,'GK',11,0,FALSE,FALSE,'Sarpsborg 08');
INSERT INTO players(team_id,firstname,lastname,birthday,nationality,squadnumber,position,caps,goals,is_injured,is_suspended,club) VALUES (7,'Daniel','Gordon','1985-01-16','Jamaika',2,'DF',5,1,FALSE,FALSE,'Karlsruher SC');
INSERT INTO players(team_id,firstname,lastname,birthday,nationality,squadnumber,position,caps,goals,is_injured,is_suspended,club) VALUES (7,'Michael','Hector','1992-07-19','Jamaika',3,'DF',0,0,FALSE,FALSE,'Reading');
INSERT INTO players(team_id,firstname,lastname,birthday,nationality,squadnumber,position,caps,goals,is_injured,is_suspended,club) VALUES (7,'Wes','Morgan','1984-01-21','Jamaika',4,'DF',12,0,FALSE,FALSE,'Leicester City');
INSERT INTO players(team_id,firstname,lastname,birthday,nationality,squadnumber,position,caps,goals,is_injured,is_suspended,club) VALUES (7,'Lance','Laing','1988-02-28','Jamaika',5,'MF',4,0,FALSE,FALSE,'FC Edmonton');
INSERT INTO players(team_id,firstname,lastname,birthday,nationality,squadnumber,position,caps,goals,is_injured,is_suspended,club) VALUES (7,'Deshorn','Brown','1990-12-22','Jamaika',6,'FW',9,2,FALSE,FALSE,'Vålerenga');
INSERT INTO players(team_id,firstname,lastname,birthday,nationality,squadnumber,position,caps,goals,is_injured,is_suspended,club) VALUES (7,'Romeo','Parkes','1990-11-20','Jamaika',7,'FW',3,1,FALSE,FALSE,'Isidro Metapán');
INSERT INTO players(team_id,firstname,lastname,birthday,nationality,squadnumber,position,caps,goals,is_injured,is_suspended,club) VALUES (7,'Hughan','Gray','1987-03-25','Jamaika',8,'DF',11,0,FALSE,FALSE,'Waterhouse');
INSERT INTO players(team_id,firstname,lastname,birthday,nationality,squadnumber,position,caps,goals,is_injured,is_suspended,club) VALUES (7,'Giles','Barnes','1988-08-05','Jamaika',9,'FW',2,1,FALSE,FALSE,'Houston Dynamo');
INSERT INTO players(team_id,firstname,lastname,birthday,nationality,squadnumber,position,caps,goals,is_injured,is_suspended,club) VALUES (7,'Jobi','McAnuff','1981-11-03','Jamaika',10,'MF',13,0,FALSE,FALSE,'Leyton Orient');
INSERT INTO players(team_id,firstname,lastname,birthday,nationality,squadnumber,position,caps,goals,is_injured,is_suspended,club) VALUES (7,'Darren','Mattocks','1990-09-02','Jamaika',11,'FW',22,8,FALSE,FALSE,'Vancouver Whitecaps');
INSERT INTO players(team_id,firstname,lastname,birthday,nationality,squadnumber,position,caps,goals,is_injured,is_suspended,club) VALUES (7,'Dwayne','Miller','1987-07-14','Jamaika',12,'GK',34,0,FALSE,FALSE,'Syrianska');
INSERT INTO players(team_id,firstname,lastname,birthday,nationality,squadnumber,position,caps,goals,is_injured,is_suspended,club) VALUES (7,'Dino','Williams','1990-03-31','Jamaika',13,'FW',8,0,FALSE,FALSE,'Montego Bay United');
INSERT INTO players(team_id,firstname,lastname,birthday,nationality,squadnumber,position,caps,goals,is_injured,is_suspended,club) VALUES (7,'Allan','Ottey','1992-12-18','Jamaika',14,'FW',0,0,FALSE,FALSE,'Montego Bay United');
INSERT INTO players(team_id,firstname,lastname,birthday,nationality,squadnumber,position,caps,goals,is_injured,is_suspended,club) VALUES (7,'Je-Vaughn','Watson','1983-10-22','Jamaika',15,'MF',41,1,FALSE,FALSE,'FC Dallas');
INSERT INTO players(team_id,firstname,lastname,birthday,nationality,squadnumber,position,caps,goals,is_injured,is_suspended,club) VALUES (7,'Joel','Grant','1987-08-26','Jamaika',16,'MF',10,1,FALSE,FALSE,'Yeovil Town');
INSERT INTO players(team_id,firstname,lastname,birthday,nationality,squadnumber,position,caps,goals,is_injured,is_suspended,club) VALUES (7,'Rodolph','Austin','1985-06-01','Jamaika',17,'MF',73,6,FALSE,FALSE,'NULL');
INSERT INTO players(team_id,firstname,lastname,birthday,nationality,squadnumber,position,caps,goals,is_injured,is_suspended,club) VALUES (7,'Simon','Dawkins','1987-12-01','Jamaika',18,'FW',8,2,FALSE,FALSE,'Derby County');
INSERT INTO players(team_id,firstname,lastname,birthday,nationality,squadnumber,position,caps,goals,is_injured,is_suspended,club) VALUES (7,'Adrian','Mariappa','1986-10-03','Jamaika',19,'DF',21,0,FALSE,FALSE,'Crystal Palace');
INSERT INTO players(team_id,firstname,lastname,birthday,nationality,squadnumber,position,caps,goals,is_injured,is_suspended,club) VALUES (7,'Kemar','Lawrence','1992-09-17','Jamaika',20,'DF',16,2,FALSE,FALSE,'New York Red Bulls');
INSERT INTO players(team_id,firstname,lastname,birthday,nationality,squadnumber,position,caps,goals,is_injured,is_suspended,club) VALUES (7,'Jermaine','Taylor','1985-01-14','Jamaika',21,'DF',80,0,FALSE,FALSE,'Houston Dynamo');
INSERT INTO players(team_id,firstname,lastname,birthday,nationality,squadnumber,position,caps,goals,is_injured,is_suspended,club) VALUES (7,'Garath','McCleary','1987-05-15','Jamaika',22,'MF',9,1,FALSE,FALSE,'Reading');
INSERT INTO players(team_id,firstname,lastname,birthday,nationality,squadnumber,position,caps,goals,is_injured,is_suspended,club) VALUES (7,'Ryan','Thompson','1985-01-07','Jamaika',23,'GK',3,0,FALSE,FALSE,'Pittsburgh Riverhounds');

-- 8: Meksiko
INSERT INTO players(team_id,firstname,lastname,birthday,nationality,squadnumber,position,caps,goals,is_injured,is_suspended,club) VALUES (8,'José de Jesús','Corona','1981-01-26','Meksiko',1,'GK',35,0,FALSE,FALSE,'Cruz Azul');
INSERT INTO players(team_id,firstname,lastname,birthday,nationality,squadnumber,position,caps,goals,is_injured,is_suspended,club) VALUES (8,'Julio','Domínguez','1987-11-08','Meksiko',2,'DF',10,0,FALSE,FALSE,'Cruz Azul');
INSERT INTO players(team_id,firstname,lastname,birthday,nationality,squadnumber,position,caps,goals,is_injured,is_suspended,club) VALUES (8,'Hugo','Ayala','1987-03-31','Meksiko',3,'DF',16,0,FALSE,FALSE,'UANL');
INSERT INTO players(team_id,firstname,lastname,birthday,nationality,squadnumber,position,caps,goals,is_injured,is_suspended,club) VALUES (8,'Rafael','Márquez','1979-02-13','Meksiko',4,'DF',124,15,FALSE,FALSE,'Verona');
INSERT INTO players(team_id,firstname,lastname,birthday,nationality,squadnumber,position,caps,goals,is_injured,is_suspended,club) VALUES (8,'Juan Carlos','Medina','1983-08-22','Meksiko',5,'MF',8,0,FALSE,FALSE,'Atlas');
INSERT INTO players(team_id,firstname,lastname,birthday,nationality,squadnumber,position,caps,goals,is_injured,is_suspended,club) VALUES (8,'Javier','Güemez','1991-10-17','Meksiko',6,'MF',4,0,FALSE,FALSE,'America');
INSERT INTO players(team_id,firstname,lastname,birthday,nationality,squadnumber,position,caps,goals,is_injured,is_suspended,club) VALUES (8,'Jesús Manuel','Corona','1993-01-06','Meksiko',7,'FW',2,1,FALSE,FALSE,'Twente');
INSERT INTO players(team_id,firstname,lastname,birthday,nationality,squadnumber,position,caps,goals,is_injured,is_suspended,club) VALUES (8,'Marco','Fabián','1989-07-21','Meksiko',8,'MF',22,6,FALSE,FALSE,'Guadalajara');
INSERT INTO players(team_id,firstname,lastname,birthday,nationality,squadnumber,position,caps,goals,is_injured,is_suspended,club) VALUES (8,'Raúl','Jiménez','1991-05-05','Meksiko',9,'FW',29,6,FALSE,FALSE,'Atlético de Madrid');
INSERT INTO players(team_id,firstname,lastname,birthday,nationality,squadnumber,position,caps,goals,is_injured,is_suspended,club) VALUES (8,'Luis','Montes','1986-05-15','Meksiko',10,'MF',13,3,FALSE,FALSE,'León');
INSERT INTO players(team_id,firstname,lastname,birthday,nationality,squadnumber,position,caps,goals,is_injured,is_suspended,club) VALUES (8,'Javier','Aquino','1990-02-11','Meksiko',11,'MF',26,0,FALSE,FALSE,'Villareal');
INSERT INTO players(team_id,firstname,lastname,birthday,nationality,squadnumber,position,caps,goals,is_injured,is_suspended,club) VALUES (8,'Alfredo','Talavera','1982-09-18','Meksiko',12,'GK',16,0,FALSE,FALSE,'Toluca');
INSERT INTO players(team_id,firstname,lastname,birthday,nationality,squadnumber,position,caps,goals,is_injured,is_suspended,club) VALUES (8,'Carlos','Salcedo','1993-09-29','Meksiko',13,'DF',1,0,FALSE,FALSE,'Guadalajara');
INSERT INTO players(team_id,firstname,lastname,birthday,nationality,squadnumber,position,caps,goals,is_injured,is_suspended,club) VALUES (8,'Juan Carlos','Valenzuela','1984-05-15','Meksiko',14,'DF',19,1,FALSE,FALSE,'Atlas');
INSERT INTO players(team_id,firstname,lastname,birthday,nationality,squadnumber,position,caps,goals,is_injured,is_suspended,club) VALUES (8,'Gerardo','Flores','1986-02-05','Meksiko',15,'DF',8,0,FALSE,FALSE,'Cruz Azul');
INSERT INTO players(team_id,firstname,lastname,birthday,nationality,squadnumber,position,caps,goals,is_injured,is_suspended,club) VALUES (8,'Adrián','Aldrete','1988-06-14','Meksiko',16,'DF',16,0,FALSE,FALSE,'Santos Laguna');
INSERT INTO players(team_id,firstname,lastname,birthday,nationality,squadnumber,position,caps,goals,is_injured,is_suspended,club) VALUES (8,'Mario','Osuna','1988-08-20','Meksiko',17,'MF',1,0,FALSE,FALSE,'Querétaro');
INSERT INTO players(team_id,firstname,lastname,birthday,nationality,squadnumber,position,caps,goals,is_injured,is_suspended,club) VALUES (8,'Enrique','Esqueda','1988-04-19','Meksiko',18,'FW',8,1,FALSE,FALSE,'UANL');
INSERT INTO players(team_id,firstname,lastname,birthday,nationality,squadnumber,position,caps,goals,is_injured,is_suspended,club) VALUES (8,'Vicente Matías','Vuoso','1981-11-03','Meksiko',19,'FW',10,4,FALSE,FALSE,'Chiapas');
INSERT INTO players(team_id,firstname,lastname,birthday,nationality,squadnumber,position,caps,goals,is_injured,is_suspended,club) VALUES (8,'Eduardo','Herrera','1988-07-25','Meksiko',20,'FW',3,3,FALSE,FALSE,'UNAM');
INSERT INTO players(team_id,firstname,lastname,birthday,nationality,squadnumber,position,caps,goals,is_injured,is_suspended,club) VALUES (8,'George','Corral','1990-07-18','Meksiko',21,'DF',1,0,FALSE,FALSE,'Querétaro');
INSERT INTO players(team_id,firstname,lastname,birthday,nationality,squadnumber,position,caps,goals,is_injured,is_suspended,club) VALUES (8,'Efraín','Velarde','1986-04-15','Meksiko',22,'DF',6,0,FALSE,FALSE,'Monterrey');
INSERT INTO players(team_id,firstname,lastname,birthday,nationality,squadnumber,position,caps,goals,is_injured,is_suspended,club) VALUES (8,'Melitón','Hernández','1982-10-15','Meksiko',23,'GK',1,0,FALSE,FALSE,'Veracruz');

-- 9: Paraguay
INSERT INTO players(team_id,firstname,lastname,birthday,nationality,squadnumber,position,caps,goals,is_injured,is_suspended,club) VALUES (9,'Justo','Villar','1977-06-30','Paraguay',1,'GK',107,0,FALSE,FALSE,'Colo-Colo');
INSERT INTO players(team_id,firstname,lastname,birthday,nationality,squadnumber,position,caps,goals,is_injured,is_suspended,club) VALUES (9,'Iván','Piris','1989-03-10','Paraguay',2,'DF',17,0,FALSE,FALSE,'Udinese');
INSERT INTO players(team_id,firstname,lastname,birthday,nationality,squadnumber,position,caps,goals,is_injured,is_suspended,club) VALUES (9,'Marcos','Cáceres','1986-05-05','Paraguay',3,'DF',17,0,FALSE,FALSE,'Newell''s Old Boys');
INSERT INTO players(team_id,firstname,lastname,birthday,nationality,squadnumber,position,caps,goals,is_injured,is_suspended,club) VALUES (9,'Pablo','Aguilar','1987-04-02','Paraguay',4,'DF',17,4,FALSE,FALSE,'América');
INSERT INTO players(team_id,firstname,lastname,birthday,nationality,squadnumber,position,caps,goals,is_injured,is_suspended,club) VALUES (9,'Bruno','Valdez','1992-10-06','Paraguay',5,'DF',0,0,FALSE,FALSE,'Cerro Porteño');
INSERT INTO players(team_id,firstname,lastname,birthday,nationality,squadnumber,position,caps,goals,is_injured,is_suspended,club) VALUES (9,'Osmar','Molinas','1987-05-03','Paraguay',6,'MF',8,0,FALSE,FALSE,'Libertad');
INSERT INTO players(team_id,firstname,lastname,birthday,nationality,squadnumber,position,caps,goals,is_injured,is_suspended,club) VALUES (9,'Raúl','Bobadilla','1987-06-18','Paraguay',7,'FW',2,0,FALSE,FALSE,'Augsburg');
INSERT INTO players(team_id,firstname,lastname,birthday,nationality,squadnumber,position,caps,goals,is_injured,is_suspended,club) VALUES (9,'Lucas','Barrios','1984-11-13','Paraguay',8,'FW',25,6,FALSE,FALSE,'Montpellier');
INSERT INTO players(team_id,firstname,lastname,birthday,nationality,squadnumber,position,caps,goals,is_injured,is_suspended,club) VALUES (9,'Roque Santa','Cruz','1981-08-16','Paraguay',9,'FW',104,30,FALSE,FALSE,'Cruz Azul');
INSERT INTO players(team_id,firstname,lastname,birthday,nationality,squadnumber,position,caps,goals,is_injured,is_suspended,club) VALUES (9,'Derlis','González','1994-03-23','Paraguay',10,'FW',8,1,FALSE,FALSE,'Basel');
INSERT INTO players(team_id,firstname,lastname,birthday,nationality,squadnumber,position,caps,goals,is_injured,is_suspended,club) VALUES (9,'Édgar','Benítez','1987-11-08','Paraguay',11,'FW',40,6,FALSE,FALSE,'Toluca');
INSERT INTO players(team_id,firstname,lastname,birthday,nationality,squadnumber,position,caps,goals,is_injured,is_suspended,club) VALUES (9,'Antony','Silva','1984-02-27','Paraguay',12,'GK',7,0,FALSE,FALSE,'Independiente Medellín');
INSERT INTO players(team_id,firstname,lastname,birthday,nationality,squadnumber,position,caps,goals,is_injured,is_suspended,club) VALUES (9,'Miguel','Samudio','1986-08-24','Paraguay',13,'DF',22,1,FALSE,FALSE,'América');
INSERT INTO players(team_id,firstname,lastname,birthday,nationality,squadnumber,position,caps,goals,is_injured,is_suspended,club) VALUES (9,'Paulo da','Silva','1980-02-01','Paraguay',14,'DF',120,2,FALSE,FALSE,'Toluca');
INSERT INTO players(team_id,firstname,lastname,birthday,nationality,squadnumber,position,caps,goals,is_injured,is_suspended,club) VALUES (9,'Víctor','Cáceres (c²)','1985-03-25','Paraguay',15,'MF',60,1,FALSE,FALSE,'Flamengo');
INSERT INTO players(team_id,firstname,lastname,birthday,nationality,squadnumber,position,caps,goals,is_injured,is_suspended,club) VALUES (9,'Eduardo','Aranda','1985-01-28','Paraguay',16,'MF',1,0,FALSE,FALSE,'Olimpia');
INSERT INTO players(team_id,firstname,lastname,birthday,nationality,squadnumber,position,caps,goals,is_injured,is_suspended,club) VALUES (9,'Óscar','Romero','1992-07-04','Paraguay',17,'MF',10,1,FALSE,FALSE,'Racing');
INSERT INTO players(team_id,firstname,lastname,birthday,nationality,squadnumber,position,caps,goals,is_injured,is_suspended,club) VALUES (9,'Nelson Haedo','Valdez','1983-11-28','Paraguay',18,'FW',67,12,FALSE,FALSE,'Eintracht Frankfurt');
INSERT INTO players(team_id,firstname,lastname,birthday,nationality,squadnumber,position,caps,goals,is_injured,is_suspended,club) VALUES (9,'Fabián','Balbuena','1991-08-23','Paraguay',19,'DF',2,0,FALSE,FALSE,'Libertad');
INSERT INTO players(team_id,firstname,lastname,birthday,nationality,squadnumber,position,caps,goals,is_injured,is_suspended,club) VALUES (9,'Osvaldo','Martínez','1986-04-08','Paraguay',20,'MF',29,1,FALSE,FALSE,'América');
INSERT INTO players(team_id,firstname,lastname,birthday,nationality,squadnumber,position,caps,goals,is_injured,is_suspended,club) VALUES (9,'Néstor','Ortigoza','1984-12-07','Paraguay',21,'MF',21,1,FALSE,FALSE,'San Lorenzo');
INSERT INTO players(team_id,firstname,lastname,birthday,nationality,squadnumber,position,caps,goals,is_injured,is_suspended,club) VALUES (9,'Alfredo','Aguilar','1988-07-18','Paraguay',22,'GK',0,0,FALSE,FALSE,'Guaraní');
INSERT INTO players(team_id,firstname,lastname,birthday,nationality,squadnumber,position,caps,goals,is_injured,is_suspended,club) VALUES (9,'Richard','Ortiz','1990-05-22','Paraguay',23,'MF',15,4,FALSE,FALSE,'Toluca');

-- 10: Peru
INSERT INTO players(team_id,firstname,lastname,birthday,nationality,squadnumber,position,caps,goals,is_injured,is_suspended,club) VALUES (10,'Pedro','Gallese','1990-02-23','Peru',1,'GK',6,0,FALSE,FALSE,'Juan Aurich');
INSERT INTO players(team_id,firstname,lastname,birthday,nationality,squadnumber,position,caps,goals,is_injured,is_suspended,club) VALUES (10,'Jair','Céspedes','1984-05-22','Peru',2,'DF',4,0,FALSE,FALSE,'Juan Aurich');
INSERT INTO players(team_id,firstname,lastname,birthday,nationality,squadnumber,position,caps,goals,is_injured,is_suspended,club) VALUES (10,'Hansell','Riojas','1991-10-15','Peru',3,'DF',3,0,FALSE,FALSE,'Universidad César Vallejo');
INSERT INTO players(team_id,firstname,lastname,birthday,nationality,squadnumber,position,caps,goals,is_injured,is_suspended,club) VALUES (10,'Pedro Paulo','Requena','1991-01-24','Peru',4,'DF',2,0,FALSE,FALSE,'Universidad César Vallejo');
INSERT INTO players(team_id,firstname,lastname,birthday,nationality,squadnumber,position,caps,goals,is_injured,is_suspended,club) VALUES (10,'Carlos','Zambrano','1989-07-10','Peru',5,'DF',29,4,FALSE,FALSE,'Eintracht Frankfurt');
INSERT INTO players(team_id,firstname,lastname,birthday,nationality,squadnumber,position,caps,goals,is_injured,is_suspended,club) VALUES (10,'Juan Manuel','Vargas','1983-10-05','Peru',6,'MF',53,4,FALSE,FALSE,'Fiorentina');
INSERT INTO players(team_id,firstname,lastname,birthday,nationality,squadnumber,position,caps,goals,is_injured,is_suspended,club) VALUES (10,'Paolo','Hurtado','1990-07-27','Peru',7,'MF',15,2,FALSE,FALSE,'Paços de Ferreira');
INSERT INTO players(team_id,firstname,lastname,birthday,nationality,squadnumber,position,caps,goals,is_injured,is_suspended,club) VALUES (10,'Christian','Cueva','1991-11-23','Peru',8,'MF',7,0,FALSE,FALSE,'Alianza Lima');
INSERT INTO players(team_id,firstname,lastname,birthday,nationality,squadnumber,position,caps,goals,is_injured,is_suspended,club) VALUES (10,'Paolo','Guerrero','1984-01-01','Peru',9,'FW',56,21,FALSE,FALSE,'Flamengo');
INSERT INTO players(team_id,firstname,lastname,birthday,nationality,squadnumber,position,caps,goals,is_injured,is_suspended,club) VALUES (10,'Jefferson','Farfán','1984-10-26','Peru',10,'FW',64,17,FALSE,FALSE,'Schalke 04');
INSERT INTO players(team_id,firstname,lastname,birthday,nationality,squadnumber,position,caps,goals,is_injured,is_suspended,club) VALUES (10,'Yordy','Reyna','1993-09-17','Peru',11,'FW',8,2,FALSE,FALSE,'Leipzig');
INSERT INTO players(team_id,firstname,lastname,birthday,nationality,squadnumber,position,caps,goals,is_injured,is_suspended,club) VALUES (10,'Diego','Penny','1984-04-22','Peru',12,'GK',14,0,FALSE,FALSE,'Sporting Cristal');
INSERT INTO players(team_id,firstname,lastname,birthday,nationality,squadnumber,position,caps,goals,is_injured,is_suspended,club) VALUES (10,'Edwin','Retamoso','1982-02-23','Peru',13,'MF',11,0,FALSE,FALSE,'Real Garcilaso');
INSERT INTO players(team_id,firstname,lastname,birthday,nationality,squadnumber,position,caps,goals,is_injured,is_suspended,club) VALUES (10,'Claudio','Pizarro','1978-10-03','Peru',14,'FW',76,19,FALSE,FALSE,'Bayern Munich');
INSERT INTO players(team_id,firstname,lastname,birthday,nationality,squadnumber,position,caps,goals,is_injured,is_suspended,club) VALUES (10,'Christian','Ramos','1988-11-04','Peru',15,'DF',39,1,FALSE,FALSE,'Juan Aurich');
INSERT INTO players(team_id,firstname,lastname,birthday,nationality,squadnumber,position,caps,goals,is_injured,is_suspended,club) VALUES (10,'Carlos','Lobatón','1980-02-06','Peru',16,'MF',33,1,FALSE,FALSE,'Sporting Cristal');
INSERT INTO players(team_id,firstname,lastname,birthday,nationality,squadnumber,position,caps,goals,is_injured,is_suspended,club) VALUES (10,'Luis','Advíncula','1990-03-02','Peru',17,'DF',41,0,FALSE,FALSE,'Vitória de Setúbal');
INSERT INTO players(team_id,firstname,lastname,birthday,nationality,squadnumber,position,caps,goals,is_injured,is_suspended,club) VALUES (10,'André','Carrillo','1991-06-14','Peru',18,'FW',23,1,FALSE,FALSE,'Sporting');
INSERT INTO players(team_id,firstname,lastname,birthday,nationality,squadnumber,position,caps,goals,is_injured,is_suspended,club) VALUES (10,'Yoshimar','Yotún','1990-04-07','Peru',19,'DF',39,1,FALSE,FALSE,'Malmö');
INSERT INTO players(team_id,firstname,lastname,birthday,nationality,squadnumber,position,caps,goals,is_injured,is_suspended,club) VALUES (10,'Joel','Sánchez','1989-06-11','Peru',20,'MF',2,0,FALSE,FALSE,'Universidad San Martín');
INSERT INTO players(team_id,firstname,lastname,birthday,nationality,squadnumber,position,caps,goals,is_injured,is_suspended,club) VALUES (10,'Josepmir','Ballón','1988-03-21','Peru',21,'MF',35,0,FALSE,FALSE,'Sporting Cristal');
INSERT INTO players(team_id,firstname,lastname,birthday,nationality,squadnumber,position,caps,goals,is_injured,is_suspended,club) VALUES (10,'Carlos','Ascues','1992-06-06','Peru',22,'MF',6,5,FALSE,FALSE,'Melgar');
INSERT INTO players(team_id,firstname,lastname,birthday,nationality,squadnumber,position,caps,goals,is_injured,is_suspended,club) VALUES (10,'Salomón','Libman','1984-02-25','Peru',23,'GK',6,0,FALSE,FALSE,'Universidad César Vallejo');

-- 11: Uruguay
INSERT INTO players(team_id,firstname,lastname,birthday,nationality,squadnumber,position,caps,goals,is_injured,is_suspended,club) VALUES (11,'Fernando','Muslera','1986-06-16','Uruguay',1,'GK',67,0,FALSE,FALSE,'Galatasaray');
INSERT INTO players(team_id,firstname,lastname,birthday,nationality,squadnumber,position,caps,goals,is_injured,is_suspended,club) VALUES (11,'José','Giménez','1995-01-20','Uruguay',2,'DF',16,2,FALSE,FALSE,'Atlético de Madrid');
INSERT INTO players(team_id,firstname,lastname,birthday,nationality,squadnumber,position,caps,goals,is_injured,is_suspended,club) VALUES (11,'Diego','Godín','1986-02-16','Uruguay',3,'DF',87,4,FALSE,FALSE,'Atlético de Madrid');
INSERT INTO players(team_id,firstname,lastname,birthday,nationality,squadnumber,position,caps,goals,is_injured,is_suspended,club) VALUES (11,'Jorge','Fucile','1984-11-19','Uruguay',4,'DF',43,0,FALSE,FALSE,'Nacional');
INSERT INTO players(team_id,firstname,lastname,birthday,nationality,squadnumber,position,caps,goals,is_injured,is_suspended,club) VALUES (11,'Carlos','Sánchez','1984-12-02','Uruguay',5,'MF',3,0,FALSE,FALSE,'River Plate');
INSERT INTO players(team_id,firstname,lastname,birthday,nationality,squadnumber,position,caps,goals,is_injured,is_suspended,club) VALUES (11,'Álvaro','Pereira','1985-11-28','Uruguay',6,'DF',66,6,FALSE,FALSE,'Estudiantes de La Plata');
INSERT INTO players(team_id,firstname,lastname,birthday,nationality,squadnumber,position,caps,goals,is_injured,is_suspended,club) VALUES (11,'Cristian','Rodríguez','1985-09-30','Uruguay',7,'MF',83,8,FALSE,FALSE,'Atlético de Madrid');
INSERT INTO players(team_id,firstname,lastname,birthday,nationality,squadnumber,position,caps,goals,is_injured,is_suspended,club) VALUES (11,'Abel','Hernández','1990-08-08','Uruguay',8,'FW',18,8,FALSE,FALSE,'Hull City');
INSERT INTO players(team_id,firstname,lastname,birthday,nationality,squadnumber,position,caps,goals,is_injured,is_suspended,club) VALUES (11,'Diego','Rolán','1993-03-24','Uruguay',9,'FW',6,1,FALSE,FALSE,'Bordeaux');
INSERT INTO players(team_id,firstname,lastname,birthday,nationality,squadnumber,position,caps,goals,is_injured,is_suspended,club) VALUES (11,'Giorgian de','Arrascaeta','1994-05-01','Uruguay',10,'MF',4,0,FALSE,FALSE,'Cruzeiro');
INSERT INTO players(team_id,firstname,lastname,birthday,nationality,squadnumber,position,caps,goals,is_injured,is_suspended,club) VALUES (11,'Christian','Stuani','1986-10-12','Uruguay',11,'FW',19,4,FALSE,FALSE,'Espanyol');
INSERT INTO players(team_id,firstname,lastname,birthday,nationality,squadnumber,position,caps,goals,is_injured,is_suspended,club) VALUES (11,'Rodrigo','Muñoz','1982-01-22','Uruguay',12,'GK',0,0,FALSE,FALSE,'Libertad');
INSERT INTO players(team_id,firstname,lastname,birthday,nationality,squadnumber,position,caps,goals,is_injured,is_suspended,club) VALUES (11,'Gastón','Silva','1994-03-05','Uruguay',13,'DF',1,0,FALSE,FALSE,'Torino');
INSERT INTO players(team_id,firstname,lastname,birthday,nationality,squadnumber,position,caps,goals,is_injured,is_suspended,club) VALUES (11,'Nicolás','Lodeiro','1989-03-21','Uruguay',14,'MF',36,3,FALSE,FALSE,'Boca Juniors');
INSERT INTO players(team_id,firstname,lastname,birthday,nationality,squadnumber,position,caps,goals,is_injured,is_suspended,club) VALUES (11,'Guzmán','Pereira','1991-05-16','Uruguay',15,'MF',3,0,FALSE,FALSE,'Universidad de Chile');
INSERT INTO players(team_id,firstname,lastname,birthday,nationality,squadnumber,position,caps,goals,is_injured,is_suspended,club) VALUES (11,'Maximiliano','Pereira','1984-06-08','Uruguay',16,'DF',100,3,FALSE,FALSE,'Benfica');
INSERT INTO players(team_id,firstname,lastname,birthday,nationality,squadnumber,position,caps,goals,is_injured,is_suspended,club) VALUES (11,'Egidio Arévalo','Ríos','1982-01-01','Uruguay',17,'MF',66,0,FALSE,FALSE,'UANL');
INSERT INTO players(team_id,firstname,lastname,birthday,nationality,squadnumber,position,caps,goals,is_injured,is_suspended,club) VALUES (11,'Mathías','Corujo','1986-05-08','Uruguay',18,'DF',6,0,FALSE,FALSE,'Universidad de Chile');
INSERT INTO players(team_id,firstname,lastname,birthday,nationality,squadnumber,position,caps,goals,is_injured,is_suspended,club) VALUES (11,'Sebastián','Coates','1990-10-07','Uruguay',19,'DF',16,1,FALSE,FALSE,'Sunderland');
INSERT INTO players(team_id,firstname,lastname,birthday,nationality,squadnumber,position,caps,goals,is_injured,is_suspended,club) VALUES (11,'Álvaro','González','1984-10-29','Uruguay',20,'MF',50,3,FALSE,FALSE,'Torino');
INSERT INTO players(team_id,firstname,lastname,birthday,nationality,squadnumber,position,caps,goals,is_injured,is_suspended,club) VALUES (11,'Edinson','Cavani','1987-02-14','Uruguay',21,'FW',71,25,FALSE,FALSE,'Paris Saint-Germain');
INSERT INTO players(team_id,firstname,lastname,birthday,nationality,squadnumber,position,caps,goals,is_injured,is_suspended,club) VALUES (11,'Jonathan','Rodríguez','1993-07-06','Uruguay',22,'FW',5,1,FALSE,FALSE,'Benfica');
INSERT INTO players(team_id,firstname,lastname,birthday,nationality,squadnumber,position,caps,goals,is_injured,is_suspended,club) VALUES (11,'Martín','Silva','1983-03-25','Uruguay',23,'GK',6,0,FALSE,FALSE,'Vasco da Gama');

-- 12: Venezuela
INSERT INTO players(team_id,firstname,lastname,birthday,nationality,squadnumber,position,caps,goals,is_injured,is_suspended,club) VALUES (12,'Alain','Baroja','1989-10-23','Venezuela',1,'GK',3,0,FALSE,FALSE,'Caracas');
INSERT INTO players(team_id,firstname,lastname,birthday,nationality,squadnumber,position,caps,goals,is_injured,is_suspended,club) VALUES (12,'Wilker','Ángel','1993-03-18','Venezuela',2,'DF',1,1,FALSE,FALSE,'Deportivo Táchira');
INSERT INTO players(team_id,firstname,lastname,birthday,nationality,squadnumber,position,caps,goals,is_injured,is_suspended,club) VALUES (12,'Andrés','Túñez','1987-03-15','Venezuela',3,'DF',11,0,FALSE,FALSE,'Buriram United');
INSERT INTO players(team_id,firstname,lastname,birthday,nationality,squadnumber,position,caps,goals,is_injured,is_suspended,club) VALUES (12,'Oswaldo','Vizcarrondo','1984-05-31','Venezuela',4,'DF',61,8,FALSE,FALSE,'Nantes');
INSERT INTO players(team_id,firstname,lastname,birthday,nationality,squadnumber,position,caps,goals,is_injured,is_suspended,club) VALUES (12,'Fernando','Amorebieta','1985-03-29','Venezuela',5,'DF',12,1,FALSE,FALSE,'Middlesbrough');
INSERT INTO players(team_id,firstname,lastname,birthday,nationality,squadnumber,position,caps,goals,is_injured,is_suspended,club) VALUES (12,'Gabriel','Cichero','1984-04-25','Venezuela',6,'DF',56,4,FALSE,FALSE,'Mineros de Guayana');
INSERT INTO players(team_id,firstname,lastname,birthday,nationality,squadnumber,position,caps,goals,is_injured,is_suspended,club) VALUES (12,'Miku','Miku','1985-08-19','Venezuela',7,'FW',50,10,FALSE,FALSE,'Rayo Vallecano');
INSERT INTO players(team_id,firstname,lastname,birthday,nationality,squadnumber,position,caps,goals,is_injured,is_suspended,club) VALUES (12,'Tomás','Rincón','1988-01-13','Venezuela',8,'MF',58,0,FALSE,FALSE,'Genoa');
INSERT INTO players(team_id,firstname,lastname,birthday,nationality,squadnumber,position,caps,goals,is_injured,is_suspended,club) VALUES (12,'Salomón','Rondón','1989-09-16','Venezuela',9,'FW',38,12,FALSE,FALSE,'Zenit Saint Petersburg');
INSERT INTO players(team_id,firstname,lastname,birthday,nationality,squadnumber,position,caps,goals,is_injured,is_suspended,club) VALUES (12,'Ronald','Vargas','1986-12-02','Venezuela',10,'MF',17,3,FALSE,FALSE,'AEK Athens F.C.');
INSERT INTO players(team_id,firstname,lastname,birthday,nationality,squadnumber,position,caps,goals,is_injured,is_suspended,club) VALUES (12,'César','González','1982-10-01','Venezuela',11,'MF',57,5,FALSE,FALSE,'Deportivo Táchira');
INSERT INTO players(team_id,firstname,lastname,birthday,nationality,squadnumber,position,caps,goals,is_injured,is_suspended,club) VALUES (12,'Dani','Hernández','1985-10-21','Venezuela',12,'GK',20,0,FALSE,FALSE,'Tenerife');
INSERT INTO players(team_id,firstname,lastname,birthday,nationality,squadnumber,position,caps,goals,is_injured,is_suspended,club) VALUES (12,'Luis Manuel','Seijas','1986-06-23','Venezuela',13,'MF',53,2,FALSE,FALSE,'Santa Fe');
INSERT INTO players(team_id,firstname,lastname,birthday,nationality,squadnumber,position,caps,goals,is_injured,is_suspended,club) VALUES (12,'Franklin','Lucena','1981-02-20','Venezuela',14,'MF',58,2,FALSE,FALSE,'Deportivo La Guaira');
INSERT INTO players(team_id,firstname,lastname,birthday,nationality,squadnumber,position,caps,goals,is_injured,is_suspended,club) VALUES (12,'Alejandro','Guerra','1985-07-09','Venezuela',15,'MF',42,4,FALSE,FALSE,'Atlético Nacional');
INSERT INTO players(team_id,firstname,lastname,birthday,nationality,squadnumber,position,caps,goals,is_injured,is_suspended,club) VALUES (12,'Roberto','Rosales','1988-11-20','Venezuela',16,'DF',54,0,FALSE,FALSE,'Málaga');
INSERT INTO players(team_id,firstname,lastname,birthday,nationality,squadnumber,position,caps,goals,is_injured,is_suspended,club) VALUES (12,'Josef','Martínez','1993-05-19','Venezuela',17,'FW',17,3,FALSE,FALSE,'Torino');
INSERT INTO players(team_id,firstname,lastname,birthday,nationality,squadnumber,position,caps,goals,is_injured,is_suspended,club) VALUES (12,'Juan','Arango','1980-05-17','Venezuela',18,'MF',124,22,FALSE,FALSE,'Tijuana');
INSERT INTO players(team_id,firstname,lastname,birthday,nationality,squadnumber,position,caps,goals,is_injured,is_suspended,club) VALUES (12,'Rafael','Acosta','1989-02-13','Venezuela',19,'MF',9,0,FALSE,FALSE,'Mineros de Guayana');
INSERT INTO players(team_id,firstname,lastname,birthday,nationality,squadnumber,position,caps,goals,is_injured,is_suspended,club) VALUES (12,'Grenddy','Perozo','1986-02-28','Venezuela',20,'DF',45,2,FALSE,FALSE,'Ajaccio');
INSERT INTO players(team_id,firstname,lastname,birthday,nationality,squadnumber,position,caps,goals,is_injured,is_suspended,club) VALUES (12,'Gelmin','Rivas','1989-03-23','Venezuela',21,'FW',3,0,FALSE,FALSE,'Deportivo Táchira');
INSERT INTO players(team_id,firstname,lastname,birthday,nationality,squadnumber,position,caps,goals,is_injured,is_suspended,club) VALUES (12,'Jhon','Murillo','1995-06-04','Venezuela',22,'MF',1,1,FALSE,FALSE,'Benfica');
INSERT INTO players(team_id,firstname,lastname,birthday,nationality,squadnumber,position,caps,goals,is_injured,is_suspended,club) VALUES (12,'Wuilker','Faríñez','1998-02-15','Venezuela',23,'GK',0,0,FALSE,FALSE,'Caracas');

-- Vaiheet
-- ----------------------------------------------------------------------------
-- 1: Lohkovaihe
INSERT INTO Stages (name) VALUES (
	'Lohkovaihe'
);

-- 2: Puolivälierä
INSERT INTO Stages (name) VALUES (
	'Puolivälierä'
);

-- 3: Välierä
INSERT INTO Stages (name) VALUES (
	'Välierä'
);

-- 4: Pronssiottelu
INSERT INTO Stages (name) VALUES (
	'Pronssiottelu'
);

-- 5: Loppuottelu
INSERT INTO Stages (name) VALUES (
	'Loppuottelu'
);

-- Stadionit
-- ----------------------------------------------------------------------------
-- 1: Estadio Nacional Julio Martínez Prádanos, Santiago de CHI
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

-- 8: Estadio Monumental David Arellano, Santiago de CHI
INSERT INTO Stadiums (name, city) VALUES (
	'Estadio Monumental David Arellano', 
	'Santiago de Chile'
);

-- 9: Estadio Municipal Alcaldesa Ester Roa Rebolledo, Concepción
INSERT INTO Stadiums (name, city) VALUES (
	'Estadio Municipal Alcaldesa Ester Roa Rebolledo', 
	'Concepción'
);

-- Ottelut
-- ----------------------------------------------------------------------------
-- 1: CHI v ECU
INSERT INTO Matches (stage_id, home_id, away_id, kickoff, stadium_id, is_confirmed) VALUES ( 
	1, -- Lohkovaihe
	4, -- CHI
	6, -- ECU
	'2015-06-11 20:30:00',
	1, -- Estadio Nacional Julio Martínez Prádanos, Santiago de CHI
	false
);

-- 2: Meksiko v BOL
INSERT INTO Matches (stage_id, home_id, away_id, kickoff, stadium_id, is_confirmed) VALUES ( 
	1, -- Lohkovaihe
	8, -- MEX
	2, -- BOL
	'2015-06-12 20:30:00',
	2, -- Estadio Sausalito, Viña del Mar
	false
);

-- 3: URU v JAM
INSERT INTO Matches (stage_id, home_id, away_id, kickoff, stadium_id, is_confirmed) VALUES ( 
	1, -- Lohkovaihe
	11, -- URU
	7, -- JAM
	'2015-06-13 16:00:00',
	3, -- Estadio Regional Calvo y Bascuñán, Antofagasta
	false
);

-- 4: ARG v PAR
INSERT INTO Matches (stage_id, home_id, away_id, kickoff, stadium_id, is_confirmed) VALUES ( 
	1, -- Lohkovaihe
	1, -- ARG
	9, -- PAR
	'2015-06-13 18:30:00',
	4, -- Estadio La Portada de La Serena, La Serena
	false
);

-- 5: COL v VEN
INSERT INTO Matches (stage_id, home_id, away_id, kickoff, stadium_id, is_confirmed) VALUES ( 
	1, -- Lohkovaihe
	5, -- COL
	12, -- VEN
	'2015-06-14 16:00:00',
	5, -- Estadio El Teniente, Rancagua
	false
);

-- 7: BRA v PER
INSERT INTO Matches (stage_id, home_id, away_id, kickoff, stadium_id, is_confirmed) VALUES ( 
	1, -- Lohkovaihe
	3, -- BRA
	10, -- PER
	'2015-06-14 18:30:00',
	6, -- Estadio Municipal Bicentenario Germán Becker, Temuco
	false
);

-- 8: ECU v BOL
INSERT INTO Matches (stage_id, home_id, away_id, kickoff, stadium_id, is_confirmed) VALUES ( 
	1, -- Lohkovaihe
	6, -- 6: ECU
	2, -- 2: BOL
	'2015-06-15 18:00:00',
	7, -- 7: Estadio Elías Figueroa Brander, Valparaíso
	false
);

-- 9: CHI v MEX
INSERT INTO Matches (stage_id, home_id, away_id, kickoff, stadium_id, is_confirmed) VALUES ( 
	1, -- Lohkovaihe
	4, -- 4: CHI
	8, -- 8: MEX
	'2015-06-15 20:30:00',
	1, -- 1: Estadio Nacional Julio Martínez Prádanos, Santiago de CHI
	false
);

-- 9: PAR v JAM
INSERT INTO Matches (stage_id, home_id, away_id, kickoff, stadium_id, is_confirmed) VALUES ( 
	1, -- Lohkovaihe
	9, -- PARAGUAY
	7, -- JAM
	'2015-06-16 18:00:00',
	3, -- Estadio Regional Calvo y Bascuñán, Antofagasta
	false
);

-- 10: ARG v URU
INSERT INTO Matches (stage_id, home_id, away_id, kickoff, stadium_id, is_confirmed) VALUES ( 
	1, -- Lohkovaihe
	1, -- ARG
	11, -- URU
	'2015-06-16 20:30:00',
	4, -- Estadio La Portada de La Serena, La Serena
	false
);

-- 11: BRA v COL
INSERT INTO Matches (stage_id, home_id, away_id, kickoff, stadium_id, is_confirmed) VALUES ( 
	1, -- Lohkovaihe
	3, -- BRA
	5, -- COL
	'2015-06-17 21:00:00',
	8, -- Estadio Monumental David Arellano, Santiago de CHI
	false
);

-- 12: PER v VEN
INSERT INTO Matches (stage_id, home_id, away_id, kickoff, stadium_id, is_confirmed) VALUES ( 
	1, -- Lohkovaihe
	10, -- PER
	12, -- VEN
	'2015-06-18 20:30:00',
	7, -- Estadio Elías Figueroa Brander, Valparaíso
	false
);

-- 13: MEX v ECU
INSERT INTO Matches (stage_id, home_id, away_id, kickoff, stadium_id, is_confirmed) VALUES ( 
	1, -- Lohkovaihe
	8, -- Meksiko
	6, -- ECU
	'2015-06-19 18:00:00',
	5, -- Estadio El Teniente, Rancagua
	false
);

-- 14: CHI v BOL
INSERT INTO Matches (stage_id, home_id, away_id, kickoff, stadium_id, is_confirmed) VALUES ( 
	1, -- Lohkovaihe
	4, -- CHI
	2, -- BOL
	'2015-06-19 20:30:00',
	1, -- Estadio Nacional Julio Martínez Prádanos, Santiago de CHI
	false
);

-- 15: URU v PAR
INSERT INTO Matches (stage_id, home_id, away_id, kickoff, stadium_id, is_confirmed) VALUES ( 
	1, -- Lohkovaihe
	11, -- URUGUAY
	9, -- PARAGUAY
	'2015-06-20 16:00:00',
	4, -- Estadio La Portada de La Serena, La Serena
	false
);

-- 16: ARG v JAM
INSERT INTO Matches (stage_id, home_id, away_id, kickoff, stadium_id, is_confirmed) VALUES ( 
	1, -- Lohkovaihe
	1, -- ARG
	7, -- JAM
	'2015-06-20 18:30:00',
	2, -- Estadio Sausalito, Viña del Mar
	false
);

-- 17: COL v PER
INSERT INTO Matches (stage_id, home_id, away_id, kickoff, stadium_id, is_confirmed) VALUES ( 
	1, -- Lohkovaihe
	5, -- COL
	10, -- PER
	'2015-06-21 16:00:00',
	6, -- Estadio Municipal Bicentenario Germán Becker, Temuco
	false
);

-- 18: BRA v VEN
INSERT INTO Matches (stage_id, home_id, away_id, kickoff, stadium_id, is_confirmed) VALUES ( 
	1, -- Lohkovaihe
	1, -- BRA
	12, -- VEN
	'2015-06-21 18:30:00',
	8, --Estadio Monumental David Arellano, Santiago de CHI
	false
);

-- Käyttäjät
-- ----------------------------------------------------------------------------
INSERT INTO Users (username, password_hash, password_salt, email, firstname, lastname, is_admin, joined_on, edited_on, last_login) VALUES (
	'admin',
	'Z9NjSFGpSWL8U',
	'Z9Bg13gRAmt3',
	'admin@testi.fi',
	'Järjestelmän',
	'Ylläpitäjä',
	true,
	'2015-06-11 12:00:00',
	'2015-06-11 12:00:00',
	'2015-06-11 12:00:00'
);

INSERT INTO Users (username, password_hash, password_salt, email, firstname, lastname, is_admin, joined_on, edited_on, last_login) VALUES (
	'demo',
	'Z9NjSFGpSWL8U',
	'Z9Bg13gRAmt3',
	'demo@testi.fi',
	'Testi',
	'Käyttäjä',
	false,
	'2015-06-11 12:00:00',
	'2015-06-11 00:00:00',
	'2015-06-11 12:00:00'
);

