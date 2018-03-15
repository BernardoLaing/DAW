var NAME_MESSAGE = "Este campo no puede contener números ni caracteres especiales <br><br><br>";
var NUMBER_MESSAGE = "Este campo solo puede contener un número con cualquier cantidad de dígitos <br><br><br>";
var DATE_MESSAGE = "Este campo debe contener una fecha válida <br><br><br>";
var ISBN_MESSAGE = "Este campo debe contener un ISBN o ISSN válido <br><br><br>";
var SCHOOLING_MESSAGE = "Selecciona un grado de estudios <br><br><br>";
var GENDER_MESSAGE = "Selecciona un género <br><br><br>";
var CLASSIFICATION_MESSAGE = "Selecciona una clasificación <br><br><br>";
var YEAR_MESSAGE = "Escribe un año válido <br><br><br>";
var PASSWORD_MESSAGE = "La contraseña debe tener al menos una minúscula y un número, y tener al menos seis caracteres <br><br><br>";
var EMAIL_MESSAGE = "Escribe un correo electrónico válido <br><br><br>";
var PHONE_MESSAGE = "Escribe un teléfono válido (solo números y espacios o guiones)<br><br><br>";

console.log("validations in");

var j;
var searchElems = document.getElementsByClassName("csearch");//any number of parameters is valid
if(searchElems != null){
    for(j = 0; j<searchElems.length; j++)
        searchElems[j].onclick = validateSearch;
}

var insertElems = document.getElementsByClassName("cinsert");//required inputs need the "required" class
if(insertElems != null){
    for(j = 0; j<insertElems.length; j++)
        insertElems[j].onclick = validateInsert;
}


var hInsertElems = document.getElementsByClassName("chinsert");//doesn't need required class, user has to fill all fields first
if(hInsertElems != null){
    for(j = 0; j<hInsertElems.length; j++)
        hInsertElems[j].onclick = validateNullAndInsert;
}


function validateSearch(event){
    var v = document.getElementsByClassName("cvalidate");
    if(v!=null){
        var cpassed = true;
        var cvalue, element, w;
        for(var i = 0; i < v.length; i++){
            element = v[i];
            cvalue = element.value;
            if(element.classList.contains("cname")){
                w = element.parentElement.parentElement.getElementsByClassName("warning")[0];
                if(w == null){
                    w = document.createElement("span");
                    w.classList.add("warning");
                    element.parentElement.parentElement.appendChild(w);
                }
                if(cvalue != "" && !test(NAME, cvalue)){
                    cpassed = false;
                    w.style.display = "inline-block";
                    w.innerHTML = NAME_MESSAGE;
                }else{
                    w.style.display = "none";
                }
            }else if(element.classList.contains("cnumber")){
                w = element.parentElement.parentElement.getElementsByClassName("warning")[0];
                if(w == null){
                    w = document.createElement("span");
                    w.classList.add("warning");
                    element.parentElement.parentElement.appendChild(w);
                }
                if(cvalue != "" && !test(NUMBER, cvalue)){
                    cpassed = false;
                    w.style.display = "inline-block";
                    w.innerHTML = NUMBER_MESSAGE;
                }else{
                    w.style.display = "none";
                }
            }else if(element.classList.contains("cdate")){
                w = element.parentElement.parentElement.getElementsByClassName("warning")[0];
                if(w == null){
                    w = document.createElement("span");
                    w.classList.add("warning");
                    element.parentElement.parentElement.appendChild(w);
                }
                if(cvalue != "" && !test(DATE, cvalue)){
                    cpassed = false;
                    w.style.display = "inline-block";
                    w.innerHTML = DATE_MESSAGE;
                }else{
                    w.style.display = "none";
                }
            }else if(element.classList.contains("cschooling")){
                w = element.parentElement.parentElement.getElementsByClassName("warning")[0];
                if(w == null){
                    w = document.createElement("span");
                    w.classList.add("warning");
                    element.parentElement.parentElement.appendChild(w);
                }
                if(cvalue != "" && !test(SCHOOLING, cvalue)){
                    cpassed = false;
                    w.style.display = "inline-block";
                    w.innerHTML = SCHOOLING_MESSAGE;
                }else{
                    w.style.display = "none";
                }
            }else if(element.classList.contains("cgender")){
                w = element.parentElement.parentElement.getElementsByClassName("warning")[0];
                if(w == null){
                    w = document.createElement("span");
                    w.classList.add("warning");
                    element.parentElement.parentElement.appendChild(w);
                }
                if(cvalue != "" && !test(GENDER, cvalue)){
                    cpassed = false;
                    w.style.display = "inline-block";
                    w.innerHTML = GENDER_MESSAGE;
                }else{
                    w.style.display = "none";
                }
            }else if(element.classList.contains("cisbn")){
                w = element.parentElement.parentElement.getElementsByClassName("warning")[0];
                if(w == null){
                    w = document.createElement("span");
                    w.classList.add("warning");
                    element.parentElement.parentElement.appendChild(w);
                }
                if(cvalue != "" && !test(ISBN, cvalue)){
                    cpassed = false;
                    w.style.display = "inline-block";
                    w.innerHTML = ISBN_MESSAGE;
                }else{
                    w.style.display = "none";
                }
            }else if(element.classList.contains("cyear")){ //<<-----------------------------------------------------
                w = element.parentElement.parentElement.getElementsByClassName("warning")[0];
                if(w == null){
                    w = document.createElement("span");
                    w.classList.add("warning");
                    element.parentElement.parentElement.appendChild(w);
                }
                if(cvalue != "" && !test(YEAR, cvalue)){//<<------------------------------------------------------------------------
                    cpassed = false;
                    w.style.display = "inline-block";
                    w.innerHTML = YEAR_MESSAGE;//<<-----------------------------------------------------------------
                }else{
                    w.style.display = "none";
                }
            }else if(element.classList.contains("cclassification")){ //<<-----------------------------------------------------
                w = element.parentElement.parentElement.getElementsByClassName("warning")[0];
                if(w == null){
                    w = document.createElement("span");
                    w.classList.add("warning");
                    element.parentElement.parentElement.appendChild(w);
                }
                if(cvalue != "" && !test(CLASSIFICATION, cvalue)){//<<------------------------------------------------------------------------
                    cpassed = false;
                    w.style.display = "inline-block";
                    w.innerHTML = CLASSIFICATION_MESSAGE;//<<-----------------------------------------------------------------
                }else{
                    w.style.display = "none";
                }
            }else if(element.classList.contains("cpassword")){ //<<-----------------------------------------------------
                w = element.parentElement.parentElement.getElementsByClassName("warning")[0];
                if(w == null){
                    w = document.createElement("span");
                    w.classList.add("warning");
                    element.parentElement.parentElement.appendChild(w);
                }
                if(cvalue != "" && !test(PASSWORD, cvalue)){//<<------------------------------------------------------------------------
                    cpassed = false;
                    w.style.display = "inline-block";
                    w.innerHTML = PASSWORD_MESSAGE;//<<-----------------------------------------------------------------
                }else{
                    w.style.display = "none";
                }
            }else if(element.classList.contains("cemail")){ //<<-----------------------------------------------------
                w = element.parentElement.parentElement.getElementsByClassName("warning")[0];
                if(w == null){
                    w = document.createElement("span");
                    w.classList.add("warning");
                    element.parentElement.parentElement.appendChild(w);
                }
                if(cvalue != "" && !test(EMAIL, cvalue)){//<<------------------------------------------------------------------------
                    cpassed = false;
                    w.style.display = "inline-block";
                    w.innerHTML = EMAIL_MESSAGE;//<<-----------------------------------------------------------------
                }else{
                    w.style.display = "none";
                }
            }else if(element.classList.contains("cphone")){ //<<-----------------------------------------------------
                w = element.parentElement.parentElement.getElementsByClassName("warning")[0];
                if(w == null){
                    w = document.createElement("span");
                    w.classList.add("warning");
                    element.parentElement.parentElement.appendChild(w);
                }
                if(cvalue != "" && !test(PHONE, cvalue)){//<<------------------------------------------------------------------------
                    cpassed = false;
                    w.style.display = "inline-block";
                    w.innerHTML = PHONE_MESSAGE;//<<-----------------------------------------------------------------
                }else{
                    w.style.display = "none";
                }
            }
        }
        if(!cpassed)
           event.preventDefault();
    }
}

function validateNullAndInsert(event){
    var v = document.getElementsByClassName("cvalidate");
    var ws = document.getElementsByClassName("cnullalert")[0];
    if(v!=null){
        for(var i = 0; i < v.length; i++){
            if(v[i].value == null || v[i].value == "" && v[i].id != "user_number"){
                event.preventDefault();
                ws.style.display = "inline-block";
                return;
            }
        }
        ws.style.display = "none";
        validateSearch(event);
    }
}

function validateAtLeastOne(event){
    var v = document.getElementsByClassName("cvalidate");
    if(v!=null){
        for(var i = 0; i < v.length; i++){
            if(v[i].value != null || v[i].value != ""){
                validateSearch(event);
                break;
            }
        }
    }
}

function validateInsert(event){
    validateSearch(event);
}
