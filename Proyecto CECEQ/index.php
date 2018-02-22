<?php
if(session_id()){
    session_unset();
    session_destroy();
}
$dbUser["blaing"] = "Awdvcft13509";
$dbUser["jnino"] = "Peque01";
?>
<?php
$userError = "";
$passwordError = "";
$incorrect = 0;
if(isset($_POST["submit"])){
    //Validar que los campos se hayan llenado de la manera correcta.
    if(empty($_POST["user"])){
        $userError = "Ingresa tu usuario";
    }else {
        $user = process($_POST["user"]);
        if(!preg_match("/^[a-zA-Z0-9_]{4,}$/", $user)){
            $userError = "El usuario es invalido";
            $incorrect = 1;
        }
    }
    if(empty($_POST["password"])){
        $passwordError = "Ingresa tu contraseña";
    }else {
        $password = process($_POST["password"]);
//        $uppercase = preg_match('@[A-Z]@', $password);
//        $lowercase = preg_match('@[a-z]@', $password);
//        $number    = preg_match('@[0-9]@', $password);
//        if()){
//            $password = "La contraseña es invalida";
        if(!preg_match("/^\S*(?=\S{6,})(?=\S*[a-z])(?=\S*[A-Z])(?=\S*[\d])\S*$/", $password)){
            $passwordError = "La contraseña es invalida";
            $incorrect = 1;
        }
    }
    //Comparar usuario y contraseña con los almacenados
    if(!$incorrect){
        foreach($dbUser as $username => $pswd){
            if($user == $username &&
               $password == $pswd){
                session_start();
                $_SESSION["user"] = $user;
                $_SESSION["password"] = $password;
                header('Location: menu.php');
            }
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
<?php include("partials/_header.html"); ?>
<?php include("html/login_form.html"); ?>


<?php include("partials/_footer.html"); ?>