<?php
if(!isset($_SESSION["csrfToken"]))
    header("Location: ../index.php");
if($_POST["csrf"] != $_SESSION["csrfToken"])
    header("Location: ../index.php");