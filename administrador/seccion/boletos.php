<?php include("../template/cabecera.php"); ?>

<?php


$txtOrigen=(isset($_POST['txtOrigen']))?$_POST['txtOrigen']:"";
$txtDestino=(isset($_POST['txtDestino']))?$_POST['txtDestino']:"";
$txtTiempo=(isset($_POST['txtTiempo']))?$_POST['txtTiempo']:"";
$txtVuelo=(isset($_POST['txtVuelo']))?$_POST['txtVuelo']:"";
$txtPuerta=(isset($_POST['txtPuerta']))?$_POST['txtPuerta']:"";
$txtObservacion=(isset($_POST['txtObservacion']))?$_POST['txtObservacion']:"";
$acciom=(isset($_POST['acciom']))?$_POST['acciom']:"";
include("../config/bd.php");



switch($acciom){
    
    case "Agregar":
        $sentenciaSQL=$conexion->prepare("INSERT INTO vuelos (origen, destino, tiempo, vuelo, puerta, observacion) VALUES (:origen, :destino, :tiempo, :vuelo, :puerta, :observacion);");
        $sentenciaSQL->bindParam(':origen',$txtOrigen);
        $sentenciaSQL->bindParam(':destino',$txtDestino);
        $sentenciaSQL->bindParam(':tiempo',$txtTiempo);
        $sentenciaSQL->bindParam(':vuelo',$txtVuelo);
        $sentenciaSQL->bindParam(':puerta',$txtPuerta);
        $sentenciaSQL->bindParam(':observacion',$txtObservacion); 
        $sentenciaSQL->execute();

        header ("Location:boletos.php");
        break;

    case "Modificar":
        //echo "Presionado Modificar";
        $sentenciaSQL=$conexion->prepare("UPDATE vuelos SET origen=:origen , destino=:destino , tiempo=:tiempo , puerta=:puerta , observacion=:observacion WHERE vuelo=:vuelo");
        /*$sentenciaSQL=$conexion->prepare("UPDATE vuelos SET destino=:destino WHERE vuelo=:vuelo");
        $sentenciaSQL=$conexion->prepare("UPDATE vuelos SET tiempo=:tiempo WHERE vuelo=:vuelo");
        $sentenciaSQL=$conexion->prepare("UPDATE vuelos SET puerta=:puerta WHERE vuelo=:vuelo");
        $sentenciaSQL=$conexion->prepare("UPDATE vuelos SET observacion=:observacion WHERE vuelo=:vuelo");*/
        
        
        $sentenciaSQL->bindParam(':origen',$txtOrigen);
        $sentenciaSQL->bindParam(':destino',$txtDestino);
        $sentenciaSQL->bindParam(':tiempo',$txtTiempo);
        $sentenciaSQL->bindParam(':vuelo',$txtVuelo);
        $sentenciaSQL->bindParam(':puerta',$txtPuerta);
        $sentenciaSQL->bindParam(':observacion',$txtObservacion);
        
        
        $sentenciaSQL->execute();  
        
        //header ("Location:vuelos.php");
        break;

    case "Cancelar":
        header ("Location:boletos.php");
        break;

    case "Seleccionar":
        //echo "Presionado Seleccionar";
        $sentenciaSQL=$conexion->prepare("SELECT * FROM vuelos WHERE vuelo=:vuelo");
        $sentenciaSQL->bindParam(':vuelo',$txtVuelo);
        $sentenciaSQL->execute();
        $vuelos=$sentenciaSQL->fetch(PDO::FETCH_LAZY);

        $txtVuelo=$vuelos['vuelo'];
        $txtOrigen=$vuelos['origen'];
        $txtDestino=$vuelos['destino'];
        $txtTiempo=$vuelos['tiempo'];
        
        $txtPuerta=$vuelos['puerta'];
        $txtObservacion=$vuelos['observacion'];
        

        break;

    case "Borrar":
        $sentenciaSQL=$conexion->prepare("DELETE FROM vuelos WHERE vuelo=:vuelo");
        $sentenciaSQL->bindParam(':vuelo',$txtVuelo);
        $sentenciaSQL->execute();
        $vuelos=$sentenciaSQL->fetch(PDO::FETCH_LAZY);
        $sentenciaSQL->execute();
        
        break;


}
$sentenciaSQL=$conexion->prepare("SELECT * FROM vuelos");
$sentenciaSQL->execute();
$listaVuelos=$sentenciaSQL->fetchAll(PDO::FETCH_ASSOC);


?>





<div class="col-md-5">
    <div class="card">
        <div class="card-header">
            Insercion De Vuelos Disponibles
        </div>

        <div class="card-body">

            <form method="POST" enctype="multipart/form-data">

                <div class = "form-group">
                <label for="txtOrigen">Origen</label>
                <input type="text" required  value="<?php echo $txtOrigen; ?>" class="form-control" name="txtOrigen" id="txtOrigen" placeholder="Origen">
                </div>

                <div class = "form-group">
                <label for="txtDestino">Destino</label>
                <input type="text" required value="<?php echo $txtDestino; ?>" class="form-control" name="txtDestino" id="txtDestino" placeholder="Destino">
                </div>

                <div class = "form-group">
                <label for="txtTiempo">Tiempo</label>
                <input type="time" required value="<?php echo $txtTiempo; ?>" class="form-control" name="txtTiempo" id="txtTiempo" placeholder="Tiempo">
                </div>

                <div class = "form-group">
                <label for="txtVuelo">Vuelo</label>
                <input type="text" required readonly value="<?php echo $txtVuelo; ?>" class="form-control" name="txtVuelo" id="txtVuelo" placeholder="Vuelo">
                </div>

                <div class = "form-group">
                <label for="txtPuerta">Puerta</label>
                <input type="text" required value="<?php echo $txtPuerta; ?>" class="form-control" name="txtPuerta" id="txtPuerta" placeholder="Puerta">
                </div>

                

                <div class="btn-group" role="group" aria-label="">
                <button type="submit" name="acciom" <?php echo ($acciom=="Seleccionar")?"disabled":"";  ?> value="Agregar" class="btn btn-success">Agregar</button>
                <button type="submit" name="acciom"<?php echo ($acciom!="Seleccionar")?"disabled":"";  ?>  value="Modificar" class="btn btn-warning">Modificar</button>
                <button type="submit" name="acciom"<?php echo ($acciom!="Seleccionar")?"disabled":"";  ?>  value="Cancelar"class="btn btn-info">Cancelar</button>
                
                </div>
            </form>
        </div>
        
    </div>

</div>
<div class="col-md-7">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Origen</th>
                <th>Destino</th>
                <th>Tiempo</th>
                <th>Vuelo</th>
                <th>Puerta</th>
                
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach( $listaVuelos as $vuelos ) { ?>
            <tr>
                <td><?php echo $vuelos['origen']; ?></td>
                <td><?php echo $vuelos['destino']; ?></td>
                <td><?php echo $vuelos['tiempo']; ?> </td>
                <td><?php echo $vuelos['vuelo']; ?> </td>
                <td><?php echo $vuelos['puerta']; ?> </td>
                

                <td>
                    
                    
                    <form  method="post">
                        <input type="hidden" name="txtVuelo" id="txtVuelo" value="<?php echo $vuelos['vuelo']; ?>">

                        <input type="submit" name="acciom" value="Seleccionar" class="btn btn-primary">

                        <input type="submit"  name="acciom" value="Borrar" class="btn btn-danger">
                    </form>

                </td>

            </tr>
            <?php } ?>
        </tbody>
    </table>
    
</div>
<?php include("../template/pie.php") ?>