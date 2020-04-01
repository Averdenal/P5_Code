class App{
    constructor(){
        this.sub_Menu();
    }
    sub_Menu() {
        $('.menu').on('click',"#bar",function() {
            window.location.href = 'http://127.0.0.1/Etablissements';
        });
        
    }
}