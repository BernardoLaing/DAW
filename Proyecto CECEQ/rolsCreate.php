<?php include("partials/_header.html"); ?>
<?php include("partials/_top_bar.html"); ?>
<br /><br />
<div class="container mdiv">
    <div class="mx-auto text-center"> <!-- mx-auto da un padding y border automatico-->
        <div class="display-3">Roles</div> <!--display son headdings mas grandes-->
    </div>
    <br>
    <br>
    <div class=" center-block mx-auto">
        <div>Nombre: <input type="text" name="name"></div>
        <br>
        <p>Privilegios:</p>
        <form>
            <input type="checkbox" name="priv1" value="priv1"> Privilegio 1 <br>
            <input type="checkbox" name="priv2" value="priv2"> Privilegio 2 <br>
            <input type="checkbox" name="priv3" value="priv3"> Privilegio 3 <br>
            <input type="checkbox" name="priv4" value="priv4"> Privilegio 4 <br>
        </form>
        
    </div>
    <br>
    <br>
    <div class="row mx-auto">
        <div class="col-lg-5 col-sm-4"></div>
        <div class="col-lg-2 col-sm-4">
            <button type="button" class="btn btn-secondary btn-lg btn-block"> Registrar</button>
        </div>
        <div class="col-lg-5 col-sm-4"></div>
    </div>
    
</div>
<div class="row fixed-bottom mdiv2" id="marBot">
        <div class="col-sm-2"></div>
        <div class="col-sm-2 center-block"><a href="cuentas.php" class="btn btn-outline-secondary"><i class="material-icons alagin-middle">arrow_back</i></a></div>
        <div class="col-sm-4"></div>
        
    </div>
<?php include("partials/_footer.html"); ?>