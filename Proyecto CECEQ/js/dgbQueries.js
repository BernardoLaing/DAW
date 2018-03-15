
$("select").each(function(){
    $(this).change(function(){
//        $.ajax({
//            url: "controller/dgb_search.php",
//            type: "GET",
//            dataType: 'json',
//            success: function(data){
//                $.each(data, function(key, index){
//                    console.log(data[key].index);
//                })
//            }
//        });
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