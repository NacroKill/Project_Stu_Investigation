<?php 
$host = "localhost";
$usuario = "dramirez2";
$password = "turntablepower2";
$database = "estu_investigacion";

$conexion = mysql_connect($host, $usuario, $password);
mysql_select_DB($database);
$numEst =$_GET['NumStu']; 
$sql_id='select * from Estudiantes where est_id ="'.$numEst.'";';
$id_res= mysql_query($sql_id); //no devuelve el valor, es un pointer
$row = mysql_fetch_row($id_res); 

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="../../assets/ico/favicon.ico">

    <title>Informaci&oacute;n del Estudiante</title>

    <!-- Bootstrap core CSS -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="jumbotron.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy this line! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

    <div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="http://ada.uprrp.edu/~dramirez2/ccom4027/project/investiga.php">Inicio</a>
        </div>
        <div class="navbar-collapse collapse">
           <form class="navbar-form navbar-right" role="form">
				
					<button type="button" class="btn btn-success" data-toggle="modal" data-target="#ModalEst">Actualizar</button> 
				
        </form>
        </div><!--/.navbar-collapse -->
      </div>
    </div>

    <!-- Main jumbotron for a primary marketing message or call to action -->
    <div class="jumbotron">
      <div class="container">
       <?php 
		if ($row[1] == null) echo "<h1> El estudiante que buscas no est&aacute; en la base de datos.</h1></div></div>";
		else{ echo '<h1>'.$row[1];
		echo (
		'</h1>
        <table class="table">
      <thead>
        <tr>
          <th>Correo Electr&oacute;nico</th>
		  <th>N&uacute;mero de Estudiante</th>
          <th>Telefono</th>
          <th>A&ntilde;o</th>
          <th>Classificado en CCOM</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>'.$row[2].'</td>
          <td>');
		  //Despliega numero de estudiante con guiones
		  for ($i=0; $i < strlen($row[0]); $i++){
			if ($i== 2 or $i== 4) echo $row[0][$i].'-';
			else echo $row[0][$i];
		  }
		  
		  
		  echo ('</td>
          <td>');
		  for ($i=0; $i < strlen($row[3]); $i++){
			if ($i== 2 or $i== 5) echo $row[3][$i].'-';
			else echo $row[3][$i];
		  }
		  echo ('</td> <td>');
			switch ($row[4]){
				case 1: echo "Primer A&ntilde;o";
						break;
				case 2: echo "Segundo A&ntilde;o";
						break;
				case 3: echo "Tercer A&ntilde;o";
						break;
				case 4: echo "Cuarto A&ntilde;o";
						break;
				default: echo $row[4];
			}
		  echo ('</td>
		  <td>');
			if ($row[5] == 1) echo "S&iacute";
			else echo "No";
		   echo ('</td>
        </tr>
      </tbody>
    </table>
        
      </div>
    </div>');
	}

?>
    <div class="container">
      <!-- Example row of columns -->
      <div class="row">
        <div class="col-md-6">
          <h2>Cursos CCOM</h2>
          <p>Tendria una lista con las clases de CCOM</p>
          <p><a class="btn btn-default" href="#" role="button">View details &raquo;</a></p>
        </div>
        <div class="col-md-6">
          <h2>Investigacion</h2>
		 <p> Esta working?
            
		</p>
       </div>
        
      </div>

      <hr>

      <footer>
        <p>&copy; Company 2014</p>
      </footer>
    </div> <!-- /container -->

<!-- modal Estudiantes-->

      <div class="modal fade" id="ModalEst" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
              <h3 class="modal-title" id="myModalLabel">Actualizar Estudiante</h3>
            </div>
            <div class="modal-body">
               <form class="form-signin" >
                  <!-- Nombre box -->
                  <div class="row" id="input-pass" >
                    <input type="text" class="form-control" placeholder="Nombre del estudiante">
                  </div>

                  <!-- Numest box -->
                  <div class="row" id="input-pass" >
                    <input type="text" class="form-control" placeholder="N&uacute;mero de Estudiante">
                  </div>


                  <!-- Correo box -->
                  <div class="row" id="input-pass"> 
                    <input type="text" class="form-control" placeholder="Correo electr&oacute;nico">
                  </div>


                  <!-- Telefono box -->
                  <div class="row" id="input-pass"> 
                    <input type="text" class="form-control" placeholder="Tel&eacute;fono">
                  </div>

                  <!-- A�o box -->
                  <div class="row" id="input-pass"> 
                    <input type="text" class="form-control" placeholder="A&ntilde;o">
                  </div>
				  <!-- Cursos CCOM -->
				 <div>
                    <div> <p></p><p></p><p></p><p></p></div>
                    <div class="panel panel-default">
                      <div class="panel-heading">
                        <h3 class="panel-title">Cursos de CCOM:</h3>
                      </div>
                      <div class="panel-body">                  
                         <form class="form-signin">
                          <!-- Codigo box -->
                         <div class="row" id="input-pass" >
                            <input type="text" class="form-control" placeholder="Codigo del Curso">
                         </div>

                         <!-- Titulo box -->
                         <div class="row" id="input-pass" >
                            <input type="text" class="form-control"     placeholder="Titulo del Curso">
                         </div>

                          <!-- Descripcion box -->
                         <div class="row" id="input-pass"> 
                           <input type="textarea" rows='3' class="form-control" placeholder="Descripcion del Curso">
                         </div>
                        </div>
                      </div>
                    </div>
                  <!-- Proyectos de investigacion-->
                  <div>
                    <div> <p></p><p></p><p></p><p></p></div>
                    <div class="panel panel-default">
                      <div class="panel-heading">
                        <h3 class="panel-title">Proyectos de Investigaci&oacute;n:</h3>
                      </div>
                      <div class="panel-body">                  
                         <form class="form-signin">
                          <!-- Titulo Inv box -->
                         <div class="row" id="input-pass" >
                            <input type="text" class="form-control" placeholder="Titulo de la Investigaci&oacute;n">
                         </div>

                         <!-- Titulo Inv box -->
                         <div class="row" id="input-pass" >
                            <input type="text" class="form-control"     placeholder="ID de la Investigaci&oacute;n">
                         </div>

                          <!-- Descripcion Inv box -->
                         <div class="row" id="input-pass"> 
                           <input type="text" class="form-control" placeholder="Descripcion de la Investigaci&oacute;n">
                         </div>
                        
                          <!-- Producto box -->
                         <div class="row" id="input-pass"> 
                           <input type="text" class="form-control" placeholder="Producto de la Investigaci&oacute;n">
                         </div>

                         <!-- Profesor Inv box -->
                         <div class="row" id="input-pass"> 
                           <input type="text" class="form-control" placeholder="Profesores de la Investigaci&oacute;n">
                         </div>
                         
                         <!-- Compa�eros Inv box -->
                         <div class="row" id="input-pass"> 
                           <input type="text" class="form-control" placeholder="Compa&ntilde;eros de la Investigaci&oacute;n">
                         </div>

                        </div>
                      </div>
                    </div>
                  <!-- Fecha de Admision box -->
                  <!--<div class="row" id="input-pass"> 
                    <input type="text" class="form-control" placeholder="Curso Actual">
                  </div>

                  <!-- Fecha de Graduaci?n box -->
                  <!--<div class="row" id="input-pass"> 
                    <input type="text" class="form-control" placeholder="Identificaci?n del Maestro">
                  </div>-->
               </form>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
              <button type="button" class="btn btn-primary">Aceptar</button>
            </div>
          </div>
        </div>
      </div>
   <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/docs.min.js"></script>
  </body>
</html>
