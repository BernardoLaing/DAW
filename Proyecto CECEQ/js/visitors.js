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
            $.post("controller/sanctionsInsert_controller.php",{
                    user :
                        {
                            number : $("#user_number").val(),
                            sanctionTime : $("#user_sanctionTime").val(),
                            sanctionDescription : $("#user_sanctionDescription").val()
                        }
                },
                function(data,status){
                    location.reload();
                });
        });

    }
});