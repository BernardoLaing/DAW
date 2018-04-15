<?php
    include("../regexps.php");
    require_once('../utils.php');
    require_once('../model/RBAC-utils.php');
    if(count($_GET)>0 &&
            (($_GET["user"] == null) || test($NAME, $_GET["user"])) &&
            (($_GET["name"] == null) || test($NAME, $_GET["name"])) &&
            (($_GET["rol"] == null) || test($NUMBER, $_GET["rol"]))){
        //set User
        if($_GET["user"] != null)
            $user = htmlspecialchars($_GET["user"]);
        else
            $user = "";

        //set Name
        if($_GET["name"] != null)
            $name = htmlspecialchars($_GET["name"]);
        else
            $name = "";

        //set Rol
        if($_GET["rol"] != null)
            $rol = htmlspecialchars($_GET["rol"]);
        else
            $rol = 0;

        $results = searchUser($user, $name, $rol);

        $json = json_encode($results);
        echo $json;
    }
?>
