$(document).ready(function(){
    $("input").each(function(){
        $(this).keyup(function(){
            $.post("controller/entrySearch_controller.php",{
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
                $("#user_table").html(data);
            });
        });
    });
});
