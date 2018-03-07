var NAME_MESSAGE = "Este campo no puede contener números ni caracteres especiales <br><br><br>";
var NUMBER_MESSAGE = "Este campo solo puede contener un número con cualquier cantidad de dígitos <br><br><br>";
var DATE_MESSAGE = "Este campo debe contener una fecha válida <br><br><br>";
var ISBN_MESSAGE = "Este campo debe contener un ISBN o ISSN válido <br><br><br>";
var SCHOOLING_MESSAGE = "Selecciona un grado de estudios <br><br><br>";
var GENDER_MESSAGE = "Selecciona un género <br><br><br>";

console.log("js in ");
document.getElementById("csubmit").onclick = function(event){
    var v = document.getElementsByClassName("cvalidate");
    if(v!=null){
        var cpassed = true;
        var cvalue, element, w;
        for(var i = 0; i < v.length; i++){
            element = v[i];
            cvalue = element.value;
            if(cvalue != null && cvalue != ""){
                if(element.classList.contains("cname")){
                    w = element.parentElement.parentElement.parentElement.getElementsByClassName("warning")[0];
                    if(w == null){
                        w = document.createElement("span");
                        w.classList.add("warning");
                        element.parentElement.parentElement.parentElement.appendChild(w);
                    }
                    if(!test(NAME, cvalue)){
                        cpassed = false;
                        w.style.display = "inline-block";
                        w.innerHTML = NAME_MESSAGE;
                    }else{
                        w.style.display = "none";
                    }
                }else if(element.classList.contains("cnumber")){
                    w = element.parentElement.parentElement.parentElement.getElementsByClassName("warning")[0];
                    if(w == null){
                        w = document.createElement("span");
                        w.classList.add("warning");
                        element.parentElement.parentElement.parentElement.appendChild(w);
                    }
                    if(!test(NUMBER, cvalue)){
                        cpassed = false;
                        w.style.display = "inline-block";
                        w.innerHTML = NUMBER_MESSAGE;
                    }else{
                        w.style.display = "none";
                    }
                }else if(element.classList.contains("cdate")){
                    w = element.parentElement.parentElement.parentElement.getElementsByClassName("warning")[0];
                    if(w == null){
                        w = document.createElement("span");
                        w.classList.add("warning");
                        element.parentElement.parentElement.parentElement.appendChild(w);
                    }
                    if(!test(DATE, cvalue)){
                        cpassed = false;
                        w.style.display = "inline-block";
                        w.innerHTML = DATE_MESSAGE;
                    }else{
                        w.style.display = "none";
                    }
                }else if(element.classList.contains("cschooling")){
                    w = element.parentElement.parentElement.parentElement.getElementsByClassName("warning")[0];
                    if(w == null){
                        w = document.createElement("span");
                        w.classList.add("warning");
                        element.parentElement.parentElement.parentElement.appendChild(w);
                    }
                    if(!test(SCHOOLING, cvalue)){
                        cpassed = false;
                        w.style.display = "inline-block";
                        w.innerHTML = SCHOOLING_MESSAGE;
                    }else{
                        w.style.display = "none";
                    }
                }else if(element.classList.contains("cgender")){
                    w = element.parentElement.parentElement.parentElement.getElementsByClassName("warning")[0];
                    if(w == null){
                        w = document.createElement("span");
                        w.classList.add("warning");
                        element.parentElement.parentElement.parentElement.appendChild(w);
                    }
                    if(!test(GENDER, cvalue)){
                        cpassed = false;
                        w.style.display = "inline-block";
                        w.innerHTML = GENDER_MESSAGE;
                    }else{
                        w.style.display = "none";
                    }
                }else if(element.classList.contains("cisbn")){
                    w = element.parentElement.parentElement.parentElement.getElementsByClassName("warning")[0];
                    if(w == null){
                        w = document.createElement("span");
                        w.classList.add("warning");
                        element.parentElement.parentElement.parentElement.appendChild(w);
                    }
                    if(!test(ISBN, cvalue)){
                        cpassed = false;
                        w.style.display = "inline-block";
                        w.innerHTML = ISBN_MESSAGE;
                    }else{
                        w.style.display = "none";
                    }
                }
            }
        }
        if(!cpassed)
           event.preventDefault();
    }
};
