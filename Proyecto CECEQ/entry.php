<?php include("partials/session_functions.php")?>
<?php include("partials/_header.html"); ?>
<?php include("partials/_top_bar.html"); ?>
<?php include("html/entry.html");?>
<?php include("partials/_footer.html"); ?>
<?php
    include("utils.php");
    $usernum = isset($_POST["user"]["number"]) && $_POST["user"]["number"] != null;
    $name = isset($_POST["user"]["name"]);
    $paternal = isset($_POST["user"]["paternal"]);
    $maternal = isset($_POST["user"]["maternal"]);
    $bday = isset($_POST["user"]["birthday"]);
    $grade = isset($_POST["user"]["user_grade"]);
    $gender = isset($_POST["user"]["gender"]);
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST["register"])){
        if($usernum){
            $_SESSION["entry_status"] = 1;
        }
        else if($name && $paternal && $maternal && $bday && $grade && $gender){
            if(!is_numeric($_POST["user"]["name"]) || !is_numeric($_POST["user"]["paternal"]) || !is_numeric($_POST["user"]["maternal"])){
                $_SESSION["entry_status"] = 2;
                $_SESSION["entry_register"] = 1;
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
            echo "<p>".$_SESSION["entry_register"]."</p>";
            echo "<p>".$_POST["user"]["name"]."</p>";
            /*
            if(insertVisitante($aux_name,$aux_paternal,$aux_maternal,$aux_bday,$aux_grade,$aux_gender)){
                echo "Success";
            }else{
                echo "Failure";
            }*/
        }else if(isset($_POST["cancelar"])){
            echo "<p>Canceled</p>";
            $_SESSION["entry_register"] = null;
        }
?>

