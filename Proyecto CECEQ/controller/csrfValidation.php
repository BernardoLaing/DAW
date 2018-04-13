<?php

$hostName = $_SERVER["HTTP_HOST"];
$refererHostName = substr(preg_replace("/^(http|https):\/\//","",$_SERVER["HTTP_REFERER"]), 0, strlen($hostName));
$originName = preg_replace("/^(http|https):\/\//","",$_SERVER["HTTP_ORIGIN"]);

if(!(($refererHostName != null || $originName != null)
    && $refererHostName != null && $refererHostName == $hostName
    && $originName != null && $originName == $hostName
    && isset($_SERVER["HTTP_X_REQUESTED_WITH"]))){
    echo "<script>alert('invalid request origin')</script>";
    return;
}
/*
else{
    echo "<script>alert('valid')</script>";
}
*/

