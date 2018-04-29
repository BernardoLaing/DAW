<?php include("partials/session_functions.php")?>
<?php 
if(!$_SESSION["permisos"][3])
    header('Location: menu.php');
?>
<?php include("partials/_header.html"); ?>
<?php include("partials/_top_bar.html"); ?>
<?php include("html/entry.html");?>
<?php include("partials/_footer.html"); ?>
<?php include("utils.php");
include("modals/modal_saved.html");
//include("modals/modal_entry.html");
?>


<?php
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
