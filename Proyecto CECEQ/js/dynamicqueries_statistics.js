$(document).ready(function(){
    $("input").each(function(){
        $(this).keyup(function(){
            $.post("controller/statisticsSearch_controller.php",{
               user : //Lo que envias
                {
                    schooling : $("#user_schooling").val(),
                    age : $("#user_age").val(),
                    gender : $("#user_gender").val()
                    month : $("#user_month").val(),
                    year : $("#user_year").val()
                }
            },
            function(data,status){
                $("#user_table").html(data);
                readyForDisplay();
            });
        });
    });

    $("select").each(function(){
        $(this).change(function(){
            $.post("controller/entrySearch_controller.php",{
                    user :
                        {
                          schooling : $("#user_schooling").val(),
                          age : $("#user_age").val(),
                          gender : $("#user_gender").val()
                          month : $("#user_month").val(),
                          year : $("#user_year").val()
                        }
                },
                function(data,status){
                    $("#user_table").html(data);
                    readyForDisplay();
                });
        });
    });

    $(".creload").click(function(){
        location.reload();
    });

    function readyForDisplay(){
        var r = $("tbody").find("tr");
        if(r.length){
            r.each(function(){
                $(this).click(function(){
                    var c = $(this).find("td").toArray();
                    if(c.length>1){
                        var inputs = $("input").toArray();
                        var i;
                        for(i = 0; i<inputs.length; i++){
                            inputs[i].value = c[i].innerText;
                        }
                        var selects = $("select").toArray();
                        selects[0].selectedIndex = getGradoEstudios(c[5].innerText);
                        selects[1].selectedIndex = getGenero(c[6].innerText);
                    }
                });
            });
        }
    }

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

    function getGenero(t){
        switch(t){
            case "H":
                return 1;
            case "M":
                return 2;
            case "O":
                return 3;
        }
    }


});
