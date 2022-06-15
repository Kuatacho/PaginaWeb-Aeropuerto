<?php include ("template/cabecera.php");?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EQUIPAJE </title>
</head>
<body>
<div class="container">
            <div class="row">
                
                <div class="col-md-12">
                <br/><br/><br/>
                <div class="card text-left">
                <img class="card-img-top" src="holder.js/100px180/" alt="">
                <div class="card-body">
                    <h4 method="POST" class="card-title">EQUIPAJE</h4>
                    <form class="needs-validation" novalidate>
                    <div class="form-row">
                    <div class="col-md-4 mb-3">
                    <label for="validationCustom01">Ingrese su nombre completo:</label>
                    <input type="text" class="form-control" name="txtnombre"id="txtnombre" placeholder="Nombre completo" value="" required>
                    <div class="valid-feedback">
                    </div>
                    </div>
                    <div class="col-md-4 mb-3">
                    <label for="validationCustomEmail">Ingrese el peso del equipaje en kg:</label>
                    <div class="input-group">
                    <div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroupPrepend">kg</span>
                    </div>
                    <input type="number" class="form-control" name="txtpeso" id="txtpeso" placeholder="Peso del equipaje" 
                    aria-describedby="inputGroupPrepend" required>
                    <div class="invalid-feedback">
                    </div>
                    </div>
                    </div>
                    </div>
                    <div class="col-md-4 mb-3">
                    <label for="validationCustom02">Ingrese su numero de vuelo:</label>
                    <input type="text" class="form-control" name="txtnumerovuelo" id="txtnumerodevuelo" placeholder="Numero de vuelo" value="" required>
                    <div class="valid-feedback">
                    </div>
                    </div>
                    <div class="col-md-4 mb-3">
                    <label for="validationCustom04">Ingrese su carnet de identidad:</label>
                    <input type="number" class="form-control" name="txtcarnet" id="txtcarnet" placeholder="Carnet de identidad" required>
                    <div class="invalid-feedback">
                    </div>
                    </div>
                    <div class="form-row">
                    <div class="col-md-4 mb-3">
                    <label for="validationCustom03">Ingrese la aerolinea:</label>
                    <input type="text" class="form-control" name="txtaerolinea" id="txtaerolinea" placeholder="Aerolinea" required>
                    <div class="invalid-feedback">
                    </div>
                    </div>
                    <div class="col-md-4 mb-3">
                    <label for="validationCustom05">Ingrese la fecha:</label>
                    <input type="date" class="form-control" name="txtfecha" id="txtfecha" placeholder="Fecha" required>
                    <div class="invalid-feedback">
                    </div>
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
$txtpeso=(isset($_POST['txtpeso']))?$_POST['txtpeso']:"";
$txtnumerovuelo=(isset($_POST['txtnumerovuelo']))?$_POST['txtnumerovuelo']:"";
$txtcarnet=(isset($_POST['txtcarnet']))?$_POST['txtcarnet']:"";
$txtaerolinea=(isset($_POST['txtaerolinea']))?$_POST['txtaerolinea']:"";
$txtfecha=(isset($_POST['txtfecha']))?$_POST['txtfecha']:"";


$sentenciaSQL=$conexion->prepare("INSERT INTO equipaje (nombre, peso, vuelo, carnet, aerolinea, fecha) VALUES (:nombre, :peso, :vuelo, :carnet, :aerolinea, :fecha);");
$sentenciaSQL->bindParam(':nombre',$txtnombre);
$sentenciaSQL->bindParam(':peso',$txtpeso);
$sentenciaSQL->bindParam(':vuelo',$txtnumerovuelo);
$sentenciaSQL->bindParam(':carnet',$txtcarnet);
$sentenciaSQL->bindParam(':aerolinea',$txtaerolinea);
$sentenciaSQL->bindParam(':fecha',$txtfecha);


$sentenciaSQL->execute();
//header ("Location:equipaje.php");
?>