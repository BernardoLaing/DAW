<?php 
    include("../regexps.php");
    include("../utils.php");
    if(count($_POST)>0){
        if(!isset($_POST["user"]["gender"]) || !test($GENDER, $_POST["user"]["gender"])){
            $_POST["user"]["gender"] = null;
        }
        if(!isset($_POST["user"]["schooling"]) || !test($SCHOOLING, $_POST["user"]["schooling"])){
            $_POST["user"]["schooling"] = null;
        }
        //if(!isset($_POST["user"]["month"]) || !test($MONTH, $_POST["user"]["month"])){
        //    $_POST["user"]["month"] = null;
        //}
        if(!isset($_POST["user"]["year"]) || !test($YEAR, $_POST["user"]["year"])){
            $_POST["user"]["year"] = null;
        }
    }

    
    if(count($_POST)>0
        && (($_POST["user"]["schooling"] == null) || test($SCHOOLING, $_POST["user"]["schooling"]))
        && (($_POST["user"]["age"] == null) || test($NUMBER, $_POST["user"]["age"]))
        && (($_POST["user"]["gender"] == null) || test($GENDER, $_POST["user"]["gender"]))
        //        && (($_POST["user"]["month"] == null) || test($MONTH, $_POST["user"]["month"]))
        && (($_POST["user"]["year"] == null) || test($YEAR, $_POST["user"]["year"]))
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
                    $info["schooling"],
                    $info["age"],
                    $info["gender"],
                    //$info["month"],
                    $info["year"]);
            }
        }
    }
    //displey za modal :v
    header("Location: ../estadisticas.php");
