function main() {
  $('.projects').hide();

  $('.projects-button').on('click', function() {
        $(this).next().toggle();
    if($(this).text() == "Ocultar Permisos")
        $(this).text("Ver Permisos");
    else
        $(this).text("Ocultar Permisos");
    });
}

$(document).ready(main);


function greet() {
    console.log("js works");
}
greet();

function changeDisplay(){
    if(document.getElementById("userTable").getAttribute("style")=="display: none;")
        document.getElementById("userTable").setAttribute("style", "display: block;");
    else
        document.getElementById("userTable").setAttribute("style", "display: none;");
    for(var i=1; i<userTable.rows.length; i++){

        userTable.rows[i].onclick = function(){
            window.location.replace("visitantsView.php");
        }
    }
    console.log("ran");
}

function changeDisplay(){
    if(document.getElementById("sanctionTable").getAttribute("style")=="display: none;")
        document.getElementById("sanctionTable").setAttribute("style", "display: block;");
    else
        document.getElementById("sanctionTable").setAttribute("style", "display: none;");
    console.log("should have changed");
    for(var i=1; i<userTable.rows.length; i++){

        userTable.rows[i].onclick = function(){
            window.location.replace("sanctionsView.php");
        }
    }
    console.log("ran");
}


if(document.getElementById("userTable")!=null){
    document.getElementById("userTable").setAttribute("style", "display: none;");
    document.getElementById("buscarVisitante").onclick=changeDisplay;
    userTable = document.getElementById("userTable");
}


if(document.getElementById("sanctionTable")!=null){
    document.getElementById("sanctionTable").setAttribute("style", "display: none;");
    document.getElementById("searchSanctions").onclick=changeDisplay;
    userTable = document.getElementById("sanctionTable");
}

addBookButton = document.getElementById("addBook");
if(addBookButton != null) {
    addBookButton.onclick = addBookInput;
}
var n = 0;
bookInputs = document.getElementsByClassName("book-input");

function addBookInput(){
    if(n < bookInputs.length){
        bookInputs[n].style.height = "86px";
        n = n+1;
        if( n >= bookInputs.length){
            addBookButton.style.display = "none";
        }
    }
}
