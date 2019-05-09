<?php 
	require_once ($_SERVER['DOCUMENT_ROOT']. '/models/Clasificacion.php');
	require_once ($_SERVER['DOCUMENT_ROOT']. '/controllers/ClasificacionController.php');
	require_once ($_SERVER['DOCUMENT_ROOT']. '/controllers/EquipoController.php');
	
	$clasificaciones = array();
	
	$clasificacionController  = new ClasificacionController();
	$clasificaciones = $clasificacionController->verClasificacionEquipos();
	
	$equipoController = new EquipoController();
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="liga">

    <title>La Liga</title>

    <!-- CSS -->
    <link href="resources/css/bootstrap.min.css" rel="stylesheet">
     <link href="resources/css/styles.css" rel="stylesheet">
    
    <!-- JS -->
	<script type="text/javascript" src="resources/js/jquery1.12.3.js"></script>
	<script type="text/javascript" src="resources/js/bootstrap.min.js"></script>
  </head>

  <body class="inicio">
      <nav class="navbar navbar-inverse navbar-fixed-top">
        <div class="container">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand">La Liga</a>
          </div>
          <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
              <li class="active"><a href="inicio.php">Inicio</a></li>
               <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Información<span class="caret"></span></a>
                <ul class="dropdown-menu">
                  <li><a href="equipos.php">Equipos</a></li>
                  <li><a href="clasificacion.php">Clasificación</a></li>
                  <li><a href="partidos.php">Partidos</a></li>
                </ul>
              </li>
              <li><a href="noticias.php">Noticias</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
               <li><a href="registro.php"><span class="glyphicon glyphicon-user"></span>&nbsp;Crear cuenta</a></li>
      		   <li><a href="login.php"><span class="glyphicon glyphicon-log-in"></span>&nbsp;Entrar</a></li>
            </ul>
          </div>
        </div>
      </nav>

	<!-- Container -->
	<div class="container">
      <!-- Example row of columns -->
      <div class="row">
        <div class="col-lg-12">
          <h2>Clasificación</h2>
          <table class="table table-bordered">
          	<thead>
          		<tr class="darkgreenbox">
		            <th>Posición</th>
		            <th>Equipo</th>
		            <th>Puntos</th>
		            <th>PJugados</th>
		            <th>PGanados</th>
		            <th>PEmpatados</th>
		            <th>PPerdidos</th>
		            <th>GFavor</th>
		            <th>GContra</th>
		            <th>Diferencia</th>
		        </tr>
		    </thead>
		            
		    <?php			
				foreach($clasificaciones as $clasificacion) {
					$equipo = $equipoController->buscarEquipoPorId($clasificacion->getEquipo());
			 ?>
			 	<tbody>
			        <tr>
						<td><?php echo $clasificacion->getPosicion()?></td>
						<td><img alt="Escudo del <?php echo $equipo->getNombre()?>" title="Escudo del <?php echo $equipo->getNombre()?>" src="resources/img/escudos/<?php echo $equipo->getId()?>.png" width="40" height="30">&nbsp;<?php echo $equipo->getNombre()?></td>
						<td><?php echo $clasificacion->getPuntos()?></td>
						<td><?php echo $clasificacion->getPjugados()?></td>
						<td><?php echo $clasificacion->getPganados()?></td>
						<td><?php echo $clasificacion->getPempatados()?></td>
						<td><?php echo $clasificacion->getPperdidos()?></td>
						<td><?php echo $clasificacion->getGfavor()?></td>
						<td><?php echo $clasificacion->getGcontra()?></td>
						<td><?php echo $clasificacion->getDiferencia()?></td>
					</tr>
				</tbody>
			<?php				
				}
			?>
	      </table>
        </div>
        <div class="form-actions">
        	 <a class="btn" href="inicio.php">Volver</a>
		 </div>
   	  </div>
    </div>
  </body>
</html>