<?php
  require '../Controlador/conexionbd.php';
  $nit = 0;
  if ( !empty($_GET['nit'])) {
     $nit = $_REQUEST['nit'];
  }
  if ( !empty($_POST)) {
    $nit = $_POST['nit'];
   // Eliminar registros
    $pdo = Basededatos::conectarbd();
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "DELETE FROM clientes  WHERE nit = ?";
    $resultado = $pdo->prepare($sql);
    $resultado->execute(array($nit));
    Basededatos::desconectarbd();
    header("Location: ../Vista/index.php");
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
   <div class="span10 offset1">
     <div class="row">
       <h3>Eliminar Clientes</h3>
     </div>
     <form class="form-horizontal" action="../Modelo/delete.php" method="post">
       <input type="hidden" name="nit" value="<?php echo $nit;?>"/>
       <p class="alert alert-error">Esta seguro de ELIMINAR el registro?</p>
       <div class="form-actions">
         <button type="submit" class="btn btn-danger">Si</button>
         <a class="btn" href="../Vista/index.php">No</a>
       </div>
     </form>
   </div>
 </div> <!-- /container -->
</body>
</html>
