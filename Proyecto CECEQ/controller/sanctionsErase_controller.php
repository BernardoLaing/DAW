<?php
include("../regexps.php");
include("../utils.php");
if(count($_POST)>0
    && test($NUMBER, $_POST["user"]["number"])
){
    foreach($_POST["user"] as $key => $value){
        $info[$key] = htmlspecialchars($value);
    }
    if(isset($info)) {
        cancelSancion($info["number"]);
    }
}
header("Location: ../sanctions.php");