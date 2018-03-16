
$("select").each(function(){
    $(this).change(function(){
        $.get("controller/dgb_search.php",{
            Month : $("#month").val(),
            Year : $("#year").val()
        },
        function(data){
//            $("#user_table").html(data);
            var obj = JSON.parse(data);
            console.log(obj);
            $("#ninos").html(obj['ninos']);
            $("#jovenes").html(obj['jovenes']);
            $("#adultos").html(obj['adultos']);
            $("#credenciales").html(obj['credenciales']);
            $("#libros").html(obj['libros']);
        });
    });
});