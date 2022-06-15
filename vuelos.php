<?php include ("template/cabecera.php");?>
<?php 
include("administrador/config/bd.php");

$sentenciaSQL=$conexion->prepare("SELECT * FROM vuelos");
$sentenciaSQL->execute();
$listaVuelos=$sentenciaSQL->fetchAll(PDO::FETCH_ASSOC);
?>


<?php  foreach($listaVuelos as $vuelos){ ?>





    <div class="card"style="width: 25rem;">
        
            <img class="card-img-top" src="img/part1.jpg" width="" alt="">
                <div class="card-body">
                    <h4 class="card-title"><?php echo $vuelos['origen']; ?> -  <?php echo $vuelos['destino']; ?></h4>
                    <p class="card-text">Partira: <?php echo $vuelos['tiempo']; ?></p>
                    <p class="card-text">Numero de Vuelo: <?php echo $vuelos['vuelo']; ?></p>
                    <p class="card-text">Puerta: <?php echo $vuelos['puerta']; ?></p>
                    <div class="card-footer text-muted">Comentario:<?php echo $vuelos['observacion']; ?></div>
                    
                        
                </div>
                    <a name="" id="" class="btn btn-primary" href="#" role="button"> Ver Mas</a>
                </div>
        


    




<?php } ?>


<?php include("template/pie.php"); ?>