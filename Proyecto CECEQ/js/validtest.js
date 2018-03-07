var v = document.getElementsByClassName("cvalidate");
if(v!=null){
    var cpassed = true;
    var cvalue;
    for(var element in v){
        cvalue = element.value;
        if(element.classList.contains("cname")){
            if(value != "" && !validate(NAME, cvalue))
                cpassed = false;
        }else if(element.classList.contains("cnumber")){
            if(value != "" && !validate(NUMBER, cvalue))
                cpassed = false;
        }else if(element.classList.contains("cdate")){
            if(value != "" && !validate(DATE, cvalue))
                cpassed = false;
        }else if(element.classList.contains("cschooling")){
            if(value != "" && !validate(SCHOOLING, cvalue))
                cpassed = false;
        }else if(element.classList.contains("cgender")){
            if(value != "" && !validate(GENDER, cvalue))
                cpassed = false;
        }else if(element.classList.contains("cisbn")){
            if(value != "" && !validate(ISBN, cvalue))
                cpassed = false;
        }
    }
}
