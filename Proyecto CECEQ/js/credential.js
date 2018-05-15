$(document).ready(function(){

    var gid;
    var gd;
    $.loadData = function (d, getId){
        gid = getId;
        gd = d;
        loadImage();

        $("#credentialForm").append(
            $("<input/>", {
                type: "number",
                name: "idVisitante",
                id: "visitorId",
                value: getId
            })
        );
        $("#credentialForm").append(
            $("<input/>", {
                type: "text",
                name: "csrf",
                id: "csrfTokenInput",
                value: "asdf",//+$.getCsrfToken(),
                style: "display: none"
            })
        );

        $("#credentialForm").submit(function(e) {
            if(!validateSearch(null))
                e.preventDefault();
        });

        $("#visitorId").hide();

        $("#credentialForm").prop("action", "controller/credentialEdit_controller.php");

        $("#credential_issuance").val(d["issuance"]);
        var e = d["issuance"].split('-');
        $("#credential_expiration").val((parseInt(e[0])+2)+"-"+e[1]+"-"+e[2]);

        $(".card-body").find("input").each(function(){
            $(this).val(d[$(this).attr("name").replace("credential[", "").replace("]", "")]);
            $(this).prop("disabled", true);
        });

        $(".card-body").find("select").each(function(){
            var v = d[$(this).attr("name").replace("credential[", "").replace("]", "")];
            if($(this).find("option").length>4) {
                $(this).val(getGradoEstudios(v)+1);
            } else {
                $(this).val(v);
            }
            $(this).prop("disabled", true);
        });
        if($.getPermissions()[7]) {
            $("form").first().find("#editButtonCredential").html(
                $("<button/>", {
                    text: "Editar",
                    type: "button",
                    class: "btn btn-secondary",
                    click: function () {
                        $("#printCredentialButtonElement").hide();
                        $("#fileToUpload").prop("disabled", false);
                        $(".card-body").find("input").each(function () {
                            $(this).prop("disabled", false);
                        });

                        $(".card-body").find("select").each(function () {
                            $(this).prop("disabled", false);
                        });
                        $(this).text("Guardar cambios");
                        $("#editButtonCredential").html(
                            $("<button/>", {
                                text: "Guardar cambios",
                                class: "btn btn-secondary",
                                type: "submit"
                            })
                        );
                        $("iframe").first().prop("src", "https://www.youtube.com/embed/HgDBl0JYzNw?autoplay=1");
                    }
                })
            );
        }

        $("form").first().find("#printButtonCredential").html(
            $("<a/>", {
                text: "Imprimir credencial",
                href: "userCredential.php?id="+gid,
                class: "btn btn-secondary",
                id: "printCredentialButtonElement"
            })
        );
    };
/*
    $("#credentialForm").submit(function(e){
        console.log(2);
        if(!validateSearch(null))
            e.preventDefault();
    });
*/
    function getGradoEstudios(t){
        switch(t){
            case "Primaria":
                return 2;
            case "Secundaria":
                return 3;
            case "Preparatoria":
                return 4;
            case "Univesidad":
                return 5;
            case "Maestria":
                return 6;
            case "Doctorado":
                return 7;
            default:
                return 1;
        }
    }

    function loadImage(){
        //console.log(window.location.href);
        var a = window.location.href;
        var foto = gd["fileToUpload"];
        a = a.substr(0, a.length-(a.match(/\/[^\/]+$/)+"").length)+foto.substr(2, foto.length-2);
        console.log(a);
        var i = $("#targetOuter").find("img").first();
        $("#fileToUpload").prop("disabled", true);
        $("#fileToUpload").removeAttr("required");
        $("#fileToUpload").change(
            function(){
               i.hide();
               $("#fileToUpload").prop("required", true);
            }
        );
        i.removeClass("icon-choose-image");
        i.attr("src", a);
        i.attr("width", 278);
        i.attr("height", 200);
        /*
        $.get(a,
            function(data){
                console.log(data);
                $("img").first().removeClass(".icon-choose-image");
                $("#targetOuter").find("img").first().attr("src", a);
            });
        */
        /*
function(e) {
    console.log("fsubmit");
    e.preventDefault();
    if(!validateSearch(null))
        return;
    console.log("submitting");

    $("#credentialForm").submit(function(e) {
        e.preventDefault();
        console.log("holaaaaaaaaaaaa");
    });
    $("#credentialForm").submit();

}
*/
        /*
            $.post("controller/credentialEdit_controller.php", {
                    credential:
                        {

                            idVisitante: gid,
                            name: $("#credential_name").val(),
                            paternal: $("#credential_paternal").val(),
                            maternal: $("#credential_maternal").val(),
                            birth: $("#credential_birth").val(),
                            gender: $("#credential_gender").val(),
                            schooling: $("#credential_schooling").val(),
                            email: $("#credential_email").val(),
                            street: $("#credential_street").val(),
                            number: $("#credential_number").val(),
                            neighborhood: $("#credential_neighborhood").val(),
                            postalCode: $("#credential_postalCode").val(),
                            phone: $("#credential_phone").val(),

                            workName: $("#credential_workName").val(),
                            workPhone: $("#credential_workPhone").val(),
                            workStreet: $("#credential_workStreet").val(),
                            workNumber: $("#credential_workNumber").val(),
                            workNeighborhood: $("#credential_workNeighborhood").val(),
                            workPostalCode: $("#credential_workPostalCode").val(),

                            nameF: $("#credential_nameF").val(),
                            paternalF: $("#credential_paternalF").val(),
                            maternalF: $("#credential_maternalF").val(),
                            emailF: $("#credential_emailF").val(),
                            phoneF: $("#credential_phoneF").val(),
                            schoolingF: $("#credential_schoolingF").val(),
                            streetF: $("#credential_streetF").val(),
                            numberF: $("#credential_numberF").val(),
                            neighborhoodF: $("#credential_neighborhoodF").val(),
                            postalCodeF: $("#credential_postalCodeF").val(),
                            workNameF: $("#credential_workNameF").val(),
                            workPhoneF: $("#credential_workPhoneF").val(),
                            workStreetF: $("#credential_workStreetF").val(),
                            workNumberF: $("#credential_workNumberF").val(),
                            workNeighborhoodF: $("#credential_workNeighborhoodF").val(),
                            workPostalCodeF: $("#credential_workPostalCodeF").val()

                        }
                },
                function (data, status) {
                alert(data);
                    if (status == "success")
                        $("#modalSaved").modal("show");
                    else
                        $("#modalError").modal("show");
                    setTimeout(function () {
                        window.location.href="menu.php";
                    }, 1150);
                });*/
    }

});