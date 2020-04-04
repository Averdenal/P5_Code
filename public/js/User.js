class User{
    constructor(){
        this.login();
        this.logout();
        this.register();
        this.display_form();
    }
    display_form(){
        $('input[name=action_login]').on('change',function(){
            if($('input[name=action_login]:checked').val() == "Connexion"){
                $('#form_Login').removeClass('none');
                $('#form_Register').addClass('none');
            }else{
                $('#form_Login').addClass('none');
                $('#form_Register').removeClass('none');
            }
        })
    }
    login(){
        $('#login_Form').off();
        $('#login_Form').on('submit',function (e) { 
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
        $('#logout').on('click',function(e){
            e.preventDefault();
            $.ajax({
                type: "GET",
                url: "/Authentification/logout",
                success: function (response) {
                    location.reload();
                }
            });
        });
    }
    register()
    {
        $('#register_Form').on('submit',(e) => { 
            e.preventDefault();
            $.ajax({
                type: "POST",
                url:'/Authentification/register',
                data: $('#register_Form').serialize(),
                success: function (response) {
                    location.reload();

                }
            });
        });

    }
}