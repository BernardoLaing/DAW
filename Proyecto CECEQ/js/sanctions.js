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
            text: "Borrar sanción",
            click: function(e){
                e.preventDefault();
                $("#user_number").prop("disabled", false);
                //$("#entry_form").submit();
                $.post("controller/sanctionsErase_controller.php",{
                        user :
                            {
                                number : $("#user_number").val()
                            }
                    },
                    function(data,status){
                        $("#modalSanctionErased").modal("show");
                        setTimeout(function(){
                            location.reload();
                        }, 1150);
                    });
            }
        }));
    }
});