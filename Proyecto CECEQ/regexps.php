<?php
$NUMBER = "/^[0-9]+$/";
$NAME = "/^([ÑA-Zña-z']+(\s*))+$/";
$DATE = "DATE";
$SCHOOLING = "/^[1-9]$/";
$GENDER = "/^(H|M|O)$/";
$ISBN = "/^([0-9]+-)*[0-9]+$/";
$YEAR = "/^([0-9]){4}$/";
$CLASSIFICATION = "/^([0-9]){3}$/";
$PASSWORD  = "/^\S*(?=\S{6,})(?=\S*[a-z])(?=\S*[\d])\S*$/"; //funciona? :v
//FALTA MES, EDAD
function test($type, $subject){
    if($subject == null || $type == null)
        return false;
    global $DATE;
    if($type == $DATE){
        $s = explode("-", $subject);
        return checkdate($s[1], $s[2], $s[0]);
    }
    return preg_match($type, $subject);
}
