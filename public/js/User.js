class User{
    constructor(){
        this.login();
        this.logout();
        this.register();
        this.display_form();
    }
    display_form(){
        $('input[name=action_login]').on('change',()=>{
            if($('input[name=action_login]:checked').val() == "Connexion"){
                this.affiche_Login();
            }else{
                this.affiche_Register();
            }
        });
        $('#go_Forget').on('click',()=>{
            this.affiche_Forget();
        });

        $('#back_connexion').on('click',()=>{
            this.affiche_Login();
        });

    }
    affiche_Login(){
        $('#form_Login').removeClass('none');
        $('#form_Register').addClass('none');
        $('#form_Forget').addClass('none');
    }
    affiche_Register(){
        $('#form_Login').addClass('none');
        $('#form_Register').removeClass('none');
        $('#form_Forget').addClass('none');
    }
    affiche_Forget(){
        $('#form_Login').addClass('none');
        $('#form_Forget').removeClass('none');
        $('#form_Register').addClass('none');
    }
    login(){
        $('#login_Form').on('submit',function (e) { 
            debugger
            e.preventDefault();
            $.ajax({
                type: "POST",
                url: "/Authentification/login",
                data: $(this).serialize(),
                success: function (response) {
                    location.reload();
                }
            });
        });
    }
    logout(){
        $('#btn_Logout').on('click',function(e){
            e.preventDefault();
            $.ajax({
                type: "GET",
                url: "/Authentification/logout",
                success: function (response) {
                    location.replace("/");
                }
            });
        });
    }
    register()
    {
        $('#register_Form').on('submit',function(e) { 
            e.preventDefault();
            if($('#passwordVerif').val() == $('#password').val()){
                $.ajax({
                    type: "POST",
                    url:'/Authentification/register',
                    data: $(this).serialize(),
                    success: function (response) {
                        location.reload();
    
                    }
                });
            }else{
                $('#password').addClass('warning_Input');
                $('#passwordVerif').addClass('warning_Input');
            }
            
        });

    }
}