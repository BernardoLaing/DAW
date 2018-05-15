<?php
/*
echo $_POST["csrf"]."<br>".$_SESSION["csrfToken"];
echo $_POST["csrf"] == $_SESSION["csrfToken"];

echo $_POST(2);
*/
if(!isset($_SESSION["csrfToken"]))
    unset($_POST);
if(!isset($_POST["csrf"]) || $_POST["csrf"] != $_SESSION["csrfToken"])
    unset($_POST);
unset($_POST["csrf"]);
