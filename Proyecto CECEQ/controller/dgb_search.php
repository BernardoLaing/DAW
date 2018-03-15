<?php
    include("../regexps.php");
    include("../utils.php");
    if(count($_GET)>0 && 
            (($_GET["Month"] == null) || test($NUMBER, $_GET["Month"])) &&
            (($_GET["Year"] == null) || test($NUMBER, $_GET["Year"]))){
        //set Month
        if($_GET["Month"] != null)
            $month = htmlspecialchars($_GET["Month"]);
        else
            $month = date('m');
            
        
        //set Year
        if($_GET["Year"] != null)
            $year = htmlspecialchars($_GET["Year"]);
        else
            $year = date('Y');
        
        $results = getReport($year, $month);
        $json = json_encode($results);
        echo $json;
    }
?>