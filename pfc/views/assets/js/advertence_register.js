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
});