$(document).ready(function(){
    $.viewMode = function() {
        $("input").each(function(){
            $(this).prop("disabled", true);
        });
        $("select").each(function(){
            $(this).prop("disabled", true);
        });
        try{
            $("#registrarEntrada").unbind(validateNullAndInsert)
        }catch(x){

        }



        $("#registrarEntrada").click(function(e){
            e.preventDefault();

           $.post("controller/entryInsert_controller.php",{
            user :
                {
                    number : $("#user_number").val(),
                    name : $("#user_name").val(),
                    paternal : $("#user_paternal").val(),
                    maternal : $("#user_maternal").val(),
                    birthday : $("#user_birthday").val(),
                    user_grade : $("#user_grade").val(),
                    gender : $("#user_gender").val()
                }
        },function(data, status){
             $("#modalEntrada").modal("show");
             setTimeout(function(){
                 location.reload();
             }, 1150);

         });
        });
        console.log("all ran");
    };
});

