class User{
    constructor(){
        this.login();
        this.logout();
        this.register();
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