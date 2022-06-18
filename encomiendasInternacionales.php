<?php include ("template/cabecera.php");?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SERVICIO DE ENCOMIENDAS </title>
</head>
<body>
<div class="container">
            <div class="row">
                
                <div class="col-md-12">
                <br/><br/><br/>
                <div class="card text-left">
                <img class="card-img-top" src="holder.js/100px180/" alt="">
                <div class="card-body">
                    <h4 class="card-title">SERVICIO DE ENCOMIENDAS INTERNACIONALES </h4>
                    <form method="POST" class="needs-validation" novalidate>
                    <div class="form-row">
                    <div class="col-md-4 mb-3">
                    <label for="validationCustom01">Ingrese su nombre completo:</label>
                    <input type="text" class="form-control" name ="txtnombre" id="txtnombre" placeholder="Nombre completo" value="" required>
                    <div class="valid-feedback">
                    </div>
                    </div>
                    <div class="col-md-4 mb-3">
                    <label for="validationCustom04">Ingrese su carnet de identidad:</label>
                    <input type="number" class="form-control" name="txtcarnet"id="txtcarnet" placeholder="Carnet de identidad" required>
                    <div class="invalid-feedback">
                    </div>
                    </div>
                    <div class="col-md-4 mb-3">
                    <label for="validationCustom01">Ingrese el nombre del destinatario:</label>
                    <input type="text" class="form-control" name ="txtnombredestinatario" id="txtnombredestinatario" placeholder="Nombre destinatario" value="" required>
                    <div class="valid-feedback">
                    </div>
                    </div>
                    <div class="col-md-4 mb-3">
                    <label for="validationCustom04">Ingrese el carnet del destinatario:</label>
                    <input type="number" class="form-control" name="txtcarnetdestinatario"id="txtcarnetdestinatario" placeholder="Carnet de identidad del destinatario" required>
                    <div class="invalid-feedback">
                    </div>
                    </div>
                    <div class="col-md-4 mb-3">
                    <label for="validationCustom02">Ingrese su numero de vuelo:</label>
                    <input type="text" class="form-control" name ="txtnumvuelo"id="txtnumvuelo" placeholder="Numero de vuelo" value="" required>
                    <div class="valid-feedback">
                    </div>
                    </div>
                    <div class="form-row">
                    <div class="col-md-4 mb-3">
                    <label for="validationCustom03">Ingrese la aerolinea encargada:</label>
                    <input type="text" class="form-control" name="txtaerolinea"id="txtaerolinea" placeholder="Aerolinea" required>
                    <div class="invalid-feedback">
                    </div>
                    </div>
                    <div class="col-md-4 mb-3">
                    <label for="validationCustom01">Ingrese el pais de origen:</label>
                    <input type="text" class="form-control" name ="txtorigen" id="txtorigen" placeholder="Pais de origen"  value="" required>
                    <div class="valid-feedback">
                    </div>
                    </div>
                    <div class="col-md-4 mb-3">
                    <label for="validationCustom01">Ingrese el pais de llegada :</label>
                    <input type="text" class="form-control" name ="txtllegada" id="txtllegada" placeholder="Pais de llegada" value="" required>
                    <div class="valid-feedback">
                    </div>
                    </div>
                    <div class="col-md-4 mb-3">
                    <label for="validationCustom05">Ingrese la fecha en la que se esta realizando la encomienda:</label>
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
    
</body>
</html>
<?php include("template/pie.php"); ?>
<?php
include ("administrador/config/bd.php");


$txtnombre=(isset($_POST['txtnombre']))?$_POST['txtnombre']:"";
$txtcarnet=(isset($_POST['txtcarnet']))?$_POST['txtcarnet']:"";
$txtnombredestinatario=(isset($_POST['txtnombredestinatario']))?$_POST['txtnombredestinatario']:"";
$txtcarnetdestinatario=(isset($_POST['txtcarnetdestinatario']))?$_POST['txtcarnetdestinatario']:"";
$txtnumvuelo=(isset($_POST['txtnumvuelo']))?$_POST['txtnumvuelo']:"";
$txtaerolinea=(isset($_POST['txtaerolinea']))?$_POST['txtaerolinea']:"";
$txtorigen=(isset($_POST['txtorigen']))?$_POST['txtorigen']:"";
$txtllegada=(isset($_POST['txtllegada']))?$_POST['txtllegada']:"";
$txtfecha=(isset($_POST['txtfecha']))?$_POST['txtfecha']:"";


$sentenciaSQL=$conexion->prepare("INSERT INTO checkin (nombre, carnet, nombredestinatario, carnetdestinatario, vuelo, aerolinea, origen, llegada, fecha) VALUES (:nombre, :carnet, :nombredestinatario, :carnetdestinatario, :vuelo, :aerolinea, :origen, :llegada, :fecha);");
$sentenciaSQL->bindParam(':nombre',$txtnombre);
$sentenciaSQL->bindParam(':carnet',$txtcarnet);
$sentenciaSQL->bindParam(':nombredestinatario',$txtnombredestinatario);
$sentenciaSQL->bindParam(':carnetdestinatario',$txtcarnetdestinatario);
$sentenciaSQL->bindParam(':vuelo',$txtnumvuelo);
$sentenciaSQL->bindParam(':aerolinea',$txtaerolinea);
$sentenciaSQL->bindParam(':origen',$txtorigen);
$sentenciaSQL->bindParam(':llegada',$txtllegada);
$sentenciaSQL->bindParam(':fecha',$txtfecha);


$sentenciaSQL->execute();
//header ("Location:checkin.php");
?>