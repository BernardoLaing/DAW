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

           /* modal();
            console.log("holiwi spiwis");
            e.preventDefault();
            $("input").each(function(){
                $(this).prop("disabled", false);
            });
            $("select").each(function(){
                $(this).prop("disabled", false);
            })  ;
            $("#entry_form").submit();
            console.log("Imprime modal");
           // modal();
           */
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
        });
        });
        console.log("all ran");

        $("#registrarEntrada").click(function(e) {
            console.log("PASO!");
            e.preventDefault()
            $("#modalSaved").modal({
                show: true, 
               // backdrop: 'static',
               // keyboard: true
             })
        });

       /* $("#registrarEntrada").click(function(){
            console.log("PASO!");
             $("#modalSaved").modal("show");
             setTimeout(function(){
                 location.reload();
             }, 1150);

         });*/

    };
});

