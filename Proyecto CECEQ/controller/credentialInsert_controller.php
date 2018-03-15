<?php 
    include("../regexps.php");
    include("../utils.php");
    if(count($_POST)>0){
        if(!isset($_POST["user"]["gender"]) || !test($GENDER, $_POST["user"]["gender"])){
            $_POST["user"]["gender"] = null;
        }
        if(!isset($_POST["user"]["user_grade"]) || !test($SCHOOLING, $_POST["user"]["user_grade"])){
            $_POST["user"]["user_grade"] = null;
        }
    }

    
    if(count($_POST)>0
        && (($_POST["credential"]["name"] == null) || test($NAME, $_POST["credential"]["name"]))
        && (($_POST["credential"]["paternal"] == null) || test($NAME, $_POST["credential"]["paternal"]))
        && (($_POST["credential"]["paternal"]  == null) || test($NAME, $_POST["credential"]["paternal"] ))
        && (($_POST["credential"]["paternal"]  == null) || test($NAME, $_POST["credential"]["paternal"] ))
        && (($_POST["credential"]["paternal"]  == null) || test($DATE, $_POST["credential"]["paternal"] ))
        && (($_POST["credential"]["paternal"]  == null) || test($GENDER, $_POST["credential"]["paternal"] ))
        && (($_POST["credential"]["paternal"]  == null) || test($SCHOOLING, $_POST["credential"]["paternal"] ))
    ){
        $nulls = 0;
        foreach($_POST["user"] as $key => $value){
            if($value != null)
                $info[$key] = htmlspecialchars($value);
            else{
                $info[$key] = "";
                if($key!="number")
                    $nulls++;
            }
        }
        if(isset($info)) {
            if($nulls == 0){
                insertVisitante(
                    $info["name"],
                    $info["paternal"],
                    $info["maternal"],
                    $info["birthday"],
                    $info["user_grade"],
                    $info["gender"]);
            }
        }
    }

    header("Location: ../entry.php");
    ?>
