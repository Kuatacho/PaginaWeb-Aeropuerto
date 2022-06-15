<?php include ("template/cabecera.php");?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RESERVA TU BOLETO</title>
</head>
<body>
<div class="container">
            <div class="row">
                
                <div class="col-md-12">
                <br/><br/><br/>
                <div class="card text-left">
                <img class="card-img-top" src="holder.js/100px180/" alt="">
                <div class="card-body">
                    <h4 class="card-title"> RESERVA TU BOLETO </h4>
                    <form method="POST" class="needs-validation" novalidate>
                    <div class="form-row">
                    <div class="col-md-4 mb-3">
                    <label for="validationCustom01">Ingrese su nombre completo:</label>
                    <input type="text" class="form-control" name ="txtnombre" id="txtnombre" placeholder="Nombre completo" value="" required>
                    <div class="valid-feedback">
                    </div>
                    </div>
                    <div class="col-md-4 mb-3">
                    <label for="validationCustom02">Ingrese la fecha de salida:</label>
                    <input type="date" class="form-control" name="txtfechasalida" id="txtfechasalida" placeholder="Fecha de partida" value="" required>
                    <div class="valid-feedback">
                    </div>
                    </div>
                    <div class="col-md-4 mb-3">
                    <label for="validationCustom05">Ingrese la fecha del llegada:</label>
                    <input type="date" class="form-control" name="txtfechallegada"id="txtfechallegada" placeholder="Fecha de regreso" required>
                    <div class="invalid-feedback">
                    </div>
                    </div>
                    </div>
                    <div class="col-md-4 mb-3">
                    <label for="validationCustom04">Ingrese su carnet de identidad:</label>
                    <input type="number" class="form-control" name="txtcarnet"id="txtcarnet" placeholder="Carnet de identidad" required>
                    <div class="invalid-feedback">
                    </div>
                    </div>
                    <div class="form-row">
                    <div class="col-md-4 mb-3">
                    <label for="validationCustom03">Ingrese la aerolinea:</label>
                    <input type="text" class="form-control" name ="txtaerolinea"id="txtaerolinea" placeholder="Aerolinea" required>
                    <div class="invalid-feedback">
                    </div>
                    </div>
                    <div class="form-group">
                    <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="invalidCheck" required>
                    <label class="form-check-label" for="invalidCheck">
                    ¿Acepta los campos solicitados? <a href="#"></a>
                    </label>
                    <div class="invalid-feedback">
                    Faltan datos por completar
                    </div>
                    </div>
                    </div>
                    <br>
                    <button class="btn btn-primary" type="submit">Enviar</button>
                    </form>
                    <script>
                     // Example starter JavaScript for disabling form submissions if there are invalid fields
                      (function () {
                     'use strict'; 
                    window.addEventListener('load', function () {
                          // Fetch all the forms we want to apply custom Bootstrap validation styles to
                          var forms = document.getElementsByClassName('needs-validation');
                          // Loop over them and prevent submission
                          var validation = Array.prototype.filter.call(forms, function (form) {
                            form.addEventListener('submit', function (event) {
                              if (form.checkValidity() === false) {
                                event.preventDefault();
                                event.stopPropagation();
                              }
                    form.classList.add('was-validated');
                       }, false);
                       });
                      }, false);
                     })();
                    </script>
                    
                    
                  </div>
                </div>
        
    
    
    <?php
    
    ?>
    
    
    
</body>
</html>

<?php include("template/pie.php"); ?>

<?php
include ("administrador/config/bd.php");

$txtnombre=(isset($_POST['txtnombre']))?$_POST['txtnombre']:"";
$txtfechasalida=(isset($_POST['txtfechasalida']))?$_POST['txtfechasalida']:"";
$txtfechallegada=(isset($_POST['txtfechallegada']))?$_POST['txtfechallegada']:"";
$txtcarnet=(isset($_POST['txtcarnet']))?$_POST['txtcarnet']:"";
$txtaerolinea=(isset($_POST['txtaerolinea']))?$_POST['txtaerolinea']:"";


$sentenciaSQL=$conexion->prepare("INSERT INTO reservaboleto ( nombre, salida, llegada, carnet, aerolinea ) VALUES (:nombre, :salida, :llegada, :carnet, :aerolinea);");
$sentenciaSQL->bindParam(':nombre',$txtnombre);
$sentenciaSQL->bindParam(':salida',$txtfechasalida);
$sentenciaSQL->bindParam(':llegada',$txtfechallegada);
$sentenciaSQL->bindParam(':carnet',$txtcarnet);
$sentenciaSQL->bindParam(':aerolinea',$txtaerolinea);


$sentenciaSQL->execute();
//header ("Location:reservatuboleto.php");
?>