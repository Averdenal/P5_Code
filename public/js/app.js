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
        $('#link_Sub_Menu').on('click',function () { 
            $("#mobile_Black_Zone").removeClass('none');
            $('#navigation_Widget_Mobile').removeClass('none');
        })
        $('#btn_Back_Sub_Menu').on('click',function () { 
            $("#mobile_Black_Zone").addClass('none');
            $('#navigation_Widget_Mobile').addClass('none');
        });
        $('.sub_Menu').on('click',function () { 
            $('#navigation_Widget_Mobile').removeClass('none');
            $("#mobile_Black_Zone").removeClass('none');
         });
         $("#mobile_Black_Zone").on('click',function () { 
            $("#mobile_Black_Zone").addClass('none');
            $('#navigation_Widget_Mobile').addClass('none');
          })
        
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