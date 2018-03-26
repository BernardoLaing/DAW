<?php
include("../regexps.php");
include("../utils.php");

if(count($_POST)>0
    && test($NUMBER, $_POST["user"]["number"])
    && test($DATE, $_POST["user"]["sanctionTime"])
    && $_POST["user"]["sanctionDescription"] != null
){
    $nulls = 0;
    foreach($_POST["user"] as $key => $value){
        $info[$key] = htmlspecialchars($value);
    }
    if(isset($info)) {
        insertSancion($info["number"], $info["sanctionTime"], $info["sanctionDescription"]);
    }
}