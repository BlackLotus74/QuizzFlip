class Db {

    constructor() {
        this.quizzes = [];
        this.categories = [];
        this.questions = [];
    }

    loadQuizzes(_callback) { //rappel : 
        var db = this; //recupere objet db actuel
        var ajx = new XMLHttpRequest(); //XMLHttpRequest ->objet utilise pour requete ajax

        //GET - POST - PUT - DELETE
        //LIRE - AJOUTER - METTRE A JOUR - EFFACER
        ajx.open('GET', './api.php?t=quizzes', true); //ouverture d'url

        //recuperation
        ajx.onload = function () { //ajx.onload = function() {} 
            if (this.status === 200) { //this = XMLHttpRequest
                var result = JSON.parse(this.responseText);
                console.log(result);
                db.quizzes = result;
                _callback(db);
                console.log('DB Quizzes loaded !');
            } else {
                alert('Error loading Quizzes');
            }
        }
        ajx.send();
    }

    loadCategories(_id, _callback) { //callback = getCategories
        var db = this;
        var ajx = new XMLHttpRequest();

        ajx.open('GET', './api.php?t=categories&id=' + _id, true);
        ajx.onload = function () {
            if (this.status === 200) {
                var json = JSON.parse(this.responseText);
                console.log(json);
                db.categories = json;
                _callback(db);
                console.log('DB categories loaded !');
            } else {
                alert('Error loading Categories');
            }
        }
        ajx.send();
    }

    loadQuestions(_id, _callback) {
        var db = this;
        var ajx = new XMLHttpRequest();

        ajx.open('GET', './api.php?t=questions&id=' + _id, true);
        ajx.onload = function () {
            if (this.status === 200) {
                var json = JSON.parse(this.responseText);
                console.log(json);
                db.questions = json;
                _callback(db);
                console.log('DB questions loaded !');
            } else {
                alert('Error loading questions');
            }
        }
        ajx.send();
    }
}
