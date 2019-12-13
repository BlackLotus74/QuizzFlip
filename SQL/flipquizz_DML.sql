USE flipquizz;


/*INSERT INTO TEAMS 
(1, 'nom de la team');*/


INSERT INTO TEAMS
(team_id, team_name)
VALUES
(1, 'DWWM'),
(1, 'CDA'),
(1, 'Formateurs');

INSERT INTO QUIZZ
(quizz_id, quizz_theme)
VALUES
(1, 'Quizz de Noël'),
(2, 'Quizz du 3 janvier');

INSERT INTO THEMES
(theme_id, theme_name, theme_description)
VALUES
(1, 'C#', 'Questions about C#'),
(2, 'ASP.NET', 'ASP attacks'),
(3, 'Javascript', 'Javascipt is not java'),
(4, 'UML', 'UML is not ULM '),
(5, 'Merise', 'Merise on the cake !'),
(6, 'Movies', 'NULL'),
(7, 'Video Games', 'coucou !');

INSERT INTO LEVELS
(level_id, level_point)
VALUES
(1, '100'),
(2, '200'),
(3, '300'),
(4, '400'),
(5, '500');

--annee-mois-jour heure:seconde
INSERT INTO GAMES
(game_id, game_date, quizz_id)
VALUES
(1, '2019-11-28 15:04:54', 1),
(1, '2020-01-03 09:30:01', 2);

INSERT INTO QUESTIONS
(question_id, question_content, question_answer, level_id, theme_id)
VALUES
(1, '', '', 1, 1),
(2, '', '', 2, 1),
(3, '', '', 2, 1),
(4, '', '', 2, 1),
(5, '', '', 2, 1),
(6, '', '', 2, 1),

INSERT INTO QUIZZ_THEMES
(theme_id, quizz_id)
VALUES
(1, 1);

INSERT INTO GAMES_TEAMS
(game_id, team_id)
VALUES
()

INSERT INTO TURNS
(team_id, question_id, game_id)
VALUES
()