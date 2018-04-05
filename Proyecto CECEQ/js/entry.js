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
            console.log("holiwi spiwis");
            e.preventDefault();
            $("input").each(function(){
                $(this).prop("disabled", false);
            });
            $("select").each(function(){
                $(this).prop("disabled", false);
            })  ;
            $("#entry_form").submit();
        });
        console.log("all ran");
    };
});