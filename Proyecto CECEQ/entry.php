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
            $_SESSION["entry_status"] = 1;
        }
        else if($name && $paternal && $maternal && $bday && $grade && $gender){
            $_SESSION["entry_status"] = 2;
        }
        else{
            $_SESSION["entry_status"] = 3;
        }
        include("modals/modal_entry.php");
        echo "<script> $('#myModal').modal('show') </script>";
    }
?>

