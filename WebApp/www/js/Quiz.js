
//syntaxe classic\\

class Quiz
{
    constructor() {
        this.quiz_id = 1;
        this.quiz_theme = 'myQuiz';
        this.quiz_textcolor = '';
        this.quiz_backcolor = '';
        this.categories = [];
    }

    /**
     * 
     * @param {array} _input 
     */
    fill(_input) {
        this.quiz_id = _input.quiz_id;
        this.quiz_theme = _input.quiz_theme;
        this.quiz_textcolor = _input.quiz_textcolor;
        this.quiz_backcolor = _input.quiz_backcolor;
    }
}


