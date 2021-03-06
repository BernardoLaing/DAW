$(document).ready(function(){
    $.viewMode = function() {
        $("input").each(function(){
            $(this).prop("disabled", true);
            $(this).attr("placeholder", " ");
        });
        $("select").each(function(){
            $(this).prop("disabled", true);
        });
        if($.getPermissions()[9]) {
            $("#warpEditButton").html($("<button>", {
                class: "btn btn-secondary",
                text: "Editar",
                click: function (e) {
                    e.preventDefault();
                    $("input").each(function () {
                        $(this).prop("required", true);
                    });
                    $("input").first().prop("required", false);
                    $(this).prop("required", false);
                    $("#warpSanctionButton").find("button").hide();
                    $("input").each(function () {
                        $(this).prop("disabled", false);
                    });
                    $("#user_number").prop("disabled", true);
                    $("select").each(function () {
                        $(this).prop("disabled", false);
                    });
                    $("#user_table").hide();
                    $("#warpEditButton").html($("<button>", {
                        class: "btn btn-secondary",
                        text: "Guardar cambios",
                        type: "submit"
                    }));
                }
            }));
        }

        if($.getPermissions()[27]) {
            $("#warpEditButton").append(
                $("<button>", {
                    class: "btn btn-secondary d-ib ml-3",
                    text: "Ver credencial",
                    click: function (e) {
                        var a = window.location.href;
                        a = a.substr(0, a.length - (a.match(/\/[^\/]+$/) + "").length) + "/credentialView.php?id=" + $("#user_number").val();
                        window.location.href = a;
                    }
                })
            );
        }

        $("#entry_form").submit(function(e){
            e.preventDefault();
            if(!validateSearch(null))
                return;
            console.log("submitting");
            $("#user_number").prop("disabled", false);
            $.post("controller/visitorsUpdate_controller.php",{
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
                },
                function(data,status){
                    if(status == "success")
                        $("#modalSaved").modal("show");
                    else
                        $("#modalError").modal("show");
                    setTimeout(function(){
                        location.reload();
                    }, 1150);
            });
});
        if($.getPermissions()[16]){
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
                    $("#sanctionValues").find("button").first().click(function(){
                    $("#sanctionValues").modal("hide");
                    $("input").each(function(){
                        $(this).prop("disabled", true);
                    });
                    $("select").each(function(){
                        $(this).prop("disabled", true);
                    });
                    $("#user_table").show();
                    });
                }
            }));
        }


$("#mform_sanctions").submit(function(e){
e.preventDefault();
$.post("controller/sanctionsInsert_controller.php",{
user :
    {
        number : $("#user_number").val(),
        sanctionTime : $("#user_sanctionTime").val(),
        sanctionDescription : $("#user_sanctionDescription").val()
    }
},
function(data,status){
$("#sanctionValues").modal("hide");

    if(status == "success")
        $("#modalSaved").modal("show");
    else
        $("#modalError").modal("show");
    setTimeout(function(){
        location.reload();
    }, 1150);
});
});

}
});
