<?php
  session_start();

  require 'database.php';

  if (isset($_SESSION['user_id_estu'])) {
      $records = $conn->prepare('SELECT nombre_apellido, identificacion, password, confir_password FROM estudiante WHERE identificacion = :ide');
      $records->bindParam(':ide', $_SESSION['user_id_estu']);
      $records->execute();
      $results = $records->fetch(PDO::FETCH_ASSOC);

       $user_estu = null;

    if (count($results) > 0) {
      $user_estu = $results;
    }

  }elseif (isset($_SESSION['user_id_prof'])) {
      $records = $conn->prepare('SELECT nombre_apellido, identificacion, password, confir_password FROM profesor_a WHERE identificacion = :ide');
      $records->bindParam(':ide', $_SESSION['user_id_prof']);
      $records->execute();
      $results = $records->fetch(PDO::FETCH_ASSOC);

      $user_prof = null;

    if (count($results) > 0) {
      $user_prof = $results;
    }
  }
?>
 
<!DOCTYPE html>
<html lang="es">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1"/>
  <title>Sign To All </title>

  <link rel="shortcut icon" href="imagenes/Logo.png" type="image/png" />

  <!-- Hojas de CSS  -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link href="css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link rel="stylesheet" href="css/styleIndex.css">


  <!--css iconos-->
  <link rel="stylesheet" href="css/iconos.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css">

  <!--  Scripts-->
  <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
  <script src="js/materialize.js"></script>
  <script src="js/init.js"></script>
</head>
<body>
  <!-- Contenedor 1  -->
  <nav class="blue lighten-2" role="navigation">
    <div class="nav-wrapper container">

      <!-- encabezado -->
      <img src="imagenes/Logo.png" style="width:65px;height:64px;border:10px"></img>
      <a id="logo-container" href="Index.php" class="brand-logo">Sign to all</a>

      <!-- menu pc -->
      <ul class="right hide-on-med-and-down">

        <li><a href="Lecciones.php">Lecciones hola mundo</a></li>
        <li><a href="#abajo">Contacto</a></li>
          <?php if(empty($user_estu) && empty($user_prof)): ?>
              <li><a href="Inicio-de-Sesion.php">Iniciar sesión</a></li>
              <li><a href="Registro.php">Registrarse</a></li>

          <?php elseif(!empty($user_estu)): ?>
             <li> <a href="cierre_sesion.php">
                Cerrar Sesión
              </a></li>
              
          <?php elseif(!empty($user_prof)): ?>
             <li> <a href="CRUD.php">
                Estudiantes
              </a></li>
              <li> <a href="cierre_sesion.php">
                Cerrar Sesión
              </a></li>

          <?php endif; ?>

        
      </ul>

      <!-- menu mobile  -->
      <ul id="nav-mobile" class="sidenav">

        <li><a href="Lecciones.php">Lecciones</a></li>
        <li><a href="#abajo">Contacto sign to all</a></li>
          <?php if(empty($user_estu) && empty($user_prof)): ?>
              <li><a href="Inicio-de-Sesion.php">Iniciar sesión</a></li>
              <li><a href="Registro.php">Registrarse</a></li>

          <?php elseif(!empty($user_estu)): ?>
             <li> <a href="cierre_sesion.php">
                Cerrar Sesión
              </a></li>
              
          <?php elseif(!empty($user_prof)): ?>
             <li> <a href="CRUD.php">
                Estudiantes
              </a></li>
              <li> <a href="cierre_sesion.php">
                Cerrar Sesión
              </a></li>

          <?php endif; ?>

      </ul>

      <a href="#" data-target="nav-mobile" class="sidenav-trigger"><i class="material-icons">menu</i></a>
    </div>
  </nav>
  <div id="index-banner" class="parallax-container">
    <div class="section no-pad-bot">
      <div class="container">
        <br><br>
        <h1 class="header center blue-text text-lighten-1">Sign to all</h1>
        <div class="row center">
          <br><br>
          <h3 class="header col s12 light deep-orange-text">Sobre nosotros...</h3>
        </div>
      </div>
    </div>
    <!-- Fondo 1-->
    <div class="parallax"><img src="Fondo/TUCAN 2.jpg" alt="Unsplashed background img 1"></div>
  </div>

 <!-- Contenedor 2-->
 <div class="materialize-gray">
  <div class="container section ">
    <div class="row">
      <div class="col s12">
        <br></br>
        <h2 class="h1">MISIÓN:</h2>
          <p><img class="derecha1"src="imagenes/mision.jpeg">Sign to all busca generar un entorno más ameno para niños de segundo grado del colegio Pablo de Tarso con discapacidades auditivas , impulsando al estudiante a obtener una mejor compresión y comunicación.</p>
        <!--Recuadro que contiene la visión del proyecto-->
        <br></br>
        <h2 class="h2">VISIÓN:</h2>
        <p><img class="izquierda"src="imagenes/vision2.png">Facilitar la comunicación y el aprendizaje de niños de grado segundo que poseen una
          discapacidad auditiva, por medio de una plataforma web que permita una interacción de manera
          natural con sus compañeros y docentes.</p>
        <!--Recuadro que contiene el objetivo general del progrecto-->
        <br></br>
        <h2 class="h3"> OBJETIVO GENERAL:</h2>
        <p><img class="derecha2"src="imagenes/objetivo3.png">Facilitar la comunicación y el aprendizaje de niños de grado segundo que poseen una
          discapacidad auditiva, por medio de una plataforma web que permita una interacción de manera
          natural con sus compañeros y docentes.</p>
        <br></br>
        </div>
      </div>
    </div>
  </div>
 </div>


   <!-- Contenedor 3-->
  <div class="parallax-container valign-wrapper">
    <div class="section no-pad-bot">
      <div class="container">
        <div class="row center">
           <!-- No hay ningun parrafo o titulo escrito que alinear :p-->
        </div>
      </div>
    </div>
    <div class="parallax"><img src="Fondo/delfin.jpg" alt="Unsplashed background img 2"></div>
  </div>

  <!-- pie de pagina-->
  <a name="abajo"></a>
  <footer class="page-footer lime darken-2">
    <div class="container">
      <div class="row">
        <div class="col l6 s12">
          <h5 class="white-text">Sobre Nosotros</h5>
          <p class="grey-text text-lighten-4">Sign to all busca generar un entorno más ameno para niños de
            segundo grado del colegio Pablo de Tarso con discapacidades auditivas , impulsando al
            estudiante a obtener una mejor compresión y comunicación.
          </p>
        </div>
        <div class="col l3 s12">
          <h5 class="white-text">Redes Sociales</h5>
          <ul>
            <a class="btn" href="https://www.facebook.com/SIGN-to-ALL-106761894386754/?modal=admin_todo_tour" target="_blank">
              <i class="fab fa-facebook-f"></i>
            </a>
            <a class="btn" href="mailto:signtoall8@gmail.com" target="_blank">
              <i class="far fa-envelope"></i>
            </a>
            <a class="btn" href="https://www.instagram.com/sign_to_all/" target="_blank">
              <i class="fab fa-instagram"></i>
            </a>
            <a class="btn" href="https://github.com/Bing1177/Sign-to-all.git" target="_blank">
              <i class="fab fa-github"></i>
            </a>
          <!--
            <a class="btn" href="#">
              <i class="fab fa-twitter"></i>
            </a>
            <a class="btn" href="#">
              <i class="fab fa-youtube"></i>
            </a>
          -->
          </ul>
        </div>
        <div class="col l3 s12">
          <h5 class="white-text">Contactenos</h5>
          <ul>
            <li><a class="white-text email" href="mailto:clfigueroa@ucundinamarca.edu.co">clfigueroa@ucundinamarca.edu.co</a></li>
            <li><a class="white-text email" href="mailto:layara@ucundinamarca.edu.co">layara@ucundinamarca.edu.co</a></li>
            <li><a class="white-text email" href="mailto:daranda@ucundinamarca.edu.co">daranda@ucundinamarca.edu.co</a></li>
            <li><a class="white-text email" href="mailto:davaro@ucundinamarca.edu.co">davaron@ucundinamarca.edu.co</a></li>
            <li><a class="white-text email" href="mailto:nlcortes@ucundinamarca.edu.co">nlcortes@ucundinamarca.edu.co</a></li>
          </ul>
        </div>
      </div>
    </div>
    <div class="footer-copyright">
      <div class="container">
      Hecho por el <a class="yellow-text darken-4" href="">Equipo de sign to all.</a>
      </div>
    </div>
  </footer>



  </body>
</html>
