var e = document.getElementById("form_account");
if(e != null)
    e.onsubmit = validatePasswords;


function validatePasswords(event){
    var v = document.getElementsByClassName("cpassword");
    for(var i = 0; i < v.length-1; i++){
        if(v[i].value != v[i+1].value){
            event.preventDefault();
            alert("Las contraseñas no son iguales");
            return false;
        }
    }
    return true;
}