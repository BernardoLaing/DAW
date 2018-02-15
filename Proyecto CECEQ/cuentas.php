<?php include("partials/_header.html"); ?>
<?php include("partials/_top_bar.html"); ?>
<br /><br />
<div class="container mdiv">
    <div class="mx-auto text-center"> <!-- mx-auto da un padding y border automatico-->
        <div class="display-3">Cuentas</div> <!--display son headdings mas grandes-->
    </div>
    <br>
    <br>
    <div class="row text-center center-block mx-auto">
        <div class="col-sm-12 col-md-4">Nombre: <input type="text" name="name"></div>
        <div class="col-sm-12 col-md-4">Nombre Usuario: <input type="text" name="user"></div>
        <div class="col-sm-12 col-md-4">Rol: <input type="text" name="rol"></div>
    </div>
    <br>
    <br>
    <div class="row mx-auto">
        <div class="col-lg-5 col-sm-4"></div>
        <div class="col-lg-2 col-sm-4">
            <button type="button" class="btn btn-secondary btn-lg btn-block"> Buscar </button>
        </div>
        <div class="col-lg-5 col-sm-4"></div>
    </div>
    
    <br>
    <br>
    <div class="row">
        <table class="table">
        <tr>
            <th> # </th>
            <th> Nombre </th>
            <th> Usuario </th>
            <th> Rol </th>
        </tr>
        <tr>
            <td> 1 </td>
            <td> <a href="accountsEdit.php" class="mlink">Martin</a></td>
            <td> Mart12</td>
            <td> Administrador</td>
        </tr>
        <tr>
            <td> 2 </td>
            <td> <a href="accountsEdit.php" class="mlink">Laing</a> </td>
            <td> Laing12</td>
            <td> bibliotecario</td>
        </tr>
         <tr>
            <td> 3 </td>
            <td> <a href="accountsEdit.php" class="mlink">Nino</a></td>
            <td> peque </td>
            <td> Becario</td>
        </tr>
        <tr>
            <td> 1 </td>
            <td> <a href="accountsEdit.php" class="mlink">Martin</a></td>
            <td> Mart12</td>
            <td> Administrador</td>
        </tr>
        <tr>
            <td> 2 </td>
            <td> <a href="accountsEdit.php" class="mlink">Laing</a> </td>
            <td> Laing12</td>
            <td> bibliotecario</td>
        </tr>
         <tr>
            <td> 3 </td>
            <td> <a href="accountsEdit.php" class="mlink">Nino</a></td>
            <td> peque </td>
            <td> Becario</td>
        </tr>
            <tr>
            <td> 1 </td>
            <td> <a href="accountsEdit.php" class="mlink">Martin</a></td>
            <td> Mart12</td>
            <td> Administrador</td>
        </tr>
        <tr>
            <td> 2 </td>
            <td> <a href="accountsEdit.php" class="mlink">Laing</a> </td>
            <td> Laing12</td>
            <td> bibliotecario</td>
        </tr>
         <tr>
            <td> 3 </td>
            <td> <a href="accountsEdit.php" class="mlink">Nino</a></td>
            <td> peque </td>
            <td> Becario</td>
        </tr>
        <tr>
            <td> 1 </td>
            <td> <a href="accountsEdit.php" class="mlink">Martin</a></td>
            <td> Mart12</td>
            <td> Administrador</td>
        </tr>
        <tr>
            <td> 2 </td>
            <td> <a href="accountsEdit.php" class="mlink">Laing</a> </td>
            <td> Laing12</td>
            <td> bibliotecario</td>
        </tr>
         <tr>
            <td> 3 </td>
            <td> <a href="accountsEdit.php" class="mlink">Nino</a></td>
            <td> peque </td>
            <td> Becario</td>
        </tr>
            
        </table>
    </div>
    <br>
    <br>
    
</div>
<div class="row fixed-bottom mdiv2" id="marBot">
        <div class="col-sm-2"></div>
        <div class="col-sm-2 center-block"><a href="accessControl.php" class="btn btn-outline-secondary"><i class="material-icons alagin-middle">arrow_back</i></a></div>
        <div class="col-sm-4"></div>
        <div class="col-sm-2">
            <a href="accountCreate.php">
            <button type="button" class="btn btn-secondary btn-block"> Agregar cuenta </button>
            </a>
        </div>
    </div>
<?php include("partials/_footer.html"); ?>