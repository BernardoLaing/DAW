var NUMBER = /^[0-9]+$/;
var NAME = /^([ÑA-Zña-z']+(\s*))+$/;
var DATE = "DATE";
var SCHOOLING = /^[1-9]$/;
var GENDER = /^(M|F|O)$/;

function test(type, subject){
    if(subject == null || type == null)
        return false;
    if(type == DATE){
        return true;
    }
    return type.test(subject);
}