$(document).ready(function(){
    $('#form').validate({
        rules:{
            name:{
                required:true,
                lettersonly:true
            },
            reason:{
                required:true
            },
            datepicker:{
                required:true
            },
            responsible:{
                required:true
            },
            points:{
                required:true
            }

        },
        messages:{
            name:{
                required:"Por favor, preencha este campo.",
                lettersonly:"Apenas letras são permitidas"
            },
            reason:{
                required:"Por favor, preencha este campo.",
                reason:"Selecione um motivo"
            },
            reason:{
                required:"Por favor, preencha este campo.",
                reason:"Selecione uma data"
            }
        }
    });
    $("#selectMotivo").change(function() {
            
        $("#qtdDias").attr('disabled', 'disabled');
        
        if ($("#selectMotivo option:selected").val() == "" ){

            $("#points").val("");
        }
        else if ($("#selectMotivo option:selected").val() == "motivo1" ){

            $("#points").val("4");

        }else if ($("#selectMotivo option:selected").val() == "motivo2" ){

            $("#points").val("2");

        }else if ($("#selectMotivo option:selected").val() == "motivo3" ){
                        
            $("#qtdDias").removeAttr('disabled');
            $("#qtdDias").change(function() { 	
                $("#points").val($("#qtdDias").val()*2);
            })

        }else if ($("#selectMotivo option:selected").val() == "motivo4" ){

            $("#points").val("2");

        }else if ($("#selectMotivo option:selected").val() == "motivo5" ){

            $("#points").val("4");

        }else if ($("#selectMotivo option:selected").val() == "motivo6" ){
                
            $("#points").val("10");
        }
    });
});