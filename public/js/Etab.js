class Etab{
    constructor(){
        this.checkbox();
    }
    checkbox() {
        $('._checkbox').on('change',() =>{
            $.each($('._checkbox'),function(){
                var check = this;
                if(!check.checked){
                    $.each($('.etabs_Item'),function(){
                        console.log($(this).data('cat'));
                        console.log(check.id);
                        if($(this).data('cat') == check.id){
                            $(this).addClass('none');
                        }
                        
                    })
                }else{
                    $.each($('.etabs_Item'),function(){
                        console.log($(this).data('cat'));
                        console.log(check.id);
                        if($(this).data('cat') == check.id){
                            $(this).removeClass('none');
                        }
                        
                    })
                }
            });
        });
    }
    
}