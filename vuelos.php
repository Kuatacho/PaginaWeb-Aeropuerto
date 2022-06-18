<?php include ("template/cabecera.php");?>
<?php 
include("administrador/config/bd.php");

$sentenciaSQL=$conexion->prepare("SELECT * FROM vuelos");
$sentenciaSQL->execute();
$listaVuelos=$sentenciaSQL->fetchAll(PDO::FETCH_ASSOC);
?>

<div class="container">
    <div class="row justify-content-center">
        <center><h1>Control De Vuelos</h1></center>
    </div>
</div>
<nav class="navbar navbar-dark bg-light">
            <form class="form-inline" action="" method="post">
            <input class="form-control mr-md-4" type="search" name="documento" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" value="buscar" name="enviar" type="submit">Search</button>
            </form>
    </nav> 
    
    
    <?php
    if($_POST){
        $id=$_POST['documento'];
        $sentenciaSQL=$conexion->prepare("SELECT * FROM vuelos WHERE vuelo=:vuelo");
        $rows=$sentenciaSQL->execute(array(':vuelo'=>$id));
        $rows=$sentenciaSQL->fetchAll(\PDO::FETCH_OBJ);

        if(count($rows)){
              foreach($rows as $row){ ?>
                <div class="card"style="width: 25rem;">  
                <img class="card-img-top" src="img/part1.jpg" width="" alt="">
                <div class="card-body">
                <h4 class="card-title"> <?php echo $row->origen; ?> - <?php echo $row->destino; ?> </h4>
                <p class="card-text">Partira: <?php echo $row->tiempo; ?> </p>
                <p class="card-text">Numero de Vuelo: <?php echo $row->vuelo; ?> </p>
                <p class="card-text">Puerta: <?php echo $row->puerta; ?> </p>
                <div class="card-footer text-muted">Comentario:<?php echo $row->observacion; ?> </div>
                
                    
                </div>
                    <a name="" id="" class="btn btn-primary" href="#" role="button"> Ver Mas</a>
                </div>
                <?php
            }
                
            

        
        }else   {
            
        }
    }
        
    
    ?>


<?php
    if($_POST){
        $id=$_POST['documento'];
        $sentenciaSQL=$conexion->prepare("SELECT * FROM vuelos WHERE origen=:origen");
        $rows=$sentenciaSQL->execute(array(':origen'=>$id));
        $rows=$sentenciaSQL->fetchAll(\PDO::FETCH_OBJ);

        if(count($rows)){
              foreach($rows as $row){ ?>
                <div class="card"style="width: 25rem;">  
                <img class="card-img-top" src="img/part1.jpg" width="" alt="">
                <div class="card-body">
                <h4 class="card-title"><?php echo $row->origen; ?> - <?php echo $row->destino; ?> </h4>
                <p class="card-text">Partira: <?php echo $row->tiempo; ?> </p>
                <p class="card-text">Numero de Vuelo: <?php echo $row->vuelo; ?> </p>
                <p class="card-text">Puerta: <?php echo $row->puerta; ?> </p>
                <div class="card-footer text-muted">Comentario:<?php echo $row->observacion; ?> </div>
                
                    
                </div>
                    <a name="" id="" class="btn btn-primary" href="#" role="button"> Ver Mas</a>
                </div>
                <?php
            }
                
            

        
        }else   {
            
        }
    }
        
    
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