window.addEventListener('DOMContentLoaded', function() {

    appVue = new Vue({
        el: '#vue',
        data: {
            pageTitle: 'Mon super titre',
            renderBody: 'Contenu de la page',
            year: 2020,
            authors: ['Gaetan', 'François', 'Tiberiu', 'Adrien', 'Julien'],
            isActive: false
        },
    });

    document.querySelector('#btn').addEventListener('click', function(){
        appVue.year = parseInt(appVue.year);
        appVue.year += 1;
        //appVue.authors.push('Mickael');
        appVue.isActive = !appVue.isActive;
    });

    class 

});