class App{
    constructor(){
        this.sub_Menu();
        new Etab();
    }
    sub_Menu() {
        $('.menu').on('click',"#bar",function() {
            window.location.href = 'http://127.0.0.1/Etablissements';
        });
        $('.menu').on('click',"#badges",function() {
            window.location.href = 'http://127.0.0.1/Badges';
        });
        
    }
}