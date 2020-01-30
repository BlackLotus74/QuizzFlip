window.addEventListener('DOMContentLoaded', function () {

    appVue = new Vue({
        el: '#vue',
        data: {
            quizzes: [],
            questions: [],
            //categories: [],
            game: new Game(),
            //message: '',
        },
        mounted: function () {

        },
        methods: {
            getQuizzes: function(_db) {
                this.quizzes = _db.quizzes;
                console.log(this.quizzes);              
            },

            addTeam: function () {
                this.game.addTeam();
                console.log(this.game.teams.length);

                if (this.quizzes.length < 1) {
                    var db = new Db();
                    console.log(db);
                    db.loadQuizzes(this.getQuizzes);
                }
            },
            deleteTeam: function() {
                this.game.deleteTeam();
            },

            loadCategories: function(event) {
                /*for (var myQuiz of this.quizzes) {                  //foreach JS
                    if (myQuiz.quiz_id == event.target.dataset.id) {
                        this.game.quiz.fill(myQuiz);                  //method class quiz - alimente quiz dans game
                        break;
                    }
                }*/
                var quiz = this.quizzes.find(myQuiz => myQuiz.quiz_id == event.target.dataset.id); //meme chose que dessus
                this.game.quiz.fill(quiz);

                var db = new Db();
                db.loadCategories(event.target.dataset.id, this.getCategories); //recupere dans data-quelquechose
            },

            getCategories: function(_db) {        //appele par callback /!\

                /*for(var cat of _db.categories) {
                    var newCat = new Category();
                    newCat.fill(cat);
                    this.game.quiz.categories.push(newCat);
                }*/

                this.game.quiz.categories = _db.categories.map(item => new Category().fill(item)); //traitement sur chaque item

                console.log("App Categories loaded");
            },

            loadQuestions: function(event) {
                var db = new Db();
                db.loadQuestions(event.target.dataset.id, this.getQuestions);
            },

            getQuestions: function(_db) {
                this.questions = _db.questions;
                console.log(this.questions);
            },
        },
    });

    /*document.querySelector('#btn').addEventListener('click', function () {
        appVue.year = parseInt(appVue.year);
        appVue.year += 1;
        //appVue.authors.push('Mickael');
        appVue.isActive = !appVue.isActive;
    });*/
});