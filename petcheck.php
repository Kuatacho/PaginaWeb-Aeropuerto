<?php include ("template/cabecera.php");?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PET - CHECK</title>
</head>
<body>
<div class="container">
            <div class="row">
                
                <div class="col-md-12">
                <br/><br/><br/>
                <div class="card text-left">
                <img class="card-img-top" src="holder.js/100px180/" alt="">
                <div class="card-body">
                    <h4 class="card-title">PET - CHECK </h4>
                    <form method="POST" class="needs-validation" novalidate>
                    <div class="form-row">
                    <div class="col-md-4 mb-3">
                    <label for="validationCustom01">Ingrese tipo de animal:</label>
                    <input type="text" class="form-control" name="txtanimal" id="txtanimal" placeholder="Tipo de animal" value="" required>
                    <div class="valid-feedback">
                    </div>
                    </div>
                    <div class="col-md-4 mb-3">
                    <label for="validationCustomEmail">Ingrese el peso del animal en kg:</label>
                    <div class="input-group">
                    <div class="input-group-prepend">
                    <span class="input-group-text" >kg</span>
                    </div>
                    <input type="number" class="form-control" name="txtpeso" id="txtpeso" placeholder="Peso del animal" 
                    aria-describedby="inputGroupPrepend" required>
                    
                    <div class="invalid-feedback">
                    </div>
                    </div>
                    </div>
                    </div>
                    <div class="col-md-4 mb-3">
                    <label for="validationCustom02">Ingrese el nombre de la mascota:</label>
                    <input type="text" class="form-control" name="txtnombremascota" id="txtnombremascota" placeholder="Nombre de la mascota" value="" required>
                    <div class="valid-feedback">
                    </div>
                    </div>
                    
                    <div class="col-md-4 mb-3">
                    <label for="validationCustom02">Ingrese su numero de vuelo:</label>
                    <input type="text" class="form-control" name="txtnumerovuelo"id="txtnumerovuelo" placeholder="Numero de vuelo" value="" required>
                    <div class="valid-feedback">
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

$txtanimal=(isset($_POST['txtanimal']))?$_POST['txtanimal']:"";
$txtpeso=(isset($_POST['txtpeso']))?$_POST['txtpeso']:"";
$txtnombremascota=(isset($_POST['txtnombremascota']))?$_POST['txtnombremascota']:"";
$txtnumerovuelo=(isset($_POST['txtnumerovuelo']))?$_POST['txtnumerovuelo']:"";



$sentenciaSQL=$conexion->prepare("INSERT INTO petcheck ( animal, peso, nombremascota, numerovuelo ) VALUES (:animal, :peso, :nombremascota, :numerovuelo );");
$sentenciaSQL->bindParam(':animal',$txtanimal);
$sentenciaSQL->bindParam(':peso',$txtpeso);
$sentenciaSQL->bindParam(':nombremascota',$txtnombremascota);
$sentenciaSQL->bindParam(':numerovuelo',$txtnumerovuelo);


$sentenciaSQL->execute();
//header ("Location:petcheck.php");
?>