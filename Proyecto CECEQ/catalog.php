<?php include("partials/session_functions.php");?>
<?php include("partials/_header.html"); ?>
<?php include("partials/_top_bar.html"); ?>
<?php include("html/catalog.html"); ?>
<?php include("partials/_footer.html"); ?>
<?php
    $title = isset($_POST["book"]["title"]) && $_POST["book"]["title"] != null;
    $year = isset($_POST["book"]["year"]) && $_POST["book"]["year"] != null;
    $author = isset($_POST["book"]["author"]) && $_POST["book"]["author"] != null;
    $editorial = isset($_POST["book"]["editorial"]) && $_POST["book"]["editorial"] != null;
    $isbn = isset($_POST["book"]["isbn"]) && $_POST["book"]["isbn"] != null;
    $clasification = isset($_POST["clasification"]) && $_POST["book"]["clasification"] != null;
    $subclasification = isset($_POST["subclasification"]) && $_POST["subclasification"] != null;
    if($_SERVER['REQUEST_METHOD'] == "POST"){
        if(!$title && !$year && !$author && !$editorial && !$isbn && !$clasification && !$subclasification){
            include("modals/modal_catalog.php");
            echo "<script> $('#myModal').modal('show') </script>";
        }
    }
    ?>