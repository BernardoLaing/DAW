function greet() {
    console.log("js works");
}
greet();

function changeDisplay(){
    if(document.getElementById("userTable").getAttribute("style")=="display: none;")
        document.getElementById("userTable").setAttribute("style", "display: block;");
    else
        document.getElementById("userTable").setAttribute("style", "display: none;");
    console.log("should have changed");
    for(var i=0; i<userTable.rows.length; i++){
        userTable.rows[i].onclick = function(){
            window.location.replace("visitantsView.php");
        }
    }
    console.log("ran");
}




if(document.getElementById("userTable")!=null){
    document.getElementById("userTable").setAttribute("style", "display: none;");
    document.getElementById("buscarVisitante").onclick=changeDisplay;
    userTable = document.getElementById("userTable");
}




