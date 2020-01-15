Game = function() {

    this.teams = [];
    this.quiz = new Quiz();
    
    this.addTeam = function() {
        let _id = this.teams.length + 1;
        this.teams.push(new Team(_id));
    }

    this.deleteTeam = function() {
        this.teams.pop();        //renvoie dernier element et le supprime
    }
}











/** Game.prototype.addTeam = function() {  //en dehors 
    let _id = this.teams.length + 1;
    this.teams.push(new Team(_id));
}*/