class App{
    constructor(){
        this.sub_Menu();
        new Etab();
        new User();
        this.top_Menu();
    }
    sub_Menu() {
        $('.menu').on('click',"#bar",function() {
            window.location.href = 'http://127.0.0.1/Etablissements';
        });
        $('.menu').on('click',"#badges",function() {
            window.location.href = 'http://127.0.0.1/Badges';
        });
        
    }
    top_Menu(){
        $('#param').on('click',function(){
            if($('#conf_Sub_Menu').hasClass( "visibility" )){
                $('#conf_Sub_Menu').removeClass('visibility');
            }else{
                $('#conf_Sub_Menu').addClass('visibility');
            }
            
        })
    }
}