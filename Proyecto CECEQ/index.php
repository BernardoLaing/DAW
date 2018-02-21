<?php include("partials/_header.html"); ?>

<?php
$userError = "";
$pswdError = "";
if(isset($_POST["submit"])){
    if(empty($_POST["user"])){
        $userError = "Ingresa tu usuario";
    }else {
        $user = process($_POST["user"]);
        if(!preg_match("/^[a-zA-Z0-9_]{4,}$/", $user)){
            $userError = "El usuario es invalido";
        }
    }
}

function process($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}


?>

<?php include("partials/_second_top_bar.html"); ?>
<?php include("login_form.html"); ?>


<?php include("partials/_footer.html"); ?>