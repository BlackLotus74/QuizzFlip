--Insertion

    --1) Ajouter un Quizz

INSERT INTO QUIZZ  
(quizz_theme, quizz_textcolor, quizz_backcolor) 
VALUES (‘sport’, ‘FF0000’, ‘0000FF’)

    --2) Ajouter une catégorie à un Quizz

INSERT INTO CATEGORIES 
(categorie_name, categorie_description, quizz_id) 
VALUES  (‘courgette’, ‘on aime les légumes’, 1)



    --3) Ajouter une question à une catégorie

INSERT INTO  QUESTIONS 
(question_content, question_answer, question_level, categorie_id)
VALUES (‘quelle est la capital du Canada ? ’, ‘Ottawa’, 1, 1)

--Mise à jour--

    --1) Éditer un quizz

UPDATE QUIZZ SET quizz_theme = ‘courgette’, 
quizz_textcolor = ‘green’, 
quizz_backcolor = ‘yellow’
WHERE quizz_id=’1’ ;

    --2) Éditer une catégorie

UPDATE CATEGORIES SET categorie_name = ‘’,
categorie_description = ‘’,
quizz_id = ‘’
WHERE categorie_id=1 ;

    --3) Éditer une question

UPDATE QUESTIONS SET question_content = ’’,
question_answer = ’’,
question_level = ‘’,
categorie_id = ‘’,
WHERE question_id=’1’ ;

--Suppression--

    --1) Supprimer un quizz (et toutes les catégories et questions associées)

DELETE FROM quizz
WHERE quizz_id=1 ;

    --2) Supprimer une catégorie (et toutes les questions associées)

DELETE FROM categorie
WHERE categorie_id=1 ;

    --3) Supprimer une question

DELETE FROM question
WHERE question_id=1 ;

--Vérification--

    --1) Un quizz a-t’ il au moins une catégorie associée ?

SELECT COUNT(*)
FROM CATEGORIES
WHERE quizz_id = ‘’ ;

    --2) Une catégorie a-t’ elle exactement 5 questions associées (une par niveau)

SELECT COUNT(*)
FROM CATEGORIES
WHERE CATEGORIES.categorie_id=''
AND
(
    SELECT COUNT (DISTINCT QUESTIONS.question_level)
    FROM QUESTIONS WHERE QUESTIONS.categorie_id = CATEGORIES.categorie_id
) = 5;

--ou

SELECT COUNT (DISTINCT QUESTIONS.question_level) = 5
    FROM QUESTIONS WHERE QUESTIONS.categorie_id = '';
