$(document).ready(function(){
    
    $.validator.setDefaults({
        errorClass:"text-danger"
    });
    
    $('#form').validate({
        rules:{
            value_required:{
                required:true,
                number:true
            },
            text_area_response:{
                required:true
            }
        },
        messages:{
            value_required:{
                required:"Por favor, preencha este campo.",
                number:"Insira um número válido"
            },
            text_area_response:{
                required:"Por favor, preencha este campo."
            }
        }
    });

});

