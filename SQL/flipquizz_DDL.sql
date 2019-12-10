DROP DATABASE IF EXISTS flipquizz;

CREATE DATABASE IF NOT EXISTS flipquizz CHARACTER SET UTF8 COLLATE utf8_general_ci;

USE flipquizz;


DROP TABLE IF EXISTS TURNS;
DROP TABLE IF EXISTS GAMES_TEAMS;
DROP TABLE IF EXISTS GAMES;
DROP TABLE IF EXISTS TEAMS;
DROP TABLE IF EXISTS QUESTIONS;
DROP TABLE IF EXISTS CATEGORIES;
DROP TABLE IF EXISTS QUIZZ;

--partie 1 : Quizz, catégories et questions --

CREATE TABLE IF NOT EXISTS QUIZZ(
   quizz_id INT PRIMARY KEY AUTO_INCREMENT,
   quizz_name VARCHAR(50) NOT NULL
   quizz_texcolor CHAR (8) NOT NULL DEFAULT '000000FF',
   quizz_backcolor CHAR (8) NOT NULL DEFAULT 'FFFFFF33'
) ENGINE=InnoDB CHARACTER SET UTF8 COLLATE utf8_general_ci;

CREATE TABLE IF NOT EXISTS CATEGORIES(
   categorie_id INT PRIMARY KEY AUTO_INCREMENT,
   categorie_name VARCHAR(50) NOT NULL,
   categorie_description TEXT NULL,
   quizz_id INT NOT NULL
) ENGINE=InnoDB CHARACTER SET UTF8 COLLATE utf8_general_ci;

CREATE TABLE IF NOT EXISTS QUESTIONS(
   question_id INT PRIMARY KEY AUTO_INCREMENT,
   question_content VARCHAR(255) NOT NULL,
   question_answer VARCHAR(255) NOT NULL,
   question_level INT NOT NULL DEFAULT '1',
   categorie_id INT NOT NULL
) ENGINE=InnoDB CHARACTER SET UTF8 COLLATE utf8_general_ci;

ALTER TABLE CATEGORIES ADD INDEX ('quizz_id');

ALTER TABLE CATEGORIES
ADD FOREIGN KEY (quizz_id) REFERENCES QUIZZ (quizz_id) ON UPDATE CASCADE ON DELETE CASCADE;

ALTER TABLE QUESTIONS ADD INDEX ('categorie_id');

ALTER TABLE QUESTIONS 
ADD FOREIGN KEY (categorie_id) REFERENCES CAYRGORIES(categorie_id) ON UPDATE CASCADE ON DELETE CASCADE

------------------------------------------------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS LEVELS(
   level_id INT PRIMARY KEY AUTO_INCREMENT,
   level_point INT NOT NULL
) ENGINE=InnoDB CHARACTER SET UTF8 COLLATE utf8_general_ci;

CREATE TABLE IF NOT EXISTS GAMES(
   game_id INT PRIMARY KEY AUTO_INCREMENT,
   game_date DATETIME NOT NULL,
   quizz_id INT NOT NULL
) ENGINE=InnoDB CHARACTER SET UTF8 COLLATE utf8_general_ci;

CREATE TABLE IF NOT EXISTS TEAMS(
   team_id INT PRIMARY KEY AUTO_INCREMENT,
   team_name VARCHAR(50) NOT NULL
) ENGINE=InnoDB CHARACTER SET UTF8 COLLATE utf8_general_ci;

CREATE TABLE IF NOT EXISTS QUIZZ_THEMES(
   categorie_id INT NOT NULL,
   quizz_id INT NOT NULL,
   PRIMARY KEY(categorie_id, quizz_id)
) ENGINE=InnoDB CHARACTER SET UTF8 COLLATE utf8_general_ci;

CREATE TABLE IF NOT EXISTS GAMES_TEAMS(
   game_id INT NOT NULL,
   team_id INT NOT NULL,
   PRIMARY KEY(game_id, team_id)
) ENGINE=InnoDB CHARACTER SET UTF8 COLLATE utf8_general_ci;

CREATE TABLE IF NOT EXISTS TURNS(
   team_id INT NOT NULL,
   question_id INT NOT NULL,
   game_id INT NOT NULL,
   PRIMARY KEY(team_id, question_id, game_id),
   turn_points INT NOT NULL
) ENGINE=InnoDB CHARACTER SET UTF8 COLLATE utf8_general_ci;


ALTER TABLE `games` ADD INDEX(`quizz_id`);
ALTER TABLE `QUESTIONS` ADD INDEX(`level_id`);
ALTER TABLE `QUESTIONS` ADD INDEX(`categorie_id`);
ALTER TABLE `QUIZZ_THEMES` ADD INDEX(`quizz_id`);
ALTER TABLE `QUIZZ_THEMES` ADD INDEX(`categorie_id`);
ALTER TABLE `GAMES_TEAMS` ADD INDEX(`game_id`);
ALTER TABLE `GAMES_TEAMS` ADD INDEX(`team_id`);
ALTER TABLE `TURNS` ADD INDEX(`team_id`);
ALTER TABLE `TURNS` ADD INDEX(`game_id`);
ALTER TABLE `TURNS` ADD INDEX(`question_id`);


ALTER TABLE GAMES ADD FOREIGN KEY (quizz_id) REFERENCES QUIZZ(quizz_id) ON UPDATE RESTRICT ON DELETE CASCADE;
ALTER TABLE QUESTIONS ADD FOREIGN KEY (level_id) REFERENCES LEVELS(level_id) ON UPDATE RESTRICT ON DELETE CASCADE;
ALTER TABLE QUESTIONS ADD FOREIGN KEY (categorie_id) REFERENCES CATEGORIES(categorie_id) ON UPDATE RESTRICT ON DELETE CASCADE;
ALTER TABLE QUIZZ_THEMES ADD FOREIGN KEY (quizz_id) REFERENCES QUIZZ(quizz_id) ON UPDATE RESTRICT ON DELETE CASCADE;
ALTER TABLE QUIZZ_THEMES ADD FOREIGN KEY (theme_id) REFERENCES CATEGORIES(categorie_id) ON UPDATE RESTRICT ON DELETE CASCADE;
ALTER TABLE GAMES_TEAMS ADD FOREIGN KEY (game_id) REFERENCES GAMES(game_id) ON UPDATE RESTRICT ON DELETE CASCADE;
ALTER TABLE GAMES_TEAMS ADD FOREIGN KEY (team_id) REFERENCES TEAMS(team_id) ON UPDATE RESTRICT ON DELETE CASCADE;
ALTER TABLE TURNS ADD FOREIGN KEY (team_id) REFERENCES TEAMS(team_id) ON UPDATE RESTRICT ON DELETE CASCADE;
ALTER TABLE TURNS ADD FOREIGN KEY (game_id) REFERENCES GAMES(game_id) ON UPDATE RESTRICT ON DELETE CASCADE;
ALTER TABLE TURNS ADD FOREIGN KEY (question_id) REFERENCES QUESTIONS(question_id) ON UPDATE RESTRICT ON DELETE CASCADE;


INSERT INTO QUIZZ
(quizz_id, quizz_theme, quizz_texcolor, quizz_backcolor)
VALUES
(1, 'langage de programmation', 'black', 'white')
(2, 'les automobiles', 'black', 'white')
(3, 'les motos', 'black', 'white')
(4, 'la chasse à cour', 'black', 'white')
(5, 'la reproduction des phoques de moldavie', 'black', 'white')
(6, 'les sport de balle', 'black', 'white')
(7, 'la politique elitiste', 'black', 'white')
(8, 'les poissons marins', 'black', 'white')

INSERT INTO QUESTIONS
(question_id, question_content, question_answer, question_level)
VALUES
(1, 'question numéro 1', 'la réponse 1', '1')
(2, 'question numéro 2', 'la réponse 2', '1')
(3, 'question numéro 3', 'la réponse 3', '1')
(4, 'question numéro 4', 'la réponse 4', '1')
(5, 'question numéro 5', 'la réponse 5', '1')
(6, 'question numéro 6', 'la réponse 6', '1')
(7, 'question numéro 7', 'la réponse 7', '1')
(8, 'question numéro 8', 'la réponse 8', '1')

INSERT INTO CATEGORIES
(categorie_id, categorie_name, categorie_description, quizz_id)
VALUES
(1, 'music', 'good music', 1)
(2, 'food', 'good food', 1)
(3, 'cars', 'good cars', 1)
(4, 'sport', 'good sport', 1)
(5, 'fitness', 'good fitness', 1)
(6, 'games', 'good games', 1)
(7, 'feelings', 'good feelings', 1)
(8, 'movies', 'good movies', 1)

INSERT INTO TEAMS
(team_id, team_name)
VALUES
(1, 'bleu')
(2, 'blanc')
(3, 'rouge')
(4, 'vert')
(5, 'jaune')
(6, 'violet')
(7, 'orange')
(8, 'marron')