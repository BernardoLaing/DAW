
function validatePasswords(event){
    var v = document.getElementsByClassName("cvalidate").getElementsByClassName("cpassword");
    for(var i = 0; i < v.length-1; i++){
        if(v[i].value != v[i+1].value){
            for(var j = 0; j < v.length; j++){
                v[i].parentElement.parentElement.getElementsByClassName("warning")[0].innerHTML += "Las contraseñas no son iguales";
            }
            return false;
        }
    }
    return true;
}