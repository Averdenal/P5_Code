class App{
    constructor(){
        this.sub_Menu();
        new Etab();
        new User();
        this.top_Menu();
    }
    sub_Menu() {
        $('.menu').on('click',"#bar",function() {
            location.replace('/Etablissements');
        });
        $('.menu').on('click',"#badges",function() {
            location.replace('/Badges');
        });
        

        $('.sub_Menu_Action_Grid').on('click',function(){
            $('.sub_Menu_Mobile').addClass('translate_Sub_Menu');
        });
        $('.btn_Back_Sub_Menu').on('click',function(){
            $('.sub_Menu_Mobile').removeClass('translate_Sub_Menu');
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