<?php include("partials/_header.html"); ?>
<?php include("partials/_top_bar.html"); ?>
<br /><br />
<?php
#permisos admin
$perm["edit"] = 1;
/*
#usuario
$perm["edit"] = 0;*/
?>
<div class="container shadow">
     <div class="mx-auto text-center"> <!-- mx-auto da un padding y border automatico-->
        <div class="display-3">Actividades</div> <!--display son headdings mas grandes-->
    </div>
    <br>
    <div class="container row">
        <div class="col-md-2"></div>
        <iframe src="https://calendar.google.com/calendar/b/1/embed?showPrint=0&amp;showCalendars=0&amp;showTz=0&amp;height=600&amp;wkst=1&amp;bgcolor=%23FFFFFF&amp;src=itesm.mx_qrc34lv30iksse9onm41tl8n44%40group.calendar.google.com&amp;color=%2323164E&amp;ctz=America%2FMexico_City" style="border-width:0" width="800" height="600" frameborder="0" scrolling="no"></iframe>
    </div>
    <br>
    <div class="row ">
        <div class="col-sm-2"></div>
        <div class="col-sm-2 center-block"><a href="menu.php" class="btn btn-secondary py-0"><i class="material-icons alagin-middle">arrow_back</i></a></div>
        <div class="col-sm-4"></div>

        <?php
        /*
        if($perm["edit"]){
            include("_editActivities.html");
        }*/
        ?>
    </div>
    <br>
</div>
<br><br>
<?php include("partials/_footer.html"); ?>
