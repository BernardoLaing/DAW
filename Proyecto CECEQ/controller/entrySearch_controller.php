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
        && (($_POST["user"]["number"] == null) || test($NUMBER, $_POST["user"]["number"]))
        && (($_POST["user"]["name"] == null) || test($NAME, $_POST["user"]["name"]))
        && (($_POST["user"]["paternal"] == null) || test($NAME, $_POST["user"]["paternal"]))
        && (($_POST["user"]["maternal"] == null) || test($NAME, $_POST["user"]["maternal"]))
        && (($_POST["user"]["birthday"] == null) || test($DATE, $_POST["user"]["birthday"]))
        && (($_POST["user"]["gender"] == null) || test($GENDER, $_POST["user"]["gender"]))
        && (($_POST["user"]["user_grade"] == null) || test($SCHOOLING, $_POST["user"]["user_grade"]))
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
        if($nulls != 6 || $info["number"] != "" && isset($info)) {
            echo "<table class='table table-hover'>";
            echo buildTableData(queryVisitor(
                                    $info["number"],
                                    $info["name"],
                                    $info["paternal"],
                                    $info["maternal"],
                                    $info["birthday"],
                                    $info["gender"],
                                    $info["user_grade"]
                                    ));
            echo "</table>";   
            }
        }
    ?>