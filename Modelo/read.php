<?php
    require '../Controlador/conexionbd.php';
    $nit = null;
    if ( !empty($_GET['nit'])) {
        $nit = $_REQUEST['nit'];
    }
     
    if ( null==$nit ) {
        header("Location: ../Vista/index.php");
    } else {
        $pdo = Basededatos::conectarbd();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "SELECT * FROM clientes where nit = ?";
        $resultado = $pdo->prepare($sql);
        $resultado->execute(array($nit));
        $datos = $resultado->fetch(PDO::FETCH_ASSOC);
        Basededatos::desconectarbd();
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <link   href="css/bootstrap.min.css" rel="stylesheet">
    <script src="js/bootstrap.min.js"></script>
</head>
<body>
 <div class="container">
   <div>
     <h1 align="center">Consultar por Cliente</h1>
     <hr>
   </div>
   <table border=2 align="center">
     <tr>
       <td><label>Nit</label></td>  
       <td><label><?php echo $datos['nit'];?></label></td>
     </tr>
     <tr>
       <td><label>Empresa</label></td>  
       <td><label><?php echo $datos['empresa'];?></label></td>
     </tr>
     <tr>
       <td><label>Dirección</label></td>
       <td><label><?php echo $datos['direccion'];?></label></td>
     </tr>
     <tr>
       <td><label>Teléfono</label></td>
       <td><label><?php echo $datos['telefono'];?></label></td>
     </tr>
     <tr>
       <td><label>Ciudad</label></td>
       <td><label><?php echo $datos['ciudad'];?><label></td>
     </tr>
     <tr>
       <td><label>Fecha</label></td>
       <td><label><?php echo $datos['fecha'];?></label></td>
     </tr>
   <table>  
   <div a align="center" class="form-actions">
     <a class="btn" href="../Vista/index.php">Volver a la página principal</a>
   </div>
 <div> <!-- /container -->
</body>
</html>
