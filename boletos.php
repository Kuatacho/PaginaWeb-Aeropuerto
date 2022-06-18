<?php include ("template/cabecera.php");?>
<?php 
    include("administrador/config/bd.php");
    $sentenciaSQL=$conexion->prepare("SELECT * FROM vuelos");
    $sentenciaSQL->execute();
    $listaVuelos=$sentenciaSQL->fetchAll(PDO::FETCH_ASSOC);
    
?>
<div class="container">
    <div class="row justify-content-center">
        <center><h1>Reserva Tu Boleto</h1></center>
    </div>
</div>


    