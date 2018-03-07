<?php include("partials/session_functions.php")?>
<?php include("partials/_header.html"); ?>
<?php include("partials/_top_bar.html"); ?>
<?php include("html/entry.html");?>
<?php include("partials/_footer.html"); ?>
<?php include("regexps.php");?>

<?php
    include("utils.php");
    if(count($_POST)>0){
        if(!isset($_POST["user"]["gender"]) || !test($GENDER, $_POST["user"]["gender"]))
            $_POST["user"]["gender"] = null;
        if(!isset($_POST["user"]["user_grade"]) || !test($SCHOOLING, $_POST["user"]["user_grade"]))
            $_POST["user"]["user_grade"] = null;
    }

    if(count($_POST)>0
        && (($_POST["user"]["number"] == null) || test($NUMBER, $_POST["user"]["number"]))
        && (($_POST["user"]["name"] == null) || test($NAME, $_POST["user"]["name"]))
        && (($_POST["user"]["paternal"] == null) || test($NAME, $_POST["user"]["paternal"]))
        && (($_POST["user"]["maternal"] == null) || test($NAME, $_POST["user"]["maternal"]))
        && (($_POST["user"]["birthday"] == null) || test($DATE, $_POST["user"]["birthday"]))
        && (($_POST["user"]["gender"] == null) || test($GENDER, $_POST["user"]["gender"]))
        && (($_POST["user"]["user_grade"] == null) || test($SCHOOLING, $_POST["user"]["user_grade"]))
        && (isset($_POST["actionTypeEntry"])) && (($_POST["actionTypeEntry"] == "Registrar Entrada") || ($_POST["actionTypeEntry"] == "Buscar Visitante"))

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
            if ($_POST["actionTypeEntry"] == "Buscar Visitante") {
                echo "<br><br><br>";
                echo "<div class='row'><div class='col-12'><table class='table table-hover'>";
                echo buildTableData(queryVisitor(
                                        $info["number"],
                                        $info["name"],
                                        $info["paternal"],
                                        $info["maternal"],
                                        $info["birthday"],
                                        $info["gender"],
                                        $info["user_grade"]
                                        ));
                echo "</table></div></div>";


            } else if ($_POST["actionTypeEntry"] == "Registrar Entrada") {
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
    }

/*
    include("utils.php");
    $usernum = isset($_POST["user"]["number"]) && $_POST["user"]["number"] != null;
    $name = isset($_POST["user"]["name"]) && $_POST["user"]["name"] != null;
    $paternal = isset($_POST["user"]["paternal"]) && $_POST["user"]["paternal"] != null;
    $maternal = isset($_POST["user"]["maternal"]) && $_POST["user"]["maternal"] != null;
    $bday = isset($_POST["user"]["birthday"]) && $_POST["user"]["birthday"] != null;
    $grade = isset($_POST["user"]["user_grade"]) && $_POST["user"]["user_grade"] != null;
    $gender = isset($_POST["user"]["gender"])&& $_POST["user"]["gender"] != null;
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST["register"])){
        if($usernum){
            $_SESSION["entry_status"] = 1;
        }
        else if($name && $paternal && $maternal && $bday && $grade && $gender){
            if(!is_numeric($_POST["user"]["name"]) || !is_numeric($_POST["user"]["paternal"]) || !is_numeric($_POST["user"]["maternal"])){
                $_SESSION["entry_status"] = 2;
                $_SESSION["entry_register"] = $_POST;
            }else{
                $_SESSION["entry_status"] = 4;
            }
        }
        else{
            $_SESSION["entry_status"] = 3;
        }
        include("modals/modal_entry.php");
        echo "<script> $('#myModal').modal('show') </script>";
    }
    if(isset($_POST["aceptar"])){
            echo "<p>New record created successfully</p>";
            $aux_name = $_SESSION["entry_register"]["user"]["name"];
            $aux_paternal = $_SESSION["entry_register"]["user"]["paternal"];
            $aux_maternal = $_SESSION["entry_register"]["user"]["maternal"];
            $aux_bday = $_SESSION["entry_register"]["user"]["birthday"];
            $aux_grade = $_SESSION["entry_register"]["user"]["user_grade"];
            $aux_gender= $_SESSION["entry_register"]["user"]["gender"];
            insertVisitante($aux_name,$aux_paternal,$aux_maternal,$aux_bday,$aux_grade,$aux_gender);
        }
        else if(isset($_POST["cancelar"])){
            echo "<p>Canceled</p>";
            $_SESSION["entry_register"] = null;
        }
        */
?>
