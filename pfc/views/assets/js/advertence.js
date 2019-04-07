$(document).ready(function(){
    $.validator.setDefaults({
        errorClass: 'help-block',
        highlight: function(element) {
            $(element)
                .closest('.form-group')
                .addClass('is-invalid');

        },
        unhighlight: function(element) {
            $(element)
                .closest('.form-group')
                .removeClass('is-invalid');
        }
    }),
    $('#form').validate({
        rules:{
            memberName:{
                required:true,
                // lettersonly:true
            },
            reason:{
                required:true
            },
            datepicker:{
                required:true
            },
            responsible:{
                required:false
            },
            points:{
                required:true
            }

        },
        messages:{
            memberName:{
                required:"Por favor, preencha este campo.",
                // lettersonly:"Apenas letras são permitidas"
            },
            reason:{
                required:"Por favor, preencha este campo.",
            },
            datepicker:{
                required:"Por favor, selecione uma data",
            }
        }
    });
    $("#reason").change(function() {
            
        $("#qtdDias").attr('disabled', 'disabled');
        
        if ($("#reason option:selected").val() == "" ){

            $("#points").val("");
        }
        else if ($("#reason option:selected").val() == "motivo1" ){

            $("#points").val("4");

        }else if ($("#reason option:selected").val() == "motivo2" ){

            $("#points").val("2");

        }else if ($("#reason option:selected").val() == "motivo3" ){
                        
            $("#qtdDias").removeAttr('disabled');
            $("#qtdDias").change(function() { 	
                $("#points").val($("#qtdDias").val()*2);
            })

        }else if ($("#reason option:selected").val() == "motivo4" ){

            $("#points").val("2");

        }else if ($("#reason option:selected").val() == "motivo5" ){

            $("#points").val("4");

        }else if ($("#reason option:selected").val() == "motivo6" ){
                
            $("#points").val("10");
        }
    });



    $('#exclude_adv').on('click',function(){
        alert();
        let cpf = $('#exclude-cpf').val();
        let admin_password = $('#password').val();
        console.log('oi');
        var method = window.location.href.split('/');
        method.pop();
        method.push('removeMember');
        method = method.join('/');

        $.post(
            method,
            {
                member_cpf:cpf,
                password_director:admin_password
            },
            function(data){
                data = JSON.parse(data);
                if(data.success){
                    window.location.reload();
                }else{
                    $('#response').text(data.message);
                }
            }
        );
    });
});

function excluirAdv(id){
    
     var method = window.location.href.split('/');
     method.pop();
     method.push('removeAdvertence');
     method = method.join('/');

     $.post(
         method,
         {
             advId:id,
            
         },
         function(data){
             data = JSON.parse(data);
             if(data.success){
                 window.location.reload();
             }else{
                 alert(data.message);
             }
         }
     );
}