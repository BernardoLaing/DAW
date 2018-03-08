var NUMBER = /^[0-9]+$/;
var NAME = /^([ÑA-Zña-z']+(\s*))+$/;
var DATE = /^([0-9]){4}-((0[0-9])|(1[0-2]))-(([012][0-9])|(3[01]))$/;
var SCHOOLING = /^[1-9]$/;
var GENDER = /^(M|H|O)$/;
var ISBN = /^([0-9]+-)*[0-9]+$/;
var YEAR = /^([0-9]){4}$/;
var CLASSIFICATION = /^([0-9]){3}$/;
var PASSWORD  = /^\S*(?=\S{6,})(?=\S*[a-z])(?=\S*[\d])\S*$/;
var EMAIL = /^[a-zA-Z0-9]+@[a-zA-Z0-9]+\.[a-zA-Z0-9]+$/;
var PHONE = /^(([0-9]+(-|\s))*[0-9]+)$/;

function test(type, subject){
    if(subject == null || type == null)
        return false;
    return type.test(subject);
}