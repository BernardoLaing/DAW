<?php
$NUMBER = "/^[0-9]+$/";
$NAME = "/^([ÑA-Zña-z']+(\s*))+$/";
$DATE = "DATE";
$SCHOOLING = "/^[1-9]$/";
$GENDER = "/^(M|F|O)$/";

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
