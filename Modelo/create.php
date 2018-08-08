<?php
 require '../Controlador/conexionbd.php';
 if ( !empty($_POST)) {
   $nitError = null;
   $empresaError = null;
   $direccionError = null;
   $telefonoError = null;
   $ciudadError = null;
   $fechaError = null;         
   $nit = $_POST['nit'];
   $empresa = $_POST['empresa'];
   $direccion = $_POST['direccion'];
   $telefono = $_POST['telefono'];
   $ciudad = $_POST['ciudad'];
   $fecha = $_POST['fecha'];         
   $validar = true;
   if (empty($nit)) {
     $nitError = 'Por favor digite el nit';
     $validar = false;
   }
   if (empty($empresa)) {
     $empresaError = 'Por favor digite nombre empresa';
     $validar = false;
   } 
   if (empty($direccion)) {
     $direccionError = 'Por favor digite la dirección';
     $validar = false;
   }
   if (empty($telefono)) {
     $telefonoError = 'Por favor digite el numero telefonico';
     $validar = false;
   }
   if (empty($ciudad)) {
     $ciudadError = 'Por favor digitar la ciudad';
     $validar = false;
   }
   if (empty($fecha)) {
     $fechaError = 'Por favor digite fecha de ingreso';
     $validar = false;
   }
   //guardar los datos
   if ($validar) {
     $pdo = Basededatos::conectarbd();
     $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
     $sql = "INSERT INTO clientes (nit,empresa,direccion,telefono,ciudad,fecha) values(?, ?, ?,?,?,?)";
     $consulta = $pdo->prepare($sql);
     $consulta->execute(array($nit,$empresa,$direccion,$telefono,$ciudad,$fecha));
     Basededatos::desconectarbd();
     header("Location: ../Vista/index.php");
   }
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
        <h3>Adicionar un nuevo Cliente</h3>
   </div>
   <form class="form-horizontal" action="../Modelo/create.php" method="post">
     <div class="control-group <?php echo !empty($nitError)?'error':'';?>">
       <label class="control-label">Nit</label>
         <div class="controls">
           <input name="nit" type="text"  placeholder="Nit" value="<?php echo !empty($nit)?$nit:'';?>">
           <?php if (!empty($nitError)): ?>
             <span class="help-inline"><?php echo $nitError;?></span>
           <?php endif; ?>
         </div>
     </div>
     <div class="control-group <?php echo !empty($empresaError)?'error':'';?>">
        <label class="control-label">Empresa</label>
         <div class="controls">
           <input name="empresa" type="text" placeholder="Empresa" value="<?php echo !empty($empresa)?$empresa:'';?>">
           <?php if (!empty($empresaError)): ?>
             <span class="help-inline"><?php echo $empresaError;?></span>
           <?php endif;?>
         </div>
     </div>
     <div class="control-group <?php echo !empty($direccionError)?'error':'';?>">
        <label class="control-label">direccion</label>
        <div class="controls">
         <input name="direccion" type="text"  placeholder="Direccion" value="<?php echo !empty($direccion)?$direccion:'';?>">
         <?php if (!empty($direccionError)): ?>
          <span class="help-inline"><?php echo $direccionError;?></span>
         <?php endif;?>
        </div>
     </div>
     <div class="control-group <?php echo !empty($telefonoError)?'error':'';?>">
       <label class="control-label">telefono</label>
       <div class="controls">
         <input name="telefono" type="text"  placeholder="Telefono" value="<?php echo !empty($telefono)?$telefono:'';?>">
         <?php if (!empty($telefonoError)): ?>
           <span class="help-inline"><?php echo $telefonoError;?></span>
         <?php endif;?>
       </div>
     </div>
       <div class="control-group <?php echo !empty($ciudadError)?'error':'';?>">
        <label class="control-label">ciudad</label>
        <div class="controls">
          <input name="ciudad" type="text"  placeholder="Ciudad" value="<?php echo !empty($ciudad)?$ciudad:'';?>">
          <?php if (!empty($ciudadError)): ?>
             <span class="help-inline"><?php echo $ciudadError;?></span>
          <?php endif;?>
        </div>
     </div>
     <div class="control-group <?php echo !empty($fechaError)?'error':'';?>">
       <label class="control-label">Fecha</label>
       <div class="controls">
         <input name="fecha" type="date"  placeholder="Fecha" value="<?php echo !empty($fecha)?$fecha:'';?>">
         <?php if (!empty($fechaError)): ?>
           <span class="help-inline"><?php echo $fechaError;?></span>
         <?php endif;?>
       </div>
     </div>
    <div class="form-actions">
     <button type="submit" class="btn btn-success">Adicionar</button>
     <a class="btn" href="../Vista/index.php">Volver</a>
    </div>
   </form>
  </div>
 </div> <!-- /container -->
</body>
</html>
