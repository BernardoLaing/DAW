$(document).ready(function(){
    $.viewMode = function() {
        $("input").each(function(){
            $(this).prop("disabled", true);
        });
        $("select").each(function(){
            $(this).prop("disabled", true);
        });

        $("#warpEditButton").html($("<button>", {
            class: "btn btn-secondary",
            text: "Editar",
            click: function(e){
                e.preventDefault();
                $(this).text("Guardar cambios");
                $("input").each(function(){
                    $(this).prop("disabled", false);
                });
                $("#user_number").prop("disabled", true);
                $("select").each(function(){
                    $(this).prop("disabled", false);
                });
                $("#user_table").hide();
                $(this).click(function(){
                    $("#user_number").prop("disabled", false);
                    $("#entry_form").attr("action", "controller/visitorsUpdate_controller.php");
                    $("#entry_form").submit();
                });
            }
        }));

        $("#warpSanctionButton").html($("<button>", {
            class: "btn btn-secondary",
            text: "Sancionar",
            click: function(e){
                e.preventDefault();
                $("input").each(function(){
                    $(this).prop("disabled", false);
                });
                $("select").each(function(){
                    $(this).prop("disabled", false);
                });
                $("#user_table").hide();
                $("#sanctionValues").modal("show");
                $("#mbody_sanctions").html("<p>Usuario: "+$("#user_name").val()+" "+$("#user_paternal").val()+" "+$("#user_maternal").val()+"</p>");
                $("#user_sanctionDescription").val("");
            }
        }));

        $("#msubmit_sanctions").click(function(){
            $("#user_sanctionNumber").val($("#user_number").val());
            $.post("controller/sanctionInsert_controller.php",{
                    user :
                        {
                            number : $("#user_number").val(),
                            name : "",
                            paternal : "",
                            maternal : "",
                            birthday : $("#user_birthday").val(),
                            user_grade : $("#user_grade").val(),
                            gender : $("#user_gender").val()
                        }
                },
                function(data,status){
                    $("#user_table").html(data);
                    readyForDisplay();
                });
        });

    }
});