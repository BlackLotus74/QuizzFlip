window.addEventListener('DOMContentLoaded', function () {

    appVue = new Vue({
        el: '#vue',
        data: {
            quizzes: [],
            categories: [],
            questions: [],
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
                var db = new Db();
                db.loadCategories(event.target.dataset.id, this.getCategories); //recupere dans data-quelquechose
            },

            loadQuestions: function(event) {
                var db = new Db();
                db.loadQuestions(event.target.dataset.id, this.getQuestions);
            },

            getCategories: function(_db) {                //appele par callback /!\
                this.categories = _db.categories;
                console.log(this.categories);
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