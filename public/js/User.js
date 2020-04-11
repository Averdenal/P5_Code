class User{
    constructor(){
        this.login();
        this.logout();
        this.register();
        this.display_form();
        this.changePicture();
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
        $('#btn_Profil_Logout').on('click',function(e){
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
    back_page(){
        $('#b_Page').addClass('none');
        $('#banner_User_Form').addClass("none");
        $('#picture_User_Form').addClass("none");
    }

    changePicture(){
        $('#add_Picture_User').on('click',function () { 
            $('#b_Page').removeClass('none');
            $('#picture_User_Form').removeClass("none");
            $('#banner_User_Form').addClass("none");
         })
         $('#add_Banner_User').on('click',function () { 
            $('#b_Page').removeClass('none');
            $('#banner_User_Form').removeClass("none");
            $('#picture_User_Form').addClass("none");
         })
         $('#b_Page').on('click',() => { 
            this.back_page();
          });

        $('#changeBanner').on('submit',(e) => {
            e.preventDefault();
            var form = document.getElementById('changeBanner');
            var formData = new FormData(form);

            var fileInput = document.getElementById('banner');
            console.log(fileInput.files);
            var file = fileInput.files[0];

            var formData = new FormData();
            formData.append('file', file);
          
            var xhr = new XMLHttpRequest();
            // Add any event handlers here...
            xhr.open('POST', form.getAttribute('action'), true);
            xhr.send(formData);
            return false; // To avoid actual submission of the form
          }
        );

        $('#changePicture').on('submit', (e) => { 
            e.preventDefault();
            var form = document.getElementById('changePicture');
            var formData = new FormData(form);

            var fileInput = document.getElementById('picture');
            console.log(fileInput.files);
            var file = fileInput.files[0];

            var formData = new FormData();
            formData.append('file', file);
          
            var xhr = new XMLHttpRequest();
            xhr.open('POST', form.getAttribute('action'), true);
            xhr.send(formData);         
            return false; 
        });
    }
}