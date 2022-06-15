<?php include ("template/cabecera.php");?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<div class="container">
            <div class="row">
                
                <div class="col-md-12">
                <br/><br/><br/>
                <div class="card text-left">
                <img class="card-img-top" src="holder.js/100px180/" alt="">
                <div class="card-body">
                    <h4 class="card-title">Checkin</h4>
                    <form class="needs-validation" novalidate>
                    <div class="form-row">
                    <div class="col-md-4 mb-3">
                    <label for="validationCustom01">First name</label>
                    <input type="text" name="txtName" class="form-control" id="txtName" placeholder="First name" value="Mark" required>
                    <div class="valid-feedback">
                    Looks good!
                    </div>
                    </div>
                    <div class="col-md-4 mb-3">
                    <label for="validationCustom02">Last name</label>
                    <input type="text" name="txtApellid" class="form-control" id="txtApellid" placeholder="Last name" value="Otto" required>
                    <div class="valid-feedback">
                    Looks good!
                    </div>
                    </div>
                    <div class="col-md-6 mb-3">
                    <label for="validationCustomEmail">Email</label>
                    <div class="input-group">
                    <div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroupPrepend">@</span>
                    </div>
                    <input type="text" class="form-control" id="validationCustomEmail" placeholder=" Email " 
                    aria-describedby="inputGroupPrepend" required>
                    <div class="invalid-feedback">
                    Please choose a Email.
                    </div>
                    </div>
                    </div>
                    </div>
                    <div class="form-row">
                    <div class="col-md-6 mb-3">
                    <label for="validationCustom03">City</label>
                    <input type="text" class="form-control" id="validationCustom03" placeholder="City" required>
                    <div class="invalid-feedback">
                    Please provide a valid city.
                    </div>
                    </div>
                    <div class="col-md-3 mb-3">
                    <label for="validationCustom04">State</label>
                    <input type="text" class="form-control" id="validationCustom04" placeholder="State" required>
                    <div class="invalid-feedback">
                    Please provide a valid state.
                    </div>
                    </div>
                    <div class="col-md-3 mb-3">
                    <label for="validationCustom05">Zip</label>
                    <input type="text" class="form-control" id="validationCustom05" placeholder="Zip" required>
                    <div class="invalid-feedback">
                    Please provide a valid zip.
                    </div>
                    </div>
                    </div>
                    <div class="form-group">
                    <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="invalidCheck" required>
                    <label class="form-check-label" for="invalidCheck">
                    Agree to <a href="#">terms and conditions</a>
                    </label>
                    <div class="invalid-feedback">
                    You must agree before submitting.
                    </div>
                    </div>
                    </div>
                    <button class="btn btn-primary" type="submit">Submit form</button>
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
      include ("administrador/config/bd.php");


      $txtNombre=(isset($_POST['txtNombre']))?$_POST['txtID']:"";
      $txtApellid=(isset($_POST['txtapellid']))?$_POST['txtNombre']:"";
      $sentenciaSQL=$conexion->prepare("INSERT INTO libros (nombre, imagen) VALUES (:nombre, :imagen);");
      $sentenciaSQL->bindParam(':nombre',$txtNombre);
      $sentenciaSQL->bindParam(':aeplld',$txtNombre);
      $sentenciaSQL->bindParam(':etc',$txtNombre);

      $sentenciaSQL->execute();

      header ("Location:productos.php");
      


    ?>
    
    
    
</body>
</html>

<?php include("template/pie.php"); ?>