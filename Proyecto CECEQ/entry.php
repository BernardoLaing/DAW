<?php include("partials/_header.html"); ?>
<?php include("partials/_top_bar.html"); ?>
<?php include("html/entry.html");?>
<?php include("partials/_footer.html"); ?>
<?php
    $usernum = isset($_POST["user"]["number"]) && is_numeric($_POST["user"]["number"]);
    $name = isset($_POST["user"]["name"]) && !is_numeric($_POST["user"]["name"]);
    $paternal = isset($_POST["user"]["paternal"]) && !is_numeric($_POST["user"]["paternal"]);
    $maternal = isset($_POST["user"]["maternal"]) && !is_numeric($_POST["user"]["maternal"]);
    $bday = isset($_POST["user"]["birthday"]);
    $grade = isset($_POST["user"]["user_grade"]);
    $gender = isset($_POST["user"]["gender"]);
    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        if($usernum){
            include("modals/modal_num.php");
            echo "<script> $('#myModal').modal('show') </script>";
        }
        
        else if($name && $paternal && $maternal && $bday && $grade && $gender){
            include("modals/modal_new.php");
            echo "<script> $('#myModal').modal('show') </script>";
        }
        
        else{
            include("modals/modal_fail.php");
            echo "<script> $('#myModal').modal('show') </script>";
        }
    }
?>

