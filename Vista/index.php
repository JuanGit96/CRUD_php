<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <link   href="css/bootstrap.min.css" rel="stylesheet">
    <script src="js/bootstrap.min.js"></script>
</head>
<body>
 <div class="container">
   <div class="row">
     <h1 align="center">Crear - Consultar - Eliminar-Actualizar (CRUD) con PHP </h1>
   </div>
     <div class="row">
       <p align="center">
         <a href="../Modelo/create.php" class="btn btn-success">Nuevo Registro</a>
       </p>
       <table class="table table-striped table-bordered" border="2" align="center">
       <thead>
       <tr>
        <th>Nit</th>
        <th>Empresa</th>
        <th>Direccion</th>
        <th>Telefono</th>
        <th>Ciudad</th>
        <th>Fecha</th>
        <th>Accion</th>
       </tr>
       </thead>
       <tbody>
        <?php
          include '../Controlador/conexionbd.php';
          $pdo = Basededatos::conectarbd();
          $consultasql = 'SELECT * FROM clientes ORDER BY nit DESC';
          foreach ($pdo->query($consultasql) as $fila) {
            echo '<tr>';
            echo '<td>'. $fila['nit'] . '</td>';
            echo '<td>'. $fila['empresa'] . '</td>';
            echo '<td>'. $fila['direccion'] . '</td>';
            echo '<td>'. $fila['telefono'] . '</td>'; 
            echo '<td>'. $fila['ciudad'] . '</td>';  
            echo '<td>'. $fila['fecha'] . '</td>';
            echo '<td width=250>';
            echo '<a class="btn" href="../Modelo/read.php?nit='.$fila['nit'].'">Consultar</a>';
            echo ' ';
            echo '<a class="btn btn-success" href="../Modelo/update.php?nit='.$fila['nit'].'">Actualizar</a>';
            echo ' ';
            echo '<a class="btn btn-danger" href="../Modelo/delete.php?nit='.$fila['nit'].'">Eliminar</a>';
            echo '</td>';
            echo '</tr>';
          }
          Basededatos::desconectarbd();
        ?>
       </tbody>
     </table>
    </div>
   </div> <!-- /container -->
 </body>
</html>
